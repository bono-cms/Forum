<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Forum;

use Cms\AbstractCmsModule;
use Forum\Service\TopicService;
use Forum\Service\PostService;
use Forum\Service\CategoryService;

final class Module extends AbstractCmsModule
{
    /**
     * {@inheritDoc}
     */
    public function getServiceProviders()
    {
        return array(
            'topicService' => new TopicService($this->getMapper('\Forum\Storage\MySQL\TopicMapper')),
            'postService' => new PostService($this->getMapper('\Forum\Storage\MySQL\PostMapper')),
            'categoryService' => new CategoryService($this->getMapper('\Forum\Storage\MySQL\CategoryMapper'))
        );
    }
}
