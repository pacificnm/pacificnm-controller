<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-controller for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-controller/blob/master/LICENSE.md
 */
namespace Pacificnm\Controller\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Pacificnm\Controller\Service\ServiceInterface;

class RestController extends AbstractRestfulController
{

    /**
     * 
     * @var ServiceInterface
     */
    protected $service;

    /**
     * 
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::create()
     */
    public function create($data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::delete()
     */
    public function delete($id)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    public function deleteList($data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    public function get($id)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    public function getList($params)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    public function head($id)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    public function options()
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    public function patch($id, $data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    public function replaceList($data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    public function patchList($data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    public function update($id, $data)
    {
        $this->response->setStatusCode(405);
        return array('content' => 'Method Not Allowed');
    }

    public function notFoundAction()
    {
        $this->response->setStatusCode(404);
        return array('content' => 'Page not found');
    }


}

