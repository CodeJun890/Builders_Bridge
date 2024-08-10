@extends('components.Layout.change-password_layout')


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
        <div class="body px-5">
            <div class="d-flex justify-content-between align-items-center mt-3 nav-responsive-breadcrumb" data-aos="fade-right" data-aos-delay="300">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item p-0"><a href="{{route('dashboard.get')}}"><i class="bi bi-house-fill me-1"></i>Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                </nav>
            </div>
            <div class="mt-3" data-aos="fade-down"  data-aos-delay="200">
                <h4 class="mb-4">Change Password</h4>
            </div>
            <div class="container-fluid change-password-container p-5" style="background: #ffffff; border-radius: 20px;" data-aos="fade-down"  data-aos-delay="200">
                <form action="{{route('password.post')}}" id="changePasswordForm" method="POST" class="d-flex align-items-start flex-column">
                    @csrf
                    <div class="row align-items-center w-100">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-xl-6 me-md-2 me-0">
                                <div class="col-12">
                                    <label for="old_password" class="form-label">Old Password</label>
                                    <div class="input-group w-100">
                                        <input type="password" name="old_password" id="old_password" class="form-control" autocomplete="off" required>
                                        <span class="input-group-text" id="toggleOldPassword"><i class="fa-regular fa-eye"></i></span>
                                    </div>
                                </div>
                                <div class="col-12 mt-md-3 mt-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <div class="input-group w-100">
                                        <input type="password" name="new_password" id="new_password" class="form-control" autocomplete="off" required>
                                        <span class="input-group-text" id="toggleNewPassword"><i class="fa-regular fa-eye"></i></span>
                                    </div>
                                    <span class="text-danger pass-not-match">Password does not match</span>
                                </div>
                                <div class="col-12 mt-md-3 mt-3">
                                    <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                                    <div class="input-group w-100">
                                        <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" autocomplete="off" required>
                                        <span class="input-group-text" id="toggleConfirmNewPassword"><i class="fa-regular fa-eye"></i></span>
                                    </div>
                                    <span class="text-danger pass-not-match-confirm">Confirm password does not match</span>
                                </div>
                                <div class="col-12 mt-md-3 mt-3 text-end">
                                    <button type="button" class="btn btn-success" id="submitBtn">Save Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection



