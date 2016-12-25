<?php
namespace Controller\Mapper;

use Controller\Entity\Entity;

interface MysqlMapperInterface
{

    /**
     *
     * @param array $filter            
     * @return Paginator
     */
    public function getAll(array $filter);

    /**
     *
     * @param number $id            
     * @return Entity
     */
    public function get($id);

    /**
     *
     * @param string $controllerName            
     * @return Entity
     */
    public function getByName($controllerName);

    /**
     *
     * @param Entity $entity            
     * @return Entity
     */
    public function save(Entity $entity);

    /**
     *
     * @param Entity $entity            
     * @return Boolean
     */
    public function delete(Entity $entity);
}

