<?php

use Core\Facedas\Auth;
use Core\Route;

$lang = _l('admin.pages.user.settings');
?>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Aside-->
            <div class="flex-column flex-md-row-auto w-100 w-lg-250px w-xxl-275px">
                <!--begin::Nav-->
                <div class="card mb-6 mb-xl-9" data-kt-sticky="true" data-kt-sticky-name="account-settings" data-kt-sticky-offset="{default: false, lg: 300}" data-kt-sticky-width="{lg: '250px', xxl: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-zindex="95" style="animation-duration: 0.3s;">
                    <!--begin::Card body-->
                    <div class="card-body py-10 px-6">
                        <!--begin::Menu-->
                        <ul id="kt_account_settings" class="nav nav-flush menu menu-column menu-rounded menu-title-gray-600 menu-bullet-gray-300 menu-state-bg menu-state-bullet-primary fw-bold fs-6 mb-2">
                            <li class="menu-item px-3 pt-0 pb-1">
                                <a href="#kt_account_settings_overview" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-vertical"></span>
                                    </span>
                                    <span class="menu-title"><?= $lang['overview'] ?></span>
                                </a>
                            </li>
                            <li class="menu-item px-3 pt-0 pb-1">
                                <a href="#kt_account_settings_signin_method" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-vertical"></span>
                                    </span>
                                    <span class="menu-title"><?= $lang['sign-in-method'] ?></span>
                                </a>
                            </li>
                            <li class="menu-item px-3 pt-0 pb-1">
                                <a href="#kt_account_settings_profile_details" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                                    <span class="menu-bullet"><span class="bullet bullet-vertical"></span></span>
                                    <span class="menu-title"><?= $lang['profile-details'] ?></span>
                                </a>
                            </li>
                            <li class="menu-item px-3 pt-0">
                                <a href="#kt_account_settings_deactivate" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-vertical"></span>
                                    </span>
                                    <span class="menu-title"><?= $lang['deactivate-account'] ?></span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Nav-->
            </div>
            <!--end::Aside-->
            <!--begin::Layout-->
            <div class="flex-md-row-fluid ms-lg-12">
                <!--begin::Overview-->
                <div class="card mb-5 mb-xl-10" id="kt_account_settings_overview" data-kt-scroll-offset="{default: 100, md: 125}">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_overview">
                        <div class="card-title">
                            <h3 class="fw-bolder m-0"><?= $lang['overview'] ?></h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_overview" class="collapse show">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="d-flex align-items-start flex-wrap">
                                <div class="d-flex flex-wrap">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-125px mb-7 me-7 position-relative">
                                        <img src="<?= Auth::user()['avatar'] ?>" alt="image">
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Profile-->
                                    <div class="d-flex flex-column">
                                        <div class="fs-2 fw-bolder mb-1"><?= Auth::user()['name'] . " " . Auth::user()['surname'] ?></div>
                                        <div class="fs-5 text-info fw-bolder mb-1">@<?= Auth::user()['username'] ?></div>
                                        <span class="text-gray-400 fs-6 fw-bold mb-5" user-email><?= Auth::user()['email'] ?></span>
                                    </div>
                                    <!--end::Profile-->
                                </div>
                            </div>
                            <!--begin::Row-->
                            <!--begin::Notice-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Overview-->
                <!--begin::Sign-in Method-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0"><?= $lang['sign-in-method'] ?></h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_signin_method" class="collapse show" tabindex="-1" style="outline: none;">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Email Address-->
                            <div class="d-flex flex-wrap align-items-center">
                                <!--begin::Label-->
                                <div id="kt_signin_email">
                                    <div class="fs-6 fw-bolder mb-1"><?= _l('admin.email_address') ?></div>
                                    <div class="fw-bold text-gray-600" user-email><?= Auth::user()['email'] ?></div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Edit-->
                                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->
                                    <form id="change-email-form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate>
                                        <?= csrf() ?>
                                        <div class="row mb-6">
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                                    <label for="email" class="form-label fs-6 fw-bolder mb-3">Enter New Email Address</label>
                                                    <input type="email" class="form-control form-control-lg form-control-solid" id="email" placeholder="Email Address" name="email" value="<?= Auth::user()['email'] ?>">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                                    <label for="current-password1" class="form-label fs-6 fw-bolder mb-3">Current Password</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="current-password1">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button class="btn btn-primary me-2 px-6"><?= _l('admin.save') ?></button>
                                            <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6"><?= _l('admin.close') ?></button>
                                        </div>
                                        <div></div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Edit-->
                                <!--begin::Action-->
                                <div id="kt_signin_email_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary"><?= _l('admin.update') ?></button>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Email Address-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-6"></div>
                            <!--end::Separator-->
                            <!--begin::Password-->
                            <div class="d-flex flex-wrap align-items-center mb-10">
                                <!--begin::Label-->
                                <div id="kt_signin_password">
                                    <div class="fs-6 fw-bolder mb-1"><?= _l('admin.password') ?></div>
                                    <div class="fw-bold text-gray-600">************</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Edit-->
                                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->
                                    <form id="change-password-form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate>
                                        <?= csrf() ?>
                                        <div class="row mb-1">
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                                    <label for="current-password2" class="form-label fs-6 fw-bolder mb-3">Current Password</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="current-password2">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                                    <label for="password" class="form-label fs-6 fw-bolder mb-3">New Password</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid" name="password" id="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                                    <label for="confirm-password" class="form-label fs-6 fw-bolder mb-3">Confirm New Password</label>
                                                    <input type="password" class="form-control form-control-lg form-control-solid" name="confirm-password" id="confirm-password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button class="btn btn-primary me-2 px-6"><?= _l('admin.reset') ?></button>
                                            <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6"><?= _l('admin.close') ?></button>
                                        </div>
                                        <div></div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Edit-->
                                <!--begin::Action-->
                                <div id="kt_signin_password_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary"><?= _l('admin.reset') ?></button>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Password-->
                            <!--begin::Notice-->
                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                    <!--begin::Content-->
                                    <div class="mb-3 mb-md-0 fw-bold">
                                        <h4 class="text-gray-900 fw-bolder">Secure Your Account</h4>
                                        <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Action-->
                                    <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Enable</a>
                                    <!--end::Action-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Notice-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Sign-in Method-->
                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0"><?= $lang['profile-details'] ?></h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form id="profile-details-form" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data" novalidate>
                            <?= csrf() ?>
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('/admin_assets/media/svg/avatars/blank.svg')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?= Auth::user()['avatar'] ?>');"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="avatar" accept="<?= $fileTypes = '.gif, .png, .jpg, .jpeg' ?>">
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text"><?= _l('admin.allowed-file-types', ['types' => $fileTypes]) ?></div>
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6"><?= _l('admin.fullname') ?></label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="<?= Auth::user()['name'] ?>">
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                <input type="text" name="surname" class="form-control form-control-lg form-control-solid" value="<?= Auth::user()['surname'] ?>">
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit"><?= _l('admin.save') ?></button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Basic info-->

                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0"><?= $lang['deactivate-account'] ?></h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_deactivate" class="collapse show" tabindex="-1" style="outline: none;">
                        <!--begin::Form-->
                        <form id="deactive-account-form" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                            <?= csrf() ?>
                            <?= inputMethod('DELETE') ?>
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Notice-->
                                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                    <!--begin::Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor"></rect>
                                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-bold">
                                            <h4 class="text-gray-900 fw-bolder"><?= $lang['deactive']['warning']['title'] ?></h4>
                                            <div class="fs-6 text-gray-700">
                                                <?= $lang['deactive']['warning']['content'] ?>
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                                <!--begin::Form input row-->
                                <div class="form-check form-check-solid fv-row fv-plugins-icon-container">
                                    <input name="confirm" class="form-check-input" type="checkbox" value="1" id="confirm">
                                    <label class="form-check-label fw-bold ps-2 fs-6" for="confirm"><?= $lang['deactive']['i-confirm'] ?></label>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Form input row-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Card footer-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-danger fw-bold"><?= $lang['deactive']['button'] ?></button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Deactivate Account-->
            </div>
            <!--end::Layout-->
        </div>
    </div>
    <!--end::Content container-->
</div>

<script src="/admin_assets/js/custom/account/settings/signin-methods.js" defer></script>

<script>
    $(() => {
        $('#change-password-form').on('submit', function(_) {
            _.preventDefault();
            $.post('<?= Route::name('admin.user.store') ?>', $.core.SToA(this), e => $.showAlerts(e));
        });

        $('#change-email-form').on('submit', function(_) {
            _.preventDefault();
            let data = $.core.SToA(this);
            $.post('<?= Route::name('admin.user.store') ?>', data, e => {
                $.showAlerts(e);
                let status = e.pop();
                if (status == 1) $('[user-email]').html(data['email']);
            });
        });

        $('#deactive-account-form').on('submit', function(_) {
            _.preventDefault();
            $.post('<?= Route::name('admin.user.delete', ['id' => true]) ?>', $.core.SToA(this), e => {
                $.showAlerts(e);
                let status = e.pop();
                if (status == 1) setTimeout(() => location.reload(), 400);
            });
        });
    });
</script>