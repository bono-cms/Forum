<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Forum\Controller\Admin;

use Cms\Controller\Admin\AbstractController;

final class Browser extends AbstractController
{
    /**
     * Renders a grid
     * 
     * @param array $topics
     * @return string
     */
    private function createGrid(array $topics)
    {
        // Append one breadcrumb
        $this->view->getBreadcrumbBag()->addOne('Forum');

        return $this->view->render('index', array(
            'categories' => $this->getModuleService('categoryService')->fetchAll(),
            'topics' => $topics
        ));
    }

    /**
     * Renders grid
     * 
     * @return string
     */
    public function indexAction()
    {
        $topics = $this->getModuleService('topicService')->fetchAll();
        return $this->createGrid($topics);
    }
}
