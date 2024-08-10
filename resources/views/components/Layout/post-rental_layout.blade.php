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
    <title>Builders Bridge | Post Rental</title>
</head>
<style>
    body {
        overflow: hidden;
    }
</style>
<body>
    @yield('navbar')
    @yield('body')
    <script src="{{asset('assets/MultiSelect.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        const rentPriceInput = document.getElementById('rent_price');

        rentPriceInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
            if (value !== '') {
                e.target.value = Number(value).toLocaleString('en');
            }
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            const negotiableCheckbox = document.getElementById('rent_price_negotiable');
            const rentPriceInput = document.getElementById('rent_price');

            negotiableCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    this.value = "negotiable";
                    rentPriceInput.disabled = true;
                    rentPriceInput.value = ''; // Clear the input value
                } else {
                    this.value = null;
                    rentPriceInput.disabled = false;
                }
            });
        });

        rentPriceInput.addEventListener('keydown', function (e) {
            // Allow backspace, delete, tab, escape, enter, and arrow keys
            if ([8, 9, 27, 13, 37, 38, 39, 40].indexOf(e.keyCode) !== -1 ||
                // Allow Ctrl+A, Ctrl+C, Ctrl+V, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode === 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode === 86 && (e.ctrlKey === true || e.metaKey === true))) {
                return; // let it happen, don't do anything
            }

            // Ensure that it is a number
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault(); // Prevent non-numeric characters
            }
        });
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
            .create( document.querySelector( '#rental_description' ) )
            .then( editor => {
                editorInstance = editor;
                editor.getData(); // -> '<p>Foo!</p>'
            } )
            .catch( error => {
                console.error( error );
            } );

        function validateForm() {
            const editorData = editorInstance.getData().trim();

            if (!editorData) {
                swal("Warning", "Please provide description for your rental item", "warning");
                return false;
            }

            // Check if any file input has a file selected
            const fileInputs = [
                document.getElementById('rent_image_one'),
                document.getElementById('rent_image_two'),
                document.getElementById('rent_image_three')
            ];

            // Flag to check if any file is selected
            let fileSelected = false;

            // Iterate over each file input
            fileInputs.forEach(input => {
                if (input.files.length > 0) {
                    fileSelected = true;
                }
            });

            // If no file is selected, show SweetAlert error
            if (!fileSelected) {
                swal("Warning", "Provide an image for your rental item", "warning");
                return false;
            }
            return true;
        }

        document.querySelector('#postRentalForm').addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Prevent the form submission
            }
        });


        function readURL(input, previewId) {
            const file = input.files[0];
            if (file) {
                // Check file type
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!validImageTypes.includes(file.type)) {
                    swal("Invalid File Type", "Please select an image file (jpg, png, gif).", "warning");
                    input.value = ''; // Clear the input
                    return;
                }

                // Check file size
                const maxSizeInMB = 5;
                if (file.size > maxSizeInMB * 1024 * 1024) {
                    swal("File Too Large", `Please select an image file smaller than ${maxSizeInMB}MB.`, "warning");
                    input.value = ''; // Clear the input
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewElement = document.getElementById(previewId);
                    previewElement.src = e.target.result;
                    previewElement.classList.remove('d-none');
                    previewElement.previousElementSibling.classList.add('d-none');
                }
                reader.readAsDataURL(file);
            }
        }

        document.getElementById('rent_image_one').addEventListener('change', function() {
            readURL(this, 'preview_one');
        });

        document.getElementById('rent_image_two').addEventListener('change', function() {
            readURL(this, 'preview_two');
        });

        document.getElementById('rent_image_three').addEventListener('change', function() {
            readURL(this, 'preview_three');
        });
    </script>
</body>
</html>
