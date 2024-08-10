@extends('components.Layout.saved-list_layout')


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
            <div class="d-flex justify-content-between align-items-center mt-3 pe-3 nav-responsive-breadcrumb" data-aos="fade-right"  data-aos-delay="200">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('dashboard.get')}}"><i class="bi bi-house-fill me-1"></i>Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Saved Listings</li>
                    </ol>
                </nav>
            </div>

            <div class="mt-3">
                <div class="saved-listings-container">
                    <div>
                        <div id="saved-listings-items-container" class="row gap-2 justify-content-center align-items-stretch px-3" data-aos="fade-right" data-aos-delay="200">
                            @if ($rentalItems->isEmpty() && $serviceOffers->isEmpty())
                                <div class="text-center mt-5">
                                    <div class="lead text-uppercase fw-bold text-secondary">No Saved List Yet <i class="bi bi-emoji-dizzy-fill"></i></div>
                                </div>
                            @else
                                @php
                                    $combinedItems = collect();
                                    if ($rentalItems) {
                                        $combinedItems = $combinedItems->merge($rentalItems);
                                    }
                                    if ($serviceOffers) {
                                        $combinedItems = $combinedItems->merge($serviceOffers);
                                    }
                                @endphp
                                @foreach ($combinedItems as $item)
                                    <div class="col-md-4 col-lg-3 mb-3">
                                        <div class="card item h-100" >
                                            <div class="position-relative border-bottom border-1 container-img">
                                                @php
                                                    $image = isset($item->rent_image_one) ? ($item->rent_image_one ?? $item->rent_image_two ?? $item->rent_image_three ?? 'assets/images/hardhat.jpg') : ($item->service_image_one ?? $item->service_image_two ?? $item->service_image_three ?? 'assets/images/hardhat.jpg');
                                                    if ($image !== 'assets/images/hardhat.jpg') {
                                                        $image = '/storage/' . $image;
                                                    }
                                                    $route = isset($item->rental_item_name) ? 'viewRentItem' : 'viewServiceOffer';
                                                @endphp
                                                <button class="button-container btn btn-primary" onclick="{{ $route }}('{{ encrypt($item->id) }}')"><i class="bi bi-eye-fill text-light me-1"></i> View More</button>
                                                <img src="{{ asset($image) }}" class="card-img-top" alt="..." style="height: 200px; width: 100%;">
                                            </div>
                                            <div class="card-body position-relative">
                                                @if (isset($item->rent_price))
                                                    @if ($item->rent_price !== "negotiable")
                                                        <span class="fw-bold" style="font-size: 1.25rem; color: green;">₱ {{ $item->rent_price }}</span>
                                                    @else
                                                        <span class="fw-bold text-capitalize" style="font-size: 1.25rem; color: red;">{{ $item->rent_price }}</span>
                                                    @endif
                                                @else
                                                    @if ($item->service_price !== "negotiable")
                                                        <span class="fw-bold" style="font-size: 1.25rem; color: green;">₱ {{ $item->service_price }}</span>
                                                    @else
                                                        <span class="fw-bold text-capitalize" style="font-size: 1.25rem; color: red;">{{ $item->service_price }}</span>
                                                    @endif
                                                @endif
                                                <div style="position: absolute; top: 20px; right: 10px;">
                                                    @php
                                                        $saved = Auth::check() && (Auth::user()->savedLists->contains('rental_id', $item->id) || Auth::user()->savedLists->contains('service_id', $item->id));
                                                    @endphp
                                                    <form action="{{ route('wishlist.toggle') }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="item_type" value="{{ isset($item->rental_item_name) ? 'rental' : 'service' }}">
                                                        <button type="submit" class="btn btn-link p-0 m-0">
                                                            @if ($saved)
                                                                <i class="bi bi-suit-heart-fill text-danger" style="font-size: 1.25rem; cursor: pointer;"></i>
                                                            @else
                                                                <i class="bi bi-suit-heart text-muted" style="font-size: 1.25rem; cursor: pointer;"></i>
                                                            @endif
                                                        </button>
                                                    </form>
                                                </div>
                                                <p class="fw-bold lead m-0">{{ isset($item->rental_item_name) ? $item->rental_item_name : $item->service_title }}</p>
                                                <span style="font-size: 0.75rem;">
                                                    <i class="bi bi-geo-alt-fill text-danger" style="font-size: 1rem;"></i>
                                                    {{ optional(json_decode(isset($item->ownerRental) ? $item->ownerRental->addresses : $item->ownerService->addresses))->city }},
                                                    {{ optional(json_decode(isset($item->ownerRental) ? $item->ownerRental->addresses : $item->ownerService->addresses))->province }}
                                                </span>
                                                <hr class="mt-2">
                                                <div class="d-flex justify-content-center">
                                                    <span class="mb-2 text-center w-100" style="font-size: 0.75rem;">Posted {{$item->created_at->diffForHumans()}}</span>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center gap-2 text-center flex-wrap">
                                                    @foreach (json_decode(isset($item->tags) ? $item->tags : json_encode([$item->category])) as $tag)
                                                        <span class="p-1 rounded text-light tag" style="font-size: 0.65rem; background: rgb(255, 123, 0);">{{ $tag }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
@endsection



