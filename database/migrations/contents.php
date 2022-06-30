<?php
class Contents
{

    static $table = "contents";
    static $db = 'local';

    public static function columns()
    {
        return [
            'id' => ['primary'],
            'author_id' => ['id', 'default:00'],

            'slug' => ['text', 'required', 'charset:utf8mb4:general_ci'],
            'title' => ['text', 'required', 'charset:utf8mb4:general_ci'],
            'content' => ['text', 'charset:utf8mb4:general_ci'],

            'type' => ['varchar:50', 'required'],

            'status' => ['int', 'default:1', 'required'],
            'created_at' => ['int', 'required'],
            'updated_at' => ['int', 'required'],
        ];
    }
}
