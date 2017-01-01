<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-controller for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-controller/blob/master/LICENSE.md
 */
namespace Pacificnm\Controller\Entity;

use Pacificnm\Module\Entity\Entity as ModuleEntity;

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

