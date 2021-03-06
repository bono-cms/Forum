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

use Krystal\Stdlib\ArrayUtils;
use Krystal\Stdlib\VirtualEntity;
use Cms\Service\AbstractManager;
use Forum\Storage\TopicMapperInterface;

final class TopicService extends AbstractManager
{
    /**
     * Any compliant topic mapper
     * 
     * @var \Forum\Storage\TopicMapperInterface
     */
    private $topicMapper;

    /**
     * State initialization
     * 
     * @param \Forum\Storage\TopicMapperInterface $topicMapper
     * @return void
     */
    public function __construct(TopicMapperInterface $topicMapper)
    {
        $this->topicMapper = $topicMapper;
    }

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $row)
    {
        $entity = new VirtualEntity();
        $entity->setId($row['id'])
               ->setCategoryId($row['category_id'])
               ->setName($row['name'])
               ->setOrder($row['order']);

        if (isset($row['post_count'])) {
            $entity->setPostCount($row['post_count']);
        }

        return $entity;
    }

    /**
     * Returns last topic ID
     * 
     * @return int
     */
    public function getLastId()
    {
        return $this->topicMapper->getMaxId();
    }

    /**
     * Fetches topic by its ID
     * 
     * @return array
     */
    public function fetchById($id)
    {
        return $this->prepareResult($this->topicMapper->findByPk($id));
    }

    /**
     * Fetch all topics
     * 
     * @param int $categoryId Optional category ID constraint
     * @return array
     */
    public function fetchAll($categoryId = null)
    {
        return $this->prepareResults($this->topicMapper->fetchAll($categoryId));
    }

    /**
     * Fetch topics as a hash map
     * 
     * @param int $categoryId Optional category ID constraint
     * @return array
     */
    public function fetchList($categoryId = null)
    {
        return ArrayUtils::arrayList($this->topicMapper->fetchAll($categoryId), 'id', 'name');
    }

    /**
     * Deletes topic by its ID
     * 
     * @param int $id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->topicMapper->deleteByPk($id);
    }

    /**
     * Saves a topic
     * 
     * @param array $input
     * @return boolean
     */
    public function save(array $input)
    {
        return $this->topicMapper->persist($input);
    }
}
