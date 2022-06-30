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
            <a class="btn btn-light btn-active-light-primary float-start" href="<?= Route::name('admin.content.index') ?>"><i class="fa fa-angle-left"></i> Listeye dön</a>
            <?php if (@$content->id) : ?>
                <a class="btn btn-light btn-active-light-primary float-end" href="<?= Route::name($content->slug[Lang::currentLocale()]) ?>" target="_blank">Sayfaya git <i class="ms-2 fa fa-angle-right"></i></a>
            <?php endif; ?>
        </div>
        <?php if (!@$content->id) : ?>
            <h4 class="fs-1 text-gray-800 w-bolder mb-6">Yazı Ekle</h4>
            <p class="fw-bold fs-4 text-gray-600 mb-2">Sitenizin içeriğini doldurmak için burada yazılar oluşturabilirsiniz, aklında ne varsa yazmaya başlayabilirsin.</p>
        <?php else : ?>
            <input type="hidden" name="id" value="<?= $content->id ?>" required>
            <?= inputMethod('PATCH') ?>
            <h4 class="fs-1 text-gray-800 w-bolder mb-6">Yazı Düzenle</h4>
            <p class="fw-bold fs-4 text-gray-600 mb-2">Önceden yazdığınız yazıları burada tekrar düzenleyebilirsiniz.</p>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="mb-5">
                <div class="mb-5 hover-scroll-x">
                    <ul class="nav nav-tabs flex-nowrap text-nowrap">
                        <?php foreach (Lang::list() as $key => $lang) : ?>
                            <li class="nav-item">
                                <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 text-uppercase <?= $key != 0 ?: 'active' ?>" data-bs-toggle="tab" href="#title-<?= $lang ?>"><?= $lang ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="tab-content">
                    <?php foreach (Lang::list() as $key => $lang) : ?>
                        <div class="tab-pane fade<?= $key != 0 ?: ' show active' ?>" id="title-<?= $lang ?>" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="fs-5 fw-bold mb-2">Başlık</label>
                                    <input type="text" class="form-control" placeholder="Yazınızın Başlığı" name="title[<?= $lang ?>]" value="<?= @$content->title[$lang] ?>">
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="fs-5 fw-bold mb-2">Yazının URL'i</label>
                                    <input type="text" class="form-control" placeholder="Yazınızın URL yolu" name="slug[<?= $lang ?>]" value="<?= @$content->slug[$lang] ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="d-flex flex-column mb-5 fv-row">
                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                    <span>Sayfa tipi</span>
                </label>

                <select name="type" data-control="select2" data-placeholder="Tip Seçiniz..." class="form-select" data-select="<?= @$content->type ?>">
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
                                <a class="nav-link btn btn-active-light btn-color-gray-600 btn-active-color-primary rounded-bottom-0 text-uppercase <?= $key != 0 ?: 'active' ?>" data-bs-toggle="tab" href="#content-<?= $lang ?>"><?= $lang ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="tab-content">
                    <?php foreach (Lang::list() as $key => $lang) : ?>
                        <div class="tab-pane fade<?= $key != 0 ?: ' show active' ?>" id="content-<?= $lang ?>" role="tabpanel">
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
                    <span>Galeri Medyaları</span>
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
                    <span>Paylaşma Durumu</span>
                </label>

                <select name="status" data-control="select2" class="form-select" data-select="<?= @$content->status ?>">
                    <?php foreach (Lang::get('enums.status') as $key => $val) : ?>
                        <option value="<?= $key ?>"><?= $val ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-5 text-end">
                <button class="btn btn-primary btn-sm">Kaydet</button>
            </div>
        </div>
    </div>
</form>
<script src="/admin_assets/plugins/custom/tinymce/tinymce.bundle.js"></script>
<script src="/admin_assets/js/custom/documentation/editors/tinymce/basic.js" defer></script>
<script>
    $(() => {
        tinymce.init({
            selector: ".content",
            menubar: false,
            toolbar: ["styleselect fontselect fontsizeselect",
                "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
                "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"
            ],
            plugins: "advlist autolink link image lists charmap print preview code"
        });
    });
</script>