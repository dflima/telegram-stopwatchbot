CREATE TABLE IF NOT EXISTS `stopwatch` (
    `chat_id` int(10) unsigned NOT NULL,
    `timestamp` int(10) unsigned NOT NULL,
    PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
