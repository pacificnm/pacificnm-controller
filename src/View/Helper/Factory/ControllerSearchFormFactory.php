<?php
namespace Pacificnm\Controller\View\Helper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Controller\View\Helper\ControllerSearchForm;

class ControllerSearchFormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Controller\View\Helper\ControllerSearchForm
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceController = $serviceLocator->getServiceLocator();
        
        return new ControllerSearchForm();
    }
}

