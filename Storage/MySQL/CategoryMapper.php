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
use Forum\Storage\CategoryMapperInterface;

final class CategoryMapper extends AbstractMapper implements CategoryMapperInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return self::getWithPrefix('bono_module_forum_category');
    }

    /**
     * Fetch all categories
     * 
     * @return array
     */
    public function fetchAll()
    {
        // To be selected
        $columns = array(
            self::column('id'),
            self::column('name'),
            self::column('order')
        );

        $db = $this->db->select($columns)
                       ->count(TopicMapper::column('id'), 'topic_count')
                       ->from(self::getTableName())
                       // Topic relation
                       ->leftJoin(TopicMapper::getTableName(), array(
                            TopicMapper::column('category_id') => self::getRawColumn('id')
                       ))
                       ->orderBy(self::column('id'))
                       ->desc();

        return $db->queryAll();
    }
}
