<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-controller for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-controller/blob/master/LICENSE.md
 */
namespace Pacificnm\Controller\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\Controller\Service\ServiceInterface;
use Pacificnm\Page\Service\ServiceInterface as PageServiceInterface;

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

