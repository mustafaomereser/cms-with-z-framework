<?php

use Core\Facedas\Lang;
use Core\Route;

if (isset($menu)) $menu->name = json_decode($menu->name, true);
?>
<form class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="<?= Route::name('admin.menu.' . (@$menu->id ? 'update' : 'store'), ['id' => @$menu->id]) ?>">
    <?= csrf() ?>
    <div class="mb-10">
        <div class="m-0 p-0 mb-5 clearfix">
            <a class="btn btn-light btn-active-light-primary float-start" href="<?= Route::name('admin.menu.index') ?>"><i class="fa fa-angle-left"></i> Listeye dön</a>
        </div>
        <?php if (!@$menu->id) : ?>
            <h4 class="fs-1 text-gray-800 w-bolder mb-6">Menü Oluştur</h4>
            <p class="fw-bold fs-4 text-gray-600 mb-2">Kişilerin Sayfalara ulaşabilmesi için veya hızlı ulaşabilmesi için Menü oluşturabilirsiniz.</p>
        <?php else : ?>
            <input type="hidden" name="id" value="<?= $menu->id ?>" required>
            <?= inputMethod('PATCH') ?>
            <h4 class="fs-1 text-gray-800 w-bolder mb-6">Menü Düzenle</h4>
            <p class="fw-bold fs-4 text-gray-600 mb-2">Önceden oluşturduğunuz Menüleri burada tekrar düzenleyebilirsiniz.</p>
        <?php endif; ?>
    </div>

    <div class="mb-5">
        <div class="mb-5 hover-scroll-x">
            <ul class="nav nav-tabs flex-nowrap text-nowrap">
                <?php foreach (Lang::list() as $key => $lang) : ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 text-uppercase <?= $key != 0 ?: 'active' ?>" data-bs-toggle="tab" href="#name-<?= $lang ?>"><?= $lang ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="tab-content">
            <?php foreach (Lang::list() as $key => $lang) : ?>
                <div class="tab-pane fade<?= $key != 0 ?: ' show active' ?>" id="name-<?= $lang ?>" role="tabpanel">
                    <div class="fv-row fv-plugins-icon-container">
                        <label class="fs-5 fw-bold mb-2"><?= _l('admin.pages.menu.index.th-name') ?></label>
                        <input type="text" class="form-control" placeholder="Menü Başlığı" name="name[<?= $lang ?>]" value="<?= @$menu->name[$lang] ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="d-flex flex-column mb-5 fv-row">
        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
            <span>Baş Menü</span>
        </label>

        <select name="parent_id" data-control="select2" data-placeholder="Menü Seçiniz..." class="form-select" data-select="<?= @$menu->parent_id ?>" required>
            <option value="0">Yok.</option>
            <?php foreach ($menus as $_menu) : ?>
                <option value="<?= $_menu->id ?>"><?= json_decode($_menu->name, true)[Lang::currentLocale()] ?></option>
            <?php endforeach; ?>
        </select>
        <!--end::Select-->
    </div>

    <div class="d-flex flex-column mb-5 fv-row">
        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
            <span>Bağlı olduğu yazı</span>
        </label>

        <select name="content_id" data-control="select2" data-placeholder="Yazı Seçiniz..." class="form-select" data-select="<?= @$menu->content_id ?>" required>
            <?php foreach ($contents as $content) : ?>
                <option value="<?= $content->id ?>"><?= json_decode($content->title, true)[Lang::currentLocale()] ?></option>
            <?php endforeach; ?>
        </select>
        <!--end::Select-->
    </div>

    <div class="mb-5">
        <button class="btn btn-primary btn-sm">Kaydet</button>
    </div>
</form>