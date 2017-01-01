<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-controller for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-controller/blob/master/LICENSE.md
 */
namespace Pacificnm\Controller\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Controller\Form\Form;

class FormFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Controller\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $moduleService = $serviceLocator->get('Pacificnm\Module\Service\ServiceInterface');
        
        return new Form($moduleService);
    }


}

