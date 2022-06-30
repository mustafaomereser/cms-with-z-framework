<?php
class Menu
{
    static $table = "menu";
    static $db = 'local';

    public static function columns()
    {
        return [
            'id' => ['primary'],
            'parent_id' => ['int', 'default:00', 'required'],
            'content_id' => ['int', 'required'],
            'name' => ['text', 'required'],
        ];
    }
}
