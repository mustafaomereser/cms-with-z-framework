<?php
use Core\Facedas\Lang;
?>
<div class="container">
    <div class="mt-3">
        <h3><?= json_decode($content->title, true)[Lang::currentLocale()] ?></h3>
    </div>

    <div class="card">
        <div class="card-body">
            <?= json_decode($content->content, true)[Lang::currentLocale()] ?>
        </div>
    </div>

    <div class="mt-3">
        <?php prev_next_buttonsComponent($content->id, 'article') ?>
    </div>

    <div class="mt-3">
        <?php galleryComponent($contents->galleries($content->id)) ?>
    </div>
</div>