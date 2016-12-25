<?php

namespace Controller\Controller;

use Application\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;
use Controller\Service\ServiceInterface;
use Controller\Form\Form;

class CreateController extends AbstractApplicationController
{

    protected $service = null;

    protected $form = null;

    /**
     * @param ServiceInterface $service
     * @param Form $form
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->service = $service;

        $this->form = $form;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();

        $request = $this->getRequest();

        if ($request->isPost()) {
        	$postData = $request->getPost();

        	$this->form->setData($postData);

        	if ($this->form->isValid()) {
        		$entity = $this->form->getData();

        		$controllerEntity = $this->service->save($entity);

        		$this->getEventManager()->trigger('controllerCreate', $this, array(
        			'authId' => $this->identity()->getAuthId(),
        			'requestUrl' => $this->getRequest()->getUri(),
        			'controllerEntity' => $entity
        		));

        		$this->flashMessenger()->addSuccessMessage('Object was saved');

        		return $this->redirect()->toRoute('controller-view', array(
        			'id' => $controllerEntity->getControllerId()
        		));
        	}
        }

        return new ViewModel(array(
        	'form' => $this->form
        ));
    }


}

