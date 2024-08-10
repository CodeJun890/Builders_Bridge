<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">
    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"  />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <title>Builders Bridge | Change Password</title>
</head>
<style>
    body {
        overflow: hidden;
    }

</style>
<body>
    @yield('navbar')
    @yield('body')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        function togglePassword(inputId, toggleId) {
            const toggle = document.querySelector(toggleId);
            const passwordInput = document.querySelector(inputId);
            const icon = toggle.querySelector('i');

            toggle.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        }

        // Initialize toggle functionality for both password fields
        togglePassword('#old_password', '#toggleOldPassword');
        togglePassword('#new_password', '#toggleNewPassword');
        togglePassword('#confirm_new_password', '#toggleConfirmNewPassword');

        function validatePasswords() {
            const password = document.querySelector('#new_password');
            const confirmPassword = document.querySelector('#confirm_new_password');


            if (password.value !== confirmPassword.value) {
                return false;
            }else{
                return true;
            }
        }

        // Event listener for form submission
        document.querySelector('#submitBtn').addEventListener('click', function() {
            const password = document.querySelector('#new_password');
            const confirmPassword = document.querySelector('#confirm_new_password');
            const errorAlert = document.querySelector('.pass-not-match');
            const errorAlertConfirm = document.querySelector('.pass-not-match-confirm');

            if (!validatePasswords()) {
                errorAlert.style.display = "block";
                errorAlertConfirm.style.display = "block";
                password.classList.add('is-invalid');
                confirmPassword.classList.add('is-invalid');
            } else {
                // If passwords match, submit the form
                document.querySelector('#changePasswordForm').submit();
            }
        });

        // Event listener for password input
        document.querySelector('#new_password').addEventListener('input', function() {
            const password = document.querySelector('#new_password');
            const confirmPassword = document.querySelector('#confirm_new_password');
            const errorAlert = document.querySelector('.pass-not-match');
            const errorAlertConfirm = document.querySelector('.pass-not-match-confirm');

            // Reset styles and hide error messages
            password.classList.remove('is-invalid'); // Remove Bootstrap's 'is-invalid' class
            confirmPassword.classList.remove('is-invalid'); // Remove Bootstrap's 'is-invalid' class
            errorAlert.style.display = "none"; // Hide error message
            errorAlertConfirm.style.display = "none"; // Hide error message
        });
    </script>
</body>
</html>
