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
use Forum\Storage\PostMapperInterface;

final class PostMapper extends AbstractMapper implements PostMapperInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_forum_post');
    }

    /**
     * Fetch all posts
     * 
     * @param int $topicId
     * @return array
     */
    public function fetchAll($topicId)
    {
        $db = $this->db->select('*')
                       ->from(self::getTableName())
                       ->whereEquals('topic_id', $topicId)
                       ->orderBy('id')
                       ->desc();

        return $db->queryAll();
    }
}
