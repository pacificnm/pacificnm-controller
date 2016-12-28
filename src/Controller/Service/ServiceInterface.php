<?php
namespace Controller\Service;

use Controller\Entity\Entity;

interface ServiceInterface
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
     * @param number $moduleId
     * @param string $controllerName
     * @return Entity
     */
    public function getByName($moduleId, $controllerName);

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

