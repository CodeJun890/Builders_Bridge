@extends('components.Layout.view-profile_layout')


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
                      <li class="breadcrumb-item active" aria-current="page">View Profile</li>
                    </ol>
                </nav>
            </div>

            <div class="container-fluid view-profile-container">
                <div class="row gap-2 justify-content-center">
                    <div class="col-xl-8 col-12 d-flex flex-column justify-content-center gap-2">
                        <div class="profile-view-inner col-12 d-flex gap-2">
                            <div class="col-xl-4 col-12 p-3 d-flex flex-column justify-content-center align-items-center">
                                <div class="profile-picture">
                                    <img src="{{"/storage/" .$rentalOwner->profile ?? asset('assets/images/blank.png')}}" alt="">
                                </div>
                                <span class="lead fw-bold">
                                    @php
                                        $firstName = $rentalOwner->firstname;
                                        $middleName = $rentalOwner->middlename;
                                        $lastName = $rentalOwner->lastname;

                                        $middleInitial = $middleName ? strtoupper(substr($middleName, 0, 1)) . '.' : '';
                                        $fullName = $firstName . ' ' . $middleInitial . ' ' . $lastName;
                                    @endphp
                                    {{$fullName}}
                                </span>
                                <span class="fw-bold text-secondary">{{$rentalOwner->current_job_title}}</span>

                            </div>
                            <div class="col-xl-6 col-12 d-flex">
                                <div class="col-xl-5 col-12 p-3 px-4">
                                    <div class="detail d-flex flex-column">
                                        <span class="fw-bold">Gender</span>
                                        <span>{{$rentalOwner->gender}}</span>
                                    </div>
                                    <div class="detail d-flex flex-column mt-3">
                                        <span class="fw-bold">Mobile Number</span>
                                        <span>{{$rentalOwner->phoneNumber}}</span>
                                    </div>
                                    <div class="detail d-flex flex-column mt-3">
                                        <span class="fw-bold">Joined In</span>
                                        <span>{{$rentalOwner->created_at->format('F d, Y')}}</span>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-12 p-3 px-4">
                                    <div class="detail d-flex flex-column">
                                        <span class="fw-bold">City</span>
                                        <span>{{ ucwords(strtolower(optional(json_decode($rentalOwner->addresses))->city)) }}</span>
                                    </div>
                                    <div class="detail d-flex flex-column mt-3">
                                        <span class="fw-bold">Province</span>
                                        <span>{{ ucwords(strtolower(optional(json_decode($rentalOwner->addresses))->province)) }}</span>
                                    </div>
                                    <div class="detail d-flex mt-3">
                                        <span class="fw-bold">Social Media</span>
                                        <div class="d-flex">
                                            @php
                                                $socialLinks = json_decode($rentalOwner->social_links, true);
                                            @endphp
                                            @if(!empty($socialLinks['fb_link']) && $socialLinks['fb_link'] !== 'N/A')
                                                <a href="{{ $socialLinks['fb_link'] }}" target="_blank" style="text-decoration: none;" class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                                                </a>
                                            @endif
                                            @if(!empty($socialLinks['ig_link']) && $socialLinks['ig_link'] !== 'N/A')
                                                <a href="{{ $socialLinks['ig_link'] }}" target="_blank" style="text-decoration: none; color: #C13584;" class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 about-describe">
                            <div class="lead fw-bold ps-3 pt-3">Introduction</div>
                            <div class="describe-container p-3">
                                {!!$rentalOwner->about!!}
                            </div>
                        </div>
                        <div class="col-12 description p-3">
                            <nav class="nav nav-pills flex-column flex-sm-row">
                                <a class="flex-sm-fill text-sm-center nav-link active" data-bs-toggle="tab"  href="#work-experience" aria-current="page">Work Experience</a>
                                <a class="flex-sm-fill text-sm-center nav-link" data-bs-toggle="tab" href="#education">Education</a>
                                <a class="flex-sm-fill text-sm-center nav-link" data-bs-toggle="tab"  href="#certification">Certification</a>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="work-experience" role="tabpanel" aria-labelledby="work-experience-tab">
                                    <div class="container-fluid mt-2 p-3">
                                        @php
                                        $counter = 0;
                                    @endphp
                                    @if(!empty($workData) && !empty(array_filter($workData['job_title'])) && !empty(array_filter($workData['company_name'])) && !empty(array_filter($workData['years_experience'])))
                                        {{-- Check if there's only one entry --}}
                                        @if(is_string($workData['job_title'][0]))
                                            <div class="work-container col-12 d-flex flex-column align-items-start mt-2 position-relative">
                                                <span class="lead fw-bold"><i class="bi bi-briefcase-fill me-2"></i>{{ $workData['job_title'][0] }}</span>
                                                <span class="text-muted fw-bold">{{ $workData['company_name'][0] }} | {{ $workData['years_experience'][0] }} years of experience</span>
                                            </div>
                                            <hr>
                                        @else
                                            {{-- Display multiple entries --}}
                                            @foreach ($workData['job_title'] as $index => $job)
                                                @if (!empty($workData['job_title'][$index]) && !empty($workData['company_name'][$index]) && !empty($workData['years_experience'][$index]))
                                                    <div class="work-container col-12 d-flex flex-column align-items-start mt-2 position-relative">
                                                        <span class="lead fw-bold"><i class="bi bi-briefcase-fill me-2"></i>{{ $workData['job_title'][$index] }}</span>
                                                        <span class="text-muted fw-bold">{{ $workData['company_name'][$index] }} | {{ $workData['years_experience'][$index] }} years of experience</span>
                                                    </div>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @else
                                        {{-- No valid work data available --}}
                                        <div class="text-center mt-5">
                                            <div class="lead text-uppercase fw-bold text-secondary">Not Available <i class="bi bi-emoji-dizzy-fill ms-1"></i></div>
                                        </div>
                                    @endif


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                                    <div class="container-fluid mt-2 p-3">
                                        @php
                                            $counter = 0;
                                        @endphp
                                        @if(!empty($educationData) && isset($educationData['degree']))
                                            {{-- Check if there's only one entry --}}
                                            @if(is_string($educationData['degree']))
                                                <div class="work-container educ-container col-12 d-flex flex-column align-items-start mt-2 position-relative">
                                                    <div class="d-flex justify-content-between align-items-center w-100">
                                                        <span class="lead fw-bold"><i class="bi bi-backpack-fill me-2"></i>{{ $educationData['degree'] }}</span>
                                                        <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.1rem;">{{ $educationData['graduation_year'] }}</span>
                                                    </div>
                                                    <span class="text-muted fw-bold">{{ $educationData['school'] }} | {{ $educationData['major'] }}</span>
                                                </div>
                                                <hr>
                                            @else
                                                {{-- Display multiple entries --}}
                                                @foreach ($educationData['degree'] as $index => $education)
                                                    @if (!empty($educationData['degree'][$index]) && !empty($educationData['graduation_year'][$index]) && !empty($educationData['school'][$index]) && !empty($educationData['major'][$index]))
                                                        <div class="work-container col-12 d-flex flex-column align-items-start mt-2 position-relative">
                                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                                <span class="lead fw-bold"><i class="bi bi-backpack-fill text-primary me-2"></i>{{ $educationData['degree'][$index] }}</span>
                                                                <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.1rem;">{{ $educationData['graduation_year'][$index] }}</span>
                                                            </div>
                                                            <span class="text-muted fw-bold">{{ $educationData['school'][$index] }} | {{ $educationData['major'][$index] }}</span>
                                                        </div>
                                                        <hr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @else
                                            {{-- No valid education data available --}}
                                            <div class="text-center mt-5">
                                                <div class="lead text-uppercase fw-bold text-secondary">Not Available <i class="bi bi-emoji-dizzy-fill ms-1"></i></div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="certification" role="tabpanel" aria-labelledby="certification-tab">
                                    <div class="container-fluid mt-2 p-3">
                                        @php
                                        // Determine if there is any non-null certificate data
                                        $hasCertificates = false;
                                        for ($i = 1; $i <= 3; $i++) {
                                            $certificateNameKey = "certificate_name_$i";
                                            if (!empty($certificateData[$certificateNameKey])) {
                                                $hasCertificates = true;
                                                break;
                                            }
                                        }
                                    @endphp

                                    @if($hasCertificates)
                                        @for ($i = 1; $i <= 3; $i++)
                                            @php
                                                $certificateNameKey = "certificate_name_$i";
                                                $certificateFileKey = "certificate_file_$i";
                                                $originalNameKey = "original_name_$i";
                                            @endphp
                                            @if (!empty($certificateData[$certificateNameKey]))
                                                <div class="work-container certificate-cont col-12 d-flex flex-column align-items-start mt-2 position-relative">
                                                    <div class="d-flex justify-content-between align-items-center w-100">
                                                        <span class="lead fw-bold">
                                                            <i class="bi bi-award-fill me-2 text-success"></i>{{ $certificateData[$certificateNameKey] }}
                                                        </span>
                                                        @if (!empty($certificateData[$certificateFileKey]))
                                                            <a href="{{ url('/storage/' . $certificateData[$certificateFileKey]) }}" target="_blank" class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.1rem;">
                                                                View Certificate
                                                            </a>
                                                        @else
                                                            <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.1rem;">
                                                                Certificate File Not Available
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <span class="text-muted fw-bold">{{ $certificateData[$originalNameKey] }}</span>
                                                </div>
                                                <hr>
                                            @endif
                                        @endfor
                                    @else
                                        {{-- No valid certificate data available --}}
                                        <div class="text-center mt-5">
                                            <div class="lead text-uppercase fw-bold text-secondary">
                                                Not Available <i class="bi bi-emoji-dizzy-fill ms-1"></i>
                                            </div>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center mt-5 py-4">
                    <h4 class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Offered Rents</h4>
                    <div class="row justify-content-center align-items-center item-container-rents-services mt-3">
                        @if ($rentalItems[0] !== null)
                            @foreach ($rentalItems as $rental)
                                <div class="col-md-12">
                                    <div class="card pb-2">
                                        <div class="position-relative border-bottom border-1 container-img">
                                            @php
                                                $image = $rental->rent_image_one ?? $rental->rent_image_two ?? $rental->rent_image_three ?? 'assets/images/hardhat.jpg';
                                                if ($image !== 'assets/images/blank.jpg') {
                                                    $image = '/storage/' . $image;
                                                }
                                            @endphp
                                            <button class="button-container btn btn-primary" onclick="viewRentItem('{{ $rental->id }}')"><i class="bi bi-eye-fill text-light me-1"></i> View More</button>
                                            <img src="{{ asset($image) }}" class="card-img-top" alt="..." style="height: 18rem; width: 100%;">
                                        </div>
                                        <div class="card-body position-relative d-flex flex-column justify-content-start">
                                            <h5 class="card-title fw-bold">{{$rental->rental_item_name}}</h5>
                                            @if ($rental->rent_price !== "negotiable")
                                                <span class="fw-bold my-2" style="font-size: 1.25rem; color: green;">₱ {{$rental->rent_price}}</span>
                                            @else
                                                <span class="fw-bold my-2 text-capitalize" style="font-size: 1.25rem; color: red;">{{$rental->rent_price}}</span>
                                            @endif
                                            <span class="mb-3" style="font-size: 0.75rem;"><i class="bi bi-geo-alt-fill text-danger" style="font-size: 1rem;"></i> {{ optional(json_decode($rental->ownerRental->addresses))->city }}, {{ optional(json_decode($rental->ownerRental->addresses))->province }}</span>
                                            <div>
                                                @foreach (json_decode($rental->tags) as $tag)
                                                    <span class="p-2 rounded text-light tag" style="font-size: 0.65rem; background: rgb(255, 123, 0);">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                            <div style="position: absolute; top: 10px; right: 20px;">
                                                <i class="bi bi-suit-heart rounded-circle" style="font-size: 1.25rem; cursor: pointer;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center mt-5">
                                <div class="lead text-uppercase fw-bold text-secondary">Not Available <i class="bi bi-emoji-dizzy-fill ms-1"></i></div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="container text-center mt-3 py-4">
                    <h4 class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Offered Services</h4>
                    <div class="row justify-content-center align-items-center item-container-rents-services mt-3">
                        @if ($serviceOffers[0] !== null)
                            @foreach ($serviceOffers as $service)
                                <div class="col-md-12">
                                    <div class="card pb-2">
                                        <div class="position-relative border-bottom border-1 container-img">
                                            @php
                                                $image = $service->service_image_one ?? $service->service_image_two ?? $service->service_image_three ?? 'assets/images/hardhat.jpg';
                                                if ($image !== 'assets/images/blank.jpg') {
                                                    $image = '/storage/' . $image;
                                                }
                                            @endphp
                                            <button class="button-container btn btn-primary" onclick="viewServiceOffer('{{ $service->id }}')"><i class="bi bi-eye-fill text-light me-1"></i> View More</button>
                                            <img src="{{ asset($image) }}" class="card-img-top" alt="..." style="height: 18rem; width: 100%;">
                                        </div>
                                        <div class="card-body position-relative d-flex flex-column justify-content-start">
                                            <h5 class="card-title fw-bold">{{$service->service_title}}</h5>
                                            @if ($service->service_price !== "negotiable")
                                                <span class="fw-bold my-2" style="font-size: 1.25rem; color: green;">₱ {{$service->service_price}}</span>
                                            @else
                                                <span class="fw-bold my-2 text-capitalize" style="font-size: 1.25rem; color: red;">{{$service->service_price}}</span>
                                            @endif
                                            <span class="mb-3" style="font-size: 0.75rem;"><i class="bi bi-geo-alt-fill text-danger" style="font-size: 1rem;"></i> {{ optional(json_decode($service->ownerService->addresses))->city }}, {{ optional(json_decode($service->ownerService->addresses))->province }}</span>
                                            <div>
                                                <span class="p-2 rounded text-light tag" style="font-size: 0.65rem; background: rgb(255, 123, 0);">{{ $service->category }}</span>
                                            </div>
                                            <div style="position: absolute; top: 10px; right: 20px;">
                                                <i class="bi bi-suit-heart rounded-circle" style="font-size: 1.25rem; cursor: pointer;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center mt-5">
                                <div class="lead text-uppercase fw-bold text-secondary">Not Available <i class="bi bi-emoji-dizzy-fill ms-1"></i></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection



