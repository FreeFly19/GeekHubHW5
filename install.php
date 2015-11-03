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

echo "Tables has been created!!!<br>\n";

$addAuthors = "INSERT INTO `authors`(`name`, `surname`)
                                     VALUES('Steven', 'McConnell'),
                                           ('Martin',  'Fowler'),
                                           ('Bjarne', 'Stroustrup'),
                                           ('Eric', 'Freeman'),
                                           ('Elizabeth', 'Freeman'),
                                           ('Elena', 'Voronkova')";

$addBooks = "INSERT INTO `books`(`name`, `genre_id`)
                                     VALUES('Complete Code', 1),
                                           ('Refactoring', 1),
                                           ('Patterns of enterprise application architecture', 1),
                                           ('Head First Design Patterns', 1),
                                           ('Head First HTML and CSS', 2),
                                           ('How to Marry a Prince', 3)";

$addReferenceBookAuthor = "INSERT INTO `author_book`(`author_id`, `book_id`)
                                     VALUES(1, 1),
                                           (2, 2),
                                           (2, 3),
                                           (4, 4),
                                           (5, 4),
                                           (4, 5),
                                           (5, 5),
                                           (6, 6)";

$addGenre = "INSERT INTO `genres`(`name`)
                                     VALUES('OOP & patterns books'),
                                           ('HTML & CSS'),
                                           ('For female')";

DBConnector::getPDO()->query($addAuthors);
DBConnector::getPDO()->query($addBooks);
DBConnector::getPDO()->query($addReferenceBookAuthor);
DBConnector::getPDO()->query($addGenre);

echo "Records added to dababase!!!";