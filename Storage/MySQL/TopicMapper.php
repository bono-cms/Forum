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

    /**
     * Fetch all topics filtered by category ID
     * 
     * @param int $categoryId Optional category ID constraint
     * @return array
     */
    public function fetchAll($categoryId = null)
    {
        // Columns to be selected
        $columns = array(
            self::column('id'),
            self::column('category_id'),
            self::column('name'),
            self::column('order')
        );

        $db = $this->db->select($columns)
                       ->count(PostMapper::column('id'), 'post_count')
                       ->from(self::getTableName())
                       // Post relation
                       ->leftJoin(PostMapper::getTableName(), array(
                            PostMapper::column('topic_id') => self::getRawColumn('id')
                       ));

        // If explicit category ID provided, then use it
        if ($categoryId !== null) {
            $db->whereEquals('category_id', $categoryId);
        }

        $db->orderBy('id')
           ->desc();

        return $db->queryAll();
    }
}
