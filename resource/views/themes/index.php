<?php

use App\Helpers\Theme;
use Core\Facedas\Config;
use Core\Route;

?>
<div class="app-content flex-column-fluid">
    <div class="app-container container-fluid">
        <div class="row g-5 g-xxl-10">
            <div class="col-12 mb-2 clearfix">
                <h1 class="float-start"><?= _l('admin.pages.themes.title') ?></h1>
                <h1 class="float-end">(<?= count(Theme::list()) ?>)</h1>
            </div>
            <?php foreach (Theme::list() as $theme) : $information = Theme::information($theme) ?>
                <div class="col-lg-6 col-12 mb-3">
                    <button class="btn btn-active-light-danger text-danger" onwaiting="deleteTheme(this);" ask-modal><?= _l('admin.delete') ?></button>
                    <div class="card border bg-light theme cursor-pointer" id="<?= $theme ?>">
                        <div class="card-body text-center border">
                            <div>
                                <b style="font-size: 15pt;"><?= $information['name'] ?></b>
                            </div>
                            <?php if (isset($information['preview'])) : ?>
                                <div class="tns tns-default my-3">
                                    <div data-tns="true" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-dots="false" data-tns-prev-button="#preview-theme-<?= $theme ?>-prev" data-tns-next-button="#preview-theme-<?= $theme ?>-next">
                                        <?php foreach ($information['preview'] as $key => $preview) : ?>
                                            <div class="text-center px-5 py-5">
                                                <a href="<?= str_replace(public_path(), '', $preview) ?>" target="_blank">
                                                    <img src="<?= str_replace(public_path(), '', $preview) ?>" class="rounded w-100" />
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <button class="btn btn-icon btn-active-color-primary" id="preview-theme-<?= $theme ?>-prev">
                                        <span class="fa fa-angle-left fa-lg"></span>
                                    </button>

                                    <button class="btn btn-icon btn-active-color-primary" id="preview-theme-<?= $theme ?>-next">
                                        <span class="fa fa-angle-right fa-lg"></span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div>
                                <?= $information['description'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<script>
    function selectTheme(w) {
        $('.theme').removeClass('border-info');
        $(w).addClass('border-info');
    }

    $('.theme').on('click', function() {
        $.post('<?= Route::name('admin.themes.update', ['id' => null]) ?>' + $(this).attr('id'), {
            _method: 'PATCH',
            _token: csrf
        }, e => {
            $.showAlerts(e.alerts);
            if (e.status == 1) selectTheme('#' + $(this).attr('id'));
        });
    });

    selectTheme('#<?= Config::get('app.theme') ?>');

    function deleteTheme(is) {
        let next = $(is).next();
        $.post('<?= Route::name('admin.themes.delete', ['id' => null]) ?>' + next.attr('id'), {
            _method: 'DELETE',
            _token: csrf,
        }, e => {
            $.showAlerts(e);
            next.parent().remove();
        });
    }
</script>