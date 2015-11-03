<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 02.11.15
 * Time: 22:21
 */

namespace Models;

use App\AbstractModel;

class Genre extends AbstractModel
{
    protected $fields = ['id', 'name'];

    public function getBooks()
    {
        return $this->belongsTo("Models\\Book", "genre_id");
    }
} 