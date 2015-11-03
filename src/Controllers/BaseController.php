<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 03.11.15
 * Time: 0:19
 */

namespace Controllers;


class BaseController
{
    protected function getData()
    {
        $postdata = file_get_contents("php://input");
        return json_decode($postdata);
    }
} 