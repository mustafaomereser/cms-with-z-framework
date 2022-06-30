<?php
class Galleries
{

    static $table = "galleries";
    static $db = 'local';

    public static function columns()
    {
        return [
            'id' => ['primary'],
            'article_id' => ['int', 'required'],
            'src' => ['varchar', 'required'],
            'type' => ['int', 'default:1'],
            
            'status' => ['int', 'default:1'],
        ];
    }
}
