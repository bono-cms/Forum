<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

return array(

    '/%s/module/forum' => array(
        'controller' => 'Admin:Browser@indexAction'
    ),
    
    // Forum category
    '/%s/module/forum/category/add' => array(
        'controller' => 'Admin:Category@addAction'
    ),

    '/%s/module/forum/category/edit/(:var)' => array(
        'controller' => 'Admin:Category@editAction'
    ),

    '/%s/module/forum/category/delete/(:var)' => array(
        'controller' => 'Admin:Category@deleteAction'
    ),

    '/%s/module/forum/category/save' => array(
        'controller' => 'Admin:Category@saveAction'
    ),

    // Forum topic
    '/%s/module/forum/topic/add' => array(
        'controller' => 'Admin:Topic@addAction'
    ),

    '/%s/module/forum/topic/edit/(:var)' => array(
        'controller' => 'Admin:Topic@editAction'
    ),

    '/%s/module/forum/topic/delete/(:var)' => array(
        'controller' => 'Admin:Topic@deleteAction'
    ),

    '/%s/module/forum/topic/save' => array(
        'controller' => 'Admin:Topic@saveAction'
    ),

    // Forum posts
    '/%s/module/forum/post/index/(:var)' => array(
        'controller' => 'Admin:Post@indexAction'
    ),

    '/%s/module/forum/post/add/(:var)' => array(
        'controller' => 'Admin:Post@addAction'
    ),

    '/%s/module/forum/post/edit/(:var)' => array(
        'controller' => 'Admin:Post@editAction'
    ),

    '/%s/module/forum/post/delete/(:var)' => array(
        'controller' => 'Admin:Post@deleteAction'
    ),

    '/%s/module/forum/post/save' => array(
        'controller' => 'Admin:Post@saveAction'
    )
);
