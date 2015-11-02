<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 02.11.15
 * Time: 22:14
 */

namespace Controllers;

use Models\Author;


class AuthorController {
    public function Index(){
        return json_encode(Author::find());
    }
} 