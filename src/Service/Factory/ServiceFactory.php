<?php

namespace Pacificnm\Controller\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Controller\Service\Service;

class ServiceFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Controller\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Pacificnm\Controller\Mapper\MysqlMapperInterface');

        return new Service($mapper);
    }


}

