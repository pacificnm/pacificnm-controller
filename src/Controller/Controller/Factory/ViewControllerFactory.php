<?php

namespace Controller\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Controller\Controller\ViewController;

class ViewControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Controller\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Controller\Service\ServiceInterface');

        $pageService = $realServiceLocator->get('Page\Service\ServiceInterface');
        
        return new ViewController($service, $pageService);
    }


}

