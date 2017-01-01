<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-controller for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-controller/blob/master/LICENSE.md
 */
namespace \Pacificnm\Controller\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Adapter\AdapterInterface;
use Pacificnm\Controller\Service\ServiceInterface;

class ConsoleController extends AbstractActionController
{

    /**
     * 
     * @var ServiceInterface
     */
    protected $service;

    /**
     * 
     * @var AdapterInterface
     */
    protected $console;

    /**
     * @param ServiceInterface $service
     * @param AdapterInterface $console
     */
    public function __construct(ServiceInterface $service, AdapterInterface $console)
    {
        $this->service = $service;

        $this->console = $console;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
    }


}

