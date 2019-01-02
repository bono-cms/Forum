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
}
