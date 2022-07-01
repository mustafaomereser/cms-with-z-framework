<?php

use App\Helpers\Components;
use Core\Facedas\Lang;
use Core\Route;

@$content->content = json_decode($content->content, true);
@$content->title = json_decode($content->title, true);
@$content->slug = json_decode($content->slug, true);
?>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/custom/tinymce/skins/ui/oxide/skin.min.css">

<form class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="<?= Route::name('admin.content.' . (@$content->id ? 'update' : 'store'), ['id' => @$content->id]) ?>" enctype="multipart/form-data">
    <?= csrf() ?>
    <div class="mb-10">
        <div class="m-0 p-0 mb-10 clearfix">
            <a class="btn btn-light btn-active-light-primary float-start" href="<?= Route::name('admin.content.index') ?>"><i class="fa fa-angle-left"></i> <?= _l('admin.back-to-list') ?></a>
            <?php if (@$content->id) : ?>
                <a class="btn btn-light btn-active-light-primary float-end" href="<?= Route::name($content->slug[Lang::currentLocale()]) ?>" target="_blank"><?= _l('admin.go-to-page') ?> <i class="ms-2 fa fa-angle-right"></i></a>
            <?php endif; ?>
        </div>
        <?php if (!@$content->id) : ?>
            <h4 class="fs-1 text-gray-800 w-bolder mb-6"><?= _l('admin.pages.content.editOrcreate.create-title') ?></h4>
            <p class="fw-bold fs-4 text-gray-600 mb-2"><?= _l('admin.pages.content.editOrcreate.create-description') ?></p>
        <?php else : ?>
            <input type="hidden" name="id" value="<?= $content->id ?>" required>
            <?= inputMethod('PATCH') ?>
            <h4 class="fs-1 text-gray-800 w-bolder mb-6"><?= _l('admin.pages.content.editOrcreate.edit-title') ?></h4>
            <p class="fw-bold fs-4 text-gray-600 mb-2"><?= _l('admin.pages.content.editOrcreate.edit-description') ?></p>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="mb-5">
                <div class="mb-5 hover-scroll-x">
                    <ul class="nav nav-tabs flex-nowrap text-nowrap">
                        <?php foreach (Lang::list() as $key => $lang) : ?>
                            <li class="nav-item">
                                <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 text-uppercase<?= $lang == Lang::currentLocale() ? ' active' : null ?>" data-bs-toggle="tab" href="#title-<?= $lang ?>"><?= $lang ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="tab-content">
                    <?php foreach (Lang::list() as $key => $lang) : ?>
                        <div class="tab-pane fade<?= $lang == Lang::currentLocale() ? ' show active' : null ?>" id="title-<?= $lang ?>" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="fs-5 fw-bold mb-2"><?= _l('admin.pages.content.index.th-title') ?></label>
                                    <input type="text" class="form-control" placeholder="<?= _l('admin.pages.content.index.th-title') ?>" name="title[<?= $lang ?>]" value="<?= @$content->title[$lang] ?>">
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="fs-5 fw-bold mb-2"><?= _l('admin.pages.content.index.th-seo') ?></label>
                                    <input type="text" class="form-control" placeholder="<?= _l('admin.pages.content.index.th-seo') ?>" name="slug[<?= $lang ?>]" value="<?= @$content->slug[$lang] ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="d-flex flex-column mb-5 fv-row">
                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                    <span><?= _l('admin.pages.content.index.th-type') ?></span>
                </label>

                <select name="type" data-control="select2" data-placeholder="<?= _l('admin.pages.content.index.th-type') ?>" class="form-select" data-select="<?= @$content->type ?>">
                    <?php foreach (App\Helpers\Theme::contentTypes() as $type) : ?>
                        <option value="<?= $type ?>"><?= $type ?></option>
                    <?php endforeach; ?>
                </select>
                <!--end::Select-->
            </div>

            <div>
                <div class="mb-5 hover-scroll-x">
                    <ul class="nav nav-tabs flex-nowrap text-nowrap">
                        <?php foreach (Lang::list() as $key => $lang) : ?>
                            <li class="nav-item">
                                <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 text-uppercase<?= $lang == Lang::currentLocale() ? ' active' : null ?>" data-bs-toggle="tab" href="#content-<?= $lang ?>"><?= $lang ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="tab-content">
                    <?php foreach (Lang::list() as $key => $lang) : ?>
                        <div class="tab-pane fade<?= $lang == Lang::currentLocale() ? ' show active' : null ?>" id="content-<?= $lang ?>" role="tabpanel">
                            <div class="mb-5">
                                <div class="fv-row fv-plugins-icon-container">
                                    <label class="fs-5 fw-bold mb-2">Yazı</label>
                                    <textarea class="form-control content" name="content[<?= $lang ?>]" id="content"><?= $content->content[$lang] ?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-4 ps-10">
            <div class="mb-5 fv-row">
                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                    <span><?= _l('admin.pages.content.editOrcreate.medias') ?></span>
                </label>

                <input type="file" name="gallery[]" id="gallery" class="form-control" accept="image/*" multiple>
                <?php if (isset($galleries) && count($galleries)) : ?>
                    <div class="mt-3">
                        <?= Components::galleries($galleries) ?>
                    </div>
                <?php endif; ?>
            </div>


            <div class="d-flex flex-column mb-5 fv-row">
                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                    <span><?= _l('admin.pages.content.editOrcreate.share-status') ?></span>
                </label>

                <select name="status" data-control="select2" class="form-select" data-select="<?= @$content->status ?>">
                    <?php foreach (Lang::get('enums.status') as $key => $val) : ?>
                        <option value="<?= $key ?>"><?= $val ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-5 text-end">
                <button class="btn btn-primary btn-sm"><?= _l('admin.save') ?></button>
            </div>
        </div>
    </div>
</form>
<script src="/admin_assets/plugins/custom/tinymce/tinymce.bundle.js"></script>
<script src="/admin_assets/js/custom/documentation/editors/tinymce/basic.js" defer></script>
<script>
    $(() => {
        let options = {
            selector: ".content",
            menubar: false,
            toolbar: ["styleselect fontselect fontsizeselect",
                "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
                "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"
            ],
            plugins: "advlist autolink link image lists charmap print preview code"
        };

        if (<?= @$_SESSION['theme'] == 'dark' ? 'true' : 'false' ?>) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);
    });
</script>