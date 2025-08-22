<!DOCTYPE html>
<html class="no-js" lang="id">
    
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Login - Kadin Indonesia</title>
    {{-- Meta tag CSRF Token dari Laravel (dinamis) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- URL aset menggunakan fungsi asset() Laravel --}}
    <link rel="icon" href="{{ asset('assets/uploads/Setting/1451727254638.png') }}" type="image/png" sizes="16x16">
    <link rel="shortcut icon" href="{{ asset('assets/uploads/Setting/1451727254638.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/uploads/Setting/1451727254638.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css?v=1') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.responsive.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css?ver=0') }}" />

    <style>
    :root {
        --primary-color: #cdef84;
        --black-color: #121421;
        --text-black: #1b1c17;
        --para-color: #707070;
        --hover-color: #afd449;
        --black: #000000;
        --colorOne: #707070;
        --bColor: #707070;
        --sidebar-text-color: #e7e3e3;
        --sidebar-bg-color: #1b1c17;
        --sidebar-hover-text-color: #cdef84;
        --colorTwo: #ebedf0;
        --colorThree: #fafafa;
        --colorFour: #71e3ba;
        --colorFive: #ed84ef;
        --colorSix: #84a2ef;
        --colorSeven: #f4f4ef;
        --colorEight: #ea4335;
        --colorEight-10: rgb(234 67 53 / 10%);
        --colorNine: #f9f9f9;
        --colorTen: #fdedeb;
        --colorEleven: #eaeaea;
        --colorTwelve: #0fa958;
        --colorTwelve-10: rgb(15 169 88 / 10%);
        --color13: #f5b40a;
        --color13-10: rgb(245 180 10 / 10%);
        --color14: #ebe7d5;
        --color15: #e6ef84;
        --color16: #84dcef;
        --color17: #eef0f2;
        --color18: #b7bdc6;
        --color19: #596680;
        --color20: #f0f0f0;
        --color21: #ed0006;
        --color22: #8d84ef;
        --color23: #d3d9e5;
        --color24: #cdffc5;
        --stroke-color: #e4e6eb;
        --scroll-track: #efefef;
        --scroll-thumb: #dadada;
        --text-black-50: rgb(27 28 23 / 50%);
        --green: #4cbf4c;
        --red: #f02e17;
        --bg-one: #ededed;
        --border-color: #ededed;
        --border-color-one: #e5e8ec;
        --border-color-deep: #b0b0b0;
        --body-bg: #fbf9f1;
        --white: #ffffff;
        --white-10: rgb(255 255 255 / 10%);
        --white-32: rgb(255 255 255 / 32%);
        --white-70: rgb(255 255 255 / 70%);
        --black-5: rgb(0 0 0 / 5%);
        --black-10: rgb(0 0 0 / 10%);
    }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/summernote/summernote-lite.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?ver=1.0.2') }}">
    <script src="{{ asset('assets/js/modernizr-3.11.2.min.js') }}"></script>
        <style>
        .register-left {
            height: calc(100vh - 4rem);
        }
        #btnStageKTA {
            --bs-btn-color: #000;
        }
        #btnStageKTA:hover {
            --bs-btn-color: #fff;
            --bs-btn-bg: var(--hover-color);
        }
    </style>
    <style>
    </style>
    {{-- reCAPTCHA script Dihapus --}}
</head>
<body class="direction-ltr">
    <input type="hidden" id="lang_code" value="id">
    <div class="register-area">
        <div class="register-wrap">
            <div class="register-left section-bg-img" style="background-image: url({{ asset('assets/uploads/Setting/5921729738403.jpg') }})">
                <div class="register-left-wrap">
                </div>
            </div>
            <div class="register-right">
                <div class="primary-form">
                    <a class="d-inline-block mb-5 max-w-408" href="{{ url('/') }}"><img src="{{ asset('assets/uploads/Setting/411729670913.png') }}" alt="Kadin Indonesia" /></a>
                    <div class="pb-40">
                        <h2 class="fs-24 fw-600 lh-38 text-1b1c17 pb-3">Portal Keanggotaan Kadin</h2>
                                                <h4 class="fs-16 fw-400 lh-25">
                                Tidak memiliki akun?
                                <a href="{{ route('register') }}" class="text-decoration-underline fw-500 text-black hover-color-one">Daftar Anggota</a>
                                atau
                                <a href="{{ url('/re-register') }}" class="text-decoration-underline fw-500 text-black hover-color-one">Perpanjang KTA</a>
                                atau
                                <a href="{{ url('/re-register') }}" class="text-decoration-underline fw-500 text-black hover-color-one">Registrasi Ulang</a>
                            </h4>
                                            </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf {{-- Ini adalah CSRF Token Otomatis dari Laravel --}}
                        {{-- Laravel akan secara otomatis menambahkan input hidden dengan name="_token" --}}

                        {{-- Menampilkan pesan error validasi dari Laravel --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-wrap-main pb-14">
                            <div class="primary-form-group">
                                <div class="primary-form-group-wrap">
                                    <label for="email" class="form-label">Email</label>
                                    {{-- Menggunakan old('email') untuk mempertahankan input setelah validasi gagal --}}
                                    <input type="email" name="email" id="email" class="primary-form-control" value="{{ old('email') }}" placeholder="Masukkan Email" required>
                                </div>
                            </div>
                            <div class="primary-form-group">
                                <div class="primary-form-group-wrap">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="primary-form-control" placeholder="********" required>
                                    <button type="button" class="btn togglePassword">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-check mb-2">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input" >
                                <label class="form-check-label fs-14" for="remember">Remember Me</label>
                            </div>
                            {{-- URL link menggunakan route() Laravel --}}
                            <a href="{{ route('password.request') }}" class="d-inline-block fs-12 fw-400 lh-22 text-707070 mb-25 hover-color-one">Lupa Kata Sandi?</a>
                        </div>
                                               
                                                <button type="submit" class="btn btn-primary w-100 fs-15 lh-25 p-13 bd-ra-12">Masuk</button>
                    </form>
                    <div class="text-center mt-4">
                        <a href="#" id="btnStageKTA" class="btn btn-outline-primary w-100 fs-15 fw-700 lh-25 p-13 bd-ra-12" data-bs-toggle="modal" data-bs-target="#stageKTA">Tahapan Pembuatan KTA</a>
                    </div>
                    <div class="text-center mt-4">
                                                <div class="fs-14 fw-400 lh-22 text-black">Hotline Kadin Indonesia: <a href="https://wa.me/6285695410875" class="text-black hover-color-one">0856-9541-0875</a></div>
                        {{-- Menggunakan mailto: untuk email --}}
                        <div class="fs-14 fw-400 lh-22 text-black">Email: anggota@kadinindonesian.id <a href="mailto:anggota@kadinindonesian.id" class="text-black hover-color-one"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="stageKTA" tabindex="-1" aria-labelledby="stageKTALabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                                <div class="modal-body">
                                        <img src="{{ asset('assets/img/alur-kta-2.jpg') }}" alt="">
                </div>
                            </div>
        </div>
    </div>
<script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js?ver=2') }}"></script>

<script src="{{ asset('assets/js/dataTables.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>

{{-- Pastikan ini di folder JS, bukan CSS --}}
<script src="{{ asset('assets/js/summernote/summernote-lite.min.js') }}"></script>
<script src="{{ asset('assets/js/lc_select.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js?ver=0') }}"></script>
<script src="{{ asset('assets/js/common.js?ver=0') }}"></script>

    <script>
        $('.togglePassword').on('click', function() {
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
            let password = $(this).siblings('input');

            if (password.attr('type') == 'password') {
                password.attr('type', 'text');
            } else {
                password.attr('type', 'password');
            }
        });
    </script>

<style>

</style>

<script>
    var currencySymbol = "Rp";
    var currencyPlacement = "before";
</script>
</body>
</html>