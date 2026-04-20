<!doctype html>
<html lang="e">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Academy | Registrar Usuario</title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | General Form Elements" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance." />
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant" />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('css/adminlte.css') }}" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
        onload="this.media = 'all'" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        @include('layouts.navbar')
        <!--end::Header-->

        <!--begin::Sidebar-->
        @include('layouts.sidebar')
        <!--end::Sidebar-->

        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Registrar</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Registrar Usuario</li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row g-4">

                        <!--begin::Col-->
                        <div class="col-md-12">
                            <!--begin::Form Validation-->
                            <div class="card card-info card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Usuario</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Form-->
                                <form action="{{route('users.edit')}}" method="post" class="needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <!--begin::Body-->
                                    <input type="hidden" name="id" value="{{ $users['id'] }}">
                                    <div class="card-body">
                                        <!--begin::Row-->
                                        <div class="row g-3">
                                            <!--begin::Col-->
                                            <div class="col-md-6">
                                                <label for="validationCustom01" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="validationCustom01" name="name"
                                                    value="{{ $users['name'] }}" />
                                            </div>
                                            <!--end::Col-->

                                            <!--begin::Col-->
                                            <div class="col-md-6">
                                                <label for="validationCustomUsername" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="email" class="form-control"
                                                        name="email"
                                                        id="validationCustomUsername"
                                                        value="{{ $users['email'] }}"
                                                        aria-describedby="inputGroupPrepend" />
                                                    <div class="invalid-feedback">Ingrese el correo electrónico</div>
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label">Teléfono</label>
                                                <input type="text" class="form-control" id="validationCustom03"
                                                    value="{{ $users['telephone'] }}" name="telephone" />
                                                <div class="invalid-feedback">Ingresar número telefónico.</div>
                                            </div>
                                            <!--end::Col-->
                                            <div>
                                                <label class="form-label" for="role">Roles</label>
                                                <select class="form-select" name="role_id" id="role">
                                                    <option value="1">Admin</option>
                                                    <option value="2">Operador</option>
                                                    <option value="3">Driver</option>
                                                </select>
                                            </div>
                                            <!--begin::Col-->
                                            <div class="col-md-6">
                                                <label for="validationCustom05" class="form-label">Contraseña</label>
                                                <input type="text" class="form-control" id="validationCustom05"
                                                    name="password" />
                                                <div class="invalid-feedback">Cree una contraseña.</div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Body-->
                                    <!--begin::Footer-->
                                    <div class="card-footer d-flex justify-content-end">
                                        <button class="btn btn-info" type="submit">Registrar</button>
                                    </div>
                                    <!--end::Footer-->
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </form>
                                <!--end::Form-->
                                <!--begin::JavaScript-->
                                <script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (() => {
                                        'use strict';

                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        const forms = document.querySelectorAll('.needs-validation');

                                        // Loop over them and prevent submission
                                        Array.from(forms).forEach((form) => {
                                            form.addEventListener(
                                                'submit',
                                                (event) => {
                                                    if (!form.checkValidity()) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }

                                                    form.classList.add('was-validated');
                                                },
                                                false,
                                            );
                                        });
                                    })();
                                </script>
                                <!--end::JavaScript-->
                            </div>
                            <!--end::Form Validation-->
                        </div>
                        <!--end::Col-->

                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        @include('layouts.footer')
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

            // Disable OverlayScrollbars on mobile devices to prevent touch interference
            const isMobile = window.innerWidth <= 992;

            if (
                sidebarWrapper &&
                OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
                !isMobile
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
</body>
<!--end::Body-->

</html>