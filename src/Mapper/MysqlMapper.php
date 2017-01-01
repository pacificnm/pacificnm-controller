<?php
namespace Pacificnm\Controller\Mapper;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Application\Mapper\AbstractMysqlMapper;
use Pacificnm\Controller\Entity\Entity;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     * Mysql Mapper Construct
     *
     * @param AdapterInterface $readAdapter            
     * @param AdapterInterface $writeAdapter            
     * @param HydratorInterface $hydrator            
     * @param Entity $prototype            
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
        
        $this->prototype = $prototype;
        
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Controller\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll(array $filter)
    {
        $this->select = $this->readSql->select('controller');
        
        $this->joinModule();
        
        $this->select->order('module.module_name');
        
        $this->filter($filter);
        
        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {
                return $this->getRows();
            }
        }
        
        return $this->getPaginator();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Controller\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('controller');
        
        $this->joinModule();
        
        $this->select->where(array(
            'controller.controller_id = ?' => $id
        ));
        
        return $this->getRow();
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Controller\Mapper\MysqlMapperInterface::getByName()
     */
    public function getByName($moduleId, $controllerName)
    {
        $this->select = $this->readSql->select('controller');
        
        $this->joinModule();
        
        $this->select->where(array(
            'controller.controller_name = ?' => $controllerName
        ));
        
        $this->select->where(array(
            'controller.module_id = ?' => $moduleId
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Controller\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
        
        if ($entity->getControllerId()) {
            $this->update = new Update('controller');
            
            $this->update->set($postData);
            
            $this->update->where(array(
                'controller.controller_id = ?' => $entity->getControllerId()
            ));
            
            $this->updateRow();
        } else {
            $this->insert = new Insert('controller');
            
            $this->insert->values($postData);
            
            $id = $this->createRow();
            
            $entity->setControllerId($id);
        }
        
        return $this->get($entity->getControllerId());
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Controller\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('controller');
        $this->delete->where(array(
            'controller.controller_id = ?' => $entity->getControllerId()
        ));
        
        return $this->deleteRow();
    }

    /**
     * Filters and search
     *
     * @param array $filter            
     * @return \Controller\Mapper\MysqlMapper
     */
    protected function filter(array $filter)
    {
        
        if(array_key_exists('moduleId', $filter)) {
            $this->select->where(array(
               'controller.module_id = ?' => $filter['moduleId'] 
            ));
        }
        return $this;
    }

    /**
     * 
     * @return \Controller\Mapper\MysqlMapper
     */
    protected function joinModule()
    {
        $this->select->join('module', 'controller.module_id = module.module_id', array(
            'module_name',
            'module_version'
        ), 'inner');
        
        return $this;
    }
}

