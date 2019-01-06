<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Forum\Storage;

interface TopicMapperInterface
{
    /**
     * Fetch all topics filtered by category ID
     * 
     * @param int $categoryId Optional category ID constraint
     * @return array
     */
    public function fetchAll($categoryId = null);
}
