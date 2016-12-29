<?php 
return array(
    'module' => array(
        'Controller' => array(
            'name' => 'Controller',
            'version' => '1.0.4',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/controller.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Controller\Controller\ConsoleController' => 'Controller\Controller\Factory\ConsoleControllerFactory',
            'Controller\Controller\CreateController' => 'Controller\Controller\Factory\CreateControllerFactory',
            'Controller\Controller\DeleteController' => 'Controller\Controller\Factory\DeleteControllerFactory',
            'Controller\Controller\IndexController' => 'Controller\Controller\Factory\IndexControllerFactory',
            'Controller\Controller\RestController' => 'Controller\Controller\Factory\RestControllerFactory',
            'Controller\Controller\UpdateController' => 'Controller\Controller\Factory\UpdateControllerFactory',
            'Controller\Controller\ViewController' => 'Controller\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Controller\Service\ServiceInterface' => 'Controller\Service\Factory\ServiceFactory',
            'Controller\Mapper\MysqlMapperInterface' => 'Controller\Mapper\Factory\MysqlMapperFactory',
            'Controller\Form\Form' => 'Controller\Form\Factory\FormFactory',
        )
    ),
    'router' => array(
        'routes' => array(
            'controller-create' => array(
                'pageTitle' => 'Controller',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'controller-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/controller/create',
                    'defaults' => array(
                        'controller' => 'Controller\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'controller-delete' => array(
                'pageTitle' => 'Controller',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'controller-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/controller/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Controller\Controller\DeleteController',
                        'action' => 'index'
                    )
                )
            ),
            'controller-index' => array(
                'pageTitle' => 'Controller',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'controller-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/controller',
                    'defaults' => array(
                        'controller' => 'Controller\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'controller-rest' => array(
                'pageTitle' => 'Controller',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'controller-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'rest',
                'type' => 'literal',
                'options' => array(
                    'route' => '/api/controller[/:id]',
                    'defaults' => array(
                        'controller' => 'Controller\Controller\RestController',
                        'action' => 'index'
                    )
                )
            ),
            'controller-update' => array(
                'pageTitle' => 'Controller',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'controller-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/controller/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Controller\Controller\UpdateController',
                        'action' => 'index'
                    )
                )
            ),
            'controller-view' => array(
                'pageTitle' => 'Controller',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'controller-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/controller/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Controller\Controller\ViewController',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'controller-console-index' => array(
                    'options' => array(
                        'route' => 'controller',
                        'defaults' => array(
                            'controller' => 'Controller\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'view_helpers' => array(
        'factories' => array(
            'ControllerSearchForm' => 'Controller\View\Helper\Factory\ControllerSearchFormFactory'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'user' => array(),
            'administrator' => array(
                'controller-create',
                'controller-delete',
                'controller-index',
                'controller-update',
                'controller-view'
            )
        )
    ),
    'menu' => array(
        'default' => array(
            array(
                'name' => 'Admin',
                'route' => 'admin-index',
                'icon' => 'fa fa-gear',
                'order' => 99,
                'location' => 'left',
                'active' => true,
                'items' => array(
                    array(
                        'name' => 'Controller',
                        'route' => 'controller-index',
                        'icon' => 'fa fa-cogs',
                        'order' => 5,
                        'active' => true
                    )
                )
            )
        )
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Controller',
                        'route' => 'controller-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'controller-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Edit',
                                        'route' => 'controller-update',
                                        'useRouteMatch' => true,
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'controller-delete',
                                        'useRouteMatch' => true,
                                    )
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'controller-create',
                                'useRouteMatch' => true,
                            )
                        )
                    )
                )
            )
        )
    )
);