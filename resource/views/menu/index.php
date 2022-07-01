<?php

use Core\Route;
?>
<link href="/admin_assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<!--begin::Wrapper-->
<div class="d-flex flex-stack mb-5">
    <!--begin::Search-->
    <div class="d-flex align-items-center position-relative my-1">
        <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="<?= _l('admin.search') ?>" />
    </div>
    <!--end::Search-->

    <!--begin::Toolbar-->
    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
        <!--begin::Add customer-->
        <a href="<?= Route::name('admin.menu.create') ?>" class="btn btn-primary">
            <?= _l('admin.pages.menu.index.add-new') ?>
        </a>
    </div>
</div>

<table id="menu-list" class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th class="text-center" width='90'>&nbsp;</th>
            <th><?= _l('admin.pages.menu.index.th-id') ?></th>
            <th><?= _l('admin.pages.menu.index.th-name') ?></th>
            <th><?= _l('admin.pages.menu.index.th-parent') ?></th>
            <th><?= _l('admin.pages.menu.index.th-content') ?></th>
            <th class="text-center" width='90'>&nbsp;</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-bold"></tbody>
</table>

<script src="/admin_assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
    deleteMenuCallback = (id) => $.datatable.row($(`[data-menu-id="${id}"]`).parents('tr')).remove().draw();

    $(() => {
        $.datatable = $('#menu-list').DataTable({
            ajax: '<?= Route::name('admin.menu.show', ['id' => 'menus']) ?>',
        });
    })
</script>