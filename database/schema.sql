CREATE DATABASE IF NOT EXISTS `legacy_app_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `legacy_app_db`;

CREATE TABLE IF NOT EXISTS `todo`
(
    `id`          INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `task`        TEXT NOT NULL,
    `create_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY   ( `id` )
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;