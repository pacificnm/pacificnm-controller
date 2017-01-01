<?php
namespace Pacificnm\Controller\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ControllerSearchForm extends AbstractHelper
{
    public function __construct()
    {
        
    }
    
    public function __invoke(array $queryParams = array())
    {
        $view = $this->getView();
        
        $partialHelper = $view->plugin('partial');
        
        $data = new \stdClass();
        
        $data->queryParams = $queryParams;
        
        return $partialHelper('partials/controller-search-form.phtml', $data);
    }
}

