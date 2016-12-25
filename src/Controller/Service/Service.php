<?php
namespace Controller\Service;

use Controller\Entity\Entity;
use Controller\Mapper\MysqlMapperInterface;

class Service implements ServiceInterface
{

    protected $mapper = null;

    /**
     * Service Construct
     *
     * @param MysqlMapperInterface $mapper            
     */
    public function __construct(MysqlMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Controller\Service\ServiceInterface::getAll()
     */
    public function getAll(array $filter)
    {
        return $this->mapper->getAll($filter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Controller\Service\ServiceInterface::get()
     */
    public function get($id)
    {
        return $this->mapper->get($id);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Controller\Service\ServiceInterface::getByName()
     */
    public function getByName($controllerName)
    {
        return $this->mapper->getByName($controllerName);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Controller\Service\ServiceInterface::save()
     */
    public function save(Entity $entity)
    {
        return $this->mapper->save($entity);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Controller\Service\ServiceInterface::delete()
     */
    public function delete(Entity $entity)
    {
        return $this->mapper->delete($entity);
    }
}

