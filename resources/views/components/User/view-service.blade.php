@extends('components.Layout.view-rental_layout')


@section('navbar')
<nav id="navbar" class="border-bottom border-1">
    <div class="row justify-content-center align-items-center w-100">
        <div class="col-1 logo">
            <a href="{{route('dashboard.get')}}"><img src="{{asset('assets/images/logo.png')}}"></a>
        </div>
        <div class="col-11">
            <h4 class="fw-bold">Welcome Back, {{$user->firstname}}!</h4>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center justify-content-center me-5 dropdown">
                    <div class="profile">
                        <img src="{{$user->profile ? '/storage/' .$user->profile : asset('assets/images/blank.png')}}">
                    </div>
                    <span class="fw-bold ms-2 dropdown-toggle"  id="drodownLogout" data-bs-toggle="dropdown" aria-expanded="false">{{$user->firstname . ' ' . $user->lastname}}</span>
                    <ul class="dropdown-menu" aria-labelledby="drodownLogout">
                        <li class="logout">
                            <a class="dropdown-item d-flex align-items-center" style="cursor: pointer;">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Log Out
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center dropdown">
                    <i class="bi bi-gear-fill"  id="dropdownSettings" data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <ul class="dropdown-menu" aria-labelledby="dropdownSettings">
                        <li id="account-setting">
                            <a class="dropdown-item d-flex align-items-center" href="{{route('profile.get')}}">
                                <i class="bi bi-person-fill-gear me-2"></i>
                                Account Settings
                            </a>
                        </li>
                        <li id="change-password">
                            <a class="dropdown-item d-flex align-items-center" href="{{route('password.get')}}">
                                <i class="bi bi-file-lock2-fill me-2"></i>
                                Change Password
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="menu-responsive ms-3">
                    <i class="bi bi-list text-dark" style="font-size: 2rem;"></i>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav id="navbar" class="border-bottom border-1 navbar-responsive">
    <div class="d-flex justify-content-between align-items-center w-100 p-2">
        <div class="logo">
            <a href="{{route('dashboard.get')}}"><img src="{{asset('assets/images/logo.png')}}"></a>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-center me-5 dropdown">
                <div class="profile">
                    <img src="{{$user->profile ? '/storage/' .$user->profile : asset('assets/images/blank.png')}}">
                </div>
                <span class="fw-bold ms-2 dropdown-toggle"  id="drodownLogout" data-bs-toggle="dropdown" aria-expanded="false">{{$user->firstname}}</span>
                <ul class="dropdown-menu" aria-labelledby="drodownLogout">
                    <li id="account-setting">
                        <a class="dropdown-item d-flex align-items-center" href="{{route('profile.get')}}">
                            <i class="bi bi-person-fill-gear me-2"></i>
                            Account Settings
                        </a>
                    </li>
                    <li id="change-password">
                        <a class="dropdown-item d-flex align-items-center" href="{{route('password.get')}}">
                            <i class="bi bi-file-lock2-fill me-2"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="logout">
                        <a class="dropdown-item d-flex align-items-center" style="cursor: pointer;">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-responsive ">
                <i class="bi bi-list text-dark" style="font-size: 2rem;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft"></i>
            </div>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-lg offcanvas-start"  tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
    <div class="offcanvas-header">
      <a href="{{route('dashboard.get')}}"><img src="{{asset('assets/images/logo.png')}}" width="100px"></a>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div id="sidebar" class="sidebar-responsive" style="margin-top: 5rem;">
            <h6 class="fw-bold">MENU</h6>
            <ul class="links">
                <li>
                    <a href="{{route('dashboard.get')}}">
                        <i class="bi bi-clipboard-data-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('myPosts.get')}}">
                        <i class="bi bi-pen-fill"></i>
                        <span>My Posts</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('rentals.get')}}">
                        <i class="bi bi-box-seam-fill"></i>
                        <span>Rentals</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('services.get')}}">
                        <i class="bi bi-wrench-adjustable-circle-fill"></i>
                        <span>Services</span>
                    </a>
                </li>
               <li>
                    <a href="{{route('saved-listings.get')}}">
                        <i class="bi bi-bookmarks-fill"></i>
                        <span>Saved Listings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection


@section('body')
    <section class="body-cont">
        <nav class="d-flex justify-content-between align-items-center p-2" id="topbar">
            <div class="d-flex align-items-center">
                <div class="profile profile-responsive">
                    <img src="{{$user->profile ? '/storage/' .$user->profile : asset('assets/images/blank.png')}}">
                </div>
                <span class="fw-bold ms-2 dropdown-toggle"  id="drodownLogout" data-bs-toggle="dropdown" aria-expanded="false">{{$user->firstname}}</span>
                <ul class="dropdown-menu" aria-labelledby="drodownLogout">
                    <li class="logout">
                        <a class="dropdown-item d-flex align-items-center" style="cursor: pointer;">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center dropdown">
                <i class="bi bi-gear-fill" style="font-size: 1.5rem; color: grey; cursor: pointer;"  id="dropdownSettings" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownSettings">
                    <li id="account-setting">
                        <a class="dropdown-item d-flex align-items-center" href="{{route('profile.get')}}">
                            <i class="bi bi-person-fill-gear me-2"></i>
                            Account Settings
                        </a>
                    </li>
                    <li id="change-password">
                        <a class="dropdown-item d-flex align-items-center" href="{{route('password.get')}}">
                            <i class="bi bi-file-lock2-fill me-2"></i>
                            Change Password
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <script>
            const logoutButtons = document.querySelectorAll('.logout');

            logoutButtons.forEach(button => {
                button.addEventListener('click', () => {
                    swal({
                        title: "Do you want to logout?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willLogout) => {
                        if (willLogout) {
                            window.location.href = '{{route('logout.get')}}';
                        }
                    });
                });
            });

        </script>
         <div id="sidebar">
            <h6 class="fw-bold">MENU</h6>
            <ul class="links">
                <li>
                    <a href="{{route('dashboard.get')}}">
                        <i class="bi bi-clipboard-data-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('myPosts.get')}}">
                        <i class="bi bi-pen-fill"></i>
                        <span>My Posts</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('rentals.get')}}">
                        <i class="bi bi-box-seam-fill"></i>
                        <span>Rentals</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('services.get')}}">
                        <i class="bi bi-wrench-adjustable-circle-fill"></i>
                        <span>Services</span>
                    </a>
                </li>
               <li>
                    <a href="{{route('saved-listings.get')}}">
                        <i class="bi bi-bookmarks-fill"></i>
                        <span>Saved Listings</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="body">
            <!------- INFO NOTIFICATION --------->
            @if(session('info'))
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    swal({
                        title: "Fill up necessary information",
                        text: "{{ session('info') }}",
                        icon: "info"
                    }).then(function() {
                        window.location.href = "{{ route('profile.get') }}";
                    });
                </script>
            @endif
            <!------- SUCCESS NOTIFICATION --------->
            @if(session('success'))
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    swal("Success", "{{session('success')}}", "success");
                </script>
            @endif
            <!------- ERROR NOTIFICATION --------->
            @if(session('error'))
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    swal("Error", "{{session('error')}}", "error");
                </script>
            @endif


            <div class="d-flex align-items-center mt-3 pe-3 nav-responsive-breadcrumb" data-aos="fade-right"  data-aos-delay="200">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('dashboard.get')}}"><i class="bi bi-house-fill me-1"></i>Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{route('services.get')}}">Services</a></li>
                      <li class="breadcrumb-item active" aria-current="page">View Offer</li>
                    </ol>
                </nav>
            </div>

            <div class="mt-3 px-3 view-item-container">
                <h4 class="my-3" data-aos="fade-right"  data-aos-delay="200">View Service Offer</h4>
                <div class="container-fluid m-0 p-0">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-12" data-aos="fade-down"  data-aos-delay="300">
                            <div class="col-12 border border-1 rounded main-gallery">
                                @php
                                    // Initialize an array to hold image URLs
                                    $images = [];

                                    // Check and add each image to the array
                                    if(isset($serviceOffer->service_image_one)){
                                        $images[] = '/storage/' . $serviceOffer->service_image_one;
                                    }
                                    if(isset($serviceOffer->service_image_two)){
                                        $images[] = '/storage/' . $serviceOffer->service_image_two;
                                    }
                                    if(isset($serviceOffer->service_image_three)){
                                        $images[] = '/storage/' . $serviceOffer->service_image_three;
                                    }

                                    // Ensure there are exactly 3 images, fill with default if necessary
                                    while(count($images) < 3) {
                                        $images[] = asset('assets/images/blank.jpg');
                                    }
                                @endphp
                                <img src="{{$images[0]}}" alt="" id="mainImage">
                            </div>
                            <div class="col-12 gallery d-flex justify-content-center mt-2">
                                @foreach(array_slice($images, 1) as $key => $image)
                                    <div class="col-5 ms-1 border border-1 rounded" style="cursor: pointer;">
                                        <!-- Display the remaining images -->
                                        <img src="{{$image}}" alt="" class="galleryImage" data-index="{{$key + 1}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-8 col-12 rounded">
                            <div class="col-12 p-3 px-4 border border-1 rounded">
                                <div class="rental-item-text d-flex justify-content-between align-items-center">
                                    <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Service Offer</span>
                                    <div class="button-saved d-flex align-items-center gap-2">
                                        @php
                                            $saved = Auth::check() && (Auth::user()->savedLists->contains('service_id', $serviceOffer->id));
                                        @endphp
                                        <form action="{{ route('wishlist.toggle') }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="service_id" value="{{ $serviceOffer->id }}">
                                            <button type="submit" class="btn btn-link p-0 m-0 text-light" style="text-decoration:none; ">
                                                @if ($saved)
                                                <span class="rounded-pill p-2 px-3 text-light " style="text-decoration: none; background-color: #ff033e71 !important;"><i class="bi bi-bookmark-heart-fill me-1"></i>Saved</span>
                                                @else
                                                <span class="rounded-pill p-2 px-3 text-light " style="text-decoration: none; background-color: #FF033E !important;"><i class="bi bi-bookmark-heart-fill me-1"></i>Save</span>
                                                @endif
                                            </button>
                                        </form>
                                        <div class="status text-capitalize bg-success text-light px-3 rounded-pill p-2">{{$serviceOffer->service_status}}</div>
                                    </div>
                                </div>
                                <div class="display-4 fw-bold">{{$serviceOffer->service_title}}</div>
                                <div class="d-flex justify-content-between align-items-end">
                                   <div class="d-flex flex-column">
                                     <span class="align-self-center" style="font-size: 0.75rem;"><i class="bi bi-geo-alt-fill text-danger" style="font-size: 1rem;"></i> {{ optional(json_decode($serviceOffer->ownerService->addresses))->city }}, {{ optional(json_decode($serviceOffer->ownerService->addresses))->province }}</span>
                                     @if ($serviceOffer->service_price !== "negotiable")
                                        <span class="fw-bold" style="font-size: 1.5rem; color: green;">₱ {{$serviceOffer->service_price}}</span>
                                    @else
                                        <span class="fw-bold text-capitalize" style="font-size: 1.5rem; color: red;">{{$serviceOffer->service_price}}</span>
                                    @endif
                                   </div>
                                    <div class="text-end">
                                        <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Category</span>
                                        <div class="d-flex justify-content-center align-items-center gap-2 tags-cont">
                                            <span class="p-2 rounded text-light" style="font-size: 0.75rem; background: rgb(255, 123, 0);">{{ $serviceOffer->category }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 service-description p-3 px-4 mt-2 border border-1 rounded">
                                <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Description</span>
                                <div class="description-container mt-2">
                                    {!!$serviceOffer->service_description!!}
                                </div>
                            </div>
                            <div class="social-links-responsive col-12 p-3 d-flex justify-content-center px-4 mt-2 border border-1 rounded">
                                <div class="col-5">
                                    <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Contact Service Provider</span>
                                    <div class="contact-container mt-2">
                                        <div class="d-flex flex-column">
                                            <span>
                                                Name:
                                                @php
                                                    $firstName = $serviceOffer->ownerService->firstname;
                                                    $middleName = $serviceOffer->ownerService->middlename;
                                                    $lastName = $serviceOffer->ownerService->lastname;

                                                    $middleInitial = $middleName ? strtoupper(substr($middleName, 0, 1)) . '.' : '';
                                                    $fullName = $firstName . ' ' . $middleInitial . ' ' . $lastName;
                                                @endphp
                                            {{$fullName}}
                                            </span>
                                            <span class="mt-2">Email: {{$serviceOffer->ownerService->email}}</span>
                                            <div class="mt-2">
                                                <a href="{{ route('view-profile.get', $serviceOffer->service_owner) }}" class="btn btn-primary btn-sm"><i class="bi bi-person-circle"></i> View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Social Links</span>
                                    <div class="contact-container mt-2 d-flex gap-4">
                                        @php
                                            $socialLinks = json_decode($serviceOffer->ownerService->social_links, true);
                                        @endphp
                                        @if(!empty($socialLinks['fb_link']) && $socialLinks['fb_link'] !== 'N/A')
                                            <a href="{{ $socialLinks['fb_link'] }}" target="_blank" style="text-decoration: none;" class="d-flex align-items-center gap-2">
                                                <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                                                <span>Facebook</span>
                                            </a>
                                        @endif
                                        @if(!empty($socialLinks['ig_link']) && $socialLinks['ig_link'] !== 'N/A')
                                            <a href="{{ $socialLinks['ig_link'] }}" target="_blank" style="text-decoration: none; color: #C13584;" class="d-flex align-items-center gap-2">
                                                <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                                                <span >Instagram</span>
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection



