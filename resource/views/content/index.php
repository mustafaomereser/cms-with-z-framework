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
        <a href="<?= Route::name('admin.content.create') ?>" class="btn btn-primary">
            <?= _l('admin.pages.content.index.add-new') ?>
        </a>
    </div>
</div>

<table id="content-list" class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th class="text-center" width='90'>&nbsp;</th>
            <th><?= _l('admin.pages.content.index.th-title') ?></th>
            <th><?= _l('admin.pages.content.index.th-seo') ?></th>
            <th><?= _l('admin.pages.content.index.th-type') ?></th>
            <th><?= _l('admin.pages.content.index.th-status') ?></th>
            <th><?= _l('admin.pages.content.index.th-last-up-date') ?></th>
            <th><?= _l('admin.pages.content.index.th-create-date') ?></th>
            <th class="text-center" width='90'>&nbsp;</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-bold"></tbody>
</table>

<script src="/admin_assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
    deleteContentCallback = (id) => $.datatable.row($(`[data-content-id="${id}"]`).parents('tr')).remove().draw();

    $(() => {
        $.datatable = $('#content-list').DataTable({
            ajax: '<?= Route::name('admin.content.show', ['id' => 'contents']) ?>',
            fnDrawCallback: function() {
                updateTooltip();
            }
        });
    })
</script>