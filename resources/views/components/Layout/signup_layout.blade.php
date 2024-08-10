<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"  />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <title>Builders Bridge | Signup</title>
</head>
<body>
    <div class="loader"></div>
    @yield('signup')
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        flatpickr("#birthday", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
        var loader = document.querySelector('.loader');

        window.addEventListener('load', function(){
            setTimeout(() => {
                loader.style.display = "none";
            }, 300);
        });

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
        togglePassword('#password', '#togglePassword');
        togglePassword('#confirmPassword', '#toggleConfirmPassword');

        function validatePasswords() {
            const password = document.querySelector('#password');
            const confirmPassword = document.querySelector('#confirmPassword');


            if (password.value !== confirmPassword.value) {
                console.log('not match')
                return false;
            }else{
                console.log('match')
                return true;
            }
        }

        // Event listener for form submission
        document.querySelector('#submitBtn').addEventListener('click', function() {
            const password = document.querySelector('#password');
            const confirmPassword = document.querySelector('#confirmPassword');
            const errorAlert = document.querySelector('.pass-not-match');
            const errorAlertConfirm = document.querySelector('.pass-not-match-confirm');

            if (!validatePasswords()) {
                errorAlert.style.display = "block";
                errorAlertConfirm.style.display = "block";
                password.classList.add('is-invalid'); // Add Bootstrap's 'is-invalid' class
                confirmPassword.classList.add('is-invalid'); // Add Bootstrap's 'is-invalid' class
            } else {
                // If passwords match, submit the form
                document.querySelector('#signupForm').submit();
            }
        });

        // Event listener for password input
        document.querySelector('#password').addEventListener('input', function() {
            const password = document.querySelector('#password');
            const confirmPassword = document.querySelector('#confirmPassword');
            const errorAlert = document.querySelector('.pass-not-match');
            const errorAlertConfirm = document.querySelector('.pass-not-match-confirm');

            // Reset styles and hide error messages
            password.classList.remove('is-invalid'); // Remove Bootstrap's 'is-invalid' class
            confirmPassword.classList.remove('is-invalid'); // Remove Bootstrap's 'is-invalid' class
            errorAlert.style.display = "none"; // Hide error message
            errorAlertConfirm.style.display = "none"; // Hide error message
        });

        document.addEventListener("DOMContentLoaded", function() {
            const phoneNumberInput = document.getElementById("phoneNumber");

            phoneNumberInput.addEventListener("input", function(event) {
                // Remove any non-numeric characters
                this.value = this.value.replace(/\D/g, "");

                // Limit input to 11 characters
                if (this.value.length > 11) {
                    this.value = this.value.slice(0, 11);
                }

                // Ensure the first digit is always zero
                if (this.value.length >= 1 && this.value[0] !== '0') {
                    this.value = '0' + this.value.slice(1);
                }
            });
        });

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

    </script>
</body>
</html>
