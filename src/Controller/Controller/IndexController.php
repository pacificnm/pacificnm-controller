<?php

namespace Controller\Controller;

use Application\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use Controller\Service\ServiceInterface;

class IndexController extends AbstractApplicationController
{

    protected $service = null;

    /**
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();

        $this->getEventManager()->trigger('controllerIndex', $this, array(
        	'authId' => $this->identity()->getAuthId(),
        	'requestUrl' => $this->getRequest()->getUri()
        ));

        $filter = array(
        	'page' => $this->page,
        	'count-per-page' => $this->countPerPage
        );

        $paginator = $this->service->getAll($filter);

        $paginator->setCurrentPageNumber($filter['page']);

        $paginator->setItemCountPerPage($filter['count-per-page']);

        return new ViewModel(array(
        	'paginator' => $paginator,
        	'page' => $filter['page'],
        	'count-per-page' => $filter['count-per-page'],
        	'itemCount' => $paginator->getTotalItemCount(),
        	'pageCount' => $paginator->count(),
        	'queryParams' => $this->params()->fromQuery(),
        	'routeParams' => $this->params()->fromRoute()
        ));
    }


}

