<?php

namespace Controller\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Controller\Service\Service;

class ServiceFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Controller\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Controller\Mapper\MysqlMapperInterface');

        return new Service($mapper);
    }


}

