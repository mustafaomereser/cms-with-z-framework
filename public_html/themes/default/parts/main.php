<?php
use App\Helpers\Components;
use App\Helpers\Theme;
use Core\Facedas\Config;
use Core\Facedas\Lang;
use Core\Route;
?>
<!DOCTYPE html>
<html lang="<?= Lang::currentLocale() ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= Theme::asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?= Theme::asset('lib/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= Theme::asset('css/style.css') ?>">
    <title><?= $title ?? 'Default Theme Non Title' ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><?= Config::get('app.title') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container">
                <div class="collapse navbar-collapse" id="navbar">
                    <div class="ms-auto d-flex">
                        <?php Components::menu() ?>
                        <div class="dropdown ms-5">
                            <a class="nav-link dropdown-toggle" href="#" id="anit-akademi-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= Lang::get('lang.lang') ?>
                            </a>
                            <ul class="dropdown-menu sub-menu02" aria-labelledby="anit-akademi-dropdown">
                                <?php foreach (Lang::list() as $lang) : ?>
                                    <li>
                                        <a href="<?= Route::name('lang-change', ['lang' => $lang]) ?>"><?= $lang ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!--body-->

    <script src="<?= Theme::asset('lib/jquery/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= Theme::asset('lib/bootstrap/js/popper.min.js') ?>"></script>
    <script src="<?= Theme::asset('lib/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= Theme::asset('js/script.js') ?>"></script>
</body>

</html>