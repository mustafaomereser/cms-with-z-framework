<?php

use App\Helpers\Theme;
use App\Models\Contents;
use Core\Facedas\Lang;
use Core\Route;

$contents = new Contents;
$contentsList = $contents->public();

foreach ($contentsList as $content) {
    if (!in_array($content->type, Theme::contentTypes())) continue;

    $content->slug = json_decode($content->slug, true)[Lang::currentLocale()];
    Route::get("/$content->slug", function () use ($content, $contents) {
        return str_replace(
            "<!--body-->",                                                                                      // Main's parse page code
            Theme::part("content-types.$content->type", compact('content', 'contents')),                       // Page
            Theme::part('parts.main', ['title' => json_decode($content->title, true)[Lang::currentLocale()]]) // every Page's Main 
        );
    }, ['name' => $content->slug]);
}
