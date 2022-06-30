<?php
include('modfuncs.php');

use Core\Route;

$ext = @end(explode('.', $file));
if ($ext == 'json') $ext = 'js';

$code = htmlspecialchars(file_get_contents($file));
?>
<link href="/admin_assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
<style>
    *:focus-visible {
        outline: none;
    }
</style>

<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('/admin_assets/media/illustrations/sketchy-1/4.png')">
    <div class="card card-flush">
        <!--begin::Card body-->
        <div class="card-body">
            <div class="mb-5 clearfix">
                <div class="float-start d-flex">
                    <div class="me-5">
                        <a href="?path=<?= $back ?>" class="btn btn-active-light-primary"><i class="fa fa-angle-left"></i></a>
                    </div>
                    <div class="mt-4">
                        <h4><?= $_GET['path'] ?></h4>
                    </div>
                </div>
                <div class="float-end">
                    <button class="btn btn-primary save-button">
                        <span class="indicator-label">Kaydet</span>
                        <span class="indicator-progress">Lütfen bekleyin...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="highlight">
                <div class="highlight-code">
                    <pre class="language-<?= $ext ?>"><code id="code" class="language-<?= $ext ?>" data-lang="<?= $ext ?>" contenteditable><?= $code ?></code></pre>
                </div>
            </div>
            <div class="mt-3 text-end">
                <button class="btn btn-primary save-button">
                    <span class="indicator-label">Kaydet</span>
                    <span class="indicator-progress">Lütfen bekleyin...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>

<script src="/admin_assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="/admin_assets/js/live-prism.js"></script>
<script>
    $('.save-button').on('click', function() {
        $(this).attr('data-kt-indicator', 'on');
        $.post('<?= Route::name('admin.themeEditor.update', ['id' => 1]) ?>', {
            _method: 'PATCH',
            file: '<?= str_replace("\\", '/', $file) ?>',
            content: $('#code').text()
        }, e => {
            $.showAlerts(e);
            $(this).removeAttr('data-kt-indicator');
        });
    });

    livePrismCallback = {
        code: {
            'save': function() {
                $('.save-button')[0].click();
            }
        }
    }
</script>