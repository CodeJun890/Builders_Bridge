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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <title>Builders Bridge | Account Settings</title>
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>
<body>
    @yield('navbar')
    @yield('body')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    ClassicEditor.defaultConfig = {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                '|',
                'bulletedList',
                'numberedList',
                '|',
                'undo',
                'redo'
            ]
        },
        image: {
            toolbar: [
                'imageStyle:full',
                'imageStyle:side',
                '|',
                'imageTextAlternative'
            ]
        },
        table: {
            contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
        },
        language: 'en'
    };

    let editorInstance;

    ClassicEditor
        .create(document.querySelector('#about'))
        .then(editor => {
            editorInstance = editor;

            // Initially set as readonly and hide toolbar
            editor.enableReadOnlyMode("#about");

            const toolbarElement = editor.ui.view.toolbar.element;

            // Event listener for Edit Info button
            document.querySelector('#editProfessional-btn').addEventListener('click', () => {
                if (editor.isReadOnly) {
                    editor.disableReadOnlyMode("#about");
                } else {
                    editor.enableReadOnlyMode("#about");
                }
            });
            // Event listener for Edit Info button
            document.querySelector('#cancelProfessional-btn').addEventListener('click', () => {
                if (editor.isReadOnly) {
                    editor.disableReadOnlyMode("#about");
                } else {
                    editor.enableReadOnlyMode("#about");
                }
            });
        })
        .catch(error => {
            console.log(error);
        });



        flatpickr("#birthday", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
        AOS.init();

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

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>
