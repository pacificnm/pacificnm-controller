<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-controller for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-controller/blob/master/LICENSE.md
 */
namespace Pacificnm\Controller\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Controller\Controller\RestController;

class RestControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Controller\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\Controller\Service\ServiceInterface');

        return new RestController($service);
    }


}

