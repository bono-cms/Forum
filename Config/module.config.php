<?php

/**
 * Module configuration container
 */

return array(
    'name'  => 'Forum',
    'description' => 'Manage forum on your site',
    'menu' => array(
        'name' => 'Forum',
        'icon' => 'fas fa-comments',
        'items' => array(
            array(
                'route' => 'Forum:Admin:Browser@indexAction',
                'name' => 'View forum'
            ),
            array(
                'route' => 'Forum:Admin:Category@addAction',
                'name' => 'Add category'
            ),
            array(
                'route' => 'Forum:Admin:Topic@addAction',
                'name' => 'Add new topic'
            )
        )
    )
);