<?php

use Core\Facedas\Lang;
use Core\Helpers\Http;
use Core\Route;

Route::any('/langchange/{lang}', function ($lang) {
    $lang = Lang::locale($lang);
    if (Http::isAjax()) return $lang;
    return back();
}, [
    'name' => 'lang-change'
]);


Route::any('/themechange/{theme}', function ($theme) {
    if ($theme != 'light') $_SESSION['theme'] = $theme;
    else unset($_SESSION['theme']);
    return back();
}, ['name' => 'theme-change']);
