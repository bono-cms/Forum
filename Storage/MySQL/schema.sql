
DROP TABLE IF EXISTS `bono_module_forum_category`;

CREATE TABLE `bono_module_forum_category` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Category ID',
    `name` varchar(255) NOT NULL COMMENT 'Category name',
    `order` INT NOT NULL COMMENT 'Category sort order'
);

DROP TABLE IF EXISTS `bono_module_forum_topic`;

CREATE TABLE `bono_module_forum_topic` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Topic ID',
    `category_id` INT NOT NULL COMMENT 'Attached category ID',
    `name` varchar(255) NOT NULL COMMENT 'Topic name',
    `order` INT NOT NULL COMMENT 'Sorting order',

    FOREIGN KEY (category_id) REFERENCES bono_module_forum_category(id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS `bono_module_forum_post`;

CREATE TABLE `bono_module_forum_post` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Post ID',
    `topic_id` INT NOT NULL COMMENT 'Attached topic ID',
    `order` INT NOT NULL COMMENT 'Sorting order',
    `title` varchar(255) NOT NULL COMMENT 'Post title',
    `content` LONGTEXT NOT NULL COMMENT 'Post content',

    FOREIGN KEY (topic_id) REFERENCES bono_module_forum_topic(id) ON DELETE CASCADE
);
