<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Posbindu</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/be/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/be/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-6 d-none d-md-block">
                                        <img src="{{ asset('assets/be/images/login/login.jpg') }}" alt="banner"
                                            class="rounded w-100" width="">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <h2 class="text-dark">POS BINAAN TERPADU PENYAKIT TIDAK MENULAR</h2>
                                            <p class="mt-3">Silahkan login menggunakan email dan password.</p>
                                        </div>
                                        @include('be.layouts.app_session')
                                        <form action="{{ route('auth.actLogin') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    required value="{{ old('email') }}">
                                            </div>
                                            <label for="password" class="form-label mb-3">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password"
                                                    name="password" required>
                                                <button class="btn btn-light d-flex align-items-center" type="button"
                                                    id="btn-show-hide" onclick="showHidePass()">
                                                    <iconify-icon icon="solar:eye-broken" width="1.2em" height="1.2em"
                                                        class="d-block" id="show-icon"></iconify-icon>
                                                    <iconify-icon icon="solar:eye-closed-broken" width="1.2em"
                                                        height="1.2em" class="d-none" id="hide-icon"></iconify-icon>
                                                </button>
                                            </div>

                                            <button type="submit"
                                                class="btn btn-primary fw-bolder w-100 py-8 fs-4 my-3 rounded-2">Masuk</button>
                                            <div class="text-center">
                                                <p class=" fw-bold">Belum punya akun?
                                                    <a class="text-primary fw-bold"
                                                        href="{{ route('auth.register') }}">Buat
                                                        akun disini!</a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('assets/be/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/be/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script>
        function showHidePass() {
            var $password = $("#password");
            var $hideIcon = $("#hide-icon");
            var $showIcon = $("#show-icon");

            var isPassword = $password.attr("type") === "password";

            $password.attr("type", isPassword ? "text" : "password");

            $hideIcon.toggleClass("d-none d-block", !isPassword); // !isPassword -> isPassword == false
            $showIcon.toggleClass("d-none d-block", isPassword); // isPassword -> isPassword == true
        }
    </script>
</body>

</html>
