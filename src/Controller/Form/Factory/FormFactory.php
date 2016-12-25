<?php

namespace Controller\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Controller\Form\Form;

class FormFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Controller\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $moduleService = $serviceLocator->get('Module\Service\ServiceInterface');
        
        return new Form($moduleService);
    }


}

