<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Komunikasi Anggota - Kadin Indonesia</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?ver=1.0.2') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="{{ asset('assets/js/modernizr-3.11.2.min.js') }}"></script>

    <style>
        /* Your original :root variables from style.css */
        :root {
            --primary-color: #cdef84;
            --hover-color: #afd449;
            --bColor: #707070;
            --colorOne: #707070;
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
            --text-black: #1b1c17;
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
            --black: #000000;
            --black-5: rgb(0 0 0 / 5%);
            --black-10: rgb(0 0 0 / 10%);

            /* WhatsApp-like colors, overriding where needed for chat components */
            --whatsapp-primary: #075E54;
            --whatsapp-secondary: #128C7E;
            --whatsapp-tertiary: #25D366;
            --whatsapp-bubble-sent: #DCF8C6;
            --whatsapp-bubble-received: #FFFFFF;
            --whatsapp-chat-background: #E5DDD5; /* Base color for WhatsApp background */
            --whatsapp-para-color: #667781;
            --whatsapp-input-bg: #F0F0F0;
            --whatsapp-icon-color: #928795;

            /* New for Member List */
            --member-list-bg: #F8F8F8;
            --search-input-bg: #EFEFEF;
            --last-message-color: #667781;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-black);
            overflow-x: hidden;
        }

        .chat-container {
            display: flex;
            height: calc(100vh - 150px);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
            background-color: var(--white);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Member List Styling */
        .member-list {
            flex: 0 0 350px;
            border-right: 1px solid var(--border-color);
            overflow-y: auto;
            background-color: var(--member-list-bg);
            padding: 0;
            transition: transform 0.3s ease-in-out;
            z-index: 2;
        }
        
        .member-list-header {
            padding: 15px 20px;
            font-size: 18px;
            font-weight: 600;
            color: var(--text-black);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--white);
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .member-list-header .mobile-back-btn {
            display: none;
            margin-right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: var(--whatsapp-primary);
        }
        .member-list-header .search-icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            font-size: 18px;
            color: var(--whatsapp-icon-color);
            transition: color 0.2s ease;
        }
        .member-list-header .search-icon-btn:hover {
            color: var(--whatsapp-primary);
        }

        /* Search Input in Member List */
        .member-list-search {
            padding: 10px 20px;
            border-bottom: 1px solid var(--border-color);
            background-color: var(--white);
        }
        .member-list-search input {
            width: 100%;
            padding: 8px 15px;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            background-color: var(--search-input-bg);
            font-size: 14px;
            color: var(--text-black);
            transition: border-color 0.2s ease;
        }
        .member-list-search input::placeholder {
            color: var(--whatsapp-para-color);
        }
        .member-list-search input:focus {
            outline: none;
            border-color: var(--whatsapp-primary);
        }

        .member-list-items {
            padding: 0;
        }

        .member-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            position: relative;
        }

        .member-item:last-child {
            border-bottom: none;
        }

        .member-item:hover {
            background-color: var(--colorSeven);
        }
        .member-item.active {
            background-color: var(--colorTwo);
            box-shadow: inset 3px 0 0 var(--whatsapp-primary);
        }

        .member-item .avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: var(--light-gray);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--whatsapp-icon-color);
            font-size: 22px;
            flex-shrink: 0;
            overflow: hidden;
        }
        .member-item .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .member-item.active .avatar {
            background-color: var(--whatsapp-primary);
            color: var(--white);
        }

        .member-item-info {
            flex-grow: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .member-item-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2px;
        }

        .member-item h5 {
            font-size: 16px;
            font-weight: 500;
            color: var(--text-black);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 0;
            flex-grow: 1;
        }

        .member-item .last-message-time {
            font-size: 11px;
            color: var(--whatsapp-para-color);
            margin-left: 10px;
            flex-shrink: 0;
        }

        .member-item p {
            font-size: 13px;
            color: var(--last-message-color);
            margin-bottom: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .member-item .unread-count {
            background-color: var(--whatsapp-tertiary);
            color: var(--white);
            font-size: 10px;
            font-weight: 600;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            margin-left: 10px;
        }
        .member-item .unread-count:empty {
            display: none;
        }

        /* Chat Area Styling */
        .chat-area {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            background-color: var(--whatsapp-chat-background); /* Base color for wallpaper */
            background-image: url('https://user-images.githubusercontent.com/15075759/28719142-86dc0f70-73b1-11e7-911d-60d70fcded21.png'); /* WhatsApp pattern */
            background-size: auto; /* Default size for pattern */
            background-repeat: repeat; /* Repeat for wallpaper effect */
            background-position: center; /* Center the pattern */
        }

        .chat-header {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            background-color: var(--whatsapp-primary);
            color: var(--white);
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .chat-header .mobile-back-btn {
            display: none;
            margin-right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: var(--white);
        }

        #chat-header-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 0;
            flex-grow: 1;
        }

        .typing-indicator {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.8);
            height: 15px;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            margin-left: 10px;
        }
        .typing-indicator.show {
            opacity: 1;
        }

        .chat-messages {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            scroll-behavior: smooth;
        }
        /* Style for load more indicator */
        .load-more-indicator {
            text-align: center;
            font-size: 14px;
            color: var(--whatsapp-para-color);
            padding: 10px;
            cursor: pointer;
            transition: color 0.2s ease;
        }
        .load-more-indicator:hover {
            color: var(--whatsapp-primary);
        }
        .load-more-indicator.loading {
            cursor: default;
            color: #999;
        }


        .message-bubble {
            padding: 10px 12px;
            border-radius: 7px;
            max-width: 70%;
            word-wrap: break-word;
            font-size: 14px;
            line-height: 1.4;
            position: relative;
            margin-bottom: 8px;
            box-shadow: 0 1px 0.5px rgba(0, 0, 0, 0.13);
        }

        .message-bubble.sent {
            background-color: var(--whatsapp-bubble-sent);
            color: var(--text-black);
            align-self: flex-end;
            margin-left: auto;
            border-top-right-radius: 0;
        }

        .message-bubble.received {
            background-color: var(--whatsapp-bubble-received);
            color: var(--text-black);
            align-self: flex-start;
            margin-right: auto;
            border-top-left-radius: 0;
        }
        
        .message-info {
            font-size: 10px;
            color: var(--whatsapp-para-color);
            margin-top: 2px;
            text-align: right;
            padding-right: 5px;
            display: block;
            line-height: 1;
        }
        .message-bubble.received .message-info {
            text-align: left;
            padding-left: 5px;
        }

        .empty-chat {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            color: var(--whatsapp-para-color);
            font-size: 16px;
            text-align: center;
            line-height: 1.6;
            background-color: rgba(255,255,255,0.7);
            border-radius: 8px;
            padding: 20px;
        }
        .empty-chat i {
            font-size: 50px;
            margin-bottom: 15px;
            color: var(--whatsapp-icon-color);
        }

        /* Chat Input Styling */
        .chat-input {
            padding: 10px 15px;
            border-top: 1px solid var(--border-color);
            background-color: var(--whatsapp-input-bg);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .chat-input input {
            flex-grow: 1;
            border-radius: 20px;
            padding: 8px 15px;
            border: 1px solid var(--border-color);
            font-size: 14px;
            background-color: var(--white);
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .chat-input input:focus {
            outline: none;
            border-color: var(--whatsapp-primary);
            box-shadow: 0 0 0 2px rgba(7, 94, 84, 0.15);
        }

        .chat-input button {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--whatsapp-tertiary);
            color: var(--white);
            border: none;
            font-size: 18px;
            transition: background-color 0.2s ease-in-out, transform 0.2s ease-in-out;
            flex-shrink: 0;
        }
        .chat-input button:hover {
            background-color: var(--whatsapp-secondary);
            transform: translateY(-1px);
        }
        .chat-input button:active {
            transform: translateY(0);
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .chat-container {
                height: calc(100vh - 100px);
            }
            .zMain-wrap {
                padding-left: 0 !important;
            }
            .zSidebar {
                position: fixed;
                left: -240px;
                top: 0;
                bottom: 0;
                z-index: 1000; /* Ensure sidebar is on top of main content */
                transition: transform 0.3s ease-in-out;
                width: 240px;
            }
            .zSidebar.active {
                transform: translateX(240px);
            }
            .zSidebar-overlay {
                display: none;
            }
            .mobileMenu {
                display: block !important;
                margin-right: 15px;
            }
            .main-header .d-sm-block {
                display: none !important;
            }
            .main-header .cg-15 {
                gap: 10px;
            }
            .member-list-search {
                display: block;
            }
        }


        @media (max-width: 767px) {
            .chat-container {
                flex-direction: column;
                height: calc(100vh - 100px);
                border: none;
                border-radius: 0;
                box-shadow: none;
            }
            .p-30 {
                padding: 0 !important; /* Remove padding from outer div for full screen chat on mobile */
            }
            .chat-container {
                border-radius: 0;
            }

            .member-list {
                flex: none;
                width: 100%;
                height: 100%;
                position: absolute; /* Crucial: position absolute to overlay */
                top: 0;
                left: 0;
                transform: translateX(-100%);
                border-right: none;
                z-index: 2; /* Ensures member list is above chat area when active */
                background-color: var(--member-list-bg); /* Ensure background covers behind it */
            }
            .member-list.active {
                transform: translateX(0);
            }

            .member-list-header {
                padding: 15px !important;
                border-bottom: 1px solid var(--border-color);
            }
            .member-list-header .mobile-back-btn {
                display: inline-block;
                color: var(--text-black);
            }
            .member-list-header .search-icon-btn {
                display: none;
            }

            .member-list-search {
                display: block;
                padding: 10px 15px;
            }
            .member-list-search input {
                padding: 7px 12px;
                font-size: 13px;
            }

            .chat-area {
                flex: 1;
                width: 100%;
                min-height: 0;
                position: relative; /* Essential for z-index context */
                z-index: 1; /* Ensures chat area is below member list when active */
            }
            .chat-header {
                padding: 12px 15px;
            }
            .chat-header .mobile-back-btn {
                display: inline-block;
            }

            .chat-messages {
                padding: 15px;
            }
            .message-bubble {
                max-width: 90%;
                font-size: 13px;
            }
            .message-info {
                font-size: 9px;
            }

            .chat-input {
                padding: 8px 10px;
                gap: 5px;
            }
            .chat-input input {
                padding: 7px 12px;
                font-size: 13px;
            }
            .chat-input button {
                width: 36px;
                height: 36px;
                font-size: 16px;
            }
            .empty-chat {
                font-size: 14px;
                padding: 15px;
            }
            .empty-chat i {
                font-size: 40px;
            }
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
                        <li><a href="{{ url('/companies') }}" class="d-flex align-items-center cg-10 "><div class="d-flex"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.4906 9.39822C20.4906 14.0906 16.6867 17.8945 11.9943 17.8945C7.30197 17.8945 3.49805 14.0906 3.49805 9.39822C3.49805 4.70585 7.30197 0.901924 11.9943 0.901924C16.6867 0.901924 20.4906 4.70585 20.4906 9.39822Z" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M4.63477 13.5656L0.856444 20.1099L4.93902 19.016L6.03294 23.0985L9.3112 17.4204" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M19.3652 13.5656L23.1436 20.1099L19.061 19.016L17.9671 23.0985L14.6888 17.4204" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M16.9679 14.0017C16.6749 13.1815 16.0292 12.4568 15.1311 11.9399C14.2329 11.423 13.1324 11.1429 12.0003 11.1429C10.8682 11.1429 9.76768 11.423 8.86951 11.9399C7.97134 12.4568 7.32568 13.1815 7.03266 14.0017" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" /><circle cx="11.9972" cy="6" r="2.57143" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" /></svg></div><span>Perusahaan</span></a></li>
                        <li><a href="{{ url('/members') }}" class="d-flex align-items-center cg-10 "><div class="d-flex"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.4906 9.39822C20.4906 14.0906 16.6867 17.8945 11.9943 17.8945C7.30197 17.8945 3.49805 14.0906 3.49805 9.39822C3.49805 4.70585 7.30197 0.901924 11.9943 0.901924C16.6867 0.901924 20.4906 4.70585 20.4906 9.39822Z" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M4.63477 13.5656L0.856444 20.1099L4.93902 19.016L6.03294 23.0985L9.3112 17.4204" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M19.3652 13.5656L23.1436 20.1099L19.061 19.016L17.9671 23.0985L14.6888 17.4204" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><path d="M16.9679 14.0017C16.6749 13.1815 16.0292 12.4568 15.1311 11.9399C14.2329 11.423 13.1324 11.1429 12.0003 11.1429C10.8682 11.1429 9.76768 11.423 8.86951 11.9399C7.97134 12.4568 7.32568 13.1815 7.03266 14.0017" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" /><circle cx="11.9972" cy="6" r="2.57143" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" /></svg></div><span>Anggota</span></a></li>
                        <li><a href="{{ url('/transactions') }}" class="d-flex align-items-center cg-10"><div class="d-flex"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3.31836" y="6.94522" width="18" height="12" rx="2" stroke="white" stroke-opacity="0.7" stroke-width="1.5"></rect><path d="M5.31836 9.94522H8.31836" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round"></path><path d="M16.3184 15.9452H19.3184" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round"></path><circle cx="12.3184" cy="12.9452" r="2" stroke="white" stroke-opacity="0.7" stroke-width="1.5"></circle></svg></div><span class="">Daftar Transaksi</span></a></li>
                        <li class="active"><a href="{{ url('/chat') }}" class="d-flex align-items-center cg-10 active"><div class="d-flex"><i class="fa-solid fa-comments text-white" style="font-size: 24px;"></i></div><span class="">Komunikasi</span></a></li>
                        <li><a href="{{ url('/profile') }}" class=" d-flex align-items-center cg-10"><div class="d-flex"><svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.7274 21.3923C19.2716 20.1165 18.2672 18.9892 16.8701 18.1851C15.4729 17.381 13.7611 16.9452 12 16.9452C10.2389 16.9452 8.52706 17.381 7.12991 18.1851C5.73276 18.9892 4.72839 20.1165 4.27259 21.3923" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" /><circle cx="12" cy="8.94522" r="4" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" /></svg></div><span class="">Profil</span></a></li>
                        <li><a href="{{ url('/settings') }}" class=" d-flex align-items-center cg-10"><div class="d-flex"><svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.8074 6.62355L18.185 5.54346C17.6584 4.62954 16.4914 4.31426 15.5763 4.83866V4.83866C15.1406 5.09528 14.6208 5.16809 14.1314 5.04103C13.6421 4.91396 13.2233 4.59746 12.9676 4.16131C12.803 3.88409 12.7146 3.56833 12.7113 3.24598V3.24598C12.7261 2.72916 12.5311 2.22834 12.1708 1.85761C11.8104 1.48688 11.3153 1.2778 10.7982 1.27802H9.54423C9.0377 1.27801 8.55205 1.47985 8.19473 1.83888C7.83742 2.19791 7.63791 2.68453 7.64034 3.19106V3.19106C7.62533 4.23686 6.77321 5.07675 5.72730 5.07664C5.40494 5.07329 5.08919 4.98488 4.81197 4.82035V4.82035C3.89679 4.29595 2.72985 4.61123 2.20327 5.52516L1.53508 6.62355C1.00914 7.53633 1.32013 8.70255 2.23073 9.23225V9.23225C2.82263 9.57398 3.18726 10.2055 3.18726 10.889C3.18726 11.5725 2.82263 12.204 2.23073 12.5457V12.5457C1.32129 13.0719 1.00996 14.2353 1.53508 15.1453V15.1453L2.16666 16.2345C2.41338 16.6797 2.82734 17.0082 3.31693 17.1474C3.80652 17.2865 4.33137 17.2248 4.77535 16.976V16.976C5.21181 16.7213 5.73192 16.6515 6.22007 16.7821C6.70822 16.9128 7.12397 17.233 7.37490 17.6716C7.53943 17.9488 7.62784 18.2646 7.63119 18.5869V18.5869C7.63119 19.6435 8.48769 20.5 9.54423 20.5H10.7982C11.8512 20.5 12.7062 19.6491 12.7113 18.5961V18.5961C12.7088 18.088 12.9096 17.6 13.2689 17.2407C13.6282 16.8814 14.1162 16.6806 14.6243 16.6831C14.9459 16.6917 15.2604 16.7797 15.5397 16.9393V16.9393C16.4524 17.4653 17.6186 17.1543 18.1484 16.2437V18.1484L18.8074 15.1453C19.0625 14.7074 19.1325 14.1859 19.0019 13.6963C18.8714 13.2067 18.551 12.7893 18.1117 12.5366V12.5366C17.6725 12.2839 17.3521 11.8665 17.2215 11.3769C17.091 10.8872 17.161 10.3658 17.4161 9.9279C17.582 9.63827 17.8221 9.39814 18.1117 9.23225V9.23225C19.0169 8.70283 19.3271 7.54343 18.8074 6.63271V6.63271V6.62355Z" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /><circle cx="10.1752" cy="10.889" r="2.63616" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg></div><span class="">Pengaturan</span></a></li>
                        <li><a href="{{ url('/guide') }}" class="d-flex align-items-center cg-10"><div class="d-flex"><svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.5 6L10 1L1.5 6V16L10 21L18.5 16V6Z" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linejoin="round" /><path d="M6 8.49902L9.9965 11L13.9975 8.49902M10 11V15.5" stroke="white" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg></div><span class="">Panduan</span></a></li>
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
                        <h4 class="fs-24 fw-500 lh-34 text-black">Komunikasi Anggota</h4>
                    </div>
                    <div class="right d-flex justify-content-end align-items-center cg-15">
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
                                                <path d="M19.7274 20.4471C19.2716 19.1713 18.2672 18.0439 16.8701 17.2399C15.4729 16.4358 13.7611 16 12 16C10.2389 16 8.52706 16.4358 7.12991 18.1851C5.73276 18.9892 4.72839 19.1713 4.27259 20.4471" stroke="#707070" stroke-opacity="0.7" stroke-width="1.5" stroke-linecap="round"></path>
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
                <div class="p-30">
                    <div class="chat-container">
                        <div class="member-list" id="memberList">
                            <div class="member-list-header">
                                <i class="fa-solid fa-arrow-left mobile-back-btn" id="backToChatFromMemberList"></i>
                                <h5>Daftar Anggota</h5>
                                <button class="search-icon-btn" type="button"><i class="fa-solid fa-search"></i></button>
                            </div>
                            <div class="member-list-search">
                                <input type="text" id="memberSearchInput" placeholder="Cari anggota..." />
                            </div>
                            <div id="member-list-items" class="member-list-items">
                                @foreach($members as $member)
                                    {{-- Menggunakan data-uuid untuk user yang akan menjadi pengenal publik di frontend --}}
                                    <div class="member-item" data-uuid="{{ $member->uuid }}" data-name="{{ $member->name }}" data-internal-id="{{ $member->id }}">
                                        <div class="avatar">
                                            @if($member->profile_picture)
                                                <img src="{{ asset('storage/' . $member->profile_picture) }}" alt="{{ $member->name }}">
                                            @else
                                                <i class="fa-solid fa-user"></i>
                                            @endif
                                        </div>
                                        <div class="member-item-info">
                                            <div class="member-item-top">
                                                <h5>{{ $member->name }}</h5>
                                                <span class="last-message-time"></span> {{-- last message time placeholder --}}
                                            </div>
                                            <p>{{ $member->company->company_name ?? 'N/A' }}</p>
                                        </div>
                                        <span class="unread-count"></span> {{-- unread count placeholder --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="chat-area" id="chatArea">
                            <div class="chat-header">
                                <i class="fa-solid fa-arrow-left mobile-back-btn" id="backToMemberList"></i>
                                <h5 id="chat-header-name">Pilih anggota untuk memulai chat</h5>
                                <div id="typing-indicator" class="typing-indicator"></div>
                            </div>
                            <div class="chat-messages" id="chat-messages">
                                <div class="empty-chat">
                                    <i class="fa-solid fa-comments"></i>
                                    <span>Pilih anggota di sebelah kiri untuk melihat pesan.</span>
                                </div>
                            </div>
                            <div class="chat-input" style="display: none;">
                                <input type="text" id="message-input" placeholder="Ketik pesan..." />
                                <button class="btn btn-primary" id="send-message-btn"><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    @vite(['resources/js/app.js']) 

    <script>
        $(document).ready(function() {
            console.log('window.Echo object (inside ready):', window.Echo); 

            // PERBAIKAN SYNTAX ERROR: Gunakan parseInt dan pastikan Auth::id() selalu numerik
            const loggedInUserId = parseInt('{{ Auth::id() ?? 0 }}'); // Mengambil ID internal user yang sedang login
            
            // activeChatUserUUID akan menyimpan UUID publik dari user yang sedang diajak chat (AMAN)
            let activeChatUserUUID = null; 
            let activeChatUserName = null;
            // Kita juga perlu menyimpan ID internal user yang sedang aktif chat untuk Echo channel (jika backend masih pakai ID internal)
            let activeChatUserInternalId = null;

            const chatMessagesContainer = $('#chat-messages');
            const chatInputArea = $('.chat-input');
            const messageInput = $('#message-input');
            const sendMessageBtn = $('#send-message-btn');
            const typingIndicator = $('#typing-indicator');
            const memberList = $('#memberList');
            const chatArea = $('#chatArea');
            const memberSearchInput = $('#memberSearchInput');
            const loadMoreIndicatorHtml = '<div class="load-more-indicator">Muat pesan lebih lama</div>';

            let typingTimeout = null;
            let EchoChannel = null;

            let currentPage = 1; 
            let hasMorePages = true; 
            let isLoadingMessages = false; 
            let initialScrollDone = false; 

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /**
             * Fetches messages for a given user.
             * @param {string} userUUID - UUID publik dari user yang sedang diajak chat (AMAN).
             */
            function fetchMessages(userUUID, page = 1) {
                if (isLoadingMessages) return; 
                isLoadingMessages = true;

                if (page === 1) {
                    chatMessagesContainer.empty();
                    chatMessagesContainer.append('<div class="empty-chat"><i class="fa-solid fa-comments"></i><span>Memuat pesan...</span></div>');
                    initialScrollDone = false; 
                } else {
                    chatMessagesContainer.find('.load-more-indicator').text('Memuat pesan...').addClass('loading');
                }

                // URL sekarang menggunakan userUUID (AMAN!)
                $.ajax({
                    url: `/chat/messages/${userUUID}?page=${page}`, 
                    method: 'GET',
                    success: function(response) {
                        isLoadingMessages = false;
                        
                        if (page === 1) {
                            chatMessagesContainer.empty(); 
                            if (response.messages.length === 0) {
                                chatMessagesContainer.html('<div class="empty-chat"><i class="fa-solid fa-comments"></i><span>Belum ada pesan dalam obrolan ini.</span></div>');
                                hasMorePages = false; 
                            } else {
                                response.messages.forEach(msg => {
                                    // Setiap 'msg' dari backend akan memiliki properti 'uuid_chat'
                                    appendMessageToChat(msg, false); 
                                });

                                if (response.has_more_pages) {
                                    chatMessagesContainer.prepend(loadMoreIndicatorHtml); 
                                    chatMessagesContainer.find('.load-more-indicator').show(); 
                                } else {
                                    chatMessagesContainer.find('.load-more-indicator').hide();
                                }
                                
                                if (!initialScrollDone) {
                                    scrollToBottom(); 
                                    initialScrollDone = true;
                                }
                            }
                        } else { // Loading older messages
                            chatMessagesContainer.find('.load-more-indicator').text('Muat pesan lebih lama').removeClass('loading');
                            const currentScrollHeight = chatMessagesContainer[0].scrollHeight;
                            const currentScrollTop = chatMessagesContainer[0].scrollTop;

                            response.messages.forEach(msg => {
                                appendMessageToChat(msg, true); 
                            });

                            const newScrollHeight = chatMessagesContainer[0].scrollHeight;
                            chatMessagesContainer.scrollTop(newScrollHeight - currentScrollHeight + currentScrollTop);

                            if (!response.has_more_pages) {
                                chatMessagesContainer.find('.load-more-indicator').hide();
                            }
                        }
                        currentPage = response.current_page;
                        hasMorePages = response.has_more_pages;
                    },
                    error: function(xhr) {
                        isLoadingMessages = false;
                        chatMessagesContainer.find('.load-more-indicator').text('Gagal memuat. Klik untuk coba lagi.').removeClass('loading');
                        toastr.error('Gagal memuat pesan.');
                        console.error('Error fetching messages:', xhr.responseText);
                    }
                });
            }

            /**
             * Appends or prepends a message bubble to the chat container.
             * @param {object} msg - The message object. Ini sekarang akan punya msg.uuid_chat
             * @param {boolean} prepend - If true, prepend the message; otherwise, append.
             */
            function appendMessageToChat(msg, prepend = false) {
                // Perhatian: msg.sender_id dan msg.receiver_id masih ID internal dari backend
                // loggedInUserId juga ID internal
                const isSent = msg.sender_id === loggedInUserId;
                const messageDate = new Date(msg.created_at);
                const messageTime = messageDate.toLocaleString('id-ID', { hour: '2-digit', minute: '2-digit' });
                // Menambahkan data-message-uuid ke elemen bubble pesan.
                // Ini adalah UUID khusus chat untuk identifikasi frontend
                const messageText = `
                    <div class="message-bubble ${isSent ? 'sent' : 'received'}" data-message-uuid="${msg.uuid_chat}">
                        ${msg.message}
                        <div class="message-info">${messageTime}&nbsp;</div>
                    </div>
                `;
                const messageElement = $(`<div class="d-flex flex-column ${isSent ? 'align-items-end' : 'align-items-start'}"></div>`).html(messageText);

                if (prepend) {
                    chatMessagesContainer.find('.load-more-indicator').after(messageElement);
                } else {
                    chatMessagesContainer.append(messageElement);
                }
            }

            function scrollToBottom() {
                chatMessagesContainer.scrollTop(chatMessagesContainer[0].scrollHeight);
            }

            function showChatArea() {
                if ($(window).width() <= 767) {
                    memberList.removeClass('active');
                    chatArea.show();
                    $('.zSidebar').removeClass('active'); 
                }
            }

            function showMemberList() {
                if ($(window).width() <= 767) {
                    memberList.addClass('active');
                    chatArea.hide();
                    activeChatUserUUID = null; // Reset UUID user yang aktif
                    activeChatUserInternalId = null; // Reset internal ID user aktif
                    $('#chat-header-name').text('Pilih anggota untuk memulai chat');
                    chatInputArea.hide();
                    typingIndicator.removeClass('show').text('');
                    if (EchoChannel) {
                        // Echo channel masih memerlukan ID internal user
                        window.Echo.leave(`personal-chat.${activeChatUserInternalId}`); 
                        EchoChannel = null;
                        console.log(`Left channel: personal-chat.${activeChatUserInternalId}`);
                    }
                    chatMessagesContainer.find('.load-more-indicator').hide(); 
                }
            }

            $('.member-item').on('click', function() {
                $('.member-item').removeClass('active');
                $(this).addClass('active');

                // Mengambil UUID publik user dari data-attribute member list (AMAN)
                const newActiveChatUserUUID = $(this).data('uuid'); 
                const newActiveChatUserName = $(this).data('name');
                // Mengambil ID internal user untuk Broadcast Channel (jika backend masih pakai ID internal)
                const newActiveChatUserInternalId = $(this).data('internal-id');

                if (EchoChannel) {
                    // Gunakan ID internal user untuk meninggalkan Echo channel
                    window.Echo.leave(`personal-chat.${activeChatUserInternalId}`); 
                    console.log(`Left channel: personal-chat.${activeChatUserInternalId}`);
                }
                typingIndicator.removeClass('show').text('');
                clearTimeout(typingTimeout);

                activeChatUserUUID = newActiveChatUserUUID; // Set UUID publik
                activeChatUserName = newActiveChatUserName;
                activeChatUserInternalId = newActiveChatUserInternalId; // Set ID internal

                $('#chat-header-name').text(activeChatUserName);
                chatInputArea.show();
                messageInput.val('');
                
                currentPage = 1; 
                hasMorePages = true; 
                // Mengirim UUID publik user ke fetchMessages (AMAN)
                fetchMessages(activeChatUserUUID, currentPage); 

                if (window.Echo) { 
                    // Gunakan ID internal user untuk subscribe ke Echo channel
                    // Jika Anda ingin menggunakan UUID publik di channel broadcast,
                    // Anda harus mengubah Event Broadcast di backend (MessageSent.php)
                    // dan `config/broadcasting.php` untuk menggunakan UUID user.
                    EchoChannel = window.Echo.private(`personal-chat.${activeChatUserInternalId}`);
                    console.log(`Subscribed to channel: personal-chat.${activeChatUserInternalId}`);

                    EchoChannel
                        .listenForWhisper('typing', (e) => {
                            // Cek e.senderId (internal ID) dan e.receiverId (internal ID)
                            // Jika Event Whispering Anda sudah diubah untuk mengirim public_id,
                            // maka Anda bisa cek `e.senderUUID`
                            if (e.senderId === activeChatUserInternalId && e.receiverId === loggedInUserId) {
                                typingIndicator.text(`${activeChatUserName} sedang mengetik...`).addClass('show');
                                clearTimeout(typingTimeout);
                                typingTimeout = setTimeout(() => {
                                    typingIndicator.removeClass('show').text('');
                                }, 3000);
                            }
                        })
                        .listenForWhisper('stopped-typing', (e) => {
                            if (e.senderId === activeChatUserInternalId && e.receiverId === loggedInUserId) {
                                clearTimeout(typingTimeout);
                                typingIndicator.removeClass('show').text('');
                            }
                        });

                    EchoChannel.listen('.message.sent', (e) => {
                        // Event Broadcast harus mengirim public_id user yang terlibat
                        // agar frontend bisa mengecek tanpa ID internal.
                        // Saat ini, kita asumsikan e.message.sender_id dan e.message.receiver_id adalah ID internal.
                        if (e.message.sender_id === activeChatUserInternalId && e.message.receiver_id === loggedInUserId) {
                            appendMessageToChat(e.message, false); 
                            typingIndicator.removeClass('show').text('');
                            scrollToBottom(); 
                        }
                    });
                } else {
                    console.error("Laravel Echo is not initialized. Real-time features will not work.");
                    toastr.error("Fitur real-time tidak aktif. Silakan refresh halaman atau hubungi administrator.");
                }

                showChatArea();
            });

            sendMessageBtn.on('click', function() {
                const message = messageInput.val().trim();
                // Mengirim UUID publik user penerima ke backend (AMAN)
                if (message === '' || !activeChatUserUUID) {
                    return;
                }

                if (EchoChannel) {
                    // Whisper event untuk typing masih menggunakan ID internal jika backend/Echo tidak diubah
                    EchoChannel.whisper('stopped-typing', {
                        senderId: loggedInUserId,
                        receiverId: activeChatUserInternalId // Ini adalah ID internal user yang sedang chat
                    });
                }

                $.ajax({
                    url: "{{ route('chat.send') }}",
                    method: 'POST',
                    data: {
                        // Mengirim UUID publik user penerima ke backend (AMAN)
                        'receiver_public_id': activeChatUserUUID, 
                        'message': message,
                    },
                    success: function(response) {
                        if (response.success) {
                            appendMessageToChat(response.message, false); 
                            messageInput.val('');
                            scrollToBottom(); 
                        } else {
                            toastr.error(response.message || 'Gagal mengirim pesan.');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Terjadi kesalahan saat mengirim pesan.');
                        console.error('Error sending message:', xhr.responseText);
                    }
                });
            });

            messageInput.on('keypress', function(e) {
                if (e.which === 13) {
                    e.preventDefault();
                    sendMessageBtn.click();
                }
            });

            messageInput.on('input', function() {
                if (!activeChatUserUUID || !EchoChannel) return;

                // Whisper event untuk typing masih menggunakan ID internal jika backend/Echo tidak diubah
                EchoChannel.whisper('typing', {
                    senderId: loggedInUserId,
                    receiverId: activeChatUserInternalId 
                });

                clearTimeout(typingTimeout);
                typingTimeout = setTimeout(() => {
                    if (EchoChannel) {
                        EchoChannel.whisper('stopped-typing', {
                            senderId: loggedInUserId,
                            receiverId: activeChatUserInternalId 
                        });
                    }
                }, 1000);
            });

            if (window.Echo) {
                // Channel utama yang didengarkan oleh loggedInUser,
                // ini masih berdasarkan ID internal loggedInUserId.
                // Jika ingin menggunakan public_id, ini juga perlu diubah di backend (Event/Broadcasting).
                window.Echo.private(`personal-chat.${loggedInUserId}`)
                    .listen('.message.sent', (e) => {
                        // Pesan masuk untuk loggedInUser.
                        // Jika pengirim pesan BUKAN user yang sedang aktif chat (berdasarkan internal ID)
                        // Maka tampilkan notifikasi toastr.
                        if (e.message.sender_id !== activeChatUserInternalId && e.message.receiver_id === loggedInUserId) {
                            toastr.info(`Pesan baru dari ${e.message.sender_name}: ${e.message.message.substring(0, 30)}...`);
                        }
                    });
            }

            chatMessagesContainer.on('scroll', function() {
                if (chatMessagesContainer.scrollTop() === 0 && hasMorePages && !isLoadingMessages && activeChatUserUUID) {
                    currentPage++;
                    fetchMessages(activeChatUserUUID, currentPage); 
                }
            });

            chatMessagesContainer.on('click', '.load-more-indicator', function() {
                if (!isLoadingMessages && hasMorePages && activeChatUserUUID) {
                    currentPage++;
                    fetchMessages(activeChatUserUUID, currentPage);
                }
            });

            memberSearchInput.on('keyup', function() {
                const searchTerm = $(this).val().toLowerCase();
                $('#member-list-items .member-item').each(function() {
                    const memberName = $(this).data('name').toLowerCase();
                    const companyName = $(this).find('p').text().toLowerCase();
                    if (memberName.includes(searchTerm) || companyName.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            $('#backToMemberList').on('click', showMemberList);
            $('#backToChatFromMemberList').on('click', showChatArea);

            if ($(window).width() <= 767) {
                chatInputArea.hide();
                chatArea.hide();
                memberList.addClass('active'); 
            } else {
                chatInputArea.hide(); 
                memberList.removeClass('active');
                chatArea.show();
            }

            $(window).resize(function() {
                if ($(window).width() > 767) {
                    memberList.removeClass('active');
                    chatArea.show();
                    if (activeChatUserUUID) { // Cek public UUID
                        chatInputArea.show();
                    } else {
                        chatInputArea.hide();
                    }
                    $('.zSidebar').removeClass('active');
                } else {
                    if (!activeChatUserUUID) { // Cek public UUID
                        showMemberList();
                    } else {
                        showChatArea();
                    }
                }
            });
        });
    </script>
</body>
</html>