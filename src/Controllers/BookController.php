<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 02.11.15
 * Time: 22:14
 */

namespace Controllers;

use Models\Book;

class BookController extends BaseController
{
    public function Index()
    {
        return json_encode(Book::find());
    }

    public function Add()
    {
        $book = new Book();
        $book->name = $this->getData()->name;
        $book->genre_id = $this->getData()->genre_id;
        $book->save();
    }

    public function Delete()
    {
        $id = $this->getData()->id;
        Book::findById($id)->remove();

    }

    public function AttachAuthor()
    {
        $book_id = $this->getData()->book_id;
        $author_id = $this->getData()->author_id;
        Book::findById($book_id)->attachAuthor($author_id);
    }

    public function DetachAuthor()
    {
        $book_id = $this->getData()->book_id;
        $author_id = $this->getData()->author_id;
        Book::findById($book_id)->detachAuthor($author_id);
    }

    public function GetAuthors()
    {
        $id = $this->getData()->id;
        return json_encode(Book::findById($id)->getAuthors());
    }

    public function GetGenre()
    {
        $id = $this->getData()->id;
        return json_encode(Book::findById($id)->getGenre());
    }

} 