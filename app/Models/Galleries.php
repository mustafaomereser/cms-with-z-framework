<?php

namespace App\Models;

use Core\Abstracts\Model;

class Galleries extends Model
{
    public $table = "galleries";

    public function getAttributes()
    {
        return [$this->attributes, $this->attrCount];
    }
}
