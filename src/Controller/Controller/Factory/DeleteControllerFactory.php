<?php

namespace Controller\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Controller\Controller\DeleteController;

class DeleteControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Controller\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Controller\Service\ServiceInterface');

        return new DeleteController($service);
    }


}

