<?php
namespace Pacificnm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Pacificnm\Auth\Entity\Entity as AuthEntity;

class AbstractApplicationController extends AbstractActionController
{

    /**
     *
     * @var number
     */
    protected $page;

    /**
     *
     * @var number
     */
    protected $countPerPage;

    /**
     *
     * @var string
     */
    protected $sort;

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::onDispatch()
     */
    public function onDispatch(MvcEvent $e)
    {
        
        // check if we are installed
        if (! file_exists(APPLICATION_PATH . '/data/install')) {
            return $this->redirect()->toRoute('install-index');
        }
        
        // get router
        $router = $e->getRouteMatch();
        
        // module array
        $moduleArray = explode('\\', $router->getParam('controller'));
        
        // module name
        $module = $moduleArray[0];
        
        // check if we have an identity
        if (! $this->identity() || ! $this->identity() instanceof AuthEntity) {
            if (! $this->acl()->checkAcl('guest', $router->getMatchedRouteName())) {
                return $this->redirect()->toRoute('auth-sign-in');
            }
        } else {
            if (! $this->acl()->checkAcl($this->identity()
                ->getAclRoleEntity()
                ->getAclRoleName(), $router->getMatchedRouteName())) {
                return $this->redirect()
                    ->toRoute()
                    ->setStatusCode(403);
            }
        }
        
        // set up page
        $this->pageSetup($router->getMatchedRouteName(), $this->layout());
        
        // assign acl to layout
        $this->layout()->setVariable('acl', $this->acl()
            ->getAcl());
        
        // set session timeout
        $maxlifetime = ini_get("session.gc_maxlifetime") - 120;
        
        $this->layout()->setVariable('maxlifetime', $maxlifetime);

        
        // return parent dispatch
        return parent::onDispatch($e);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        $page = $this->params()->fromQuery('page', 1);
        
        $countPerPage = $this->params()->fromQuery('count-per-page', 25);
        
        $sort = $this->params()->fromQuery('sort', null);
        
        $this->page = $page;
        
        $this->countPerPage = $countPerPage;
        
        $this->sort = $sort;
        
        if ($this->identity()) {
            $authId = $this->identity()->getAuthId();
        } else {
            $authId = 0;
        }
        
        $requestParams = array(
            'query' => $this->params()->fromQuery(),
            'route' => $this->params()->fromRoute(),
            'post' => $_POST
        );
        
        // trigger event
        $this->getEventManager()->trigger('pageLoaded', $this, array(
            'authId' => $authId,
            'requestUrl' => $this->getRequest()->getUri(),
            'requestParams' => $requestParams
        ));
        
        // set categoryId
        $this->layout()->setVariable('categoryId', $this->params()->fromRoute('categoryId', 0));
    }
}

