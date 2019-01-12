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

interface PostMapperInterface
{
    /**
     * Fetch all posts
     * 
     * @param int $topicId
     * @param boolean $sort Whether to apply sorting
     * @return array
     */
    public function fetchAll($topicId, $sort);
}
