<?php
include('modfuncs.php');

use App\Helpers\Theme;
use Core\Facedas\Config;
use Core\Helpers\Date;
use Core\Route;

?>
<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('/admin_assets/media/illustrations/sketchy-1/4.png')">

    <div class="card card-flush">
        <!--begin::Card body-->
        <div class="card-body">
            <div class="mb-5 clearfix">
                <div class="float-start d-flex">
                    <?php if (isset($back)) : ?>
                        <div class="me-5">
                            <a href="?path=<?= $back ?>" class="btn btn-active-light-primary"><i class="fa fa-angle-left"></i></a>
                        </div>
                    <?php endif; ?>
                    <div class="mt-4">
                        <h4><?= $_GET['path'] ?? '/' ?></h4>
                    </div>
                </div>
                <div class="float-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-modal">
                        Yeni Ekle
                    </button>
                </div>
            </div>

            <table id="kt_file_manager_list" data-kt-filemanager-table="folders" class="table align-middle table-row-dashed fs-6 gy-5">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-250px">Ad</th>
                        <th class="min-w-10px">Boyut</th>
                        <th class="min-w-125px">Son Değiştirme</th>
                        <th class="w-125px"></th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                    <?php foreach ($scans as $scan) : unset($is_dir);
                        $name = @end(explode('/', $scan));
                        $link = clearLink(str_replace(Theme::path(Config::get('app.theme')), '', $scan));
                    ?>
                        <tr>
                            <!--begin::Name=-->
                            <td data-order="account">
                                <div class="d-flex align-items-center">
                                    <?php if (is_dir($scan)) : $is_dir = true; ?>
                                        <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                                                <path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    <?php else : ?>
                                        <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="currentColor" />
                                                <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    <?php endif; ?>
                                    <a href="?path=<?= $link ?>" class="text-gray-800 text-hover-primary"><?= $name ?></a>
                                </div>
                            </td>
                            <!--end::Name=-->
                            <!--begin::Size-->
                            <td>
                                <?= human_filesize(isset($is_dir) ? calcDirDisk($scan) : filesize($scan)) ?>
                            </td>
                            <!--end::Size-->
                            <!--begin::Last modified-->
                            <td><?= Date::format(@filemtime($scan), 'd.m.Y H:i:s') ?></td>
                            <!--end::Last modified-->
                            <!--begin::Actions-->
                            <td class="text-end" data-kt-filemanager-table="action_dropdown">
                                <div class="d-flex justify-content-end">
                                    <!--begin::More-->
                                    <div class="ms-2">
                                        <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor" />
                                                    <rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor" />
                                                    <rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link text-danger btn btn-active-light-danger px-3" onwaiting="deleteLink(`<?= $link ?>`);" ask-modal>Sil</a>
                                            </div>
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                </div>
                            </td>
                            <!--end::Actions-->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>

<div class="modal fade" tabindex="-1" id="add-new-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yeni Ekle</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <form action="<?= Route::name('admin.themeEditor.store') ?>" method="POST">
                <input type="hidden" name="path" value="<?= $_GET['path'] ?? '/' ?>" required>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Adı</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Dosya adı" autofocus autocomplete="off">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kapat</button>
                    <button type="button" class="btn btn-primary">Ekle</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function deleteLink(link) {
        $.post('<?= Route::name('admin.themeEditor.delete', ['id' => 1]) ?>', {
            _method: 'DELETE',
            link: link
        }, e => location.reload());
    }
</script>