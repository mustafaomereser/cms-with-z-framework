<?php

namespace App\Models;

use Core\Abstracts\Model;

class Contents extends Model
{
    public $table = "contents";

    public function public()
    {
        return $this->where('status', '=', 1)->get(true);
    }

    public function galleries($id)
    {
        return $this->where("$this->table.id", '=', $id)->select('galleries.*')->join('RIGHT', 'galleries', ['galleries.article_id', '=', "$this->table.id"])->where('galleries.status', '=', 1)->get(true);
    }
}
