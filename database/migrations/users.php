<?php
class Users
{
    static $table = "users";
    static $db = 'local';

    public static function columns()
    {
        return [
            'id' => ['primary'],
            'priv' => ['int', 'default:0'],
            'username' => ['varchar:50', 'charset:utf8:general_ci'],
            'password' => ['varchar:50', 'charset:utf8:general_ci'],
            'email' => ['varchar:50', 'charset:utf8:general_ci', 'unique'],
            'avatar' => ['text', 'charset:utf8:general_ci', 'default:/admin_assets/media/avatars/300-15.jpg'],
            'api_token' => ['varchar:60', 'required', 'charset:utf8:general_ci']
        ];
    }
}
