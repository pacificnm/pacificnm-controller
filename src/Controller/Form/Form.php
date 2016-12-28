<?php
namespace Controller\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Controller\Entity\Entity;
use Controller\Hydrator\Hydrator;
use Module\Service\ServiceInterface as ModuleServiceInterface;

class Form extends ZendForm implements InputFilterProviderInterface
{

    /**
     *
     * @var ModuleServiceInterface
     */
    protected $moduleService;

    /**
     *
     * @param ModuleServiceInterface $moduleService            
     * @param string $name            
     * @param array $options            
     */
    public function __construct(ModuleServiceInterface $moduleService, $name = 'controller-form', $options = array())
    {
        parent::__construct($name, $options);
        
        $this->setHydrator(new Hydrator(false));
        
        $this->setObject(new Entity());
        
        $this->moduleService = $moduleService;
        
        // controllerId
        $this->add(array(
            'name' => 'controllerId',
            'type' => 'hidden',
            'attributes' => array(
                'id' => 'controllerId'
            )
        ));
        
        // moduleId
        $this->add(array(
            'type' => 'Select',
            'name' => 'moduleId',
            'options' => array(
                'label' => 'Module:',
                'value_options' => $this->getModuleOptions()
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'moduleId'
            )
        ));
        
        // controllerName
        $this->add(array(
            'name' => 'controllerName',
            'type' => 'Text',
            'options' => array(
                'label' => 'Controller Name:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'controllerName'
            )
        ));
        
        // submit
        $this->add(array(
            'name' => 'submit',
            'type' => 'button',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submit',
                'class' => 'btn btn-primary btn-flat'
            )
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array();
    }

    /**
     * gets module options for select
     * 
     * @return NULL[]
     */
    protected function getModuleOptions()
    {
        $entitys = $this->moduleService->getAll(array(
            'pagination' => 'off'
        ));
        
        $options = array();
        
        foreach ($entitys as $entity) {
            $options[$entity->getModuleId()] = $entity->getModuleName();
        }
        
        return $options;
    }
}

