@extends('components.Layout.post-rental_layout')


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
                      <li class="breadcrumb-item"><a href="{{route('rentals.get')}}">Rental</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Rental Posting</li>
                    </ol>
                </nav>
            </div>

            <form action="{{route('publish-rental.post')}}"  id="postRentalForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="my-3 d-flex align-items-center justify-content-between"  data-aos="fade-left"  data-aos-delay="200">
                    <h4>Create Rental</h4>
                    <button type="submit" class="save-changes-btn btn btn-primary">Publish</button>
                    <button type="submit" class="save-changes-btn-responsive btn-sm btn-primary">Publish</button>
                </div>
                <div class="container-fluid p-0 main-container rounded">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-12 me-1"  data-aos="fade-down"  data-aos-delay="400">
                                <div class="col-12 p-4">
                                    <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Rental</span>
                                    <div class="form mt-3">
                                        <label for="rental_item_name" class="form-label fw-bold">Rental Name</label>
                                        <input type="text" name="rental_item_name" id="rental_item_name" class="form-control" required>
                                    </div>
                                    <div class="form mt-3">
                                        <label for="rental_description" class="form-lable fw-bold mb-2">Description</label>
                                        <textarea name="rental_description" class="form-control" id="rental_description"></textarea>
                                    </div>
                                    <div class="form mt-3">
                                        <div class="col-12 d-flex justify-content-center align-items-center">
                                            <label for="rent_image_one" style="background: grey;" class="label-container col-4 d-flex justify-content-center align-items-center text-light rounded">
                                                <i class="bi bi-plus-circle-fill"></i>
                                                <img id="preview_one" class="preview d-none border border-1" />
                                            </label>
                                            <label for="rent_image_two" style="background: grey;" class="label-container col-4 mx-2 d-flex justify-content-center align-items-center text-light rounded">
                                                <i class="bi bi-plus-circle-fill"></i>
                                                <img id="preview_two" class="preview d-none border border-1" />
                                            </label>
                                            <label for="rent_image_three" style="background: grey;" class="label-container col-4 d-flex justify-content-center align-items-center text-light rounded">
                                                <i class="bi bi-plus-circle-fill"></i>
                                                <img id="preview_three" class="preview d-none border border-1" />
                                            </label>
                                            <input type="file" name="rent_image_one" id="rent_image_one" hidden>
                                            <input type="file" name="rent_image_two" id="rent_image_two" hidden>
                                            <input type="file" name="rent_image_three" id="rent_image_three" hidden>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 col-12 ms-1" >
                                <div class="col-12 p-4">
                                    <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Rental Status</span>
                                    <div class="form mt-3">
                                        <label for="rental_status" class="form-label fw-bold">Product Status</label>
                                        <select name="rental_status" id="rental_status" class="form-select" required>
                                                <option value="" hidden>Select Status</option>
                                                <option value="available">Available</option>
                                                <option value="unavailable">Unavailable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 p-4 mt-3">
                                    <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Tags</span>
                                    <div class="form mt-3">
                                        <label for="engineeringTags">Add Tags</label>
                                        <select id="engineeringTags" name="engineeringTags" data-placeholder="Select tags" data-max="2" multiple data-multi-select required>
                                            <option value="">Select a category</option>
                                            <option value="Architectural Engineering">Architectural Engineering</option>
                                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                                            <option value="Electrical Engineering">Electrical Engineering</option>
                                            <option value="Civil Engineering">Civil Engineering</option>
                                            <option value="Chemical Engineering">Chemical Engineering</option>
                                            <option value="Aerospace Engineering">Aerospace Engineering</option>
                                            <option value="Industrial Engineering">Industrial Engineering</option>
                                            <option value="Software Engineering">Software Engineering</option>
                                            <option value="Environmental Engineering">Environmental Engineering</option>
                                            <option value="Biomedical Engineering">Biomedical Engineering</option>
                                            <option value="Structural Engineering">Structural Engineering</option>
                                            <option value="Power Tools">Power Tools</option>
                                            <option value="Hand Tools">Hand Tools</option>
                                            <option value="Testing Equipment">Testing Equipment</option>
                                            <option value="Measuring Instruments">Measuring Instruments</option>
                                            <option value="CAD Software">CAD Software</option>
                                            <option value="Simulation Software">Simulation Software</option>
                                            <option value="Lab Equipment">Lab Equipment</option>
                                            <option value="Safety Equipment">Safety Equipment</option>
                                            <option value="Construction Equipment">Construction Equipment</option>
                                            <option value="Automation Tools">Automation Tools</option>
                                            <option value="Metals">Metals</option>
                                            <option value="Polymers">Polymers</option>
                                            <option value="Ceramics">Ceramics</option>
                                            <option value="Composites">Composites</option>
                                            <option value="Semiconductors">Semiconductors</option>
                                            <option value="Electrical Components">Electrical Components</option>
                                            <option value="Mechanical Components">Mechanical Components</option>
                                            <option value="Hydraulic Components">Hydraulic Components</option>
                                            <option value="Pneumatic Components">Pneumatic Components</option>
                                            <option value="3D Printing">3D Printing</option>
                                            <option value="CNC Machining">CNC Machining</option>
                                            <option value="Welding">Welding</option>
                                            <option value="Soldering">Soldering</option>
                                            <option value="Casting">Casting</option>
                                            <option value="Molding">Molding</option>
                                            <option value="Circuit Design">Circuit Design</option>
                                            <option value="Prototyping">Prototyping</option>
                                            <option value="Quality Control">Quality Control</option>
                                            <option value="Project Management">Project Management</option>
                                            <option value="Automotive">Automotive</option>
                                            <option value="Aerospace">Aerospace</option>
                                            <option value="Manufacturing">Manufacturing</option>
                                            <option value="Construction">Construction</option>
                                            <option value="Robotics">Robotics</option>
                                            <option value="Telecommunications">Telecommunications</option>
                                            <option value="Renewable Energy">Renewable Energy</option>
                                            <option value="Oil and Gas">Oil and Gas</option>
                                            <option value="Pharmaceuticals">Pharmaceuticals</option>
                                            <option value="Consumer Electronics">Consumer Electronics</option>
                                            <option value="Innovation">Innovation</option>
                                            <option value="Research and Development">Research and Development</option>
                                            <option value="Maintenance">Maintenance</option>
                                            <option value="Repair">Repair</option>
                                            <option value="Overhaul">Overhaul</option>
                                            <option value="Design">Design</option>
                                            <option value="Fabrication">Fabrication</option>
                                            <option value="Installation">Installation</option>
                                            <option value="Testing">Testing</option>
                                            <option value="Troubleshooting">Troubleshooting</option>
                                            <option value="Nuclear Engineering">Nuclear Engineering</option>
                                            <option value="Petroleum Engineering">Petroleum Engineering</option>
                                            <option value="Materials Engineering">Materials Engineering</option>
                                            <option value="Control Systems Engineering">Control Systems Engineering</option>
                                            <option value="Geotechnical Engineering">Geotechnical Engineering</option>
                                            <option value="Mining Engineering">Mining Engineering</option>
                                            <option value="Water Resources Engineering">Water Resources Engineering</option>
                                            <option value="Bioengineering">Bioengineering</option>
                                            <option value="Nanotechnology">Nanotechnology</option>
                                            <option value="Renewable Energy Engineering">Renewable Energy Engineering</option>
                                            <option value="CAD/CAM">CAD/CAM</option>
                                            <option value="Finite Element Analysis (FEA)">Finite Element Analysis (FEA)</option>
                                            <option value="Computational Fluid Dynamics (CFD)">Computational Fluid Dynamics (CFD)</option>
                                            <option value="Electronic Design Automation (EDA)">Electronic Design Automation (EDA)</option>
                                            <option value="Computer-Aided Engineering (CAE)">Computer-Aided Engineering (CAE)</option>
                                            <option value="Simulation Modeling">Simulation Modeling</option>
                                            <option value="Digital Twin">Digital Twin</option>
                                            <option value="Data Analytics">Data Analytics</option>
                                            <option value="Machine Learning">Machine Learning</option>
                                            <option value="Artificial Intelligence (AI)">Artificial Intelligence (AI)</option>
                                            <option value="ISO Standards">ISO Standards</option>
                                            <option value="ASME Codes">ASME Codes</option>
                                            <option value="IEEE Standards">IEEE Standards</option>
                                            <option value="LEED Certification">LEED Certification</option>
                                            <option value="Six Sigma">Six Sigma</option>
                                            <option value="Quality Management Systems (QMS)">Quality Management Systems (QMS)</option>
                                            <option value="Occupational Safety and Health Administration (OSHA)">Occupational Safety and Health Administration (OSHA)</option>
                                            <option value="Certified Professional Engineer (PE)">Certified Professional Engineer (PE)</option>
                                            <option value="Lean Manufacturing">Lean Manufacturing</option>
                                            <option value="Conceptual Design">Conceptual Design</option>
                                            <option value="Detailed Design">Detailed Design</option>
                                            <option value="Procurement">Procurement</option>
                                            <option value="Construction">Construction</option>
                                            <option value="Commissioning">Commissioning</option>
                                            <option value="Operation and Maintenance (O&M)">Operation and Maintenance (O&M)</option>
                                            <option value="Decommissioning">Decommissioning</option>
                                            <option value="Life Cycle Assessment (LCA)">Life Cycle Assessment (LCA)</option>
                                            <option value="Internet of Things (IoT)">Internet of Things (IoT)</option>
                                            <option value="Augmented Reality (AR)">Augmented Reality (AR)</option>
                                            <option value="Virtual Reality (VR)">Virtual Reality (VR)</option>
                                            <option value="Blockchain Technology">Blockchain Technology</option>
                                            <option value="Quantum Computing">Quantum Computing</option>
                                            <option value="Advanced Robotics">Advanced Robotics</option>
                                            <option value="3D Metal Printing">3D Metal Printing</option>
                                            <option value="Autonomous Vehicles">Autonomous Vehicles</option>
                                            <option value="Smart Cities">Smart Cities</option>
                                            <!-- Additional categories -->
                                            <option value="Renewable Resources Engineering">Renewable Resources Engineering</option>
                                            <option value="Marine Engineering">Marine Engineering</option>
                                            <option value="Agricultural Engineering">Agricultural Engineering</option>
                                            <option value="Biomedical Device Engineering">Biomedical Device Engineering</option>
                                            <option value="Cybersecurity in Engineering">Cybersecurity in Engineering</option>
                                            <option value="Energy Systems Engineering">Energy Systems Engineering</option>
                                            <option value="Railway Engineering">Railway Engineering</option>
                                            <option value="Textile Engineering">Textile Engineering</option>
                                            <option value="Biochemical Engineering">Biochemical Engineering</option>
                                            <option value="Water Treatment Engineering">Water Treatment Engineering</option>
                                            <option value="Sustainability Engineering">Sustainability Engineering</option>
                                            <option value="Telecommunications Infrastructure Engineering">Telecommunications Infrastructure Engineering</option>
                                            <option value="Urban Planning Engineering">Urban Planning Engineering</option>
                                            <option value="Smart Grid Technology">Smart Grid Technology</option>
                                            <option value="Industrial Internet of Things (IIoT)">Industrial Internet of Things (IIoT)</option>
                                            <option value="Advanced Manufacturing Techniques">Advanced Manufacturing Techniques</option>
                                            <option value="Mechatronics">Mechatronics</option>
                                            <option value="Embedded Systems Engineering">Embedded Systems Engineering</option>
                                            <option value="Renewable Energy Storage Systems">Renewable Energy Storage Systems</option>
                                            <option value="Green Building Design">Green Building Design</option>
                                            <option value="Geospatial Engineering">Geospatial Engineering</option>
                                            <option value="Environmental Remediation">Environmental Remediation</option>
                                            <option value="Bioprocess Engineering">Bioprocess Engineering</option>
                                            <option value="Metallurgical Engineering">Metallurgical Engineering</option>
                                            <option value="Safety Engineering">Safety Engineering</option>
                                            <option value="Instrumentation Engineering">Instrumentation</option>
                                            <option value="Residential Properties">Residential Properties</option>
                                            <option value="Commercial Properties">Commercial Properties</option>
                                            <option value="Land">Land</option>
                                            <option value="Specialty Properties">Specialty Properties</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 p-4 mt-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-uppercase fw-bold text-secondary" style="letter-spacing: 0.2rem;">Pricing</span>
                                        <div>
                                            <input type="checkbox" name="rent_price_negotiable" id="rent_price_negotiable" value="negotiable">
                                            <label for="rent_price_negotiable">Negotiable</label>
                                        </div>
                                    </div>
                                    <div class="form mt-3">
                                        <label for="rent_price" class="form-label fw-bold">Set Price (₱)</label>
                                        <div class="input-group flex-nowrap">
                                            <input type="text" name="rent_price" id="rent_price" class="form-control" autocomplete="off" required>
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



