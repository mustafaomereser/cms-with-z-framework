<?php

use Core\Route;
?>
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="row g-5 g-xxl-10">
            <div class="col-12 mb-3">
                <div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-250px h-xl-100 border-0 bg-gray-200" style="background-position: 100% 100%;background-size: 500px auto;background-image:url('/admin_assets/media/misc/city.png')">
                    <div class="card-body row align-items-center ps-lg-15">
                        <div class="col-lg-2 col-4 m-0 p-0">
                            <a href="<?= Route::name('admin.content.create') ?>" class="btn btn-danger fw-bold"><?= _l('admin.pages.content.index.add-new') ?></a>
                        </div>

                        <div class="col-lg-10 col-12 ps-0">
                            <h3 class="text-gray-800 fs-2qx fw-boldest">
                                <?= _l('admin.pages.dashboard.index.content-title') ?>
                            </h3>
                            <ul>
                                <?php foreach (_l('admin.pages.dashboard.index.content') as $content) : ?>
                                    <li><?= $content ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>