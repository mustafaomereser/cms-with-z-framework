<?php

namespace App\Helpers;

use App\Models\Contents;
use App\Models\Menu;
use Core\Facedas\Lang;
use Core\Route;

class Components
{
    public static function menu($data = [], $parent_id = 0)
    {
        $menuClass = new Menu;
        $menus = $menuClass->select('menu.*, contents.slug as content_slug')->where('menu.parent_id', '=', $parent_id)->join('LEFT', 'contents', ['contents.id', '=', 'menu.content_id'])->get(true);
        if (!@$menus[0]->id) return;

        $data['class']['list'] = 'menu';
        $data['class']['item'] = 'menu-item';

        if ($parent_id != 0) {
            $data['class']['list'] = 'sub-menu';
            $data['class']['item'] = 'sub-menu-item';
        }
?>
        <div class="<?= @$data['class']['list'] ?>">
            <?php foreach ($menus as $menu) :
                $is_have_children = $menuClass->where('parent_id', '=', $menu->id)->count();
            ?>
                <div <?= (@$data['class']['item'] ? 'class="' . @$data['class']['item'] . '"' : null) ?>>
                    <a class="menu-item-link <?= $is_have_children ? "have-sub-menu" : null ?>" <?= !$is_have_children ? 'href="' . Route::name(json_decode($menu->content_slug, true)[Lang::currentLocale()]) . '"' : 'href="javascript:;"' ?>><?= json_decode($menu->name, true)[Lang::currentLocale()] ?></a>
                    <?php if ($is_have_children) self::menu($data, $menu->id); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php
    }

    public static function galleries($array = [])
    {
    ?>
        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
            <?php foreach ($array as $gallery) : ?>
                <div style="width: <?= ($gallery->type == 1 ? 200 : ($gallery->type == 2 ? 300 : 600)) ?>px;">
                    <?php if ($gallery->type == 1) : ?>
                        <img src="<?= $gallery->src ?>" width="100%" height="160" class="gallery-image-item rounded">
                    <?php elseif ($gallery->type == 2) : ?>
                        <iframe width="100%" height="160" class="gallery-video-item rounded" src="https://www.youtube.com/embed/<?= $gallery->src ?>?rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php
    }

    public static function prev_next_buttons($id, $type = null)
    {
        $prev = new Contents;
        $prev = $prev->where('id', '<', $id);

        $next = new Contents;
        $next = $next->where('id', '>', $id);

        if ($type) {
            $prev->where('type', '=', $type);
            $next->where('type', '=', $type);
        }

        $prev = $prev->first(true);
        $next = $next->first(true);

        @$prevSlug = json_decode($prev->slug, true)[Lang::currentLocale()];
        @$nextSlug = json_decode($next->slug, true)[Lang::currentLocale()];

        if ($prevSlug == '/') $prevSlug = null;
        if ($nextSlug == '/') $nextSlug = null;
    ?>
        <div class="content-buttons">
            <a <?= @$prev->id ? "href='/$prevSlug'" : 'disabled' ?> class="content-prev-button">
                Önceki
            </a>
            <a <?= @$next->id ? "href='/$nextSlug'" : 'disabled' ?> class="content-next-button">
                Sonraki
            </a>
        </div>
<?php
    }
}
