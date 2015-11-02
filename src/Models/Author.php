<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 02.11.15
 * Time: 22:20
 */

namespace Models;

use App\AbstractModel;

class Author extends AbstractModel {
    protected $fields = ['id', 'name', 'surname'];

    public $id;
    public $name;
    public $surname;

    public function attachBook($bookId){
        $authorId = $this->id;
        $stmt = self::$pdo->prepare("INSERT INTO `author_book`(`book_id`, `author_id`) VALUES(:bookId, :authorId)");
        $stmt->bindValue('bookId', $bookId);
        $stmt->bindValue('authorId', $authorId);
        $stmt->execute();
    }

    public function detachBook($bookId){
        $authorId = $this->id;
        $stmt = self::$pdo->prepare("DELETE FROM `author_book` WHERE `author_id` = :authorId AND `book_id` = :bookId)");
        $stmt->bindValue('bookId', $bookId);
        $stmt->bindValue('authorId', $authorId);
        $stmt->execute();
    }


    public function getBooks(){
        return $this->belongsToMany('Models\\Book', "author_book", "author_id", "book_id");
    }
} 