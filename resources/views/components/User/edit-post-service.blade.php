@extends('components.Layout.edit-post-service_layout')


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
        <div class="body px-5">
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
            <div class="m-0 d-flex align-items-center mt-3 nav-responsive-breadcrumb" data-aos="fade-right"  data-aos-delay="300">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class=" p-0 breadcrumb-item"><a href="{{route('dashboard.get')}}"><i class="bi bi-house-fill me-1"></i>Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{route('myPosts.get')}}">My Posts</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                    </ol>
                </nav>
            </div>

            <form action="{{route('update-my-post-service.put', $service->id)}}"  id="postServiceForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="my-3 d-flex align-items-center justify-content-between"  data-aos="fade-left"  data-aos-delay="200">
                    <h4>Edit Service</h4>
                    <button type="submit" class="save-changes-btn btn btn-primary">Save Changes</button>
                    <button type="submit" class="save-changes-btn-responsive btn-sm btn-primary">Save Changes</button>
                </div>
                <div class="container-fluid p-0 main-container rounded">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-12 me-1"  data-aos="fade-down"  data-aos-delay="400">
                                <div class="col-12 p-4">
                                    <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Service</span>
                                    <div class="form mt-3">
                                        <label for="service_title" class="form-label fw-bold">Service Title</label>
                                        <input type="text" name="service_title" id="service_title" value="{{$service->service_title ?? ""}}" class="form-control" required>
                                    </div>
                                    <div class="form mt-3">
                                        <label for="service_description" class="form-lable fw-bold mb-2">Description</label>
                                        <textarea name="service_description" class="form-control" id="service_description">{{$service->service_description}}</textarea>
                                    </div>
                                    <div class="form mt-3">
                                        <div class="col-12 d-flex justify-content-center align-items-center">
                                            <label for="service_image_one" style="background: grey;" class="label-container col-4 d-flex justify-content-center align-items-center text-light rounded">
                                                <i class="bi bi-plus-circle-fill @if($service->service_image_one) d-none @endif"></i>
                                                <img id="preview_one" src="{{ $service->service_image_one ? asset('storage/' . $service->service_image_one) : '' }}" class="preview border border-1 @if(!$service->service_image_one) d-none @endif" />
                                            </label>
                                            <label for="service_image_two" style="background: grey;" class="label-container col-4 mx-2 d-flex justify-content-center align-items-center text-light rounded">
                                                <i class="bi bi-plus-circle-fill @if($service->service_image_two) d-none @endif"></i>
                                                <img id="preview_two" src="{{ $service->service_image_two ? asset('storage/' . $service->service_image_two) : '' }}" class="preview border border-1 @if(!$service->service_image_two) d-none @endif" />
                                            </label>
                                            <label for="service_image_three" style="background: grey;" class="label-container col-4 d-flex justify-content-center align-items-center text-light rounded">
                                                <i class="bi bi-plus-circle-fill @if($service->service_image_three) d-none @endif"></i>
                                                <img id="preview_three" src="{{ $service->service_image_three ? asset('storage/' . $service->service_image_three) : '' }}" class="preview border border-1 @if(!$service->service_image_three) d-none @endif" />
                                            </label>
                                            <input type="file" name="service_image_one" id="service_image_one" hidden>
                                            <input type="file" name="service_image_two" id="service_image_two" hidden>
                                            <input type="file" name="service_image_three" id="service_image_three" hidden>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 col-12 ms-1">
                                <div class="col-12 p-4">
                                    <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Service Status</span>
                                    <div class="form mt-3">
                                        <label for="service_status" class="form-label fw-bold">Service Status</label>
                                        <select name="service_status" id="service_status" value="{{$service->service_status}}" class="form-select text-capitalize" required>
                                                <option value="{{$service->service_status}}" hidden>{{$service->service_status}}</option>
                                                <option value="available">Available</option>
                                                <option value="unavailable">Unavailable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 p-4 mt-3">
                                    <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Category</span>
                                    <div class="form mt-3">
                                        @php
                                            $options = [
                                                'Architectural Engineering',
                                                'Mechanical Engineering',
                                                'Electrical Engineering',
                                                'Civil Engineering',
                                                'Chemical Engineering',
                                                'Aerospace Engineering',
                                                'Industrial Engineering',
                                                'Software Engineering',
                                                'Environmental Engineering',
                                                'Biomedical Engineering',
                                                'Structural Engineering',
                                                'Power Tools',
                                                'Hand Tools',
                                                'Testing Equipment',
                                                'Measuring Instruments',
                                                'CAD Software',
                                                'Simulation Software',
                                                'Lab Equipment',
                                                'Safety Equipment',
                                                'Construction Equipment',
                                                'Automation Tools',
                                                'Metals',
                                                'Polymers',
                                                'Ceramics',
                                                'Composites',
                                                'Semiconductors',
                                                'Electrical Components',
                                                'Mechanical Components',
                                                'Hydraulic Components',
                                                'Pneumatic Components',
                                                '3D Printing',
                                                'CNC Machining',
                                                'Welding',
                                                'Soldering',
                                                'Casting',
                                                'Molding',
                                                'Circuit Design',
                                                'Prototyping',
                                                'Quality Control',
                                                'Project Management',
                                                'Automotive',
                                                'Aerospace',
                                                'Manufacturing',
                                                'Construction',
                                                'Robotics',
                                                'Telecommunications',
                                                'Renewable Energy',
                                                'Oil and Gas',
                                                'Pharmaceuticals',
                                                'Consumer Electronics',
                                                'Innovation',
                                                'Research and Development',
                                                'Maintenance',
                                                'Repair',
                                                'Overhaul',
                                                'Design',
                                                'Fabrication',
                                                'Installation',
                                                'Testing',
                                                'Troubleshooting',
                                                'Nuclear Engineering',
                                                'Petroleum Engineering',
                                                'Materials Engineering',
                                                'Control Systems Engineering',
                                                'Geotechnical Engineering',
                                                'Mining Engineering',
                                                'Water Resources Engineering',
                                                'Bioengineering',
                                                'Nanotechnology',
                                                'Renewable Energy Engineering',
                                                'CAD/CAM',
                                                'Finite Element Analysis (FEA)',
                                                'Computational Fluid Dynamics (CFD)',
                                                'Electronic Design Automation (EDA)',
                                                'Computer-Aided Engineering (CAE)',
                                                'Simulation Modeling',
                                                'Digital Twin',
                                                'Data Analytics',
                                                'Machine Learning',
                                                'Artificial Intelligence (AI)',
                                                'ISO Standards',
                                                'ASME Codes',
                                                'IEEE Standards',
                                                'LEED Certification',
                                                'Six Sigma',
                                                'Quality Management Systems (QMS)',
                                                'Occupational Safety and Health Administration (OSHA)',
                                                'Certified Professional Engineer (PE)',
                                                'Lean Manufacturing',
                                                'Conceptual Design',
                                                'Detailed Design',
                                                'Procurement',
                                                'Commissioning',
                                                'Operation and Maintenance (O&M)',
                                                'Decommissioning',
                                                'Life Cycle Assessment (LCA)',
                                                'Internet of Things (IoT)',
                                                'Augmented Reality (AR)',
                                                'Virtual Reality (VR)',
                                                'Blockchain Technology',
                                                'Quantum Computing',
                                                'Advanced Robotics',
                                                '3D Metal Printing',
                                                'Autonomous Vehicles',
                                                'Smart Cities',
                                                // Additional categories
                                                'Renewable Resources Engineering',
                                                'Marine Engineering',
                                                'Agricultural Engineering',
                                                'Biomedical Device Engineering',
                                                'Cybersecurity in Engineering',
                                                'Energy Systems Engineering',
                                                'Railway Engineering',
                                                'Textile Engineering',
                                                'Biochemical Engineering',
                                                'Water Treatment Engineering',
                                                'Sustainability Engineering',
                                                'Telecommunications Infrastructure Engineering',
                                                'Urban Planning Engineering',
                                                'Smart Grid Technology',
                                                'Industrial Internet of Things (IIoT)',
                                                'Advanced Manufacturing Techniques',
                                                'Mechatronics',
                                                'Embedded Systems Engineering',
                                                'Renewable Energy Storage Systems',
                                                'Green Building Design',
                                                'Geospatial Engineering',
                                                'Environmental Remediation',
                                                'Bioprocess Engineering',
                                                'Metallurgical Engineering',
                                                'Safety Engineering',
                                                'Instrumentation Engineering',
                                                'Residential Properties',
                                                'Commercial Properties',
                                                'Land',
                                                'Specialty Properties',
                                            ];
                                            $selectedCategory =  [$service->category];

                                        @endphp
                                        <label for="category">Set Category</label>
                                        <select id="category" name="category" data-placeholder="Select category" data-max="1" multiple data-multi-select required>
                                            <option value="">Select a category</option>
                                            @foreach($options as $option)
                                                <option value="{{ $option }}" {{ in_array($option, $selectedCategory) ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 p-4 mt-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Pricing</span>
                                        <div>
                                            <input type="checkbox" name="service_price_negotiable" id="service_price_negotiable" value="negotiable" @if($service->service_price == 'negotiable') checked @endif>
                                            <label for="service_price_negotiable">Negotiable</label>
                                        </div>
                                    </div>
                                    <div class="form mt-3">
                                        <label for="service_price" class="form-label fw-bold">Set Price (₱)</label>
                                        <div class="input-group flex-nowrap">
                                            <!-- Corrected value handling using Blade syntax -->
                                            <input type="text" name="service_price" id="service_price" class="form-control" autocomplete="off" required
                                                   @if($service->service_price == 'negotiable') disabled @endif
                                                   value="{{ $service->service_price != 'negotiable' ? $service->service_price : '' }}">
                                            <span class="input-group-text" id="addon-wrapping">PHP</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </form>


        </div>
    </section>
@endsection



