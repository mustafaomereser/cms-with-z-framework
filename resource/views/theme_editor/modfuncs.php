<?php
function clearLink($link)
{
    if (strstr($link, '//')) return clearLink(str_replace('//', '/', $link));
    return $link;
}

if (isset($_GET['path'])) {
    $_GET['path'] = clearLink($_GET['path']);
    if ($_GET['path'] == '/') unset($_GET['path']);
    if (isset($_GET['path'])) {
        $back = '';
        $back_array = explode('/', $_GET['path']);
        foreach ($back_array as $key => $val) {
            if ($key == (count($back_array) - 1)) continue;
            $back .= "/$val";
        }
    }
}

function calcDirDisk($dir)
{
    $dir = str_replace("/", "\\", clearLink($dir));

    $_dir = array_values(array_diff(scandir($dir), ['.', '..']));

    $dirs = [];
    $size = 0;
    foreach ($_dir as $file) {
        $file = "$dir/$file";
        if (!is_dir($file)) $size += filesize($file);
        else $dirs[] = $file;
    }

    if (count($dirs)) foreach ($dirs as $__dir) $size += calcDirDisk($__dir);

    return $size;
}
