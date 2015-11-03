<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 02.11.15
 * Time: 22:19
 */

namespace Controllers;

use Models\Genre;

class GenreController extends BaseController
{
    public function Index()
    {
        return json_encode(Genre::find());
    }

    public function Add()
    {
        $genre = new Genre();
        $genre->name = $this->getData()->name;
        $genre->save();
    }

    public function Delete()
    {
        $id = $this->getData()->id;
        Genre::findById($id)->remove();
    }

    public function GetBooks()
    {
        $id = $this->getData()->id;
        return json_encode(Genre::findById($id)->getBooks());
    }

} 