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
}
