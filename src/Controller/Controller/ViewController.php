<?php
namespace Controller\Controller;

use Application\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use Controller\Service\ServiceInterface;
use Page\Service\ServiceInterface as PageServiceInterface;

class ViewController extends AbstractApplicationController
{

    /**
     *
     * @var ServiceInterface
     */
    protected $service;

    /**
     *
     * @var PageServiceInterface
     */
    protected $pageService;

    /**
     *
     * @param ServiceInterface $service            
     * @param PageServiceInterface $pageService            
     */
    public function __construct(ServiceInterface $service, PageServiceInterface $pageService)
    {
        $this->service = $service;
        
        $this->pageService = $pageService;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if (! $entity) {
            $this->flashMessenger()->addErrorMessage('Object was not found');
            return $this->redirect()->toRoute('controller-index');
        }
        
        $pageEntitys = $this->pageService->getAll(array(
            'pagination' => 'off',
            'controllerId' => $id
        ));
        
        $this->getEventManager()->trigger('controllerView', $this, array(
            'authId' => $this->identity()->getAuthId(),
            'requestUrl' => $this->getRequest()->getUri(),
            'controllerEntity' => $entity
        ));
        
        return new ViewModel(array(
            'entity' => $entity,
            'pageEntitys' => $pageEntitys
        ));
    }
}

