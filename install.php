<?php

require 'config/autoload.php';

use \App\DBConnector;

DBConnector::setConfig($dbConfig);

$createTableAuthors = "CREATE TABLE IF NOT EXISTS `authors`(
	`id` int unsigned AUTO_INCREMENT,
    `name` varchar(255),
    `surname` varchar(255),
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$createTableBooks = "CREATE TABLE IF NOT EXISTS `books`(
	`id` int unsigned AUTO_INCREMENT,
    `name` varchar(255),
    `genre_id` int unsigned,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$createTableAuthorBook = "CREATE TABLE IF NOT EXISTS `author_book`(
    `author_id` int unsigned,
    `book_id` int unsigned,
    PRIMARY KEY(`author_id`, `book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$createTableGenres = "CREATE TABLE IF NOT EXISTS `genres`(
	`id` int unsigned AUTO_INCREMENT,
    `name` varchar(255),
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

DBConnector::getPDO()->query($createTableAuthors);
DBConnector::getPDO()->query($createTableAuthorBook);
DBConnector::getPDO()->query($createTableBooks);
DBConnector::getPDO()->query($createTableGenres);

echo "Tables has been created!!!";