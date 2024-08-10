@extends('components.Layout.profile_layout')


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
        <div class="body">
            <div class="d-flex justify-content-between align-items-center mt-3 pe-3 nav-responsive-breadcrumb" data-aos="fade-right"  data-aos-delay="300">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('dashboard.get')}}"><i class="bi bi-house-fill me-1"></i>Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
                    </ol>
                </nav>
            </div>
            <div class="account-setting mt-3 px-3" data-aos="fade-down"  data-aos-delay="200">
                <div class="d-flex justify-content-between align-items-center profile-heading">
                    <h4>Account Settings</h4>
                    <a href="{{ route('view-profile.get', $user->id) }}" class="btn btn-secondary btn-sm">Public View<i class="bi bi-eye m-0 ms-1"></i></a>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">Personal</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="false">Address</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pro-info-tab" data-bs-toggle="tab" data-bs-target="#pro-info" type="button" role="tab" aria-controls="pro-info" aria-selected="false">Professional</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent" >
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                        <form action="{{route('profile.put')}}" method="POST" enctype="multipart/form-data" class="container mt-4">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="personal" name="info_type">
                            <div class="personal-heading d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="lead fw-bold">
                                        Personal Information
                                    </div>
                                    <span>You can update your profile photo and details here</span>
                                </div>
                                <div class="update-btn">
                                    <div class="btn btn-light border border-1 border-secondary btn-sm" id="cancelPersonal-btn" style="display: none;">Cancel</div>
                                    <button type="submit" class="btn btn-success btn-sm" id="updatePersonal-btn" style="display: none;">Update</button>
                                    <div class="btn btn-primary btn-sm" id="editPersonal-btn"><i class="bi bi-pencil-square me-2"></i>Edit Info</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="profile-picture my-4 ">
                                    <img src="{{$user->profile ? '/storage/' .$user->profile : asset('assets/images/blank.png')}}" id="preview-image">
                                    <div class="round">
                                        <input type="file" name="profile" id="profile" disabled>
                                        <i class="bi bi-camera-fill text-light"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex align-items-center">
                                    <div class="col-md-3 col-12">
                                        <label for="firstname" class="form-label">Firstname</label>
                                        <input type="text" id="firstname" class="form-control" value="{{$user->firstname}}" name="firstname" readonly>
                                    </div>
                                    <div class="col-md-3 col-12 mx-4">
                                        <label for="middlename" class="form-label">Middlename</label>
                                        <input type="text" id="middlename" class="form-control" value="{{$user->middlename}}" name="middlename" readonly>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <label for="lastname" class="form-label">Lastname</label>
                                        <input type="text" id="lastname" class="form-control" value="{{$user->lastname}}" name="lastname" readonly>
                                    </div>
                                </div>
                                <div class="col-12 d-flex align-items-center gap-3 mt-3">
                                    <div class="col-md-5 col-12 p-0 mt-1">
                                        <label for="gender">Gender <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-placement="right" title="Select your gender."></i></label>
                                        <select class="form-select" name="gender" id="gender" disabled>
                                            <option value="{{$user->gender}}" hidden>{{$user->gender}}</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                            <option value="Prefer not to say">Prefer not to say</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 col-12 p-0 mt-1">
                                        <label for="birthday">Birthday <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-placement="right" title="Please enter your birthday in the format MM/DD/YYYY."></i></label>
                                        <input type="text" name="birthday" id="birthday" value="{{$user->birthday}}" class="form-control" placeholder="mm/dd/yyyy" readonly>
                                    </div>
                                </div>
                            </div>

                            <script>
                                document.getElementById('editPersonal-btn').addEventListener('click', function() {
                                    document.getElementById('cancelPersonal-btn').style.display = 'inline-block';
                                    document.getElementById('updatePersonal-btn').style.display = 'inline-block';
                                    document.getElementById('editPersonal-btn').style.display = 'none';
                                });

                                document.getElementById('cancelPersonal-btn').addEventListener('click', function() {
                                    document.getElementById('cancelPersonal-btn').style.display = 'none';
                                    document.getElementById('updatePersonal-btn').style.display = 'none';
                                    document.getElementById('editPersonal-btn').style.display = 'inline-block';
                                });
                                document.getElementById('editPersonal-btn').addEventListener('click', function() {
                                    document.getElementById('cancelPersonal-btn').style.display = 'inline-block';
                                    document.getElementById('updatePersonal-btn').style.display = 'inline-block';
                                    document.getElementById('editPersonal-btn').style.display = 'none';

                                    // Enable input fields
                                    document.getElementById('profile').removeAttribute('disabled', true);
                                    document.querySelectorAll('input').forEach(input => input.removeAttribute('readonly'));
                                    document.querySelectorAll('select').forEach(select => select.removeAttribute('disabled'));
                                });

                                document.getElementById('cancelPersonal-btn').addEventListener('click', function() {
                                    document.getElementById('cancelPersonal-btn').style.display = 'none';
                                    document.getElementById('updatePersonal-btn').style.display = 'none';
                                    document.getElementById('editPersonal-btn').style.display = 'inline-block';

                                    // Disable input fields again
                                    document.getElementById('profile').setAttribute('disabled', true);
                                    document.querySelectorAll('input').forEach(input => input.setAttribute('readonly', true));
                                    document.querySelectorAll('select').forEach(select => select.setAttribute('disabled', true));
                                });

                                document.getElementById('profile').addEventListener('change', function() {
                                    const file = this.files[0]; // Get the selected file
                                    const fileSizeInMB = file.size / (1024 * 1024); // Convert size to MB

                                    if (fileSizeInMB > 10) {
                                        swal({
                                            title: "File Size Exceeded",
                                            text: "Please upload a file less than or equal to 10MB.",
                                            icon: "warning",
                                            buttons: false,
                                            timer: 3000 // Auto close after 3 seconds
                                        });
                                        this.value = ''; // Reset the file input value
                                        return; // Exit the function if file size exceeds limit
                                    }

                                    // Check if the file is an image
                                    if (!file.type.startsWith('image/')) {
                                        swal({
                                            title: "Invalid File Type",
                                            text: "Please upload an image file.",
                                            icon: "warning",
                                            buttons: false,
                                            timer: 3000 // Auto close after 3 seconds
                                        });
                                        this.value = ''; // Reset the file input value
                                        return; // Exit the function if file type is not image
                                    }

                                    // Create a FileReader instance to read the file
                                    const reader = new FileReader();

                                    // Event listener for when the file is loaded
                                    reader.onload = function(event) {
                                        const imageDataURL = event.target.result; // Get the data URL of the image
                                        document.getElementById('preview-image').src = imageDataURL; // Update the image source
                                    };

                                    // Read the selected file as a data URL
                                    reader.readAsDataURL(file);
                                });


                            </script>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <form action="{{route('profile.put')}}" method="POST" enctype="multipart/form-data" class="container mt-4">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="contact" name="info_type">
                            <div class="personal-heading d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="lead fw-bold">
                                        Contact Information
                                    </div>
                                    <span>You can update your contact information here</span>
                                </div>
                                <div class="update-btn">
                                    <div class="btn btn-light border border-1 border-secondary btn-sm" id="cancelContact-btn" style="display: none;">Cancel</div>
                                    <button type="submit" class="btn btn-success btn-sm" id="updateContact-btn" style="display: none;">Update</button>
                                    <div class="btn btn-primary btn-sm" id="editContact-btn"><i class="bi bi-pencil-square me-2"></i>Edit Info</div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-5">
                                <div class="col-md-6 col-12 mt-2">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="text" id="email" class="form-control" value="{{$user->email}}" name="email" autocomplete="on" readonly>
                                        <button class="btn btn-outline-secondary" type="button" id="copyEmailBtn">Copy</button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mt-2">
                                    <label for="phoneNumber" class="form-label">Mobile Number</label>
                                    <div class="input-group">
                                        <input type="text" id="phoneNumber" class="form-control" value="{{$user->phoneNumber}}" name="phoneNumber" autocomplete="on" readonly>
                                        <button class="btn btn-outline-secondary" type="button" id="copyPhoneNumberBtn">Copy</button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mt-2">
                                    <label for="fb_link" class="form-label">Facebook Link</label>
                                    <div class="input-group">
                                        <input type="text" id="fb_link" class="form-control" value="{{ isset(json_decode($user->social_links)->fb_link) ? json_decode($user->social_links)->fb_link : 'N/A' }}" name="fb_link" autocomplete="off" readonly onpaste="checkLinkType(event, 'Facebook')">
                                        <button class="btn btn-outline-secondary" type="button" id="copyFbLinkBtn">Copy</button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mt-2">
                                    <label for="email" class="form-label">Instagram Link</label>
                                    <div class="input-group">
                                        <input type="text" id="ig_link" class="form-control" value="{{ isset(json_decode($user->social_links)->ig_link) ? json_decode($user->social_links)->ig_link : 'N/A' }}" name="ig_link" autocomplete="off" readonly onpaste="checkLinkType(event, 'Instagram')">
                                        <button class="btn btn-outline-secondary" type="button" id="copyIgLinkBtn">Copy</button>
                                    </div>
                                </div>
                            </div>

                            <script>
                                document.getElementById('editContact-btn').addEventListener('click', function() {
                                    document.getElementById('cancelContact-btn').style.display = 'inline-block';
                                    document.getElementById('updateContact-btn').style.display = 'inline-block';
                                    document.getElementById('editContact-btn').style.display = 'none';
                                });

                                document.getElementById('cancelContact-btn').addEventListener('click', function() {
                                    document.getElementById('cancelContact-btn').style.display = 'none';
                                    document.getElementById('updateContact-btn').style.display = 'none';
                                    document.getElementById('editContact-btn').style.display = 'inline-block';

                                });
                                document.getElementById('editContact-btn').addEventListener('click', function() {
                                    document.getElementById('cancelContact-btn').style.display = 'inline-block';
                                    document.getElementById('updateContact-btn').style.display = 'inline-block';
                                    document.getElementById('editContact-btn').style.display = 'none';
                                    document.getElementById('email').setAttribute('type', 'email');

                                    // Enable input fields
                                    document.querySelectorAll('input').forEach(input => input.removeAttribute('readonly'));
                                    document.querySelectorAll('select').forEach(select => select.removeAttribute('disabled'));
                                });

                                document.getElementById('cancelContact-btn').addEventListener('click', function() {
                                    document.getElementById('cancelContact-btn').style.display = 'none';
                                    document.getElementById('updateContact-btn').style.display = 'none';
                                    document.getElementById('editContact-btn').style.display = 'inline-block';
                                    document.getElementById('email').setAttribute('type', 'text');

                                    // Disable input fields again
                                    document.querySelectorAll('input').forEach(input => input.setAttribute('readonly', true));
                                    document.querySelectorAll('select').forEach(select => select.setAttribute('disabled', true));
                                });

                                document.getElementById('copyEmailBtn').addEventListener('click', function() {
                                    copyToClipboard('email', 'Email');
                                });

                                document.getElementById('copyPhoneNumberBtn').addEventListener('click', function() {
                                    copyToClipboard('phoneNumber', 'Mobile number');
                                });
                                document.getElementById('copyFbLinkBtn').addEventListener('click', function() {
                                    copyToClipboard('fb_link', 'Facebook Link');
                                });
                                document.getElementById('copyIgLinkBtn').addEventListener('click', function() {
                                    copyToClipboard('ig_link', 'Instagram Link');
                                });

                                function copyToClipboard(elementId, elementType) {
                                    var copyText = document.getElementById(elementId);
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999); // For mobile devices
                                    document.execCommand("copy");

                                    // Display SweetAlert notification
                                    swal({
                                        title: "Copied!",
                                        text: elementType + " has been copied.",
                                        icon: "success",
                                        buttons: false,
                                        timer: 1500 // Close the alert after 1.5 seconds
                                    });
                                }
                                function checkLinkType(event, linkType) {
                                    var pastedText = (event.clipboardData || window.clipboardData).getData('text');

                                    if (linkType === 'Facebook') {
                                        if (isValidFacebookLink(pastedText)) {
                                            return 0;
                                        } else {
                                            swal({
                                                title: "Invalid Link",
                                                content: createStyledContent("Please make sure to only paste your Facebook profile link.", "center"),
                                                icon: "error"
                                            });
                                        }
                                    } else if (linkType === 'Instagram') {
                                        if (isValidInstagramLink(pastedText)) {
                                            return 0;
                                        } else {
                                            if (isFacebookLink(pastedText)) {
                                                swal({
                                                    title: "Invalid Link",
                                                    content: createStyledContent("Please ensure that you are pasting your Instagram profile link, not a Facebook link.", "center"),
                                                    icon: "error"
                                                });
                                            } else {
                                                swal({
                                                    title: "Invalid Link",
                                                    content: createStyledContent("The pasted link does not seem to be an Instagram profile link.", "center"),
                                                    icon: "error"
                                                });
                                            }
                                        }
                                    }
                                }

                                function createStyledContent(text, align) {
                                    var el = document.createElement("div");
                                    el.style.textAlign = align;
                                    el.innerHTML = text;
                                    return el;
                                }

                                function isValidFacebookLink(link) {
                                    var facebookRegex = /^(https?:\/\/)?(www\.)?facebook\.com\/.*/;
                                    return facebookRegex.test(link);
                                }

                                function isValidInstagramLink(link) {
                                    var instagramRegex = /^(https?:\/\/)?(www\.)?instagram\.com\/.*/;
                                    return instagramRegex.test(link);
                                }

                                function isFacebookLink(link) {
                                    var facebookRegex = /^(https?:\/\/)?(www\.)?facebook\.com\/.*/;
                                    return facebookRegex.test(link);
                                }

                            </script>

                        </form>
                    </div>
                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <form action="{{route('profile.put')}}" method="POST" enctype="multipart/form-data" class="container mt-4">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="address" name="info_type">
                            <div class="personal-heading d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="lead fw-bold">
                                        Address Information
                                    </div>
                                    <span>You can update your address information here</span>
                                </div>
                                <div class="update-btn">
                                    <div class="btn btn-light border border-1 border-secondary btn-sm" id="cancelAddress-btn" style="display: none;">Cancel</div>
                                    <button type="submit" class="btn btn-success btn-sm" id="updateAddress-btn" style="display: none;">Update</button>
                                    <div class="btn btn-primary btn-sm" id="editAddress-btn"><i class="bi bi-pencil-square me-2"></i>Edit Info</div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-5">
                                <div class="col-md-6 col-12 mt-2">
                                    <label for="region" class="form-label">Region</label>
                                    <select class="form-select" name="region" id="region" autocomplete="off" disabled>
                                        <option value="" hidden>{{ isset(json_decode($user->addresses)->region[0]) ? json_decode($user->addresses)->region[0] : "N/A" }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-12 mt-2">
                                    <label for="province" class="form-label">Province</label>
                                    <select class="form-select" name="province" id="province" disabled>
                                        <option value="" hidden>{{ isset(json_decode($user->addresses)->province[0]) ? json_decode($user->addresses)->province[0] : "N/A" }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-12 mt-2">
                                    <label for="city" class="form-label">City / Municipality</label>
                                    <select name="city" id="city" class="form-select" disabled>
                                        <option value="" hidden>{{ isset(json_decode($user->addresses)->city[0]) ? json_decode($user->addresses)->city[0] : "N/A" }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-12 mt-2">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <select name="barangay" id="barangay" class="form-select" disabled>
                                        <option value="" hidden>{{ isset(json_decode($user->addresses)->barangay[0]) ? json_decode($user->addresses)->barangay[0] : "N/A" }}</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="street_address" class="form-label">Street Address</label>
                                    <input name="street_address" id="street_address" class="form-control" autocomplete="on" value="{{ isset(json_decode($user->addresses)->street_address) ? json_decode($user->addresses)->street_address : '' }}" readonly>
                                </div>
                            </div>
                            <script src="{{asset('assets/locations.js')}}"></script>

                            <script>
                                document.getElementById('editAddress-btn').addEventListener('click', function() {
                                    document.getElementById('cancelAddress-btn').style.display = 'inline-block';
                                    document.getElementById('updateAddress-btn').style.display = 'inline-block';
                                    document.getElementById('editAddress-btn').style.display = 'none';
                                });

                                document.getElementById('cancelAddress-btn').addEventListener('click', function() {
                                    document.getElementById('cancelAddress-btn').style.display = 'none';
                                    document.getElementById('updateAddress-btn').style.display = 'none';
                                    document.getElementById('editAddress-btn').style.display = 'inline-block';

                                });
                                document.getElementById('editAddress-btn').addEventListener('click', function() {
                                    document.getElementById('cancelAddress-btn').style.display = 'inline-block';
                                    document.getElementById('updateAddress-btn').style.display = 'inline-block';
                                    document.getElementById('editAddress-btn').style.display = 'none';
                                    document.getElementById('email').setAttribute('type', 'email');

                                    // Enable input fields
                                    document.querySelectorAll('input').forEach(input => input.removeAttribute('readonly'));
                                    document.querySelectorAll('select').forEach(select => select.removeAttribute('disabled'));
                                });

                                document.getElementById('cancelAddress-btn').addEventListener('click', function() {
                                    document.getElementById('cancelAddress-btn').style.display = 'none';
                                    document.getElementById('updateAddress-btn').style.display = 'none';
                                    document.getElementById('editAddress-btn').style.display = 'inline-block';
                                    document.getElementById('email').setAttribute('type', 'text');

                                    // Disable input fields again
                                    document.querySelectorAll('input').forEach(input => input.setAttribute('readonly', true));
                                    document.querySelectorAll('select').forEach(select => select.setAttribute('disabled', true));
                                });

                                const regionDropdown = document.getElementById('region');
                                const provinceDropdown = document.getElementById('province');
                                const cityDropdown = document.getElementById('city');
                                const barangayDropdown = document.getElementById('barangay');

                                // Function to populate region dropdown
                                function populateRegionDropdown() {
                                    for (const regionCode in regionProvinceCityBarangayObject) {
                                        const regionName = regionProvinceCityBarangayObject[regionCode].region_name;
                                        const option = document.createElement('option');
                                        option.value = regionCode;
                                        option.textContent = regionName;
                                        regionDropdown.appendChild(option);
                                    }
                                }

                                // Function to populate province dropdown based on selected region
                                function populateProvinceDropdown(selectedRegion) {
                                    provinceDropdown.innerHTML = '<option value="" selected disabled>Select Province</option>';
                                    cityDropdown.innerHTML = '<option value="" selected disabled>Select Municipality / City</option>';
                                    barangayDropdown.innerHTML = '<option value="" selected disabled>Select Barangay</option>';

                                    const provinces = regionProvinceCityBarangayObject[selectedRegion].province_list;
                                    for (const provinceName in provinces) {
                                        const option = document.createElement('option');
                                        option.value = provinceName;
                                        option.textContent = provinceName;
                                        provinceDropdown.appendChild(option);
                                    }
                                }

                                // Function to populate city dropdown based on selected province
                                function populateCityDropdown(selectedRegion, selectedProvince) {
                                    cityDropdown.innerHTML = '<option value="" selected disabled>Select Municipality / City</option>';
                                    barangayDropdown.innerHTML = '<option value="" selected disabled>Select Barangay</option>';

                                    const cities = regionProvinceCityBarangayObject[selectedRegion].province_list[selectedProvince].municipality_list;
                                    for (const cityName in cities) {
                                        const option = document.createElement('option');
                                        option.value = cityName;
                                        option.textContent = cityName;
                                        cityDropdown.appendChild(option);
                                    }
                                }

                                // Function to populate barangay dropdown based on selected city
                                function populateBarangayDropdown(selectedRegion, selectedProvince, selectedCity) {
                                    barangayDropdown.innerHTML = '<option value="" selected disabled>Select Barangay</option>';

                                    const barangays = regionProvinceCityBarangayObject[selectedRegion].province_list[selectedProvince].municipality_list[selectedCity].barangay_list;
                                    for (const barangayName of barangays) {
                                        const option = document.createElement('option');
                                        option.value = barangayName;
                                        option.textContent = barangayName;
                                        barangayDropdown.appendChild(option);
                                    }
                                }

                                // Event listener for region dropdown change
                                regionDropdown.addEventListener('change', function () {
                                    const selectedRegion = this.value;
                                    if (selectedRegion) {
                                        populateProvinceDropdown(selectedRegion);
                                    }
                                });

                                // Event listener for province dropdown change
                                provinceDropdown.addEventListener('change', function () {
                                    const selectedRegion = regionDropdown.value;
                                    const selectedProvince = this.value;
                                    if (selectedRegion && selectedProvince) {
                                        populateCityDropdown(selectedRegion, selectedProvince);
                                    }
                                });

                                // Event listener for city dropdown change
                                cityDropdown.addEventListener('change', function () {
                                    const selectedRegion = regionDropdown.value;
                                    const selectedProvince = provinceDropdown.value;
                                    const selectedCity = this.value;
                                    if (selectedRegion && selectedProvince && selectedCity) {
                                        populateBarangayDropdown(selectedRegion, selectedProvince, selectedCity);
                                    }
                                });

                                // Initialize region dropdown
                                populateRegionDropdown();

                                // Preselect values if they exist
                                document.addEventListener("DOMContentLoaded", function () {
                                    const preselectedRegion = '{{ isset(json_decode($user->addresses)->region) ? json_decode($user->addresses)->region : '' }}';
                                    const preselectedProvince = '{{ isset(json_decode($user->addresses)->province) ? json_decode($user->addresses)->province : '' }}';
                                    const preselectedCity = '{{ isset(json_decode($user->addresses)->city) ? json_decode($user->addresses)->city : '' }}';
                                    const preselectedBarangay = '{{ isset(json_decode($user->addresses)->barangay) ? json_decode($user->addresses)->barangay : '' }}';


                                    if (preselectedRegion) {
                                        regionDropdown.value = preselectedRegion;
                                        populateProvinceDropdown(preselectedRegion);
                                        if (preselectedProvince) {
                                            provinceDropdown.value = preselectedProvince;
                                            populateCityDropdown(preselectedRegion, preselectedProvince);
                                            if (preselectedCity) {
                                                cityDropdown.value = preselectedCity;
                                                populateBarangayDropdown(preselectedRegion, preselectedProvince, preselectedCity);
                                                if (preselectedBarangay) {
                                                    barangayDropdown.value = preselectedBarangay;
                                                }
                                            }
                                        }
                                    }
                                });
                            </script>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pro-info" role="tabpanel" aria-labelledby="pro-info-tab">
                        <form action="{{route('profile.put')}}" method="POST" enctype="multipart/form-data" class="container mt-4">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="professional" name="info_type">
                            <div class="personal-heading d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="lead fw-bold">
                                        Professional Information
                                    </div>
                                    <span>You can update your professional information here</span>
                                </div>
                                <div class="update-btn">
                                    <div class="btn btn-light border border-1 border-secondary btn-sm" id="cancelProfessional-btn" style="display: none;">Cancel</div>
                                    <button type="submit" class="btn btn-success btn-sm" id="updateProfessional-btn" style="display: none;">Update</button>
                                    <div class="btn btn-primary btn-sm" id="editProfessional-btn"><i class="bi bi-pencil-square me-2"></i>Edit Info</div>
                                </div>
                            </div>

                            <div class="row justify-content-center align-items-center mt-5">
                                <div class="mt-2">
                                    <div class="lead fw-bold text-uppercase">Tell us about yourself</div>
                                </div>
                                <div id="about-entry">
                                    <div class="mt-3">
                                        <label for="about" class="form-label">Introduce yourself <span class="ms-1" style="color:red;">*</span></label>
                                        <textarea class="form-control about" name="about" id="about" rows="3" disabled>{{$user->about ?? ""}}</textarea>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="lead fw-bold text-uppercase">Current Work</div>
                                </div>
                                <div id="work-entries">
                                    <div class="work-container col-12 d-flex justify-content-center align-items-end mt-2 position-relative">
                                        <!-- Job title field -->
                                        <div class="col-md-3 col-12">
                                            <label for="current_job_title" class="form-label">Job Title</label>
                                            <input type="text" name="current_job_title" id="current_job_title" value="{{$user->current_job_title ?? ""}}" class="form-control" readonly>
                                        </div>
                                        <!-- Company/Organization field -->
                                        <div class="col-md-3 col-12 mx-2">
                                            <label for="current_company_name" class="form-label">Company/Organization Name</label>
                                            <input type="text" name="current_company_name" id="current_company_name" value="{{$user->current_company_name ?? ""}}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="lead fw-bold text-uppercase">Work History</div>
                                    </div>
                                    @if(!@empty($workData) &&  isset($workData['job_title']))
                                        @foreach ($workData['job_title'] as $index => $job)
                                            <div class="work-container col-12 d-flex justify-content-center align-items-end mt-2 position-relative">
                                                <!-- Job title field -->
                                                 <div class="col-md-3 col-12">
                                                    <label for="job_title_{{$index}}" class="form-label">Job Title</label>
                                                    <input type="text" name="job_title[]" id="job_title_{{$index}}" value="{{$job}}" class="form-control" readonly>
                                                </div>
                                                <!-- Company/Organization field -->
                                                <div class="col-md-3 col-12 mx-2">
                                                    <label for="company_name_{{$index}}" class="form-label">Company/Organization Name</label>
                                                    <input type="text" name="company_name[]" id="company_name_{{$index}}" value="{{$workData['company_name'][$index]}}" class="form-control" readonly>
                                                </div>
                                                <!-- Years experience field -->
                                                <div class="col-md-3 col-12">
                                                    <label for="years_experience_{{$index}}" class="form-label">Years of Experience</label>
                                                    <input type="text" name="years_experience[]" id="years_experience_{{$index}}" value="{{$workData['years_experience'][$index]}}" class="form-control" readonly>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="work-container col-12 d-flex justify-content-center align-items-end mt-2 position-relative">
                                            <!-- Job title field -->
                                            <div class="col-md-3 col-12">
                                                <label for="job_title" class="form-label">Job Title</label>
                                                <input type="text" name="job_title[]" id="job_title" class="form-control" readonly>
                                            </div>
                                            <!-- Company/Organization field -->
                                            <div class="col-md-3 col-12 mx-2">
                                                <label for="company_name" class="form-label">Company/Organization Name</label>
                                                <input type="text" name="company_name[]" id="company_name" class="form-control" readonly>
                                            </div>
                                            <!-- Years experience field -->
                                            <div class="col-md-3 col-12">
                                                <label for="years_experience" class="form-label">Years of Experience</label>
                                                <input type="text" name="years_experience[]" id="years_experience" class="form-control" readonly>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-2 mt-3 d-flex justify-content-end align-items-center w-100">
                                    <button type="button" class="btn btn-secondary add-new-work" disabled><i class="bi bi-plus-circle-fill me-1"></i>Add New</button>
                                </div>

                                <div class="mt-4">
                                    <div class="lead fw-bold text-uppercase">Educational Background</div>
                                </div>
                                <div id="education-entries">
                                    @if(!empty($educationData) && isset($educationData['degree']))
                                        @foreach($educationData['degree'] as $index => $degree)
                                            <div class="educ-container col-12 d-flex justify-content-center align-items-end mt-2 position-relative">
                                                <!-- Degree field -->
                                                <div class="col-md-3 col-12">
                                                    <label for="degree_{{ $index }}" class="form-label">Degree</label>
                                                    <input type="text" name="degree[]" id="degree_{{ $index }}" class="form-control" value="{{ $degree }}" readonly>
                                                </div>
                                                <!-- Major field -->
                                                <div class="col-md-3 col-12 mx-2">
                                                    <label for="major_{{ $index }}" class="form-label">Major</label>
                                                    <input type="text" name="major[]" id="major_{{ $index }}" class="form-control" value="{{ $educationData['major'][$index] ?? '' }}" readonly>
                                                </div>
                                                <!-- School field -->
                                                <div class="col-md-3 col-12">
                                                    <label for="school_{{ $index }}" class="form-label">University/College</label>
                                                    <input type="text" name="school[]" id="school_{{ $index }}" class="form-control" value="{{ $educationData['school'][$index] ?? '' }}" readonly>
                                                </div>
                                                <!-- Graduation year field -->
                                                <div class="col-md-3 col-12 mx-2">
                                                    <label for="graduation_year_{{ $index }}" class="form-label">Graduation Year</label>
                                                    <input type="text" name="graduation_year[]" id="graduation_year_{{ $index }}" class="form-control" value="{{ $educationData['graduation_year'][$index] ?? '' }}" readonly>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="educ-container col-12 d-flex justify-content-center align-items-end mt-2 position-relative">
                                            <!-- Delete icon -->
                                            <i class="bi bi-trash-fill me-2 text-danger delete-education" style="display:none; cursor:pointer; position: absolute; left: 0;"></i>
                                            <!-- Degree field -->
                                            <div class="col-3">
                                                <label for="degree" class="form-label">Degree</label>
                                                <input type="text" name="degree[]" id="degree" class="form-control"  readonly>
                                            </div>
                                            <!-- Major field -->
                                            <div class="col-3 mx-2">
                                                <label for="major" class="form-label">Major</label>
                                                <input type="text" name="major[]" id="major" class="form-control"readonly>
                                            </div>
                                            <!-- School field -->
                                            <div class="col-3">
                                                <label for="school" class="form-label">University/College</label>
                                                <input type="text" name="school[]" id="school" class="form-control" readonly>
                                            </div>
                                            <!-- Graduation year field -->
                                            <div class="col-3 mx-2">
                                                <label for="graduation_year" class="form-label">Graduation Year</label>
                                                <input type="text" name="graduation_year[]" id="graduation_year" class="form-control" readonly>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-2 mt-3 d-flex justify-content-end align-items-center w-100">
                                    <button type="button" class="btn btn-secondary add-new-education" disabled><i class="bi bi-plus-circle-fill me-1"></i>Add New</button>
                                </div>


                                <div class="mt-4">
                                    <div class="lead fw-bold text-uppercase">Certifications</div>
                                </div>
                                <div id="certificate-entries">
                                    <!-- Certificate entry 1 -->
                                    <div class="certificate-container certificate-1 col-12 d-flex justify-content-center align-items-end mt-2 gap-2 position-relative">
                                        <!-- Delete icon -->
                                        <i class="bi bi-trash-fill me-2 text-danger delete-certificate" style="cursor:pointer; position: absolute; left: 0;" data-index="1"></i>
                                        <!-- Certificate Name field -->
                                        <div class="col-md-5 col-12">
                                            <label for="certification_name_1" class="form-label">Certification Name #1</label>
                                            <input type="text" name="certificate_name_1" id="certification_name_1" class="form-control" value="{{ $certificateData['certificate_name_1'] ?? '' }}" readonly>
                                        </div>
                                        <!-- Certificate File field -->
                                        <div class="col-md-5 col-12">
                                            <label for="certificate_file_1" class="form-label">Attach Certificate #1</label>
                                            <input type="file" name="certificate_file_1" id="certificate_file_1" class="form-control" hidden>
                                            <div class="input-group">
                                                <input type="text" class="form-control uploaded" id="uploaded_cert_1" value="{{ $certificateData['original_name_1'] ?? '' }}" readonly>
                                                <button class="btn btn-outline-secondary attach-btn" type="button" data-index="1" onclick="triggerFileInput(1)" disabled><i class="bi bi-paperclip me-1" style="font-size: 1rem"></i>Attach</button>
                                            </div>
                                        </div>
                                        <!-- Hidden input to indicate deletion -->
                                        <input type="hidden" name="delete_certificate_file_1" id="delete_certificate_file_1" value="0">
                                    </div>

                                    <!-- Certificate entry 2 -->
                                    <div class="certificate-container certificate-2 col-12 d-flex justify-content-center align-items-end mt-2 gap-2 position-relative">
                                        <!-- Delete icon -->
                                        <i class="bi bi-trash-fill me-2 text-danger delete-certificate" style="cursor:pointer; position: absolute; left: 0;" data-index="2"></i>
                                        <!-- Certificate Name field -->
                                        <div class="col-md-5 col-12">
                                            <label for="certification_name_2" class="form-label">Certification Name #2</label>
                                            <input type="text" name="certificate_name_2" id="certification_name_2" class="form-control" value="{{ $certificateData['certificate_name_2'] ?? '' }}" readonly>
                                        </div>
                                        <!-- Certificate File field -->
                                        <div class="col-md-5 col-12">
                                            <label for="certificate_file_2" class="form-label">Attach Certificate #2</label>
                                            <input type="file" name="certificate_file_2" id="certificate_file_2" class="form-control" hidden>
                                            <div class="input-group">
                                                <input type="text" class="form-control uploaded" id="uploaded_cert_2" value="{{ $certificateData['original_name_2'] ?? '' }}" readonly>
                                                <button class="btn btn-outline-secondary attach-btn" type="button" data-index="2" onclick="triggerFileInput(2)" disabled><i class="bi bi-paperclip me-1" style="font-size: 1rem"></i>Attach</button>
                                            </div>
                                        </div>
                                        <!-- Hidden input to indicate deletion -->
                                        <input type="hidden" name="delete_certificate_file_2" id="delete_certificate_file_2" value="0">
                                    </div>

                                    <!-- Certificate entry 3 -->
                                    <div class="certificate-container certificate-3 col-12 d-flex justify-content-center align-items-end mt-2 gap-2 position-relative">
                                        <!-- Delete icon -->
                                        <i class="bi bi-trash-fill me-2 text-danger delete-certificate" style="cursor:pointer; position: absolute; left: 0;" data-index="3"></i>
                                        <!-- Certificate Name field -->
                                        <div class="col-md-5 col-12">
                                            <label for="certification_name_3" class="form-label">Certification Name #3</label>
                                            <input type="text" name="certificate_name_3" id="certification_name_3" class="form-control" value="{{ $certificateData['certificate_name_3'] ?? '' }}" readonly>
                                        </div>
                                        <!-- Certificate File field -->
                                        <div class="col-md-5 col-12">
                                            <label for="certificate_file_3" class="form-label">Attach Certificate #3</label>
                                            <input type="file" name="certificate_file_3" id="certificate_file_3" class="form-control" hidden>
                                            <div class="input-group">
                                                <input type="text" class="form-control uploaded" id="uploaded_cert_3" value="{{ $certificateData['original_name_3'] ?? '' }}" readonly>
                                                <button class="btn btn-outline-secondary attach-btn" type="button" data-index="3" onclick="triggerFileInput(3)" disabled><i class="bi bi-paperclip me-1" style="font-size: 1rem"></i>Attach</button>
                                            </div>
                                        </div>
                                        <!-- Hidden input to indicate deletion -->
                                        <input type="hidden" name="delete_certificate_file_3" id="delete_certificate_file_3" value="0">
                                    </div>
                                </div>


                            </div>

                            <script>

                                document.getElementById('editProfessional-btn').addEventListener('click', function() {
                                    document.getElementById('cancelProfessional-btn').style.display = 'inline-block';
                                    document.getElementById('updateProfessional-btn').style.display = 'inline-block';
                                    document.getElementById('editProfessional-btn').style.display = 'none';
                                });

                                document.getElementById('cancelProfessional-btn').addEventListener('click', function() {
                                    document.getElementById('cancelProfessional-btn').style.display = 'none';
                                    document.getElementById('updateProfessional-btn').style.display = 'none';
                                    document.getElementById('editProfessional-btn').style.display = 'inline-block';

                                });

                                document.getElementById('editProfessional-btn').addEventListener('click', function() {
                                document.getElementById('cancelProfessional-btn').style.display = 'inline-block';
                                document.getElementById('updateProfessional-btn').style.display = 'inline-block';
                                document.getElementById('editProfessional-btn').style.display = 'none';
                                // Enable input fields
                                document.querySelector('.about').removeAttribute('disabled');
                                document.querySelector('.add-new-work').removeAttribute('disabled');
                                document.querySelector('.add-new-education').removeAttribute('disabled');
                                document.querySelectorAll('.attach-btn').forEach(input => {
                                    if (!input.classList.contains('uploaded')) {
                                        input.removeAttribute('disabled');
                                    }
                                });
                                document.querySelectorAll('.certificate_file').forEach(input => {
                                    if (!input.classList.contains('uploaded')) {
                                        input.removeAttribute('disabled');
                                    }
                                });
                                document.querySelectorAll('input').forEach(input => {
                                    if (!input.classList.contains('uploaded')) {
                                        input.removeAttribute('readonly');
                                    }
                                });
                                document.querySelectorAll('select').forEach(select => select.removeAttribute('disabled'));
                                document.querySelectorAll('.delete-education').forEach(icon => icon.style.display = 'inline');
                                document.querySelectorAll('.delete-work').forEach(icon => icon.style.display = 'inline');
                                document.querySelectorAll('.delete-certificate').forEach(icon => icon.style.display = 'inline');
                            });

                            document.getElementById('cancelProfessional-btn').addEventListener('click', function() {
                                document.getElementById('cancelProfessional-btn').style.display = 'none';
                                document.getElementById('updateProfessional-btn').style.display = 'none';
                                document.getElementById('editProfessional-btn').style.display = 'inline-block';
                                // Disable input fields again
                                document.querySelector('.about').setAttribute('disabled', true);
                                document.querySelector('.add-new-work').setAttribute('disabled', true);
                                document.querySelector('.add-new-education').setAttribute('disabled', true);
                                document.querySelectorAll('.attach-btn').forEach(input => {
                                    if (!input.classList.contains('uploaded')) {
                                        input.setAttribute('disabled', true);
                                    }
                                });
                                document.querySelectorAll('.certificate_file').forEach(input => {
                                    if (!input.classList.contains('uploaded')) {
                                        input.setAttribute('disabled', true);
                                    }
                                });
                                document.querySelectorAll('input').forEach(input => {
                                    if (!input.classList.contains('uploaded')) {
                                        input.setAttribute('readonly', true);
                                    }
                                });
                                document.querySelectorAll('select').forEach(select => select.setAttribute('disabled', true));
                                document.querySelectorAll('.delete-education').forEach(icon => icon.style.display = 'none');
                                document.querySelectorAll('.delete-work').forEach(icon => icon.style.display = 'none');
                                document.querySelectorAll('.delete-certificate').forEach(icon => icon.style.display = 'none');
                            });

                            document.querySelectorAll('.delete-certificate').forEach(function(trashIcon) {
                                trashIcon.addEventListener('click', function() {
                                    const index = this.getAttribute('data-index');
                                    document.getElementById('certification_name_' + index).value = '';
                                    document.querySelector('#certificate_file_' + index).value = '';
                                    document.querySelector('.certificate-container.certificate-' + index + ' .uploaded').value = '';
                                    document.getElementById('delete_certificate_file_' + index).value = '1';
                                });
                            });




                                document.addEventListener('DOMContentLoaded', function() {
                                    const addButton = document.querySelector('.add-new-education');
                                    const educationEntries = document.getElementById('education-entries');

                                    addButton.addEventListener('click', function() {
                                        // Create a new container div for the educational entry
                                        const newEntry = document.createElement('div');
                                        newEntry.classList.add('educ-container', 'col-12', 'd-flex', 'justify-content-center', 'align-items-end', 'mt-2', 'position-relative');

                                        // Add delete icon
                                        const deleteIcon = document.createElement('i');
                                        deleteIcon.classList.add('bi', 'bi-trash-fill', 'me-2', 'text-danger', 'delete-education');
                                        deleteIcon.style.position = 'absolute';
                                        deleteIcon.style.left = '0';
                                        deleteIcon.style.display = 'inline';
                                        deleteIcon.style.cursor = 'pointer';
                                        deleteIcon.addEventListener('click', function() {
                                            newEntry.remove();
                                        });
                                        newEntry.appendChild(deleteIcon);

                                        // Create and append the degree field
                                        const degreeDiv = document.createElement('div');
                                        degreeDiv.classList.add('col-md-3', 'col-12');
                                        degreeDiv.innerHTML = `
                                            <label for="degree" class="form-label">Degree</label>
                                            <input type="text" name="degree[]" class="form-control" value="">
                                        `;
                                        newEntry.appendChild(degreeDiv);

                                        // Create and append the major field
                                        const majorDiv = document.createElement('div');
                                        majorDiv.classList.add('col-md-3','col-12', 'mx-2');
                                        majorDiv.innerHTML = `
                                            <label for="major" class="form-label">Major</label>
                                            <input type="text" name="major[]" class="form-control" value="">
                                        `;
                                        newEntry.appendChild(majorDiv);

                                        // Create and append the school field
                                        const schoolDiv = document.createElement('div');
                                        schoolDiv.classList.add('col-md-3', 'col-12');
                                        schoolDiv.innerHTML = `
                                            <label for="school" class="form-label">University/College</label>
                                            <input type="text" name="school[]" class="form-control" value="">
                                        `;
                                        newEntry.appendChild(schoolDiv);

                                        // Create and append the graduation year field
                                        const graduationYearDiv = document.createElement('div');
                                        graduationYearDiv.classList.add('col-md-3','col-12', 'mx-2');
                                        graduationYearDiv.innerHTML = `
                                            <label for="graduation_year" class="form-label">Graduation Year</label>
                                            <input type="text" name="graduation_year[]" class="form-control" value="">
                                        `;
                                        newEntry.appendChild(graduationYearDiv);

                                        // Append the new educational entry to the container
                                        educationEntries.appendChild(newEntry);
                                    });

                                    // Enable deletion of old entries
                                    document.querySelectorAll('.delete-education').forEach(icon => {
                                        icon.addEventListener('click', function() {
                                            icon.parentElement.remove();
                                        });
                                    });
                                });

                                document.addEventListener('DOMContentLoaded', function() {
                                    const addButton = document.querySelector('.add-new-work');
                                    const workEntries = document.getElementById('work-entries');

                                    addButton.addEventListener('click', function() {
                                        // Create a new container div for the educational entry
                                        const newEntry = document.createElement('div');
                                        newEntry.classList.add('work-container', 'col-12', 'd-flex', 'justify-content-center', 'align-items-end', 'mt-2', 'position-relative');

                                        // Add delete icon
                                        const deleteIcon = document.createElement('i');
                                        deleteIcon.classList.add('bi', 'bi-trash-fill', 'me-2', 'text-danger', 'delete-work');
                                        deleteIcon.style.position = 'absolute';
                                        deleteIcon.style.left = '0';
                                        deleteIcon.style.display = 'inline';
                                        deleteIcon.style.cursor = 'pointer';
                                        deleteIcon.addEventListener('click', function() {
                                            newEntry.remove();
                                        });
                                        newEntry.appendChild(deleteIcon);

                                        // Create and append the degree field
                                        const jobDiv = document.createElement('div');
                                        jobDiv.classList.add('col-md-3', 'col-12');
                                        jobDiv.innerHTML = `
                                            <label for="job_title" class="form-label">Job Title</label>
                                            <input type="text" name="job_title[]" class="form-control" value="">
                                        `;
                                        newEntry.appendChild(jobDiv);

                                        // Create and append the major field
                                        const companyNameDiv = document.createElement('div');
                                        companyNameDiv.classList.add('col-md-3','col-12', 'mx-2');
                                        companyNameDiv.innerHTML = `
                                            <label for="company_name" class="form-label">Company/Organization Name</label>
                                            <input type="text" name="company_name[]" class="form-control" value="">
                                        `;
                                        newEntry.appendChild(companyNameDiv);

                                        // Create and append the school field
                                        const yearsExperienceDiv = document.createElement('div');
                                        yearsExperienceDiv.classList.add('col-md-3', 'col-12');
                                        yearsExperienceDiv.innerHTML = `
                                            <label for="years_experience" class="form-label">Years of Experience</label>
                                            <input type="text" name="years_experience[]" class="form-control" value="">
                                        `;
                                        newEntry.appendChild(yearsExperienceDiv);

                                        // Append the new educational entry to the container
                                        workEntries.appendChild(newEntry);
                                    });

                                    // Enable deletion of old entries
                                    document.querySelectorAll('.delete-work').forEach(icon => {
                                        icon.addEventListener('click', function() {
                                            icon.parentElement.remove();
                                        });
                                    });
                                });


                                    function triggerFileInput(index) {
                                        document.getElementById('certificate_file_' + index).click();
                                    }

                                    function displayFileName(inputIndex) {
                                        const fileInput = document.getElementById(`certificate_file_${inputIndex}`);
                                        const fileNameDisplay = document.querySelector(`#certificate-entries .certificate-${inputIndex} .uploaded`);

                                        fileInput.addEventListener('change', function() {
                                            const files = this.files;
                                            if (files.length > 0) {
                                                const file = files[0];
                                                const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
                                                const maxFileSize = 10 * 1024 * 1024; // 10 MB

                                                // Check if file type is allowed
                                                if (!allowedTypes.includes(file.type)) {
                                                    swal({
                                                        title: 'Invalid File Type',
                                                        text: 'Please upload PDF, JPG, or PNG files only.',
                                                        icon: 'error',
                                                        button: 'OK'
                                                    });
                                                    fileInput.value = ''; // Clear the file input
                                                    fileNameDisplay.value = ''; // Clear the file name display
                                                    return;
                                                }

                                                // Check if file size is within limit
                                                if (file.size > maxFileSize) {
                                                    swal({
                                                        title: 'File Too Large',
                                                        text: 'Please upload a file smaller than 10 MB.',
                                                        icon: 'warning',
                                                        button: 'OK'
                                                    });
                                                    fileInput.value = ''; // Clear the file input
                                                    fileNameDisplay.value = ''; // Clear the file name display
                                                    return;
                                                }

                                                // File is valid, display file name
                                                fileNameDisplay.value = file.name;
                                            } else {
                                                // No file selected, clear file name display
                                                fileNameDisplay.value = '';
                                            }
                                        });
                                    }


                                    // Call the functions for each file input field
                                    displayFileName(1);
                                    displayFileName(2);
                                    displayFileName(3);


                            </script>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



