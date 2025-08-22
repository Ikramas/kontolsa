<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Anggota - Kadin Indonesia</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css?v=2') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.responsive.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css?ver=1') }}" />
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
        --colorTwelve: #0fa958; /* Ini adalah warna Hijau */
        --colorTwelve-10: rgb(15 169 88 / 10%); /* Ini adalah background Hijau (10% opacity) */
        --color13: #f5b40a; /* Ini adalah warna Oranye */
        --color13-10: rgb(245 180 10 / 10%); /* Ini adalah background Oranye (10% opacity) */
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
                        <li>
                            <a href="{{ url('/companies') }}" class="d-flex align-items-center cg-10 ">
                                <div class="d-flex">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.4906 9.39822C20.4906 14.0906 16.6867 17.8945 11.9943 17.8945C7.30197 17.8945 3.49805 14.0906 3.49805 9.39822C3.49805 4.70585 7.30197 0.901924 11.9943 0.901924C16.6867 0.901924 20.4906 4.70585 20.4906 9.39822Z" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4.63477 13.5656L0.856444 20.1099L4.93902 19.016L6.03294 23.0985L9.3112 17.4204" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M19.3652 13.5656L23.1436 20.1099L19.061 19.016L17.9671 23.0985L14.6888 17.4204" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.9679 14.0017C16.6749 13.1815 16.0292 12.4568 15.1311 11.9399C14.2329 11.423 13.1324 11.1429 12.0003 11.1429C10.8682 11.1429 9.76768 11.423 8.86951 11.9399C7.97134 12.4568 7.32568 13.1815 7.03266 14.0017" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" />
                                        <circle cx="11.9972" cy="6" r="2.57143" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <span>Perusahaan</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ url('/members') }}" class="d-flex align-items-center cg-10 active">
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
                            <a href="{{ url('/profile') }}" class=" d-flex align-items-center cg-10">
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
                                 <h4 class="fs-15 fw-500 lh-18 text-1b1c17">{{ $user->name ?? 'Pengguna' }}</h4>
                             </div>
                         </button>
                         <ul class="dropdown-menu dropdownItem-one">
                             <li>
                                 <a class="d-flex align-items-center cg-8" href="{{ url('/profile') }}">
                                     <div class="d-flex">
                                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M19.7274 20.4471C19.2716 19.1713 18.2672 18.0439 16.8701 17.2399C15.4729 16.4358 13.7611 16 12 16C10.2389 16 8.52706 16.4358 7.12991 17.2399C5.73276 18.0439 4.72839 19.1713 4.27259 20.4471" stroke="#707070" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round"></path>
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
                 </div>
             </div>
         </div>
         <div class="p-30">
             <div class="d-flex flex-wrap justify-content-between align-items-center pb-16">
                 <h4 class="fs-24 fw-500 lh-34 text-black">Data Anggota</h4>
                 <button type="button" class="btn btn-primary py-10 px-26 border-0 bd-ra-12 fs-15 fw-500 lh-25" data-bs-toggle="modal" data-bs-target="#add-modal"><i class="fa fa-plus"></i> Tambah Anggota</button>
             </div>
             <div class="bg-white bd-half bd-c-ebedf0 bd-ra-25 p-30">
                 <div class="">
                     <table class="table table-striped zTable" id="member-table" width="100%">
                         <thead>
                             <tr>
                                 <th title="No" width="10">No</th>
                                 <th title="Nama">Nama</th>
                                 <th title="Nama Perusahaan">Nama Perusahaan</th>
                                 <th title="Tanggal Expired">Tanggal Expired</th>
                                 <th title="Status">Status</th>
                                 <th title="Aksi" width="60">Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             {{-- DataTables akan mengisi ini via AJAX --}}
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

         {{-- Modal Tambah Anggota --}}
         <div class="modal fade zModalTwo" id="add-modal" aria-hidden="true" tabindex="-1">
             <div class="modal-dialog modal-dialog-centered modal-lg">
                 <div class="modal-content zModalTwo-content">
                     <form class="ajax reset" action="{{ route('members.store') }}" method="post" data-handler="responseMember">
                         @csrf
                         <div class="modal-body zModalTwo-body model-lg">
                             <div class="d-flex justify-content-between align-items-center pb-30">
                                 <h4 class="fs-20 fw-500 lh-38 text-1b1c17">Tambah Anggota</h4>
                                 <div class="mClose">
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ asset('assets/images/icon/delete.svg') }}" alt="" /></button>
                                 </div>
                             </div>
                             <div class="primary-form-group mb-3">
                                 <div class="primary-form-group-wrap">
                                     <label for="name" class="form-label required">Nama</label>
                                     <input type="text" name="name" id="name" class="primary-form-control" value="" placeholder="Masukkan Nama" required>
                                     <div id="name-error" class="invalid-feedback"></div>
                                 </div>
                             </div>
                             <div class="primary-form-group mb-3">
                                 <div class="primary-form-group-wrap">
                                     <label for="email" class="form-label required">Email</label>
                                     <input type="email" name="email" id="email" class="primary-form-control" value="" placeholder="Masukkan Email" required>
                                     <div id="email-error" class="invalid-feedback"></div>
                                 </div>
                             </div>

                             {{-- FIELD BARU: Nama Perusahaan --}}
                             <div class="primary-form-group mb-3">
                                 <div class="primary-form-group-wrap">
                                     <label for="company_name" class="form-label required">Nama Perusahaan</label>
                                     <input type="text" name="company_name" id="company_name" class="primary-form-control" value="" placeholder="Masukkan Nama Perusahaan" required>
                                     <div id="company_name-error" class="invalid-feedback"></div>
                                 </div>
                             </div>

                             {{-- Field password untuk anggota baru --}}
                             <div class="primary-form-group mb-3">
                                 <div class="primary-form-group-wrap">
                                     <label for="password" class="form-label required">Password</label>
                                     <input type="password" name="password" id="password" class="primary-form-control" placeholder="Masukkan Password" required>
                                     <div id="password-error" class="invalid-feedback"></div>
                                 </div>
                             </div>
                             <div class="primary-form-group mb-3">
                                 <div class="primary-form-group-wrap">
                                     <label for="password_confirmation" class="form-label required">Konfirmasi Password</label>
                                     <input type="password" name="password_confirmation" id="password_confirmation" class="primary-form-control" placeholder="Konfirmasi Password" required>
                                     <div id="password_confirmation-error" class="invalid-feedback"></div>
                                 </div>
                             </div>
                             {{-- Hidden field untuk membership_type, default 'anggota' --}}
                             <input type="hidden" name="membership_type" value="anggota">
                         </div>
                         <div class="modal-footer">
                             <button type="submit" class="btn btn-primary py-10 px-26 bd-ra-12 fs-15 fw-500 lh-25 hover-bg-one">Submit</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
 <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('assets/js/plugins.js?ver=2') }}"></script>

 <script src="{{ asset('assets/js/dataTables.js') }}"></script>
 <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>

 <script src="{{ asset('assets/js/summernote/summernote-lite.min.js') }}"></script>
 <script src="{{ asset('assets/js/lc_select.min.js') }}"></script>
 <script src="{{ asset('assets/js/main.js?ver=0') }}"></script>
 <script src="{{ asset('assets/js/common.js?ver=0') }}"></script>

 <script type="text/javascript">
     // Pastikan variabel LaravelDataTables didefinisikan secara global
     window.LaravelDataTables = window.LaravelDataTables || {};

     document.addEventListener("DOMContentLoaded", function() {
         window.LaravelDataTables["member-table"] = $("#member-table").DataTable({
             "serverSide": true,
             "processing": true,
             "ajax": {
                 "url": "{{ route('members.data') }}",
                 "type": "GET",
                 "data": function(data) {
                     for (var i = 0, len = data.columns.length; i < len; i++) {
                         if (!data.columns[i].search.value) delete data.columns[i].search;
                         if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                         if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                         if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                     }
                     delete data.search.regex;
                 }
             },
             "columns": [{
                 "data": "DT_RowIndex",
                 "name": "DT_RowIndex",
                 "title": "No",
                 "orderable": false,
                 "searchable": false,
                 "width": 10
             }, {
                 "data": "name",
                 "name": "name",
                 "title": "Nama",
                 "orderable": true,
                 "searchable": true
             }, {
                 "data": "company_name",
                 "name": "company_name",
                 "title": "Nama Perusahaan",
                 "orderable": true,
                 "searchable": true
             }, {
                 "data": "expired_date",
                 "name": "expired_date",
                 "title": "Tanggal Expired",
                 "orderable": true,
                 "searchable": true
             }, {
                 "data": "membership_status",
                 "name": "membership_status",
                 "title": "Status",
                 "orderable": true,
                 "searchable": true
             }, {
                 "data": "action",
                 "name": "action",
                 "title": "Aksi",
                 "orderable": false,
                 "searchable": false,
                 "width": 60,
                 "className": "text-md-center"
             }],
             "responsive": true,
             "order": [
                 [0, "desc"]
             ],
             "buttons": [{
                 "extend": "excel"
             }, {
                 "extend": "csv"
             }, {
                 "extend": "pdf"
             }, {
                 "extend": "print"
             }, {
                 "extend": "reset"
             }, {
                 "extend": "reload"
             }],
             "language": {
                 "url": "{{ asset('assets/vendor/datatables/i18n/id.json') }}",
                 "paginate": {
                     "previous": "<i class=\"fa-solid fa-angles-left\"></i>",
                     "next": "<i class=\"fa-solid fa-angles-right\"></i>"
                 },
                 "searchPlaceholder": "Cari di sini",
                 "search": "<span class=\"searchIcon\"><i class=\"fa-solid fa-magnifying-glass\"></i></span>",
                 "lengthMenu": "Tampilkan _MENU_ entri"
             },
             "dom": "<\"tableTop\"<\"row align-items-center\"<\"col-sm-6\"<\"tableSearch float-start\"f>><\"col-sm-6\"<\"tableLengthInput float-end\"l>>>>tr<\"tableBottom\"<\"row align-items-center\"<\"col-sm-6\"<\"tableInfo\"i>><\"col-sm-6\"<\"tablePagi\"p>>>><\"clear\">",
             "layout": {
                 "topStart": "search",
                 "topEnd": "pageLength",
                 "bottomStart": "info",
                 "bottomEnd": "paging"
             },
             "pagingType": "simple_numbers"
         });
     });
 </script>
 <script>
     // Fungsi responseMember digunakan untuk menangani respons AJAX dari form penambahan anggota.
     // Dideklarasikan sebagai variabel global agar dapat diakses oleh atribut 'data-handler'.
     window.responseMember = (response) => {
         // Hapus pesan error sebelumnya dan kelas 'is-invalid'
         $('.invalid-feedback').text('');
         $('.is-invalid').removeClass('is-invalid');

         if (response.success) {
             toastr.success(response.message); // Tampilkan pesan sukses menggunakan Toastr
             $('.modal.show').modal('hide'); // Tutup modal yang sedang terbuka
             // Perbarui DataTables jika sudah terinisialisasi
             if (window.LaravelDataTables && window.LaravelDataTables['member-table']) {
                 window.LaravelDataTables['member-table'].draw();
             }
             $('form.reset')[0].reset(); // Reset form setelah sukses
         } else {
             // Tangani error validasi dari server (jika ada)
             if (response.errors) {
                 $.each(response.errors, function(key, value) {
                     $(`#${key}`).addClass('is-invalid'); // Tambahkan kelas invalid ke input
                     $(`#${key}-error`).text(value[0]); // Tampilkan pesan error di elemen feedback
                 });
             } else if (response.message) {
                 toastr.error(response.message); // Tampilkan pesan error umum
             }
         }
     };

     // Script untuk tombol Delete anggota
     $(document).on('click', '.btnDelete', function(e) {
         e.preventDefault();
         const deleteUrl = $(this).data('href'); // Ambil URL dari atribut data-href

         Swal.fire({
             title: "Anda yakin ingin menghapus?",
             text: "Anda tidak dapat mengembalikannya!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: "Ya, Hapus!",
             cancelButtonText: "Batal"
         }).then((result) => {
             if (result.isConfirmed) {
                 $.ajax({
                     type: "POST", // Menggunakan POST dengan _method: DELETE untuk Laravel
                     url: deleteUrl,
                     data: {
                         _token: $('meta[name="csrf-token"]').attr("content"),
                         _method: "DELETE", // Memberitahu Laravel untuk memperlakukan ini sebagai request DELETE
                     },
                     success: (response) => {
                         if (response.success) {
                             toastr.success(response.message);
                             // Refresh DataTables setelah penghapusan
                             if (window.LaravelDataTables && window.LaravelDataTables['member-table']) {
                                 window.LaravelDataTables['member-table'].draw();
                             }
                         } else {
                             toastr.error(response.message);
                         }
                     },
                     error: (error) => {
                         // Tangani error AJAX (misalnya, status kode 500)
                         toastr.error(error.responseJSON.message || 'Terjadi kesalahan saat menghapus.');
                     },
                 });
             }
         });
     });
 </script>
 <script>
     var currencySymbol = "Rp";
     var currencyPlacement = "before";
 </script>
</body>
</html>