<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">
    <!-- SLICK THEME CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"  />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <title>Builders Bridge | Rentals</title>
</head>
<style>
    body {
        overflow: hidden;
    }
</style>
<body>
    @yield('navbar')
    @yield('body')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        function viewRentItem(encryptedId) {
            window.location.href = "{{ route('view-rental.get', ':id') }}".replace(':id', encryptedId);
        }
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const tagsInput = document.getElementById('filter-tags-input');
            const locationInput = document.getElementById('location-input');
            const rentalItemsContainer = document.getElementById('rental-items-container');

            function filterRentals() {
                const searchText = searchInput.value.toLowerCase();
                const selectedTag = tagsInput.value.toLowerCase();
                const selectedLocation = locationInput.value.toLowerCase();

                const rentalItems = rentalItemsContainer.getElementsByClassName('rental-item');

                Array.from(rentalItems).forEach(item => {
                    const itemName = item.querySelector('.lead').textContent.toLowerCase();
                    const itemTags = Array.from(item.getElementsByClassName('tag')).map(tag => tag.textContent.toLowerCase());
                    const itemLocation = item.querySelector('.bi-geo-alt-fill').parentNode.textContent.toLowerCase();

                    const matchesSearch = !searchText || itemName.includes(searchText);
                    const matchesTag = !selectedTag || itemTags.includes(selectedTag);
                    const matchesLocation = !selectedLocation || itemLocation.includes(selectedLocation);

                    if (matchesSearch && matchesTag && matchesLocation) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', filterRentals);
            tagsInput.addEventListener('input', filterRentals);
            locationInput.addEventListener('input', filterRentals);
        });

        $('#rental-items-container').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
            },
            {
            breakpoint: 700,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
            }
            }
        ]
        });

    </script>
</body>
</html>
