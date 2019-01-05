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
    )
);
