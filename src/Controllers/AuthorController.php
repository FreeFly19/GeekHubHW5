<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 02.11.15
 * Time: 22:14
 */

namespace Controllers;

use Models\Author;


class AuthorController extends BaseController
{
    public function Index()
    {
        return json_encode(Author::find());
    }

    public function Add()
    {
        $a = new Author();
        $a->name = $this->getData()->name;
        $a->surname = $this->getData()->surname;
        $a->save();
    }

    public function Delete()
    {
        $id = $this->getData()->id;
        Author::findById($id)->remove();
    }

    public function GetBooks()
    {
        $id = $this->getData()->id;
        return json_encode(Author::findById($id)->getBooks());
    }

    public function AttachBook()
    {
        $book_id = $this->getData()->book_id;
        $author_id = $this->getData()->author_id;
        Author::findById($author_id)->attachBook($book_id);
    }

    public function DetachBook()
    {
        $book_id = $this->getData()->book_id;
        $author_id = $this->getData()->author_id;
        Author::findById($author_id)->detachBook($book_id);
    }

} 