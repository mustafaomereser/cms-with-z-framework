<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid py-10">
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="w-lg-500px p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form class="form w-100" method="POST">
                <?= csrf() ?>
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">Giriş Yap</h1>
                    <!--end::Title-->
                </div>
                <!--begin::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="form-label fs-6 fw-bolder text-dark">E-mail</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" placeholder="E-mail adresiniz" autofocus required />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-2">
                        <!--begin::Label-->
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Şifre</label>
                        <!--end::Label-->
                        <!--begin::Link-->
                        <a href="password-reset.html" class="link-primary fs-6 fw-bolder">Şifreni mi unuttun?</a>
                        <!--end::Link-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Input-->
                    <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" placeholder="Hesap Şifreniz" required />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <!--begin::Submit button-->
                    <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                        Devam et <i class="fa fa-angle-right float-end" style="padding-top: 12px;"></i>
                    </button>
                    <!--end::Submit button-->
                    <!--begin::Separator-->
                    <div class="text-center text-muted text-uppercase fw-bolder mb-5">Veya</div>
                    <!--end::Separator-->
                    <!--begin::Google link-->
                    <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5 disabled" disabled>
                        <img alt="Logo" src="/admin_assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" /> Google ile giriş yap
                    </a>
                    <!--end::Google link-->
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
</div>
<!--end::Body-->