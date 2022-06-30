<?php

namespace App\Helpers;

use Core\Facedas\Config;

class Theme
{
    public static function path($addination = null)
    {
        return public_path("\\themes\\" . $addination);
    }

    public static function asset($asset)
    {
        return "/themes/" . Config::get('app.theme') . "/assets/$asset";
    }

    public static function information($theme)
    {
        $data = json_decode(file_get_contents(self::path($theme) . "\\theme.json"), true);
        if (is_dir(self::path($theme) . '\\preview')) $data['preview'] = array_reverse(glob(self::path($theme) . '/preview/*'));
        return $data;
    }

    public static function list($addination = null)
    {
        return array_values(array_diff(scandir(self::path($addination)), ['.', '..']));
    }

    public static function get($theme_name)
    {
        $path = self::path($theme_name);
        return ['origin_name' => $theme_name, 'path' => $path, 'informations' => self::information($theme_name)];
    }

    public static function current()
    {
        return self::get(Config::get('app.theme'));
    }

    public static function contentTypes()
    {
        $list = self::list('\\' . Config::get('app.theme') . '\content-types');
        foreach ($list as $key => $l) $list[$key] = str_replace('.php', '', $l);
        return $list;
    }

    public static function part($part, $data = [])
    {
        ob_start();
        extract($data);
        include(self::path(Config::get('app.theme')) . "/" . str_replace('.', '/', $part) . '.php');
        $part = ob_get_clean();
        return $part;
    }
}
