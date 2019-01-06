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

final class Topic extends AbstractController
{
    /**
     * Creates category form
     * 
     * @param \Krystal\Stdlib\VirtualEntity $topic
     * @return string
     */
    private function createForm(VirtualEntity $topic)
    {
        $new = !$topic->getId();

        // Append breadcrumbs
        $this->view->getBreadcrumbBag()->addOne('Forum', 'Forum:Admin:Browser@indexAction')
                                       ->addOne($new ? 'Add new topic' : 'Edit the topic');

        return $this->view->render('topic.form', array(
            'new' => $new,
            'topic' => $topic,
            'categories' => $this->getModuleService('categoryService')->fetchList()
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
        $topic = $this->getModuleService('topicService')->fetchById($id);

        if ($topic) {
            return $this->createForm($topic);
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
        $this->getModuleService('topicService')->deleteById($id);

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
        $input = $this->request->getPost('topic');

        $service = $this->getModuleService('topicService');
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
