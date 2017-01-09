<?php 
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-controller for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-controller/blob/master/LICENSE.md
 */
return array(
    'module' => array(
        'Controller' => array(
            'name' => 'Controller',
            'version' => '1.0.6',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/controller.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\Controller\Controller\ConsoleController' => 'Pacificnm\Controller\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\Controller\Controller\CreateController' => 'Pacificnm\Controller\Controller\Factory\CreateControllerFactory',
            'Pacificnm\Controller\Controller\DeleteController' => 'Pacificnm\Controller\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\Controller\Controller\IndexController' => 'Pacificnm\Controller\Controller\Factory\IndexControllerFactory',
            'Pacificnm\Controller\Controller\RestController' => 'Pacificnm\Controller\Controller\Factory\RestControllerFactory',
            'Pacificnm\Controller\Controller\UpdateController' => 'Pacificnm\Controller\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\Controller\Controller\ViewController' => 'Pacificnm\Controller\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\Controller\Service\ServiceInterface' => 'Pacificnm\Controller\Service\Factory\ServiceFactory',
            'Pacificnm\Controller\Mapper\MysqlMapperInterface' => 'Pacificnm\Controller\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\Controller\Form\Form' => 'Pacificnm\Controller\Form\Factory\FormFactory',
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
                        'controller' => 'Pacificnm\Controller\Controller\CreateController',
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
                        'controller' => 'Pacificnm\Controller\Controller\DeleteController',
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
                        'controller' => 'Pacificnm\Controller\Controller\IndexController',
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
                        'controller' => 'Pacificnm\Controller\Controller\RestController',
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
                        'controller' => 'Pacificnm\Controller\Controller\UpdateController',
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
                        'controller' => 'Pacificnm\Controller\Controller\ViewController',
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
                            'controller' => 'Pacificnm\Controller\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        ),
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\Controller' => true
        ),
        'template_map' => array(
            'pacificnm/create/index' => __DIR__ . '/../view/controller/create/index.phtml',
            'pacificnm/delete/index' => __DIR__ . '/../view/controller/delete/index.phtml',
            'pacificnm/index/index' => __DIR__ . '/../view/controller/index/index.phtml',
            'pacificnm/update/index' => __DIR__ . '/../view/controller/update/index.phtml',
            'pacificnm/view/index' => __DIR__ . '/../view/controller/view/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'view_helpers' => array(
        'factories' => array(
            'ControllerSearchForm' => 'Pacificnm\Controller\View\Helper\Factory\ControllerSearchFormFactory'
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