<?php

namespace Controller\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Controller\Controller\UpdateController;

class UpdateControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Controller\Controller\UpdateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Controller\Service\ServiceInterface');

        $form = $realServiceLocator->get('Controller\Form\Form');

        return new UpdateController($service, $form);
    }


}

