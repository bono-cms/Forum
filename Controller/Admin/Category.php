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

use Krystal\Stdlib\VirtualEntity;
use Cms\Controller\Admin\AbstractController;

final class Category extends AbstractController
{
    /**
     * Creates category form
     * 
     * @param \Krystal\Stdlib\VirtualEntity $category
     * @return string
     */
    private function createForm(VirtualEntity $category)
    {
        $new = !$category->getId();

        // Append breadcrumbs
        $this->view->getBreadcrumbBag()->addOne('Forum', 'Forum:Admin:Browser@indexAction')
                                       ->addOne($new ? 'Add new category' : 'Edit the category');

        return $this->view->render('category.form', array(
            'new' => $new,
            'category' => $category
        ));
    }

    /**
     * Renders add form
     * 
     * @return string
     */
    public function addAction()
    {
        return $this->createForm(new VirtualEntity);
    }

    /**
     * Renders edit form
     * 
     * @param int $id
     * @return string
     */
    public function editAction($id)
    {
        $category = $this->getModuleService('categoryService')->fetchById($id);

        if ($category) {
            return $this->createForm($category);
        } else {
            return false;
        }
    }

    /**
     * Deletes a category by its ID
     * 
     * @param int $id Category ID
     * @return string
     */
    public function deleteAction($id)
    {
        $this->getModuleService('categoryService')->deleteById($id);

        $this->flashBag->set('success', 'Selected element has been removed successfully');
        return 1;
    }

    /**
     * Saves a category
     * 
     * @return string
     */
    public function saveAction()
    {
        // Grab raw POST data
        $input = $this->request->getPost('category');

        $service = $this->getModuleService('categoryService');
        $service->save($input);

        if ($input['id']) {
            $this->flashBag->set('success', 'The element has been updated successfully');
            return 1;
        } else {
            $this->flashBag->set('success', 'The element has been created successfully');
            return $service->getLastId();
        }
    }
}
