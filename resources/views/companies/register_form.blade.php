<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Form Anggota Biasa - Kadin Indonesia</title>

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
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/summernote/summernote-lite.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?ver=1.0.2') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script src="{{ asset('assets/js/modernizr-3.11.2.min.js') }}"></script>

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
        
        /* Style untuk menampilkan/menyembunyikan section */
        .section-pic,
        .section-form-ab,
        .section-form-um,
        .section-form-alb,
        .section-form-albt,
        .section-form-footer,
        .file_kta_alb {
            display: none; /* Default hidden */
        }
    </style>
</head>
<body class="direction-ltr">
    <input type="hidden" id="lang_code" value="id">
    <div class="overflow-x-hidden">
        <div class="zMain-wrap">
            <div class="zSidebar">
                <div class="zSidebar-overlay"></div>
                <a href="{{ url('/') }}" class="d-block mx-26 mb-27 max-w-220 pt-23">
                    <img class="max-h-35" src="{{ asset('assets/uploads/Setting/6281729670913.png') }}" alt="Kadin Indonesia" />
                </a>
                <div class="zSidebar-fixed">
                    <ul class="zSidebar-menu" id="sidebarMenu">
                        <li  class="active"> {{-- Menandai menu Profil sebagai aktif --}}
                            <a href="{{ url('/companies') }}" class="d-flex align-items-center cg-10 active">
                                <div class="d-flex">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.4906 9.39822C20.4906 14.0906 16.6867 17.8945 11.9943 17.8945C7.30197 17.8945 3.49805 14.0906 3.49805 9.39822C3.49805 4.70585 7.30197 0.901924 11.9943 0.901924C16.6867 0.901924 20.4906 4.70585 20.4906 9.39822Z" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4.63477 13.5656L0.856444 20.1099L4.93902 19.016L6.03294 23.0985L9.3112 17.4204" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M19.3652 13.5656L23.1436 20.1099L19.061 19.016L17.9671 23.0985L14.6888 17.4204" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.9679 14.0017C16.6749 13.1815 16.0292 12.4568 15.1311 11.9399C14.2329 11.423 13.1324 11.1429 12.0003 11.1429C10.8682 11.1429 9.76768 11.423 8.86951 11.9399C7.97134 12.4568 7.32568 13.1815 7.03266 14.0017" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" />
                                        <circle cx="11.9972" cy="6" r="2.57143" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <span>Form Anggota Biasa</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/members') }}" class="d-flex align-items-center cg-10 ">
                                <div class="d-flex">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.4906 9.39822C20.4906 14.0906 16.6867 17.8945 11.9943 17.8945C7.30197 17.8945 3.49805 14.0906 3.49805 9.39822C3.49805 4.70585 7.30197 0.901924 11.9943 0.901924C16.6867 0.901924 20.4906 4.70585 20.4906 9.39822Z" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4.63477 13.5656L0.856444 20.1099L4.93902 19.016L6.03294 23.0985L9.3112 17.4204" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M19.3652 13.5656L23.1436 20.1099L19.061 19.016L17.9671 23.0985L14.6888 17.4204" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.9679 14.0017C16.6749 13.1815 16.0292 12.4568 15.1311 11.9399C14.2329 11.423 13.1324 11.1429 12.0003 11.1429C10.8682 11.1429 9.76768 11.423 8.86951 11.9399C7.97134 12.4568 7.32568 13.1815 7.03266 14.0017" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" />
                                        <circle cx="11.9972" cy="6" r="2.57143" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <span>Anggota</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/transactions') }}" class="d-flex align-items-center cg-10">
                                <div class="d-flex">
                                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3.31836" y="6.94522" width="18" height="12" rx="2" stroke="white" stroke-opacity="0.7" stroke-width="1.5"></rect>
                                        <path d="M5.31836 9.94522H8.31836" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M16.3184 15.9452H19.3184" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round"></path>
                                        <circle cx="12.3184" cy="12.9452" r="2" stroke="white" stroke-opacity="0.7" stroke-width="1.5"></circle>
                                    </svg>
                                </div>
                                <span class="">Daftar Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/profile') }}" class="d-flex align-items-center cg-10">
                                <div class="d-flex">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.7274 21.3923C19.2716 20.1165 18.2672 18.9892 16.8701 18.1851C15.4729 17.381 13.7611 16.9452 12 16.9452C10.2389 16.9452 8.52706 17.381 7.12991 18.1851C5.73276 18.9892 4.72839 20.1165 4.27259 21.3923" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" />
                                        <circle cx="12" cy="8.94522" r="4" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <span class="">Profil</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/settings') }}" class="d-flex align-items-center cg-10">
                                <div class="d-flex">
                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.8074 6.62355L18.185 5.54346C17.6584 4.62954 16.4914 4.31426 15.5763 4.83866V4.83866C15.1406 5.09528 14.6208 5.16809 14.1314 5.04103C13.6421 4.91396 13.2233 4.59746 12.9676 4.16131C12.803 3.88409 12.7146 3.56833 12.7113 3.24598V3.24598C12.7261 2.72916 12.5311 2.22834 12.1708 1.85761C11.8104 1.48688 11.3153 1.2778 10.7982 1.27802H9.54423C9.0377 1.27801 8.55205 1.47985 8.19473 1.83888C7.83742 2.19791 7.63791 2.68453 7.64034 3.19106V3.19106C7.62533 4.23686 6.77321 5.07675 5.72730 5.07664C5.40494 5.07329 5.08919 4.98488 4.81197 4.82035V4.82035C3.89679 4.29595 2.72985 4.61123 2.20327 5.52516L1.53508 6.62355C1.00914 7.53633 1.32013 8.70255 2.23073 9.23225V9.23225C2.82263 9.57398 3.18726 10.2055 3.18726 10.889C3.18726 11.5725 2.82263 12.204 2.23073 12.5457V12.5457C1.32129 13.0719 1.00996 14.2353 1.53508 15.1453V15.1453L2.16666 16.2345C2.41338 16.6797 2.82734 17.0082 3.31693 17.1474C3.80652 17.2865 4.33137 17.2248 4.77535 16.976V16.976C5.21181 16.7213 5.73192 16.6515 6.22007 16.7821C6.70822 16.9128 7.12397 17.233 7.37490 17.6716C7.53943 17.9488 7.62784 18.2646 7.63119 18.5869V18.5869C7.63119 19.6435 8.48769 20.5 9.54423 20.5H10.7982C11.8512 20.5 12.7062 19.6491 12.7113 18.5961V18.5961C12.7088 18.088 12.9096 17.6 13.2689 17.2407C13.6282 16.8814 14.1162 16.6806 14.6243 16.6831C14.9459 16.6917 15.2604 16.7797 15.5397 16.9393V16.9393C16.4524 17.4653 17.6186 17.1543 18.1484 16.2437V18.1484L18.8074 15.1453C19.0625 14.7074 19.1325 14.1859 19.0019 13.6963C18.8714 13.2067 18.551 12.7893 18.1117 12.5366V12.5366C17.6725 12.2839 17.3521 11.8665 17.2215 11.3769C17.091 10.8872 17.161 10.3658 17.4161 9.9279C17.582 9.63827 17.8221 9.39814 18.1117 9.23225V9.23225C19.0169 8.70283 19.3271 7.54343 18.8074 6.63271V6.63271V6.62355Z"
                                         stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="10.1752" cy="10.889" r="2.63616" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                </div>
                                <span class="">Pengaturan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/guide') }}" class="d-flex align-items-center cg-10">
                                <div class="d-flex">
                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.5 6L10 1L1.5 6V16L10 21L18.5 16V6Z" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linejoin="round" />
                                        <path d="M6 8.49902L9.9965 11L13.9975 8.49902M10 11V15.5" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <span class="">Panduan</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        {{-- Formulir Logout Laravel --}}
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-inline-flex align-items-center cg-15 pt-17 pb-30 px-25">
                            <img src="{{ asset('assets/images/icon/logout.svg') }}" alt="" />
                            <p class="fs-14 fw-500 lh-16 text-white-70">Logout</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
            <div class="zMainContent">
                <div class="main-header pt-28 pb-27 px-30 bd-one bd-c-ebedf0 bg-white d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center cg-15">
                        <div class="mobileMenu">
                            <button class="bd-one bd-c-ededed bd-ra-12 w-30 h-30 d-flex justify-content-center align-items-center text-707070 p-0 bg-transparent">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </div>
                    </div>
                    <div class="right d-flex justify-content-end align-items-center cg-15">
                        <div class="dropdown headerUserDropdown lanDropdown">
                            <button class="dropdown-toggle p-0 border-0 bg-transparent d-flex align-items-center cg-8" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="flex-shrink-0 w-42 h-42 rounded-circle overflow-hidden bd-one bd-c-black-5 bg-fafafa d-flex justify-content-center align-items-center">
                                    <img class="h-100 object-fit-cover w-100" src="{{ asset('assets/uploads/Language/9931729663970.svg') }}" alt="" />
                                </div>
                                <div class="text-start d-none d-md-block">
                                    <h4 class="fs-15 fw-500 lh-18 text-1b1c17">Indonesia</h4>
                                </div>
                            </button>
                            <ul class="dropdown-menu dropdownItem-one">
                                <li>
                                    <a class="d-flex align-items-center cg-8" href="{{ url('/local/en') }}">
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/uploads/Language/9331729663979.svg') }}" alt="" class="w-28 max-w-26" />
                                        </div>
                                        <p class="fs-14 fw-500 lh-16 text-707070">English</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex align-items-center cg-8" href="{{ url('/local/id') }}">
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/uploads/Language/9931729663970.svg') }}" alt="" class="w-28 max-w-26" />
                                        </div>
                                        <p class="fs-14 fw-500 lh-16 text-707070">Indonesia</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center cg-17">
                            <div class="d-flex align-items-center cg-5">
                            </div>
                            <div class="dropdown headerUserDropdown">
                                <button class="dropdown-toggle p-0 border-0 bg-transparent d-flex align-items-center cg-8" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="text-start d-none d-sm-block">
                                        <p class="fs-12 fw-400 lh-15 text-707070">Selamat Datang</p>
                                        {{-- Menampilkan nama user yang login --}}
                                        <h4 class="fs-15 fw-500 lh-18 text-1b1c17">{{ $user->name ?? 'Pengguna' }}</h4>
                                    </div>
                                </button>
                                <ul class="dropdown-menu dropdownItem-one">
                                    <li>
                                        <a class="d-flex align-items-center cg-8" href="{{ url('/profile') }}">
                                            <div class="d-flex">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.7274 20.4471C19.2716 19.1713 18.2672 18.0439 16.8701 17.2399C15.4729 16.4358 13.7611 16 12 16C10.2389 16 8.52706 17.381 7.12991 18.1851C5.73276 18.9892 4.72839 19.1713 4.27259 20.4471" stroke="#707070" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <circle cx="12" cy="8" r="4" stroke="#707070" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round"></circle>
                                                </svg>
                                            </div>
                                            <p class="fs-14 fw-500 lh-16 text-707070">Profil</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="d-flex align-items-center cg-8" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <div class="d-flex">
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.49935 17.8333C7.28921 17.8333 5.16960 16.9553 3.60679 15.3925C2.04399 13.8297 1.16602 11.7101 1.16602 9.49996C1.16602 7.28982 2.04399 5.17021 3.60679 3.60740C5.16960 2.04460 7.28921 1.16663 9.49935 1.16663" stroke="#707070" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M7.41602 9.5H17.8327M17.8327 9.5L14.7077 6.375M17.8327 9.5L14.7077 12.625" stroke="#707070" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="fs-14 fw-500 lh-16 text-707070">Logout</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <button class="d-md-none bd-one bd-c-ededed bd-ra-12 w-30 h-30 d-flex justify-content-center align-items-center text-707070 p-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#homeRightSideView" aria-controls="homeRightSideView">
                                <img src="{{ asset('assets/images/icon/nav-right-menu.svg') }}" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-30">
                    <div class="d-flex flex-wrap justify-content-between align-items-center pb-16">
                        <h4 class="fs-24 fw-500 lh-34 text-black">Form Anggota Biasa</h4>
                    </div>

                    <div class="bg-white bd-half bd-c-ebedf0 bd-ra-25 p-30">
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
                        {{-- Menampilkan pesan sukses dari session (misal setelah submit berhasil) --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Formulir utama untuk submit data --}}
                        <form action="{{ url('/companies/store') }}" method="post" enctype="multipart/form-data" id="form">
                            @csrf {{-- CSRF Token Laravel --}}

                            <div class="primary-form-group mb-3 section-membership_type">
                                <div class="primary-form-group-wrap">
                                    <label for="membership_type" class="form-label required">Tipe Keanggotaan</label>
                                    <select name="membership_type" id="membership_type" class="primary-form-control" required readonly disabled> {{-- Ditambahkan: readonly dan disabled --}}
                                        {{-- Opsi hanya akan diisi berdasarkan user->membership_type --}}
                                        @php
                                            $selectedMembershipType = old('membership_type', $user->membership_type ?? '');
                                            $options = [
                                                'ab' => 'Anggota Biasa',
                                                'um' => 'Usaha Mikro',
                                                'alb' => 'Anggota Luar Biasa',
                                                'albt' => 'Anggota Luar Biasa Tingkat Pusat',
                                            ];
                                        @endphp
                                        @if ($selectedMembershipType && isset($options[$selectedMembershipType]))
                                            <option value="{{ $selectedMembershipType }}" selected>
                                                {{ $options[$selectedMembershipType] }}
                                            </option>
                                        @else
                                            {{-- Fallback jika somehow $user->membership_type tidak valid --}}
                                            <option value="">Pilih Tipe Keanggotaan</option>
                                        @endif
                                    </select>
                                    <div id="membership_type-error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <input type="hidden" name="membership_type_hidden" value="{{ $user->membership_type ?? '' }}">

                            {{-- Durasi keanggotaan, ditampilkan jika klasifikasi dipilih --}}
                            <div class="primary-form-group mb-3 duration-field">
                                <div class="primary-form-group-wrap">
                                    <label for="duration_qty" class="form-label required">Durasi Keanggotaan</label>
                                    <select name="duration_qty" id="duration_qty" class="primary-form-control" disabled required>
                                        <option value="">Pilih Durasi Keanggotaan</option>
                                    </select>
                                    <div id="duration_qty-error" class="invalid-feedback"></div>
                                </div>
                            </div>

                            {{-- SECTION: DATA PENANGGUNG JAWAB (TAMPIL UNTUK SEMUA TIPE) --}}
                            <div class="section-pic">
                                <h4 class="fs-18 fw-500 lh-22 text-1b1c17 pb-20">Data Penanggung Jawab</h4>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="pic_name" class="form-label required">Nama</label>
                                        
                                        {{-- Ini adalah INPUT TEKS yang bisa diedit. Nilai diambil dari database ($user->name) saat form pertama kali dimuat. Jika ada error validasi, nilai yang diketik pengguna akan dipertahankan (old('pic_name')). --}}
                                        <input type="text" name="pic_name" id="pic_name" 
                                            class="primary-form-control" 
                                            value="{{ $user->name ?? 'Pengguna' }}" 
                                            placeholder="Masukkan Nama Penanggung Jawab" required>
                                        
                                        <div id="pic_name-error" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="pic_file_ktp" class="form-label required">Unggah Kartu Tanda Penduduk (KTP)</label>
                                                <input type="file" name="pic_file_ktp" id="pic_file_ktp" class="primary-form-control" accept="image/*,.pdf" required>
                                                <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                                <div id="pic_file_ktp-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="pic_nik" class="form-label required">Nomor Induk Kependudukan (NIK)</label>
                                                <input type="text" name="pic_nik" id="pic_nik" class="primary-form-control nik" value="{{ old('pic_nik') }}" placeholder="Masukkan Nomor Induk Kependudukan (NIK)" required>
                                                <div id="pic_nik-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="pic_file_npwp" class="form-label required">Unggah Nomor Pokok Wajib Pajak (NPWP)</label>
                                                <input type="file" name="pic_file_npwp" id="pic_file_npwp" class="primary-form-control" accept="image/*,.pdf" required>
                                                <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                                <div id="pic_file_npwp-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="pic_npwp" class="form-label required">Nomor Pokok Wajib Pajak (NPWP)</label>
                                                <input type="text" name="pic_npwp" id="pic_npwp" class="primary-form-control npwp" value="{{ old('pic_npwp') }}" placeholder="Masukkan Nomor Pokok Wajib Pajak (NPWP)" required>
                                                <div id="pic_npwp-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="pic_file_passport_photo" class="form-label required">Unggah Pas Foto (Ukuran 3x4)</label>
                                        <input type="file" name="pic_file_passport_photo" id="pic_file_passport_photo" class="primary-form-control" accept="image/*" required>
                                        <small class="d-block text-muted fs-12">Max Size: 5MB. File Type: jpg,jpeg,png</small>
                                        <div id="pic_file_passport_photo-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="pic_position" class="form-label required">Jabatan</label>
                                        <input type="text" name="pic_position" id="pic_position" class="primary-form-control" value="{{ old('pic_position') }}" placeholder="Masukkan Jabatan" required>
                                        <div id="pic_position-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="pic_address" class="form-label required">Alamat</label>
                                        <input type="text" name="pic_address" id="pic_address" class="primary-form-control" value="{{ old('pic_address') }}" placeholder="Masukkan Alamat" required>
                                        <div id="pic_address-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- SECTION: FORM ANGGOTA BIASA --}}
                            <div class="section-form-ab">
                                <h4 class="fs-18 fw-500 lh-22 text-1b1c17 pb-20">Data Perusahaan</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="nib" class="form-label required">Nomor Induk Berusaha (NIB)</label>
                                                {{-- Changed name attribute here --}}
                                                <input type="text" name="company_nib" id="nib" class="primary-form-control nib" value="{{ old('company_nib') }}" placeholder="Masukkan Nomor Induk Berusaha (NIB)" required>
                                                <div id="nib-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row section-company_name">
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="company_type" class="form-label required">Bentuk Perusahaan</label>
                                                <select name="company_type" id="company_type" class="primary-form-control" required>
                                                    <option value="">Pilih Bentuk Perusahaan</option>
                                                    <option value="CV" {{ old('company_type') == 'CV' ? 'selected' : '' }}>CV</option>
                                                    <option value="FIRMA" {{ old('company_type') == 'FIRMA' ? 'selected' : '' }}>FIRMA</option>
                                                    <option value="KOPERASI" {{ old('company_type') == 'KOPERASI' ? 'selected' : '' }}>KOPERASI</option>
                                                    <option value="PT" {{ old('company_type') == 'PT' ? 'selected' : '' }}>Perseroan Terbatas (PT)</option>
                                                    <option value="PD" {{ old('company_type') == 'PD' ? 'selected' : '' }}>PD</option>
                                                    <option value="UD" {{ old('company_type') == 'UD' ? 'selected' : '' }}>UD</option>
                                                    <option value="YAYASAN" {{ old('company_type') == 'YAYASAN' ? 'selected' : '' }}>Yayasan</option>
                                                    <option value="PERSEROAN" {{ old('company_type') == 'PERSEROAN' ? 'selected' : '' }}>Perseroan</option>
                                                    <option value="PERSEORANGAN" {{ old('company_type') == 'PERSEORANGAN' ? 'selected' : '' }}>Perseorangan</option>
                                                    <option value="KCBA" {{ old('company_type') == 'KCBA' ? 'selected' : '' }}>Kantor Cabang Bank Asing (KCBA)</option>
                                                    <option value="Persekutuan Perdata" {{ old('company_type') == 'Persekutuan Perdata' ? 'selected' : '' }}>Persekutuan Perdata</option>
                                                </select>
                                                <div id="company_type-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="company_name" class="form-label required">Nama Perusahaan</label>
                                                <input type="text" name="company_name" id="company_name" class="primary-form-control" value="{{ old('company_name') }}" placeholder="Masukkan Nama Perusahaan" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-trigger="hover focus" title="Pastikan nama sesuai dengan yang terdaftar di SK KEMENKUMHAM. Dan tuliskan hanya nama perusahaan tanpa menggunakan bentuk badan usaha (PT, CV, Dsb.)" required>
                                                <div id="company_name-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Pindahan dropdown Klasifikasi yang diminta --}}
                                <div class="primary-form-group mb-3 section-classification">
                                    <div class="primary-form-group-wrap">
                                        <label for="classification" class="form-label required">Klasifikasi</label>
                                        <select name="classification" id="classification" class="primary-form-control" disabled required>
                                            <option value="">Pilih Klasifikasi</option>
                                            {{-- Options will be dynamically added by JavaScript --}}
                                        </select>
                                        <div id="classification-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_nib" class="form-label required">Unggah Nomor Induk Berusaha (NIB)</label>
                                        <input type="file" name="file_nib" id="file_nib" class="primary-form-control" accept="image/*,.pdf" required>
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_nib-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_sk_kemenkumham" class="form-label required">Unggah SK Kemenkumham</label>
                                        <input type="file" name="file_sk_kemenkumham" id="file_sk_kemenkumham" class="primary-form-control" accept="image/*,.pdf" required>
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_sk_kemenkumham-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="sbu" class="form-label">Nomor Sertifikat Badan Usaha</label>
                                        <input type="text" name="sbu" id="sbu" class="primary-form-control sbu" value="{{ old('sbu') }}" placeholder="Masukkan Nomor Sertifikat Badan Usaha">
                                        <div id="sbu-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="file_npwp" class="form-label required">Unggah NPWP Badan Usaha</label>
                                                <input type="file" name="file_npwp" id="file_npwp" class="primary-form-control" accept="image/*,.pdf" required>
                                                <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                                <div id="file_npwp-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="npwp" class="form-label required">NPWP Badan Usaha</label>
                                                {{-- Changed name attribute here --}}
                                                <input type="text" name="company_npwp" id="npwp" class="primary-form-control npwp" value="{{ old('company_npwp') }}" placeholder="Masukkan NPWP Badan Usaha" required>
                                                <div id="npwp-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="address" class="form-label required">Alamat Perusahaan</label>
                                        {{-- Changed name attribute here --}}
                                        <input type="text" name="company_address" id="address" class="primary-form-control" value="{{ old('company_address') }}" placeholder="Masukkan Alamat Perusahaan" required>
                                        <div id="address-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="province" class="form-label required">Provinsi</label>
                                        {{-- Changed name attribute here --}}
                                        <select name="company_province" id="province" class="primary-form-control province" required>
                                            <option value="">Pilih Provinsi</option>
                                            <option value="11" {{ old('company_province') == '11' ? 'selected' : '' }}>ACEH</option>
                                            <option value="12" {{ old('company_province') == '12' ? 'selected' : '' }}>SUMATERA UTARA</option>
                                            <option value="13" {{ old('company_province') == '13' ? 'selected' : '' }}>SUMATERA BARAT</option>
                                            <option value="14" {{ old('company_province') == '14' ? 'selected' : '' }}>RIAU</option>
                                            <option value="15" {{ old('company_province') == '15' ? 'selected' : '' }}>JAMBI</option>
                                            <option value="16" {{ old('company_province') == '16' ? 'selected' : '' }}>SUMATERA SELATAN</option>
                                            <option value="17" {{ old('company_province') == '17' ? 'selected' : '' }}>BENGKULU</option>
                                            <option value="18" {{ old('company_province') == '18' ? 'selected' : '' }}>LAMPUNG</option>
                                            <option value="19" {{ old('company_province') == '19' ? 'selected' : '' }}>KEPULAUAN BANGKA BELITUNG</option>
                                            <option value="21" {{ old('company_province') == '21' ? 'selected' : '' }}>KEPULAUAN RIAU</option>
                                            <option value="31" {{ old('company_province') == '31' ? 'selected' : '' }}>DKI JAKARTA</option>
                                            <option value="32" {{ old('company_province') == '32' ? 'selected' : '' }}>JAWA BARAT</option>
                                            <option value="33" {{ old('company_province') == '33' ? 'selected' : '' }}>JAWA TENGAH</option>
                                            <option value="34" {{ old('company_province') == '34' ? 'selected' : '' }}>DAERAH ISTIMEWA YOGYAKARTA</option>
                                            <option value="35" {{ old('company_province') == '35' ? 'selected' : '' }}>JAWA TIMUR</option>
                                            <option value="36" {{ old('company_province') == '36' ? 'selected' : '' }}>BANTEN</option>
                                            <option value="51" {{ old('company_province') == '51' ? 'selected' : '' }}>BALI</option>
                                            <option value="52" {{ old('company_province') == '52' ? 'selected' : '' }}>NUSA TENGGARA BARAT</option>
                                            <option value="53" {{ old('company_province') == '53' ? 'selected' : '' }}>NUSA TENGGARA TIMUR</option>
                                            <option value="61" {{ old('company_province') == '61' ? 'selected' : '' }}>KALIMANTAN BARAT</option>
                                            <option value="62" {{ old('company_province') == '62' ? 'selected' : '' }}>KALIMANTAN TENGAH</option>
                                            <option value="63" {{ old('company_province') == '63' ? 'selected' : '' }}>KALIMANTAN SELATAN</option>
                                            <option value="64" {{ old('company_province') == '64' ? 'selected' : '' }}>KALIMANTAN TIMUR</option>
                                            <option value="65" {{ old('company_province') == '65' ? 'selected' : '' }}>KALIMANTAN UTARA</option>
                                            <option value="71" {{ old('company_province') == '71' ? 'selected' : '' }}>SULAWESI UTARA</option>
                                            <option value="72" {{ old('company_province') == '72' ? 'selected' : '' }}>SULAWESI TENGAH</option>
                                            <option value="73" {{ old('company_province') == '73' ? 'selected' : '' }}>SULAWESI SELATAN</option>
                                            <option value="74" {{ old('company_province') == '74' ? 'selected' : '' }}>SULAWESI TENGGARA</option>
                                            <option value="75" {{ old('company_province') == '75' ? 'selected' : '' }}>GORONTALO</option>
                                            <option value="76" {{ old('company_province') == '76' ? 'selected' : '' }}>SULAWESI BARAT</option>
                                            <option value="81" {{ old('company_province') == '81' ? 'selected' : '' }}>MALUKU</option>
                                            <option value="82" {{ old('company_province') == '82' ? 'selected' : '' }}>MALUKU UTARA</option>
                                            <option value="91" {{ old('company_province') == '91' ? 'selected' : '' }}>PAPUA</option>
                                            <option value="92" {{ old('company_province') == '92' ? 'selected' : '' }}>PAPUA BARAT</option>
                                            <option value="93" {{ old('company_province') == '93' ? 'selected' : '' }}>PAPUA SELATAN</option>
                                            <option value="94" {{ old('company_province') == '94' ? 'selected' : '' }}>PAPUA TENGAH</option>
                                            <option value="95" {{ old('company_province') == '95' ? 'selected' : '' }}>PAPUA PEGUNUNGAN</option>
                                            <option value="96" {{ old('company_province') == '96' ? 'selected' : '' }}>PAPUA BARAT DAYA</option>
                                        </select>
                                        <div id="province-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="city" class="form-label required">Kabupaten/Kota</label>
                                        {{-- Changed name attribute here --}}
                                        <select name="company_city" id="city" class="primary-form-control city" disabled required>
                                            <option value="">Pilih Kabupaten/Kota</option>
                                        </select>
                                        <div id="city-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="postal_code" class="form-label required">Kode Pos</label>
                                        {{-- Changed name attribute here --}}
                                        <input type="text" name="company_postal_code" id="postal_code" class="primary-form-control postal_code" value="{{ old('company_postal_code') }}" placeholder="Masukkan Kode Pos" required>
                                        <div id="postal_code-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="kbli" class="form-label required">Kode KBLI</label>
                                        {{-- Changed name attribute here --}}
                                        <input type="text" name="company_kbli" id="kbli" class="primary-form-control kbli" value="{{ old('company_kbli') }}" placeholder="Masukkan Kode KBLI" required>
                                        <div id="kbli-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="business_category" class="form-label required">Kategori Usaha</label>
                                        {{-- Changed name attribute here --}}
                                        <select name="company_business_category" id="business_category" class="primary-form-control" required>
                                            <option value="">Pilih Kategori Usaha</option>
                                            <option value="ADMINISTRASI PEMERINTAHAN, PERTAHANAN DAN JAMINAN SOSIAL WAJIB" {{ old('company_business_category') == 'ADMINISTRASI PEMERINTAHAN, PERTAHANAN DAN JAMINAN SOSIAL WAJIB' ? 'selected' : '' }}>ADMINISTRASI PEMERINTAHAN, PERTAHANAN DAN JAMINAN SOSIAL WAJIB</option>
                                            <option value="AKTIVITAS BADAN INTERNASIONAL DAN BADAN EKSTRA INTERNASIONAL LAINNYA" {{ old('company_business_category') == 'AKTIVITAS BADAN INTERNASIONAL DAN BADAN EKSTRA INTERNASIONAL LAINNYA' ? 'selected' : '' }}>AKTIVITAS BADAN INTERNASIONAL DAN BADAN EKSTRA INTERNASIONAL LAINNYA</option>
                                            <option value="AKTIVITAS JASA LAINNYA" {{ old('company_business_category') == 'AKTIVITAS JASA LAINNYA' ? 'selected' : '' }}>AKTIVITAS JASA LAINNYA</option>
                                            <option value="AKTIVITAS KESEHATAN MANUSIA DAN AKTIVITAS SOSIAL" {{ old('company_business_category') == 'AKTIVITAS KESEHATAN MANUSIA DAN AKTIVITAS SOSIAL' ? 'selected' : '' }}>AKTIVITAS KESEHATAN MANUSIA DAN AKTIVITAS SOSIAL</option>
                                            <option value="AKTIVITAS KEUANGAN DAN ASURANSI" {{ old('company_business_category') == 'AKTIVITAS KEUANGAN DAN ASURANSI' ? 'selected' : '' }}>AKTIVITAS KEUANGAN DAN ASURANSI</option>
                                            <option value="AKTIVITAS PENYEWAAN DAN SEWA GUNA USAHA TANPA HAK OPSI, KETENAGAKERJAAN, AGEN PERJALANAN DAN PENUNJANG USAHA LAINNYA" {{ old('company_business_category') == 'AKTIVITAS PENYEWAAN DAN SEWA GUNA USAHA TANPA HAK OPSI, KETENAGAKERJAAN, AGEN PERJALANAN DAN PENUNJANG USAHA LAINNYA' ? 'selected' : '' }}>AKTIVITAS PENYEWAAN DAN SEWA GUNA USAHA TANPA HAK OPSI, KETENAGAKERJAAN, AGEN PERJALANAN DAN PENUNJANG USAHA LAINNYA</option>
                                            <option value="AKTIVITAS PROFESIONAL, ILMIAH DAN TEKNIS" {{ old('company_business_category') == 'AKTIVITAS PROFESIONAL, ILMIAH DAN TEKNIS' ? 'selected' : '' }}>AKTIVITAS PROFESIONAL, ILMIAH DAN TEKNIS</option>
                                            <option value="AKTIVITAS RUMAH TANGGA SEBAGAI PEMBERI KERJA" {{ old('company_business_category') == 'AKTIVITAS RUMAH TANGGA SEBAGAI PEMBERI KERJA' ? 'selected' : '' }}>AKTIVITAS RUMAH TANGGA SEBAGAI PEMBERI KERJA</option>
                                            <option value="INDUSTRI PENGOLAHAN" {{ old('company_business_category') == 'INDUSTRI PENGOLAHAN' ? 'selected' : '' }}>INDUSTRI PENGOLAHAN</option>
                                            <option value="INFORMASI DAN KOMUNIKASI" {{ old('company_business_category') == 'INFORMASI DAN KOMUNIKASI' ? 'selected' : '' }}>INFORMASI DAN KOMUNIKASI</option>
                                            <option value="KESENIAN, HIBURAN DAN REKREASI" {{ old('company_business_category') == 'KESENIAN, HIBURAN DAN REKREASI' ? 'selected' : '' }}>KESENIAN, HIBURAN DAN REKREASI</option>
                                            <option value="PENDIDIKAN" {{ old('company_business_category') == 'PENDIDIKAN' ? 'selected' : '' }}>PENDIDIKAN</option>
                                            <option value="PENGADAAN LISTRIK, GAS, UAP/AIR PANAS DAN UDARA DINGIN" {{ old('company_business_category') == 'PENGADAAN LISTRIK, GAS, UAP/AIR PANAS DAN UDARA DINGIN' ? 'selected' : '' }}>PENGADAAN LISTRIK, GAS, UAP/AIR PANAS DAN UDARA DINGIN</option>
                                            <option value="PENGANGKUTAN DAN PERGUDANGAN" {{ old('company_business_category') == 'PENGANGKUTAN DAN PERGUDANGAN' ? 'selected' : '' }}>PENGANGKUTAN DAN PERGUDANGAN</option>
                                            <option value="PENYEDIAAN AKOMODASI DAN PENYEDIAAN MAKAN MINUM" {{ old('company_business_category') == 'PENYEDIAAN AKOMODASI DAN PENYEDIAAN MAKAN MINUM' ? 'selected' : '' }}>PENYEDIAAN AKOMODASI DAN PENYEDIAAN MAKAN MINUM</option>
                                            <option value="PERDAGANGAN BESAR DAN ECERAN" {{ old('company_business_category') == 'PERDAGANGAN BESAR DAN ECERAN' ? 'selected' : '' }}>PERDAGANGAN BESAR DAN ECERAN</option>
                                            <option value="PERTAMBANGAN DAN PENGGALIAN" {{ old('company_business_category') == 'PERTAMBANGAN DAN PENGGALIAN' ? 'selected' : '' }}>PERTAMBANGAN DAN PENGGALIAN</option>
                                            <option value="PERTANIAN, KEHUTANAN DAN PERIKANAN" {{ old('company_business_category') == 'PERTANIAN, KEHUTANAN DAN PERIKANAN' ? 'selected' : '' }}>PERTANIAN, KEHUTANAN DAN PERIKANAN</option>
                                            <option value="REAL ESTAT" {{ old('company_business_category') == 'REAL ESTAT' ? 'selected' : '' }}>REAL ESTAT</option>
                                            <option value="TREATMENT AIR, TREATMENT AIR LIMBAH, TREATMENT DAN PEMULIHAN MATERIAL SAMPAH, DAN AKTIVITAS REMEDIASI" {{ old('company_business_category') == 'TREATMENT AIR, TREATMENT AIR LIMBAH, TREATMENT DAN PEMULIHAN MATERIAL SAMPAH, DAN AKTIVITAS REMEDIASI' ? 'selected' : '' }}>TREATMENT AIR, TREATMENT AIR LIMBAH, TREATMENT DAN PEMULIHAN MATERIAL SAMPAH, DAN AKTIVITAS REMEDIASI</option>
                                        </select>
                                        <div id="business_category-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- SECTION: FORM USAHA MIKRO --}}
                            <div class="section-form-um">
                                <h4 class="fs-18 fw-500 lh-22 text-1b1c17 pb-20">Data Usaha</h4>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="um_name" class="form-label required">Nama Usaha</label>
                                        <input type="text" name="um_name" id="um_name" class="primary-form-control" value="{{ old('um_name') }}" placeholder="Masukkan Nama Usaha" required>
                                        <div id="um_name-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="um_address" class="form-label required">Alamat Usaha</label>
                                        <input type="text" name="um_address" id="um_address" class="primary-form-control" value="{{ old('um_address') }}" placeholder="Masukkan Alamat Usaha" required>
                                        <div id="um_address-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="um_province" class="form-label required">Provinsi</label>
                                        <select name="um_province" id="um_province" class="primary-form-control province" required>
                                            <option value="">Pilih Provinsi</option>
                                            <option value="11" {{ old('um_province') == '11' ? 'selected' : '' }}>ACEH</option>
                                            <option value="12" {{ old('um_province') == '12' ? 'selected' : '' }}>SUMATERA UTARA</option>
                                            <option value="13" {{ old('um_province') == '13' ? 'selected' : '' }}>SUMATERA BARAT</option>
                                            <option value="14" {{ old('um_province') == '14' ? 'selected' : '' }}>RIAU</option>
                                            <option value="15" {{ old('um_province') == '15' ? 'selected' : '' }}>JAMBI</option>
                                            <option value="16" {{ old('um_province') == '16' ? 'selected' : '' }}>SUMATERA SELATAN</option>
                                            <option value="17" {{ old('um_province') == '17' ? 'selected' : '' }}>BENGKULU</option>
                                            <option value="18" {{ old('um_province') == '18' ? 'selected' : '' }}>LAMPUNG</option>
                                            <option value="19" {{ old('um_province') == '19' ? 'selected' : '' }}>KEPULAUAN BANGKA BELITUNG</option>
                                            <option value="21" {{ old('um_province') == '21' ? 'selected' : '' }}>KEPULAUAN RIAU</option>
                                            <option value="31" {{ old('um_province') == '31' ? 'selected' : '' }}>DKI JAKARTA</option>
                                            <option value="32" {{ old('um_province') == '32' ? 'selected' : '' }}>JAWA BARAT</option>
                                            <option value="33" {{ old('um_province') == '33' ? 'selected' : '' }}>JAWA TENGAH</option>
                                            <option value="34" {{ old('um_province') == '34' ? 'selected' : '' }}>DAERAH ISTIMEWA YOGYAKARTA</option>
                                            <option value="35" {{ old('um_province') == '35' ? 'selected' : '' }}>JAWA TIMUR</option>
                                            <option value="36" {{ old('um_province') == '36' ? 'selected' : '' }}>BANTEN</option>
                                            <option value="51" {{ old('um_province') == '51' ? 'selected' : '' }}>BALI</option>
                                            <option value="52" {{ old('um_province') == '52' ? 'selected' : '' }}>NUSA TENGGARA BARAT</option>
                                            <option value="53" {{ old('um_province') == '53' ? 'selected' : '' }}>NUSA TENGGARA TIMUR</option>
                                            <option value="61" {{ old('um_province') == '61' ? 'selected' : '' }}>KALIMANTAN BARAT</option>
                                            <option value="62" {{ old('um_province') == '62' ? 'selected' : '' }}>KALIMANTAN TENGAH</option>
                                            <option value="63" {{ old('um_province') == '63' ? 'selected' : '' }}>KALIMANTAN SELATAN</option>
                                            <option value="64" {{ old('province') == '64' ? 'selected' : '' }}>KALIMANTAN TIMUR</option>
                                            <option value="65" {{ old('um_province') == '65' ? 'selected' : '' }}>KALIMANTAN UTARA</option>
                                            <option value="71" {{ old('um_province') == '71' ? 'selected' : '' }}>SULAWESI UTARA</option>
                                            <option value="72" {{ old('um_province') == '72' ? 'selected' : '' }}>SULAWESI TENGAH</option>
                                            <option value="73" {{ old('um_province') == '73' ? 'selected' : '' }}>SULAWESI SELATAN</option>
                                            <option value="74" {{ old('um_province') == '74' ? 'selected' : '' }}>SULAWESI TENGGARA</option>
                                            <option value="75" {{ old('um_province') == '75' ? 'selected' : '' }}>GORONTALO</option>
                                            <option value="76" {{ old('um_province') == '76' ? 'selected' : '' }}>SULAWESI BARAT</option>
                                            <option value="81" {{ old('um_province') == '81' ? 'selected' : '' }}>MALUKU</option>
                                            <option value="82" {{ old('um_province') == '82' ? 'selected' : '' }}>MALUKU UTARA</option>
                                            <option value="91" {{ old('um_province') == '91' ? 'selected' : '' }}>PAPUA</option>
                                            <option value="92" {{ old('um_province') == '92' ? 'selected' : '' }}>PAPUA BARAT</option>
                                            <option value="93" {{ old('um_province') == '93' ? 'selected' : '' }}>PAPUA SELATAN</option>
                                            <option value="94" {{ old('um_province') == '94' ? 'selected' : '' }}>PAPUA TENGAH</option>
                                            <option value="95" {{ old('um_province') == '95' ? 'selected' : '' }}>PAPUA PEGUNUNGAN</option>
                                            <option value="96" {{ old('um_province') == '96' ? 'selected' : '' }}>PAPUA BARAT DAYA</option>
                                        </select>
                                        <div id="um_province-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="um_city" class="form-label required">Kabupaten/Kota</label>
                                        <select name="um_city" id="um_city" class="primary-form-control city" disabled required>
                                            <option value="">Pilih Kabupaten/Kota</option>
                                        </select>
                                        <div id="um_city-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="um_postal_code" class="form-label required">Kode Pos</label>
                                        <input type="text" name="um_postal_code" id="um_postal_code" class="primary-form-control postal_code" value="{{ old('um_postal_code') }}" placeholder="Masukkan Kode Pos" required>
                                        <div id="um_postal_code-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="um_kbli" class="form-label required">Kode KBLI</label>
                                        <input type="text" name="um_kbli" id="um_kbli" class="primary-form-control kbli" value="{{ old('um_kbli') }}" placeholder="Masukkan Kode KBLI" required>
                                        <div id="um_kbli-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="um_business_category" class="form-label required">Kategori Usaha</label>
                                        <select name="um_business_category" id="um_business_category" class="primary-form-control" required>
                                            <option value="">Pilih Kategori Usaha</option>
                                            <option value="ADMINISTRASI PEMERINTAHAN, PERTAHANAN DAN JAMINAN SOSIAL WAJIB" {{ old('um_business_category') == 'ADMINISTRASI PEMERINTAHAN, PERTAHANAN DAN JAMINAN SOSIAL WAJIB' ? 'selected' : '' }}>ADMINISTRASI PEMERINTAHAN, PERTAHANAN DAN JAMINAN SOSIAL WAJIB</option>
                                            <option value="AKTIVITAS BADAN INTERNASIONAL DAN BADAN EKSTRA INTERNASIONAL LAINNYA" {{ old('um_business_category') == 'AKTIVITAS BADAN INTERNASIONAL DAN BADAN EKSTRA INTERNASIONAL LAINNYA' ? 'selected' : '' }}>AKTIVITAS BADAN INTERNASIONAL DAN BADAN EKSTRA INTERNASIONAL LAINNYA</option>
                                            <option value="AKTIVITAS JASA LAINNYA" {{ old('um_business_category') == 'AKTIVITAS JASA LAINNYA' ? 'selected' : '' }}>AKTIVITAS JASA LAINNYA</option>
                                            <option value="AKTIVITAS KESEHATAN MANUSIA DAN AKTIVITAS SOSIAL" {{ old('um_business_category') == 'AKTIVITAS KESEHATAN MANUSIA DAN AKTIVITAS SOSIAL' ? 'selected' : '' }}>AKTIVITAS KESEHATAN MANUSIA DAN AKTIVITAS SOSIAL</option>
                                            <option value="AKTIVITAS KEUANGAN DAN ASURANSI" {{ old('um_business_category') == 'AKTIVITAS KEUANGAN DAN ASURANSI' ? 'selected' : '' }}>AKTIVITAS KEUANGAN DAN ASURANSI</option>
                                            <option value="AKTIVITAS PENYEWAAN DAN SEWA GUNA USAHA TANPA HAK OPSI, KETENAGAKERJAAN, AGEN PERJALANAN DAN PENUNJANG USAHA LAINNYA" {{ old('um_business_category') == 'AKTIVITAS PENYEWAAN DAN SEWA GUNA USAHA TANPA HAK OPSI, KETENAGAKERJAAN, AGEN PERJALANAN DAN PENUNJANG USAHA LAINNYA' ? 'selected' : '' }}>AKTIVITAS PENYEWAAN DAN SEWA GUNA USAHA TANPA HAK OPSI, KETENAGAKERJAAN, AGEN PERJALANAN DAN PENUNJANG USAHA LAINNYA</option>
                                            <option value="AKTIVITAS PROFESIONAL, ILMIAH DAN TEKNIS" {{ old('um_business_category') == 'AKTIVITAS PROFESIONAL, ILMIAH DAN TEKNIS' ? 'selected' : '' }}>AKTIVITAS PROFESIONAL, ILMIAH DAN TEKNIS</option>
                                            <option value="AKTIVITAS RUMAH TANGGA SEBAGAI PEMBERI KERJA" {{ old('um_business_category') == 'AKTIVITAS RUMAH TANGGA SEBAGAI PEMBERI KERJA' ? 'selected' : '' }}>AKTIVITAS RUMAH TANGGA SEBAGAI PEMBERI KERJA</option>
                                            <option value="INDUSTRI PENGOLAHAN" {{ old('um_business_category') == 'INDUSTRI PENGOLAHAN' ? 'selected' : '' }}>INDUSTRI PENGOLAHAN</option>
                                            <option value="INFORMASI DAN KOMUNIKASI" {{ old('um_business_category') == 'INFORMASI DAN KOMUNIKASI' ? 'selected' : '' }}>INFORMASI DAN KOMUNIKASI</option>
                                            <option value="KESENIAN, HIBURAN DAN REKREASI" {{ old('um_business_category') == 'KESENIAN, HIBURAN DAN REKREASI' ? 'selected' : '' }}>KESENIAN, HIBURAN DAN REKREASI</option>
                                            <option value="PENDIDIKAN" {{ old('um_business_category') == 'PENDIDIKAN' ? 'selected' : '' }}>PENDIDIKAN</option>
                                            <option value="PENGADAAN LISTRIK, GAS, UAP/AIR PANAS DAN UDARA DINGIN" {{ old('um_business_category') == 'PENGADAAN LISTRIK, GAS, UAP/AIR PANAS DAN UDARA DINGIN' ? 'selected' : '' }}>PENGADAAN LISTRIK, GAS, UAP/AIR PANAS DAN UDARA DINGIN</option>
                                            <option value="PENGANGKUTAN DAN PERGUDANGAN" {{ old('um_business_category') == 'PENGANGKUTAN DAN PERGUDANGAN' ? 'selected' : '' }}>PENGANGKUTAN DAN PERGUDANGAN</option>
                                            <option value="PENYEDIAAN AKOMODASI DAN PENYEDIAAN MAKAN MINUM" {{ old('um_business_category') == 'PENYEDIAAN AKOMODASI DAN PENYEDIAAN MAKAN MINUM' ? 'selected' : '' }}>PENYEDIAAN AKOMODASI DAN PENYEDIAAN MAKAN MINUM</option>
                                            <option value="PERDAGANGAN BESAR DAN ECERAN" {{ old('um_business_category') == 'PERDAGANGAN BESAR DAN ECERAN' ? 'selected' : '' }}>PERDAGANGAN BESAR DAN ECERAN</option>
                                            <option value="PERTAMBANGAN DAN PENGGALIAN" {{ old('um_business_category') == 'PERTAMBANGAN DAN PENGGALIAN' ? 'selected' : '' }}>PERTAMBANGAN DAN PENGGALIAN</option>
                                            <option value="PERTANIAN, KEHUTANAN DAN PERIKANAN" {{ old('um_business_category') == 'PERTANIAN, KEHUTANAN DAN PERIKANAN' ? 'selected' : '' }}>PERTANIAN, KEHUTANAN DAN PERIKANAN</option>
                                            <option value="REAL ESTAT" {{ old('um_business_category') == 'REAL ESTAT' ? 'selected' : '' }}>REAL ESTAT</option>
                                            <option value="TREATMENT AIR, TREATMENT AIR LIMBAH, TREATMENT DAN PEMULIHAN MATERIAL SAMPAH, DAN AKTIVITAS REMEDIASI" {{ old('um_business_category') == 'TREATMENT AIR, TREATMENT AIR LIMBAH, TREATMENT DAN PEMULIHAN MATERIAL SAMPAH, DAN AKTIVITAS REMEDIASI' ? 'selected' : '' }}>TREATMENT AIR, TREATMENT AIR LIMBAH, TREATMENT DAN PEMULIHAN MATERIAL SAMPAH, DAN AKTIVITAS REMEDIASI</option>
                                        </select>
                                        <div id="um_business_category-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- SECTION: FORM ANGGOTA LUAR BIASA --}}
                            <div class="section-form-alb section-form-albt">
                                <h4 class="fs-18 fw-500 lh-22 text-1b1c17 pb-20">Data Asosiasi/Himpunan</h4>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="name_gm_alb" class="form-label">Nama Ketua Umum</label>
                                        <input type="text" name="name_gm_alb" id="name_gm_alb" class="primary-form-control" value="{{ old('name_gm_alb') }}" placeholder="Masukkan Nama" required>
                                        <div id="name_gm_alb-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="phone_gm_alb" class="form-label">Phone Ketua Umum</label>
                                        <input type="text" name="phone_gm_alb" id="phone_gm_alb" class="primary-form-control mobile" value="{{ old('phone_gm_alb') }}" placeholder="Masukkan Phone" required>
                                        <div id="phone_gm_alb-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="alb_name" class="form-label required">Nama Asosiasi/Himpunan</label>
                                                <input type="text" name="alb_name" id="alb_name" class="primary-form-control" value="{{ old('alb_name') }}" placeholder="Masukkan Nama Asosiasi/Himpunan" required>
                                                <div id="alb_name-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="short_name" class="form-label required">Singkatan Asosiasi/Himpunan</label>
                                                <input type="text" name="short_name" id="short_name" class="primary-form-control" value="{{ old('short_name') }}" placeholder="Masukkan Singkatan Asosiasi/Himpunan" required>
                                                <div id="short_name-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="file_npwp_alb" class="form-label required">Unggah NPWP Asosiasi</label>
                                                <input type="file" name="file_npwp_alb" id="file_npwp_alb" class="primary-form-control" accept="image/*,.pdf" required>
                                                <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                                <div id="file_npwp_alb-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="primary-form-group mb-3">
                                            <div class="primary-form-group-wrap">
                                                <label for="npwp_alb" class="form-label required">NPWP Asosiasi</label>
                                                <input type="text" name="npwp_alb" id="npwp_alb" class="primary-form-control npwp" value="{{ old('npwp_alb') }}" placeholder="Masukkan NPWP Badan Usaha" required>
                                                <div id="npwp_alb-error" class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="alb_address" class="form-label required">Alamat Asosiasi/Himpunan</label>
                                        <input type="text" name="alb_address" id="alb_address" class="primary-form-control" value="{{ old('alb_address') }}" placeholder="Masukkan Alamat Asosiasi/Himpunan" required>
                                        <div id="alb_address-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="alb_province" class="form-label required">Provinsi</label>
                                        <select name="alb_province" id="alb_province" class="primary-form-control province" required>
                                            <option value="">Pilih Provinsi</option>
                                            <option value="11" {{ old('alb_province') == '11' ? 'selected' : '' }}>ACEH</option>
                                            <option value="12" {{ old('alb_province') == '12' ? 'selected' : '' }}>SUMATERA UTARA</option>
                                            <option value="13" {{ old('alb_province') == '13' ? 'selected' : '' }}>SUMATERA BARAT</option>
                                            <option value="14" {{ old('alb_province') == '14' ? 'selected' : '' }}>RIAU</option>
                                            <option value="15" {{ old('alb_province') == '15' ? 'selected' : '' }}>JAMBI</option>
                                            <option value="16" {{ old('alb_province') == '16' ? 'selected' : '' }}>SUMATERA SELATAN</option>
                                            <option value="17" {{ old('alb_province') == '17' ? 'selected' : '' }}>BENGKULU</option>
                                            <option value="18" {{ old('alb_province') == '18' ? 'selected' : '' }}>LAMPUNG</option>
                                            <option value="19" {{ old('alb_province') == '19' ? 'selected' : '' }}>KEPULAUAN BANGKA BELITUNG</option>
                                            <option value="21" {{ old('alb_province') == '21' ? 'selected' : '' }}>KEPULAUAN RIAU</option>
                                            <option value="31" {{ old('alb_province') == '31' ? 'selected' : '' }}>DKI JAKARTA</option>
                                            <option value="32" {{ old('alb_province') == '32' ? 'selected' : '' }}>JAWA BARAT</option>
                                            <option value="33" {{ old('alb_province') == '33' ? 'selected' : '' }}>JAWA TENGAH</option>
                                            <option value="34" {{ old('alb_province') == '34' ? 'selected' : '' }}>DAERAH ISTIMEWA YOGYAKARTA</option>
                                            <option value="35" {{ old('alb_province') == '35' ? 'selected' : '' }}>JAWA TIMUR</option>
                                            <option value="36" {{ old('alb_province') == '36' ? 'selected' : '' }}>BANTEN</option>
                                            <option value="51" {{ old('alb_province') == '51' ? 'selected' : '' }}>BALI</option>
                                            <option value="52" {{ old('alb_province') == '52' ? 'selected' : '' }}>NUSA TENGGARA BARAT</option>
                                            <option value="53" {{ old('alb_province') == '53' ? 'selected' : '' }}>NUSA TENGGARA TIMUR</option>
                                            <option value="61" {{ old('alb_province') == '61' ? 'selected' : '' }}>KALIMANTAN BARAT</option>
                                            <option value="62" {{ old('alb_province') == '62' ? 'selected' : '' }}>KALIMANTAN TENGAH</option>
                                            <option value="63" {{ old('alb_province') == '63' ? 'selected' : '' }}>KALIMANTAN SELATAN</option>
                                            <option value="64" {{ old('alb_province') == '64' ? 'selected' : '' }}>KALIMANTAN TIMUR</option>
                                            <option value="65" {{ old('alb_province') == '65' ? 'selected' : '' }}>KALIMANTAN UTARA</option>
                                            <option value="71" {{ old('alb_province') == '71' ? 'selected' : '' }}>SULAWESI UTARA</option>
                                            <option value="72" {{ old('alb_province') == '72' ? 'selected' : '' }}>SULAWESI TENGAH</option>
                                            <option value="73" {{ old('alb_province') == '73' ? 'selected' : '' }}>SULAWESI SELATAN</option>
                                            <option value="74" {{ old('alb_province') == '74' ? 'selected' : '' }}>SULAWESI TENGGARA</option>
                                            <option value="75" {{ old('alb_province') == '75' ? 'selected' : '' }}>GORONTALO</option>
                                            <option value="76" {{ old('alb_province') == '76' ? 'selected' : '' }}>SULAWESI BARAT</option>
                                            <option value="81" {{ old('alb_province') == '81' ? 'selected' : '' }}>MALUKU</option>
                                            <option value="82" {{ old('alb_province') == '82' ? 'selected' : '' }}>MALUKU UTARA</option>
                                            <option value="91" {{ old('alb_province') == '91' ? 'selected' : '' }}>PAPUA</option>
                                            <option value="92" {{ old('alb_province') == '92' ? 'selected' : '' }}>PAPUA BARAT</option>
                                            <option value="93" {{ old('alb_province') == '93' ? 'selected' : '' }}>PAPUA SELATAN</option>
                                            <option value="94" {{ old('alb_province') == '94' ? 'selected' : '' }}>PAPUA TENGAH</option>
                                            <option value="95" {{ old('alb_province') == '95' ? 'selected' : '' }}>PAPUA PEGUNUNGAN</option>
                                            <option value="96" {{ old('alb_province') == '96' ? 'selected' : '' }}>PAPUA BARAT DAYA</option>
                                        </select>
                                        <div id="alb_province-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="alb_city" class="form-label required">Kabupaten/Kota</label>
                                        <select name="alb_city" id="alb_city" class="primary-form-control city" disabled required>
                                            <option value="">Pilih Kabupaten/Kota</option>
                                        </select>
                                        <div id="alb_city-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="alb_postal_code" class="form-label required">Kode Pos</label>
                                        <input type="text" name="alb_postal_code" id="alb_postal_code" class="primary-form-control postal_code" value="{{ old('alb_postal_code') }}" placeholder="Masukkan Kode Pos" required>
                                        <div id="alb_postal_code-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_surat_permohonan_alb" class="form-label required">Unggah Surat Permohonan ALB</label>
                                        <input type="file" name="file_surat_permohonan_alb" id="file_surat_permohonan_alb" class="primary-form-control" accept="image/*,.pdf" required>
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_surat_permohonan_alb-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_adart" class="form-label required">Unggah AD/ART</label>
                                        <input type="file" name="file_adart" id="file_adart" class="primary-form-control" accept="image/*,.pdf" required>
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_adart-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_akta_pendirian" class="form-label required">Unggah Akta Pendirian</label>
                                        <input type="file" name="file_akta_pendirian" id="file_akta_pendirian" class="primary-form-control" accept="image/*,.pdf" required>
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_akta_pendirian-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_sk_kemenkumham_alb" class="form-label required">Unggah SK Kemenkumham</label>
                                        <input type="file" name="file_sk_kemenkumham_alb" id="file_sk_kemenkumham_alb" class="primary-form-control" accept="image/*,.pdf" required>
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_sk_kemenkumham_alb-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_hasil_munas" class="form-label required">Unggah Hasil Munas Terakhir</label>
                                        <input type="file" name="file_hasil_munas" id="file_hasil_munas" class="primary-form-control" accept="image/*,.pdf" required>
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_hasil_munas-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_kode_etik" class="form-label required">Unggah Kode Etik</label>
                                        <input type="file" name="file_kode_etik" id="file_kode_etik" class="primary-form-control" accept="image/*,.pdf" required>
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_kode_etik-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_logo_alb" class="form-label required">Unggah Logo (Rasio 1:1)</label>
                                        <input type="file" name="file_logo_alb" id="file_logo_alb" class="primary-form-control" accept="image/*" required>
                                        <small class="d-block text-muted fs-12">Max Size: 5MB. File Type: jpg,jpeg,png</small>
                                        <div id="file_logo_alb-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_sk_pengurus_asosiasi" class="form-label required">Unggah SK Pengurus Asosiasi</label>
                                        <input type="file" name="file_sk_pengurus_asosiasi" id="file_sk_pengurus_asosiasi" class="primary-form-control" accept="image/*,.pdf" required>
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_sk_pengurus_asosiasi-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_daftar_dpd" class="form-label">Unggah Daftar DPD (jika memiliki cabang)</label>
                                        <input type="file" name="file_daftar_dpd" id="file_daftar_dpd" class="primary-form-control" accept="image/*,.pdf">
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_daftar_dpd-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="file_daftar_anggota" class="form-label required">Unggah Daftar Anggota</label>
                                        <input type="file" name="file_daftar_anggota" id="file_daftar_anggota" class="primary-form-control" accept="image/*,.pdf" required>
                                        <small class="d-block text-muted fs-12">Max Size: 20MB. File Type: jpg,jpeg,png,pdf</small>
                                        <div id="file_daftar_anggota-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="number_of_members" class="form-label required">Jumlah Anggota</label>
                                        <input type="number" name="number_of_members" id="number_of_members" class="primary-form-control" value="{{ old('number_of_members') }}" placeholder="Masukkan Jumlah Anggota" min="0" required>
                                        <div id="number_of_members-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="phone_staff_asosiasi" class="form-label required">No Hp Staf Sekretariat</label>
                                        <input type="text" name="phone_staff_asosiasi" id="phone_staff_asosiasi" class="primary-form-control mobile" value="{{ old('phone_staff_asosiasi') }}" placeholder="Masukkan No Hp Staf Sekretariat" required>
                                        <div id="phone_staff_asosiasi-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="name_staff_asosiasi" class="form-label required">Nama Staf Sekretariat</label>
                                        <input type="text" name="name_staff_asosiasi" id="name_staff_asosiasi" class="primary-form-control" value="{{ old('name_staff_asosiasi') }}" placeholder="Masukkan Nama Staf Sekretariat" required>
                                        <div id="name_staff_asosiasi-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="primary-form-group mb-3">
                                    <div class="primary-form-group-wrap">
                                        <label for="email_staff_asosiasi" class="form-label">Email Staf Sekretariat</label>
                                        <input type="text" name="email_staff_asosiasi" id="email_staff_asosiasi" class="primary-form-control" value="{{ old('email_staff_asosiasi') }}" placeholder="Masukkan Email Staf Sekretariat">
                                        <div id="email_staff_asosiasi-error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- FOOTER FORM --}}
                            <div class="section-form-footer">
                                <div class="form-check mb-3">
                                    <input type="checkbox" name="terms" id="terms" class="form-check-input" value="1" required {{ old('terms') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label text-black" for="terms">Dengan ini menyatakan data yang saya input adalah benar, jika terjadi kesalahan bukan merupakan tanggung jawab Kadin Indonesia</label>
                                </div>
                                <div id="terms-error" class="invalid-feedback"></div>

                                <button type="submit" class="btn btn-primary btnSubmit w-100 fs-15 fw-500 lh-25 p-13 bd-ra-12 mb-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js?ver=2') }}"></script>
    <script src="{{ asset('assets/js/dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/js/lc_select.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js?ver=0') }}"></script>
    <script src="{{ asset('assets/js/common.js?ver=0') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        let membershipType;
        let classification;

        /**
         * Sets the old city value in the city dropdown after AJAX call is complete.
         * @param {jQuery} citySelect - The jQuery city dropdown element.
         * @param {string} oldCityValue - The old city value to be set.
         */
        function setOldCity(citySelect, oldCityValue) {
            if (oldCityValue) {
                const observer = new MutationObserver((mutationsList, observer) => {
                    // Check if options are loaded (more than 1 means default option + actual data)
                    if (citySelect.find('option').length > 1) { 
                        citySelect.val(oldCityValue);
                        observer.disconnect(); // Stop observing once the value is set
                    }
                });
                // Start observing changes to the citySelect element's children (options)
                observer.observe(citySelect[0], { childList: true });
            }
        }

        /**
         * Returns the membership duration type in text form.
         * @param {number} durationType - Duration type (1, 2, or 3).
         * @returns {string} - The duration text.
         */
        function getDurationType(durationType) {
            const output = {
                1: "Hari",
                2: "Bulan",
                3: "Tahun",
            }
            return output[durationType];
        }

        $(document).ready(function() {
            // GLOBAL AJAX SETUP FOR CSRF TOKEN
            // This is crucial for preventing CSRF token mismatch errors on AJAX requests.
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Initialize Bootstrap Tooltips
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            
            // Initialize input masks
            $('.npwp').mask('00.000.000.0-000.000');
            $('.nib').mask('0000000000000');
            $('.nik').mask('0000000000000000');
            $('.postal_code').mask('00000');
            $('.mobile').mask('00000#');

            // Trigger change event manually if there's an old membership_type value
            // This ensures the form state is correctly initialized on page load with old data.
            if ($('#membership_type').val()) {
                $('#membership_type').trigger('change');
            }
        });

        // --- Membership Type Change Handler ---
        $('#membership_type').on('change', function() {
            membershipType = $(this).val();
            let sectionClassification = $('.section-classification');
            let durationField = $('.primary-form-group.duration-field'); // Target the duration field explicitly

            // Hide and reset all form sections and their fields
            // Ensure .section-form-albt is handled even if it's the same div as .section-form-alb
            $('.section-pic, .section-form-ab, .section-form-um, .section-form-alb, .section-form-albt, .section-form-footer').hide();
            
            // Disable and clear values for all inputs EXCEPT membership_type and terms checkbox
            $('input, select').not('#membership_type, #terms, #pic_name').prop('disabled', true).val('');
            $('input[type="file"]').val(''); // Clear file inputs

            // Reset and disable classification dropdown
            $('#classification').html('<option value="">Pilih Klasifikasi</option>').prop('disabled', true);

            // Hide and disable duration field initially
            durationField.hide().find('select').prop('disabled', true).html(`<option value="">Pilih Durasi Keanggotaan</option>`);
            
            // Show and enable relevant form sections and their inputs based on membership type
            if (membershipType === 'ab') {
                $('.section-pic').fadeIn();
                $('.section-form-footer').fadeIn();
                $('.section-form-ab').fadeIn();
                // Move classification dropdown into Anggota Biasa section
                $('.section-form-ab .section-company_name').after(sectionClassification.fadeIn());
                
                // Enable relevant fields for "Data Penanggung Jawab"
                $('#pic_name, #pic_file_ktp, #pic_nik, #pic_file_npwp, #pic_npwp, #pic_file_passport_photo, #pic_position, #pic_address').prop('disabled', false);
                // Enable relevant fields for "Anggota Biasa" (company data)
                // Note: IDs remain the same, but names in HTML are 'company_...'
                $('#nib, #company_type, #company_name, #file_nib, #file_sk_kemenkumham, #sbu, #file_npwp, #npwp, #address, #province, #city, #postal_code, #kbli, #business_category').prop('disabled', false);
                
                // Update label and dynamically add options for "Klasifikasi"
                $('label[for="classification"]').text("Klasifikasi");
                $('select#classification').append(`
                    <option value="Usaha PMA">Usaha PMA</option>
                    <option value="Usaha Besar/PMDN">Usaha Besar/PMDN</option>
                    <option value="Usaha Menengah">Usaha Menengah</option>
                    <option value="Usaha Kecil">Usaha Kecil</option>
                    <option value="Usaha Ultra Mikro">Usaha Ultra Mikro</option>
                `).prop('disabled', false); // Enable classification
                
                // Set required for files specific to Anggota Biasa
                $('#file_nib').attr('required', true);
                $('#file_sk_kemenkumham').attr('required', true);
                $('#file_npwp').attr('required', true);

            } else if (membershipType === 'um') {
                $('.section-pic').fadeIn();
                $('.section-form-footer').fadeIn();
                $('.section-form-um').fadeIn();
                // For "Usaha Mikro", classification is not needed, so hide it
                sectionClassification.hide();
                
                // Enable relevant fields for "Data Penanggung Jawab"
                $('#pic_name, #pic_file_ktp, #pic_nik, #pic_file_npwp, #pic_npwp, #pic_file_passport_photo, #pic_position, #pic_address').prop('disabled', false);
                // Enable relevant fields for "Usaha Mikro"
                $('#um_name, #um_address, #um_province, #um_city, #um_postal_code, #um_kbli, #um_business_category').prop('disabled', false);

            } else if (membershipType === 'alb' || membershipType === 'albt') {
                $('.section-pic').fadeIn();
                $('.section-form-footer').fadeIn();
                $('.section-form-alb').fadeIn(); // This section handles both ALB and ALBT
                
                // Move classification dropdown back up for ALB/ALBT
                $('.primary-form-group.section-membership_type').after(sectionClassification.fadeIn());
                
                // Enable relevant fields for "Data Penanggung Jawab"
                $('#pic_name, #pic_file_ktp, #pic_nik, #pic_file_npwp, #pic_npwp, #pic_file_passport_photo, #pic_position, #pic_address').prop('disabled', false);
                // Enable relevant fields for "Anggota Luar Biasa/Pusat"
                $('#name_gm_alb, #phone_gm_alb, #alb_name, #short_name, #file_npwp_alb, #npwp_alb, #alb_address, #alb_province, #alb_city, #alb_postal_code, #file_surat_permohonan_alb, #file_adart, #file_akta_pendirian, #file_sk_kemenkumham_alb, #file_hasil_munas, #file_kode_etik, #file_logo_alb, #file_sk_pengurus_asosiasi, #file_daftar_anggota, #number_of_members, #phone_staff_asosiasi, #name_staff_asosiasi, #email_staff_asosiasi').prop('disabled', false);
                // file_daftar_dpd required status is handled in classification change

                // Update label and dynamically add options for "Tingkatan Organisasi"
                $('label[for="classification"]').text("Tingkatan Organisasi");
                $('select#classification').append(`
                    <option value="Pusat Tidak Memiliki Cabang">Tingkat Pusat Tidak Memiliki Cabang</option>
                    <option value="Pusat">Tingkat Pusat</option>
                    <option value="Provinsi">Tingkat Provinsi</option>
                    <option value="Kabupaten/Kota">Tingkat Kabupaten/Kota</option>
                `).prop('disabled', false); // Enable classification
            }

            // Attempt to set old classification value if present and valid for the current membership type
            const currentOldClassification = "{{ old('classification') }}";
            if (currentOldClassification) {
                if ($(`#classification option[value="${currentOldClassification}"]`).length > 0) {
                    $('#classification').val(currentOldClassification);
                } else {
                    $('#classification').val(''); // Reset if old value doesn't match current type's options
                }
            } else {
                $('#classification').val(''); // Ensure it's empty if no old value
            }
            
            // Trigger change on classification if it now has a value (either old or newly set)
            // This will populate the duration_qty dropdown
            if ($('#classification').val()) {
                $('#classification').trigger('change');
            } else {
                 // Hide duration field if classification is not selected
                durationField.hide().find('select').prop('disabled', true);
            }

            // Manually re-trigger province change for all relevant province dropdowns
            // This ensures city dropdowns are populated based on old values
            $('.province').each(function() {
                const oldProvinceVal = $(this).val();
                if (oldProvinceVal) {
                    $(this).trigger('change');
                }
            });
        });

        // --- Classification Change Handler ---
        $('#classification').on('change', function() {
            classification = $(this).val();
            let durationType = null;
            let durationField = $('.primary-form-group.duration-field');
            
            // Determine durationType based on the selected membershipType
            if (membershipType === 'ab' || membershipType === 'alb' || membershipType === 'albt') {
                // Assuming all 'ab', 'alb', 'albt' classifications have a 3-year duration
                durationType = 3; 
            }
            // If membershipType is 'um', duration field is not needed and remains hidden/disabled

            let durations = "<option value=''>Pilih Durasi Keanggotaan</option>";
            if (durationType) {
                for (let i = 1; i < 6; i++) {
                    durations += `<option value="${i}" ${"{{ old('duration_qty') }}" == String(i) ? 'selected' : ''}>${i} ${getDurationType(durationType)}</option>`;
                }
                $('#duration_qty').html(durations).prop('disabled', false);
                durationField.fadeIn(); // Show duration field
            } else {
                $('#duration_qty').html(`<option value="">Pilih Durasi Keanggotaan</option>`).prop('disabled', true);
                durationField.hide(); // Hide duration field if not applicable
            }

            // Set required for file_daftar_dpd based on classification for ALB/ALBT
            const fileDpdInput = $('#file_daftar_dpd');
            const fileDpdLabel = $('label[for="file_daftar_dpd"]');
            if ((membershipType === 'alb' || membershipType === 'albt') && classification !== 'Pusat Tidak Memiliki Cabang') {
                fileDpdLabel.addClass('required');
                fileDpdInput.attr('required', true);
            } else {
                fileDpdLabel.removeClass('required');
                fileDpdInput.removeAttr('required');
            }
        });

        // --- Province Change Handler ---
        $('.province').on('change', function() {
            const provinceId = $(this).val();
            let sectionId = $(this).attr('id');
            let sectionPrefix = ''; // Default for main form (ab)

            // Determine prefix for city dropdown based on province ID
            if (sectionId === 'province') { // This is the 'ab' section province
                sectionPrefix = ''; // No prefix for company_city, company_province
            } else if (sectionId.startsWith('um_')) {
                sectionPrefix = 'um_';
            } else if (sectionId.startsWith('alb_')) {
                sectionPrefix = 'alb_';
            }

            let citySelect = $(`#${sectionPrefix}city`);
            let oldCityValue = ''; // Default empty

            // Set oldCityValue based on the correct section's old data
            if (sectionPrefix === '') { // Refers to 'ab' form
                oldCityValue = "{{ old('company_city') }}"; // Changed to company_city
            } else if (sectionPrefix === 'um_') {
                oldCityValue = "{{ old('um_city') }}";
            } else if (sectionPrefix === 'alb_') {
                oldCityValue = "{{ old('alb_city') }}";
            }
            
            if (provinceId) {
                $.ajax({
                    url: `{{ url('/cities') }}?province_id=${provinceId}`,
                    method: 'GET',
                    success: (response) => {
                        let data = response.data;
                        let option = "<option value=''>Pilih Kabupaten/Kota</option>";

                        data.forEach(city => {
                            const isSelected = (oldCityValue && oldCityValue == city.id) ? 'selected' : '';
                            option += `<option value="${city.id}" ${isSelected}>${(city.name.includes('KOTA') ? '' : 'KAB. ')}${city.name}</option>`;
                        });

                        citySelect.html(option).prop('disabled', false);
                    },
                    error: (response) => {
                        toastr.error(response.responseJSON.message || "Gagal mengambil data kota.");
                        console.error("Error fetching cities:", response);
                    }
                });
            } else {
                citySelect.html("<option value=''>Pilih Kabupaten/Kota</option>").prop('disabled', true);
            }
        });

        // --- Submit Button Handler ---
        $('.btnSubmit').on('click', function(e) {
            e.preventDefault(); // Prevent default form submission

            const form = $(this).parents('form');
            const btnSubmit = $(this);
            const btnSubmitText = $(this).text();
            
            // Clear previous validation messages and styles
            form.find('.is-invalid').removeClass('is-invalid');
            form.find('.invalid-feedback').text('');
            $('.alert-danger').remove(); // Remove general error alerts

            // Manually validate all enabled required fields on the client-side
            let allFieldsValid = true;
            form.find(':input:enabled[required]').each(function() {
                if ($(this).attr('type') === 'checkbox') {
                    if (!$(this).is(':checked')) {
                        $(this).addClass('is-invalid');
                        $(`#${$(this).attr('id')}-error`).text('Anda harus menyetujui persyaratan ini.');
                        allFieldsValid = false;
                    } else {
                        $(this).removeClass('is-invalid');
                        $(`#${$(this).attr('id')}-error`).text('');
                    }
                } else if ($(this).attr('type') === 'file') {
                    if (!$(this)[0].files.length) {
                        $(this).addClass('is-invalid');
                        $(`#${$(this).attr('id')}-error`).text('File ini wajib diunggah.');
                        allFieldsValid = false;
                    } else {
                        $(this).removeClass('is-invalid');
                        $(`#${$(this).attr('id')}-error`).text('');
                    }
                } else { // For text, select, number inputs
                    if (!$(this).val()) {
                        $(this).addClass('is-invalid');
                        $(`#${$(this).attr('id')}-error`).text('Bidang ini wajib diisi.');
                        allFieldsValid = false;
                    } else {
                        $(this).removeClass('is-invalid');
                        $(`#${$(this).attr('id')}-error`).text('');
                    }
                }
            });

            if (!allFieldsValid) {
                // Add was-validated class to show Bootstrap's validation feedback styles
                form.addClass('was-validated');
                // Scroll to the first invalid field for better UX
                $('html, body').animate({
                    scrollTop: form.find('.is-invalid').first().offset().top - 100
                }, 500);
                toastr.error("Mohon lengkapi semua bidang yang wajib diisi.");
                return; // Stop submission if client-side validation fails
            }

            const formData = new FormData(form[0]);
            // Explicitly append values for key dropdowns, as their 'name' attributes are not standard
            // and might not be picked up consistently by FormData if their disabled state was briefly true.
            formData.append('membership_type', $('#membership_type').val() || '');
            formData.append('classification', $('#classification').val() || '');
            formData.append('duration_qty', $('#duration_qty').val() || '');

            $.ajax({
                url: form.attr('action'),
                dataType: 'json',
                type: 'POST',
                data: formData,
                contentType: false, // Required for FormData to send files correctly
                processData: false, // Required for FormData
                timeout: (3 * 60000), // Set timeout for 3 minutes for potentially large file uploads
                beforeSend: () => {
                    btnSubmit.text('Loading...').prop('disabled', true); // Disable button during submission
                },
                success: (response) => {
                    btnSubmit.text(btnSubmitText).prop('disabled', false); // Re-enable button
                    if (response.success) {
                        toastr.success(response.message || "Data berhasil disimpan!");
                        if (response.data && response.data.redirect) {
                            window.location.href = response.data.redirect; // Redirect on success
                        }
                    } else {
                        toastr.error(response.message || "Terjadi kesalahan saat menyimpan data!");
                        // Prepend a general error alert to the form
                        form.prepend(`<div class="alert alert-danger">${response.message || 'Data tidak valid.'}</div>`);
                        const errors = response.errors; // Get validation errors from server response
                        if (errors) {
                            $.each(errors, function(key, value) {
                                // Convert Laravel's dot notation (e.g., 'company_nib') or underscore (e.g., 'pic_name') to ID
                                let targetId = key.replace(/\./g, '_'); // Convert dot.notation to underscore_notation for IDs

                                // Attempt to find the element by its ID directly
                                let inputElement = $(`#${targetId}`);

                                // If not found directly, try alternative ID matching
                                if (inputElement.length === 0) {
                                    // Handle specific ID mappings if Laravel's key doesn't directly match frontend ID
                                    if (key === 'company_nib') inputElement = $('#nib');
                                    else if (key === 'company_npwp') inputElement = $('#npwp');
                                    else if (key === 'company_address') inputElement = $('#address');
                                    else if (key === 'company_province') inputElement = $('#province');
                                    else if (key === 'company_city') inputElement = $('#city');
                                    else if (key === 'company_postal_code') inputElement = $('#postal_code');
                                    else if (key === 'company_kbli') inputElement = $('#kbli');
                                    else if (key === 'company_business_category') inputElement = $('#business_category');
                                    else if (key === 'terms') inputElement = $('#terms'); // Ensure terms error is caught
                                    // Add more specific mappings here if needed for other mismatched field names
                                }
                                
                                // Apply invalid class and error message to the identified input element
                                if (inputElement.length > 0) {
                                    inputElement.addClass('is-invalid');
                                    // Append error message to the corresponding invalid-feedback div
                                    $(`#${inputElement.attr('id')}-error`).html(value[0]);
                                } else {
                                    console.warn(`Validation error for unknown field: ${key}. Message: ${value[0]}`);
                                }
                            });
                            // Add was-validated class to show Bootstrap's validation feedback styles
                            form.addClass('was-validated');
                            // Scroll to the first invalid field (only if validation errors exist)
                            $('html, body').animate({
                                scrollTop: form.find('.is-invalid').first().offset().top - 100
                            }, 500);
                        }
                    }
                },
                error: (response) => {
                    btnSubmit.text(btnSubmitText).prop('disabled', false); // Re-enable button on error
                    if (response.statusText === 'timeout') {
                        toastr.error("Request Timeout: Upload file mungkin terlalu besar atau koneksi lambat. Mohon coba lagi dengan koneksi yang stabil atau ukuran file yang lebih kecil.");
                    } else if (response.status === 419) { // HTTP status code for CSRF token mismatch
                        toastr.error("Sesi Anda telah berakhir. Mohon refresh halaman dan coba lagi.");
                        // Optionally reload the page to get a fresh CSRF token
                        setTimeout(() => window.location.reload(), 2000); 
                    } else if (response.responseJSON) {
                        toastr.error(response.responseJSON.message || "Terjadi kesalahan server yang tidak diketahui.");
                        form.prepend(`<div class="alert alert-danger">${response.responseJSON.message || 'Terjadi kesalahan server yang tidak diketahui.'}</div>`);
                        const errors = response.responseJSON.errors; // Get validation errors
                        if (errors) {
                            $.each(errors, function(key, value) {
                                let targetId = key.replace(/\./g, '_'); 
                                let inputElement = $(`#${targetId}`);

                                if (inputElement.length === 0) {
                                    if (key === 'company_nib') inputElement = $('#nib');
                                    else if (key === 'company_npwp') inputElement = $('#npwp');
                                    else if (key === 'company_address') inputElement = $('#address');
                                    else if (key === 'company_province') inputElement = $('#province');
                                    else if (key === 'company_city') inputElement = $('#city');
                                    else if (key === 'company_postal_code') inputElement = $('#postal_code');
                                    else if (key === 'company_kbli') inputElement = $('#kbli');
                                    else if (key === 'company_business_category') inputElement = $('#business_category');
                                    else if (key === 'terms') inputElement = $('#terms');
                                }

                                if (inputElement.length > 0) {
                                    inputElement.addClass('is-invalid');
                                    $(`#${inputElement.attr('id')}-error`).html(value[0]);
                                } else {
                                    console.warn(`Validation error for unknown field: ${key}. Message: ${value[0]}`);
                                }
                            });
                            form.addClass('was-validated');
                            $('html, body').animate({
                                scrollTop: form.find('.is-invalid').first().offset().top - 100
                            }, 500);
                        }
                    } else {
                        toastr.error("Terjadi kesalahan koneksi atau server tidak merespons. Mohon periksa koneksi internet Anda.");
                        form.prepend(`<div class="alert alert-danger">Terjadi kesalahan koneksi atau server tidak merespons.</div>`);
                    }
                }
            });
        });
    </script>
    <style>
        /* Styling dari desain asli yang mungkin belum ada di style.css utama */
    </style>
    <script>
        var currencySymbol = "Rp";
        var currencyPlacement = "before";
    </script>
</body>
</html>