<?php

use Core\Facedas\Alerts;
use Core\Facedas\Config;
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="/admin_assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="/admin_assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/admin_assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="auth-bg app-blank">

    <!--End::Google Tag Manager (noscript) -->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <!--begin::Header-->
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <!--begin::Logo-->
                        <a href="javascript:;" class="py-9 pt-lg-20">
                            <img alt="Logo" src="/admin_assets/media/logos/default.svg" class="h-40px" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h1 class="fw-bolder text-white fs-2qx pb-5 pb-md-10"></h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <p class="fw-bold fs-2 text-white">
                            <?= _l('admin.pages.auth.welcome-again') ?>
                        </p>
                        <!--end::Description-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Illustration-->
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(/admin_assets/media/illustrations/sketchy-1/2.png)"></div>
                    <!--end::Illustration-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Aside-->
            <div class="ms-3 mt-2 position-lg-relative">
                Made with <a class="text-dark text-hover-danger" href="https://github.com/mustafaomereser/Z-Framework-php-mvc" target="_blank"><b><?= Config::get('app.title') ?></b></a>
                By <a class="text-dark text-hover-danger" href="https://github.com/mustafaomereser" target="_blank"><b>Mustafa Ömer ESER</b></a>
                <div class="position-absolute" style="bottom: 10px; left: 10px;">
                    <a class="text-dark text-hover-danger" href="https://github.com/mustafaomereser/cms-with-z-framework" target="_blank"><b>This CMS Repository</b></a>
                </div>
            </div>
            <!--body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->

    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="/admin_assets/plugins/global/plugins.bundle.js"></script>
    <script src="/admin_assets/js/scripts.bundle.js"></script>

    <?php foreach (Alerts::get() as $alert) : ?>
        <script>
            toastr['<?= $alert[0] ?>'](`<?= $alert[1] ?>`);
        </script>
    <?php endforeach; ?>
</body>
<!--end::Body-->

</html>