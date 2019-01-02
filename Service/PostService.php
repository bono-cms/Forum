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
}
