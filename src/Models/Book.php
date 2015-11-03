<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 02.11.15
 * Time: 22:21
 */

namespace Models;

use App\AbstractModel;

class Book extends AbstractModel
{
    protected $fields = ['id', 'name', 'genre_id'];

    public $id;
    public $name;
    public $genre_id;

    public function attachAuthor($authorId)
    {
        $bookId = $this->id;
        $stmt = self::$pdo->prepare("INSERT INTO `author_book`(`book_id`, `author_id`) VALUES(:bookId, :authorId)");
        $stmt->bindValue('bookId', $bookId);
        $stmt->bindValue('authorId', $authorId);
        $stmt->execute();
    }

    public function detachAuthor($authorId)
    {
        $bookId = $this->id;
        $stmt = self::$pdo->prepare("DELETE FROM `author_book` WHERE `author_id` = :authorId AND `book_id` = :bookId)");
        $stmt->bindValue('bookId', $bookId);
        $stmt->bindValue('authorId', $authorId);
        $stmt->execute();
    }


    public function getGenre()
    {
        return $this->hasOne('Models\\Genre', 'genre_id');
    }

    public function getAuthors()
    {
        return $this->belongsToMany('Models\\Author', "author_book", "book_id", "author_id");
    }
} 