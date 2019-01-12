<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Forum\Service;

use Krystal\Stdlib\VirtualEntity;
use Cms\Service\AbstractManager;
use Forum\Storage\PostMapperInterface;

final class PostService extends AbstractManager
{
    /**
     * Any compliant post mapper
     * 
     * @var \Forum\Storage\PostMapperInterface
     */
    private $postMapper;

    /**
     * State initialization
     * 
     * @param \Forum\Storage\PostMapperInterface $postMapper
     * @return void
     */
    public function __construct(PostMapperInterface $postMapper)
    {
        $this->postMapper = $postMapper;
    }

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $row)
    {
        $entity = new VirtualEntity();
        $entity->setId($row['id'])
               ->setTopicId($row['topic_id'])
               ->setTitle($row['title'])
               ->setContent($row['content']);

        return $entity;
    }

    /**
     * Returns last post ID
     * 
     * @return int
     */
    public function getLastId()
    {
        return $this->postMapper->getMaxId();
    }

    /**
     * Fetches post by its ID
     * 
     * @param int $id Post ID
     * @return array
     */
    public function fetchById($id)
    {
        return $this->prepareResult($this->postMapper->findByPk($id));
    }

    /**
     * Fetch all posts
     * 
     * @param int $topicId
     * @return array
     */
    public function fetchAll($topicId)
    {
        return $this->prepareResults($this->postMapper->fetchAll($topicId));
    }

    /**
     * Deletes post by its ID
     * 
     * @param int $id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->postMapper->deleteByPk($id);
    }

    /**
     * Saves a post
     * 
     * @param array $input
     * @return boolean
     */
    public function save(array $input)
    {
        return $this->postMapper->persist($input);
    }
}
