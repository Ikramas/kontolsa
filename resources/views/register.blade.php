<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Register - Kadin Indonesia</title>
    {{-- Dynamic CSRF Token for AJAX requests --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- Favicon assets --}}
    <link rel="icon" href="{{ asset('assets/uploads/Setting/1451727254638.png') }}" type="image/png" sizes="16x16">
    <link rel="shortcut icon" href="{{ asset('assets/uploads/Setting/1451727254638.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/uploads/Setting/1451727254638.png') }}">

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    
    {{-- Core CSS files --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css?v=1') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/scss/style.css?ver=0') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/summernote/summernote-lite.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?ver=1.0.2') }}">
    {{-- Toastr CSS for notifications --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 
    
    {{-- Modernizr for feature detection --}}
    <script src="{{ asset('assets/js/modernizr-3.11.2.min.js') }}"></script>
    
    {{-- Custom inline styles from original template --}}
    <style>
        :root {
            --primary-color: #cdef84;        --black-color: #121421;        --text-black: #1b1c17;        --para-color: #707070;        --hover-color: #afd449;        --black: #000000;        --colorOne: #707070;        --bColor: #707070;        --sidebar-text-color: #e7e3e3;        --sidebar-bg-color: #1b1c17;        --sidebar-hover-text-color: #cdef84;        --colorTwo: #ebedf0;        --colorThree: #fafafa;        --colorFour: #71e3ba;        --colorFive: #ed84ef;        --colorSix: #84a2ef;        --colorSeven: #f4f4ef;        --colorEight: #ea4335;        --colorEight-10: rgb(234 67 53 / 10%);        --colorNine: #f9f9f9;        --colorTen: #fdedeb;        --colorEleven: #eaeaea;        --colorTwelve: #0fa958;        --colorTwelve-10: rgb(15 169 88 / 10%);        --color13: #f5b40a;        --color13-10: rgb(245 180 10 / 10%);        --color14: #ebe7d5;        --color15: #e6ef84;        --color16: #84dcef;        --color17: #eef0f2;        --color18: #b7bdc6;        --color19: #596680;        --color20: #f0f0f0;        --color21: #ed0006;        --color22: #8d84ef;        --color23: #d3d9e5;        --color24: #cdffc5;        --stroke-color: #e4e6eb;        --scroll-track: #efefef;        --scroll-thumb: #dadada;        --text-black-50: rgb(27 28 23 / 50%);        --green: #4cbf4c;        --red: #f02e17;        --bg-one: #ededed;        --border-color: #ededed;        --border-color-one: #e5e8ec;        --border-color-deep: #b0b0b0;        --body-bg: #fbf9f1;        --white: #ffffff;        --white-10: rgb(255 255 255 / 10%);        --white-32: rgb(255 255 255 / 32%);        --white-70: rgb(255 255 255 / 70%);        --black-5: rgb(0 0 0 / 5%);        --black-10: rgb(0 0 0 / 10%);
        }
        .register-wrap {
            align-items: flex-start;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .btnRegister {
            position: relative;
            border-radius: 10px;
            --bs-btn-padding-y: 7px;
            width: 320px;
            text-align: left;
        }
        .btnRegister.active {
            --bs-btn-active-color: #000;
            --bs-btn-active-bg: #fff;
            --bs-btn-active-border-color: #fff;
            background-color: var(--bs-btn-active-bg);
            color: var(--bs-btn-active-color);
            padding-left: 0;
        }
        .btnRegister::before {
            content: '';
            position: absolute;
            top: 5px;
            left: -18px;
            border-left: 8px solid #ccc;
            padding-left: 8px;
            width: 8px;
            height: 30px;
        }
    </style>
    
    {{-- reCAPTCHA v3 script (ensure site key is correctly configured in .env and config/services.php) --}}
    <script src="https://www.google.com/recaptcha/api.js?render=6LdPy6MrAAAAAKP1WVHhas9GChJptCb5s4HDSK2Q" async defer></script>
</head>
<body class="direction-ltr">
    <input type="hidden" id="lang_code" value="id">
    <div class="register-area">
        <div class="register-wrap">
            <div class="register-left section-bg-img" style="background-image: url({{ asset('assets/uploads/Setting/5921729738403.jpg') }})">
                <div class="register-left-wrap">
                    {{-- Content for the left side if any --}}
                </div>
            </div>
            <div class="register-right">
                <div class="primary-form">
                    {{-- Logo linking to home page --}}
                    <a class="d-inline-block mb-5 max-w-408" href="{{ url('/') }}">
                        <img src="{{ asset('assets/uploads/Setting/411729670913.png') }}" alt="Kadin Indonesia" />
                    </a>
                    <div id="section-form-register">
                        {{-- Title for the registration form --}}
                        <div id="form-register-title" class="pb-40 text-start">
                            <h2 class="fs-18 fw-600 lh-22 text-1b1c17 pb-3">Jadilah bagian dari anggota KADIN dan dapatkan manfaat untuk pengembangan bisnis Anda</h2>
                        </div>
                        
                        {{-- Server-side validation errors (from initial page load or non-AJAX submission) --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Registration Form --}}
                        <form action="{{ route('register') }}" method="post" id="form">
                            @csrf {{-- Laravel CSRF token for security --}}

                            <div class="primary-form-group mb-3">
                                <div class="primary-form-group-wrap">
                                    <label for="membership_type" class="form-label required">Tipe Keanggotaan</label>
                                    <select name="membership_type" id="membership_type" class="primary-form-control" required>
                                        <option value="">Pilih Tipe Keanggotaan</option>
                                        <option value="ab" {{ old('membership_type') == 'ab' ? 'selected' : '' }}>Anggota Biasa</option>
                                        <option value="alb" {{ old('membership_type') == 'alb' ? 'selected' : '' }}>Anggota Luar Biasa</option>
                                        <option value="um" {{ old('membership_type') == 'um' ? 'selected' : '' }}>Usaha Mikro</option>
                                        <option value="albt" {{ old('membership_type') == 'albt' ? 'selected' : '' }}>Anggota Luar Biasa Tingkat Pusat</option>
                                    </select>
                                    <div id="membership_type-error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="primary-form-group mb-3">
                                <div class="primary-form-group-wrap">
                                    <label for="name" class="form-label required">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="primary-form-control" value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap" required>
                                    <div id="name-error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="primary-form-group mb-3">
                                <div class="primary-form-group-wrap">
                                    <label for="mobile" class="form-label required">Nomor Handphone</label>
                                    <input type="text" name="mobile" id="mobile" class="primary-form-control mobile" value="{{ old('mobile') }}" placeholder="Masukkan Nomor Handphone" required>
                                    <div id="mobile-error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="primary-form-group mb-3">
                                <div class="primary-form-group-wrap">
                                    <label for="email" class="form-label required">Email</label>
                                    <input type="email" name="email" id="email" class="primary-form-control" value="{{ old('email') }}" placeholder="Masukkan Email" required>
                                    <div id="email-error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="primary-form-group mb-3">
                                <div class="primary-form-group-wrap">
                                    <label for="password" class="form-label required">Password</label>
                                    <input type="password" name="password" id="password" class="primary-form-control" placeholder="********" required>
                                    <button type="button" class="btn togglePassword">
                                        <i class="fas fa-eye-slash"></i> {{-- Font Awesome icon for eye slash --}}
                                    </button>
                                </div>
                                <div id="password-error" class="invalid-feedback"></div>
                            </div>
                            <div class="primary-form-group mb-4">
                                <div class="primary-form-group-wrap">
                                    <label for="confirm_password" class="form-label required">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="confirm_password" class="primary-form-control" placeholder="********" required>
                                    <button type="button" class="btn togglePassword">
                                        <i class="fas fa-eye-slash"></i> {{-- Font Awesome icon for eye slash --}}
                                    </button>
                                </div>
                                <div id="password_confirmation-error" class="invalid-feedback"></div>
                            </div>
                            
                            <p class="text-black mb-3">Dengan ini menyatakan data yang saya input adalah benar, jika terjadi kesalahan bukan merupakan tanggung jawab Kadin Indonesia</p>
                            <div class="form-check mb-3">
                                <input type="checkbox" name="terms" id="terms" class="form-check-input" value="1" required {{ old('terms') == '1' ? 'checked' : '' }}> 
                                <label class="form-check-label text-black" for="terms">Saya setujui akan aturan yang berlaku</label>
                            </div>
                            <div id="terms-error" class="invalid-feedback"></div>

                            {{-- reCAPTCHA v3 Hidden Input (requires site key in config) --}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                                    {{-- The reCAPTCHA token is generated by the script in `$(document).ready` --}}
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btnSubmit w-100 fs-15 fw-500 lh-25 p-13 bd-ra-12 mb-3">Buat Akun</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Core JavaScript files --}}
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js?ver=2') }}"></script>
    <script src="{{ asset('assets/js/dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/css/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/js/lc_select.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js?ver=0') }}"></script>
    <script src="{{ asset('assets/js/common.js?ver=0') }}"></script> {{-- Adjusted path based on typical Laravel asset structure --}}
    <script src="{{ asset('assets/vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    {{-- Toastr JS for notifications --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            // Global AJAX setup for CSRF Token: Essential for all AJAX POST requests in Laravel
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Input Masking for mobile number
            $('.mobile').mask('00000#'); // Example mask: Allows arbitrary number of digits after 5 initial ones

            // Toggle Password Visibility
            // Toggles between showing and hiding password characters for password and confirm_password fields
            $('.togglePassword').on('click', function() {
                const passwordField = $(this).siblings('input');
                const icon = $(this).find('i');
                
                icon.toggleClass('fa-eye fa-eye-slash'); // Changes eye icon
                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                } else {
                    passwordField.attr('type', 'password');
                }
            });

            // Client-side Password Validation (real-time feedback)
            $('#password').on('input', function() {
                const password = $(this).val();
                // Regex: at least 8 chars, 1 uppercase, 1 lowercase, 1 number, 1 symbol
                const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[`~!@#$%^&*()\-_+\=[\]{}\\|;:'",<.>\/?])[A-Za-z\d`~!@#$%^&*()\-_+\=[\]{}\\|;:'",<.>\/?]{8,}$/;
                const errorDiv = $('#password-error');
                const inputField = $(this);

                if (password.length === 0) {
                    errorDiv.removeClass('d-block').text('');
                    inputField.removeClass('is-invalid is-valid');
                } else if (passwordRegex.test(password)) {
                    errorDiv.removeClass('d-block').text('');
                    inputField.removeClass('is-invalid').addClass('is-valid');
                } else {
                    errorDiv.addClass('d-block').text("Password harus terdiri dari minimal 8 karakter, termasuk huruf besar, kecil, angka, dan simbol.");
                    inputField.addClass('is-invalid').removeClass('is-valid');
                }
                // Also re-validate password confirmation immediately
                $('#confirm_password').trigger('input');
            });

            // Client-side Password Confirmation Validation
            $('#confirm_password').on('input', function() {
                const password = $('#password').val();
                const confirmPassword = $(this).val();
                const errorDiv = $('#password_confirmation-error');
                const inputField = $(this);

                if (confirmPassword.length === 0) {
                    errorDiv.removeClass('d-block').text('');
                    inputField.removeClass('is-invalid is-valid');
                } else if (password === confirmPassword) {
                    errorDiv.removeClass('d-block').text('');
                    inputField.removeClass('is-invalid').addClass('is-valid');
                } else {
                    errorDiv.addClass('d-block').text('Konfirmasi password tidak cocok.');
                    inputField.addClass('is-invalid').removeClass('is-valid');
                }
            });


            // Re-CAPTCHA V3 Execution
            // This generates a reCAPTCHA token and puts it into the hidden input field
            if (typeof grecaptcha !== 'undefined' && grecaptcha.ready) {
                grecaptcha.ready(function() {
                    // Replace '6LdPy6MrAAAAAKP1WVHhas9GChJptCb5s4HDSK2Q' with your actual reCAPTCHA site key
                    grecaptcha.execute('6LdPy6MrAAAAAKP1WVHhas9GChJptCb5s4HDSK2Q', { action: 'register' }).then(function(token) {
                        $('#g-recaptcha-response').val(token);
                    });
                });
            } else {
                console.warn('reCAPTCHA script not loaded or grecaptcha.ready is not defined. Make sure the reCAPTCHA script is loaded correctly.');
            }


            // Form Submission via AJAX
            $('.btnSubmit').on('click', function(e) {
                e.preventDefault(); // Prevent default browser form submission

                const form = $(this).parents('form');
                const btnSubmit = $(this);
                const btnSubmitText = btnSubmit.text(); // Store original button text

                // Clear any previous client-side validation feedback and general alerts
                form.find('.is-invalid').removeClass('is-invalid');
                form.find('.invalid-feedback').text('');
                form.find('.alert-danger').remove(); 

                // Perform manual client-side validation for all required fields
                let allFieldsValid = true;
                form.find(':input[required]:enabled').each(function() {
                    const input = $(this);
                    const errorDiv = $(`#${input.attr('id')}-error`);

                    if (input.attr('type') === 'checkbox') {
                        if (!input.is(':checked')) {
                            input.addClass('is-invalid');
                            errorDiv.text('Anda harus menyetujui persyaratan ini.');
                            allFieldsValid = false;
                        } else {
                            input.removeClass('is-invalid');
                            errorDiv.text('');
                        }
                    } else if (input.attr('id') === 'password' || input.attr('id') === 'confirm_password') {
                        // Passwords handled by their specific input event listeners
                        if (input.val().length === 0) { // Check if empty
                            input.addClass('is-invalid');
                            errorDiv.text(input.attr('id') === 'password' ? 'Password wajib diisi.' : 'Konfirmasi password wajib diisi.');
                            allFieldsValid = false;
                        } else if (input.hasClass('is-invalid')) { // Check if already marked invalid by real-time validation
                            allFieldsValid = false;
                        }
                    } else { // Generic check for other required text, email, select inputs
                        if (!input.val()) {
                            input.addClass('is-invalid');
                            errorDiv.text('Bidang ini wajib diisi.');
                            allFieldsValid = false;
                        } else {
                            input.removeClass('is-invalid');
                            errorDiv.text('');
                        }
                    }
                });

                // Re-check password confirmation one last time before submission
                if ($('#password').val() !== $('#confirm_password').val()) {
                    $('#confirm_password').addClass('is-invalid');
                    $('#password_confirmation-error').text('Konfirmasi password tidak cocok.');
                    allFieldsValid = false;
                }

                // Check reCAPTCHA
                if (!$('#g-recaptcha-response').val()) {
                    // There's no specific error div for g-recaptcha-response in your HTML,
                    // so we'll show a general alert.
                    form.prepend(`<div class="alert alert-danger mt-3">Verifikasi reCAPTCHA wajib. Mohon coba lagi.</div>`);
                    allFieldsValid = false;
                }


                if (!allFieldsValid) {
                    form.addClass('was-validated'); // Add Bootstrap's validation class for styling
                    $('html, body').animate({
                        scrollTop: form.find('.is-invalid, .alert-danger').first().offset().top - 100
                    }, 500);
                    toastr.error("Mohon lengkapi semua bidang yang wajib diisi dengan benar.");
                    return; // Stop execution if client-side validation fails
                }

                // If all client-side validation passes, proceed with AJAX submission
                const formData = new FormData(form[0]);

                $.ajax({
                    url: form.attr('action'),
                    dataType: 'json',
                    type: form.attr('method'),
                    data: formData,
                    contentType: false, // Essential for sending FormData (especially with files, though no files here)
                    processData: false, // Essential for sending FormData
                    timeout: 60000, // 1 minute timeout for the request
                    beforeSend: () => {
                        btnSubmit.text('Loading...').prop('disabled', true); // Disable button during submission
                    },
                    success: (response) => {
                        btnSubmit.text(btnSubmitText).prop('disabled', false); // Re-enable button
                        if (response.success) {
                            toastr.success(response.message || "Akun berhasil didaftarkan!");
                            if (response.data && response.data.redirect) {
                                window.location.href = response.data.redirect; // Redirect on success
                            }
                        } else {
                            toastr.error(response.message || "Terjadi kesalahan saat pendaftaran akun.");
                            // Display server-side validation errors
                            const errors = response.errors;
                            if (errors) {
                                $.each(errors, function(key, value) {
                                    let inputElement;
                                    // Direct mapping for common fields
                                    inputElement = $(`#${key}`);

                                    // Special handling for password confirmation or other complex names if needed
                                    if (inputElement.length === 0) {
                                        if (key === 'password_confirmation') {
                                            inputElement = $('#confirm_password');
                                        }
                                    }

                                    if (inputElement.length > 0) {
                                        inputElement.addClass('is-invalid');
                                        // Ensure the error message goes into the correct feedback div
                                        $(`#${inputElement.attr('id')}-error`).html(value[0]);
                                    } else {
                                        // Fallback for errors not mapped to a specific input field
                                        console.warn(`Server error for unmapped field: ${key}. Message: ${value[0]}`);
                                        form.prepend(`<div class="alert alert-danger mt-3">${value[0]}</div>`);
                                    }
                                });
                                form.addClass('was-validated'); // Trigger Bootstrap's validation display
                                $('html, body').animate({
                                    scrollTop: form.find('.is-invalid, .alert-danger').first().offset().top - 100
                                }, 500);
                            } else { // Generic server error with no specific field errors
                                form.prepend(`<div class="alert alert-danger mt-3">${response.message || 'Terjadi kesalahan server yang tidak diketahui.'}</div>`);
                                $('html, body').animate({
                                    scrollTop: form.find('.alert-danger').first().offset().top - 100
                                }, 500);
                            }
                        }
                    },
                    error: (response) => {
                        btnSubmit.text(btnSubmitText).prop('disabled', false); // Re-enable button on any error
                        if (response.statusText === 'timeout') {
                            toastr.error("Permintaan gagal: Waktu habis. Koneksi mungkin lambat atau ada masalah server.");
                        } else if (response.status === 419) { // HTTP status 419 for CSRF token mismatch
                            toastr.error("Sesi Anda telah berakhir. Mohon refresh halaman dan coba lagi.");
                            // Optionally, force a page reload to get a fresh CSRF token
                            setTimeout(() => window.location.reload(), 2000); 
                        } else if (response.responseJSON) {
                            toastr.error(response.responseJSON.message || "Terjadi kesalahan server yang tidak diketahui.");
                            const errors = response.responseJSON.errors; // Get validation errors from response
                            if (errors) { // Server returned specific validation errors
                                $.each(errors, function(key, value) {
                                    let inputElement = $(`#${key}`);
                                    if (inputElement.length === 0) {
                                        if (key === 'password') {
                                            inputElement = $('#password');
                                        } else if (key === 'password_confirmation') {
                                            inputElement = $('#confirm_password');
                                        }
                                    }
                                    if (inputElement.length > 0) {
                                        inputElement.addClass('is-invalid');
                                        $(`#${inputElement.attr('id')}-error`).html(value[0]);
                                    } else {
                                        console.warn(`Server error for unmapped field: ${key}. Message: ${value[0]}`);
                                        form.prepend(`<div class="alert alert-danger mt-3">${value[0]}</div>`);
                                    }
                                });
                                form.addClass('was-validated');
                                $('html, body').animate({
                                    scrollTop: form.find('.is-invalid, .alert-danger').first().offset().top - 100
                                }, 500);
                            } else { // Generic server error, no specific field errors
                                form.prepend(`<div class="alert alert-danger mt-3">${response.responseJSON.message || 'Terjadi kesalahan server yang tidak diketahui.'}</div>`);
                                $('html, body').animate({
                                    scrollTop: form.find('.alert-danger').first().offset().top - 100
                                }, 500);
                            }
                        } else {
                            toastr.error("Terjadi kesalahan koneksi atau server tidak merespons. Mohon periksa koneksi internet Anda.");
                            form.prepend(`<div class="alert alert-danger mt-3">Terjadi kesalahan koneksi atau server tidak merespons.</div>`);
                            $('html, body').animate({
                                scrollTop: form.find('.alert-danger').first().offset().top - 100
                            }, 500);
                        }
                    }
                });
            });
        });
    </script>
    <script>var currencySymbol = "Rp"; var currencyPlacement = "before";</script>
</body>
</html>