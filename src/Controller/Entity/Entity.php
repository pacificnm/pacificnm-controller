<?php
namespace Controller\Entity;

use Module\Entity\Entity as ModuleEntity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $controllerId;

    /**
     *
     * @var number
     */
    protected $moduleId;

    /**
     *
     * @var string
     */
    protected $controllerName;

    /**
     *
     * @var ModuleEntity
     */
    protected $moduleEntity;

    /**
     *
     * @return the $controllerId
     */
    public function getControllerId()
    {
        return $this->controllerId;
    }

    /**
     *
     * @return the $moduleId
     */
    public function getModuleId()
    {
        return $this->moduleId;
    }

    /**
     *
     * @return the $controllerName
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     *
     * @return the $moduleEntity
     */
    public function getModuleEntity()
    {
        return $this->moduleEntity;
    }

    /**
     *
     * @param number $controllerId            
     */
    public function setControllerId($controllerId)
    {
        $this->controllerId = $controllerId;
    }

    /**
     *
     * @param number $moduleId            
     */
    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;
    }

    /**
     *
     * @param string $controllerName            
     */
    public function setControllerName($controllerName)
    {
        $this->controllerName = $controllerName;
    }

    /**
     *
     * @param \Module\Entity\Entity $moduleEntity            
     */
    public function setModuleEntity($moduleEntity)
    {
        $this->moduleEntity = $moduleEntity;
    }
}

