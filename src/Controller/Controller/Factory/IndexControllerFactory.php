<?php

namespace Controller\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Controller\Controller\IndexController;

class IndexControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Controller\Controller\IndexController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Controller\Service\ServiceInterface');

        return new IndexController($service);
    }


}

