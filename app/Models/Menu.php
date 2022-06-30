<?php

namespace App\Models;

use Core\Abstracts\Model;

class Menu extends Model
{
    public $table = "menu";

    public function getAttributes()
    {
        return [$this->attributes, $this->attrCount];
    }
}
