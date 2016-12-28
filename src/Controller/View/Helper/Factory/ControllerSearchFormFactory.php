<?php
namespace Controller\View\Helper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Controller\View\Helper\ControllerSearchForm;

class ControllerSearchFormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Controller\View\Helper\ControllerSearchForm
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceController = $serviceLocator->getServiceLocator();
        
        return new ControllerSearchForm();
    }
}

