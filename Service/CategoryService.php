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
use Forum\Storage\CategoryMapperInterface;

final class CategoryService extends AbstractManager
{
    /**
     * Any compliant category mapper
     * 
     * @var \Forum\Storage\CategoryMapperInterface
     */
    private $categoryMapper;

    /**
     * State initialization
     * 
     * @param \Forum\Storage\CategoryMapperInterface $categoryMapper
     * @return void
     */
    public function __construct(CategoryMapperInterface $categoryMapper)
    {
        $this->categoryMapper = $categoryMapper;
    }

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $row)
    {
        $entity = new VirtualEntity();
        $entity->setId($row['id'])
               ->setName($row['name'])
               ->setOrder($row['order']);

        return $entity;
    }

    /**
     * Returns last category ID
     * 
     * @return int
     */
    public function getLastId()
    {
        return $this->categoryMapper->getMaxId();
    }

    /**
     * Fetch category by its ID
     * 
     * @param int $id Category ID
     * @return mixed
     */
    public function fetchById($id)
    {
        return $this->prepareResult($this->categoryMapper->findByPk($id));
    }

    /**
     * Fetch all categories
     * 
     * @return array
     */
    public function fetchAll()
    {
        return $this->prepareResults($this->categoryMapper->fetchAll());
    }

    /**
     * Fetch categories as a hash map
     * 
     * @return array
     */
    public function fetchList()
    {
        return ArrayUtils::arrayList($this->categoryMapper->fetchAll(), 'id', 'name');
    }

    /**
     * Deletes category by its ID
     * 
     * @param int $id Category ID
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->categoryMapper->deleteByPk($id);
    }

    /**
     * Save category
     * 
     * @param array $input
     * @return boolean
     */
    public function save(array $input)
    {
        return $this->categoryMapper->persist($input);
    }
}
