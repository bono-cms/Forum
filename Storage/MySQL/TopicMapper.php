<?php

/**
 * This file is part of the Bono CMS
 * 
 * Copyright (c) No Global State Lab
 * 
 * For the full copyright and license information, please view
 * the license file that was distributed with this source code.
 */

namespace Forum\Storage\MySQL;

use Cms\Storage\MySQL\AbstractMapper;
use Forum\Storage\TopicMapperInterface;

final class TopicMapper extends AbstractMapper implements TopicMapperInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_forum_topic');
    }
}
