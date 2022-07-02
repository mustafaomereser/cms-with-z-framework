<?php
class Guests
{

    static $table = "guests";
    static $db = 'local';

    public static function columns()
    {
        return [
            'id' => ['primary'],
            'ip' => ['required', 'varchar:50'],
            'browser' => ['required', 'varchar:20'],
            'ub_browser' => ['required', 'varchar:20'],
            'device' => ['required', 'varchar:40'],
            'created_at' => ['varchar:20']
        ];
    }
}
