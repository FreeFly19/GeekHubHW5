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
    public function Index(){
        return json_encode(Author::find());
    }

    public function Add(){
        $postdata = file_get_contents("php://input");
        $requestData = json_decode($postdata);

        $a = new Author();
        $a->name = $requestData->name;
        $a->surname = $requestData->surname;
        $a->save();
    }



} 