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

            <div class="col-4">
                <div class="card">
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-dark fs-2hx"><?= number_format($guest_count, 0) ?></span>
                            <span class="text-gray-400 mt-1 fw-bold fs-6"><?=_l('admin.pages.dashboard.index.guest-this-month')?></span>
                        </h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        <?php foreach ($guests as $guest) : ?>
                            <!--begin::Item-->
                            <div class="d-flex flex-stack mb-5">
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-center me-3">
                                    <!--begin::Icon-->
                                    <img src="/admin_assets/media/svg/browsers/<?= $guest['ub_browser'] ?>.png" class="me-3 w-30px" alt="" />
                                    <!--end::Icon-->
                                    <!--begin::Section-->
                                    <div class="flex-grow-1">
                                        <span class="text-gray-800 fs-5 fw-bolder lh-0"><?= $guest['browser'] ?></span>
                                        <small>(<?= number_format($guest['count'], 0) ?>)</small>
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Statistics-->
                                <div class="d-flex align-items-center w-100 mw-125px">
                                    <!--begin::Progress-->
                                    <div class="progress h-6px w-100 me-2 bg-light-success">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $browser_percent[$guest['browser']] ?>%"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Value-->
                                    <span class="text-gray-400 fw-bold"><?= $browser_percent[$guest['browser']] ?>%</span>
                                    <!--end::Value-->
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Item-->
                        <?php endforeach; ?>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <!--end::List widget 3-->
        </div>
    </div>
</div>