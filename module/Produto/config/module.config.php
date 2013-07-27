<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(


            'produto' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/produto',
                    'defaults' => array(
                        'controller' => 'Produto\Controller\Produto',
                        'action'     => 'index',
                    ),
                ),


                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[/:action[/:id]]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '\d+'
                            ),
                        ),
                    ),
                ),


            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Produto\Controller\Produto' => 'Produto\Controller\ProdutoController'
        ),
    ),

    'view_manager' => array(

        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

);
