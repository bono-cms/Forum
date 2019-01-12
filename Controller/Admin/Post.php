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

final class Post extends AbstractController
{
    /**
     * Renders post by topic
     * 
     * @param int $topicId
     * @return string
     */
    public function indexAction($topicId)
    {
        $topic = $this->getModuleService('topicService')->fetchById($topicId);

        // Make sure that valid topic ID supplied
        if ($topic) {
            // Append breadcrumbs
            $this->view->getBreadcrumbBag()->addOne('Forum', 'Forum:Admin:Browser@indexAction')
                                           ->addOne($this->translator->translate('View posts of "%s"', $topic->getName()));

            return $this->view->render('post.index', array(
                'posts' => $this->getModuleService('postService')->fetchAll($topicId),
                'topicId' => $topicId
            ));

        } else {
            // Invalid topic ID supplied
            return false;
        }
    }

    /**
     * Creates post form
     * 
     * @param \Krystal\Stdlib\VirtualEntity $post
     * @return string
     */
    private function createForm(VirtualEntity $post)
    {
        $topic = $this->getModuleService('topicService')->fetchById($post->getTopicId());

        // Make sure that valid topic ID supplied
        if ($topic) {
            $new = !$post->getId();

            // Append breadcrumbs
            $this->view->getBreadcrumbBag()->addOne('Forum', 'Forum:Admin:Browser@indexAction')
                                           ->addOne($this->translator->translate('View posts of "%s"', $topic->getName()), $this->createUrl('Forum:Admin:Post@indexAction', array($post->getTopicId())))
                                           ->addOne($new ? 'Add new post' : 'Edit the post');

            return $this->view->render('post.form', array(
                'new' => $new,
                'post' => $post,
                'topics' => $this->getModuleService('topicService')->fetchList()
            ));

        } else {
            // Invalid topic ID supplied
            return false;
        }
    }

    /**
     * Renders add form
     * 
     * @param int $topicId
     * @return string
     */
    public function addAction($topicId)
    {
        $post = new VirtualEntity();
        $post->setTopicId($topicId);

        return $this->createForm($post);
    }

    /**
     * Renders edit form
     * 
     * @param int $id Post ID
     * @return string
     */
    public function editAction($id)
    {
        $post = $this->getModuleService('postService')->fetchById($id);

        if ($post) {
            return $this->createForm($post);
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
        $this->getModuleService('postService')->deleteById($id);

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
        $input = $this->request->getPost('post');

        $service = $this->getModuleService('postService');
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
