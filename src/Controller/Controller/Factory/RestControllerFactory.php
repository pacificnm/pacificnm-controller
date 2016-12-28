<?php

namespace Controller\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Controller\Controller\RestController;

class RestControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Controller\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Controller\Service\ServiceInterface');

        return new RestController($service);
    }


}

