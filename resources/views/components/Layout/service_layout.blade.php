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
    <title>Builders Bridge | Services</title>
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
        function viewServiceOffer(encryptedId) {
            window.location.href = "{{ route('view-service.get', ':id') }}".replace(':id', encryptedId);
        }
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const categoryInput = document.getElementById('filter-category-input');
            const locationInput = document.getElementById('location-input');
            const serviceOfferContainer = document.getElementById('service-offer-container');

            function filterServices() {
                const searchText = searchInput.value.toLowerCase();
                const selectedCategory = categoryInput.value.toLowerCase();
                const selectedLocation = locationInput.value.toLowerCase();

                const serviceOffers = serviceOfferContainer.getElementsByClassName('service-offer');

                Array.from(serviceOffers).forEach(offer => {
                    const itemName = offer.querySelector('.lead').textContent.toLowerCase();
                    const itemCategory = offer.querySelector('.tag').textContent.toLowerCase();
                    const itemLocation = offer.querySelector('.bi-geo-alt-fill').parentNode.textContent.toLowerCase();

                    const matchesSearch = !searchText || itemName.includes(searchText);
                    const matchesCategory = !selectedCategory || itemCategory.includes(selectedCategory);
                    const matchesLocation = !selectedLocation || itemLocation.includes(selectedLocation);

                    if (matchesSearch && matchesCategory && matchesLocation) {
                        offer.style.display = '';
                    } else {
                        offer.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', filterServices);
            categoryInput.addEventListener('input', filterServices);
            locationInput.addEventListener('input', filterServices);
        });

        $('#service-offer-container').slick({
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
