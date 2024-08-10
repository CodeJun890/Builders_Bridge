@extends('components.Layout.login_layout')



@section('login')

    <!------- SUCCESS NOTIFICATION --------->
    @if(session('success'))
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Good job!", "{{session('success')}}", "success");
        </script>
    @endif
    <!------- ERROR NOTIFICATION --------->
    @if(session('error'))
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Error", "{{session('error')}}", "error");
        </script>
    @endif
    <section id="login">
        <div class="homeBtnOne">
            <a href="{{route('home.get')}}" style="color: #fff; text-decoration: none; position: absolute; top: 30px; left: 30px; z-index: 280; font-size: 1rem;"><i class="fa-solid fa-house text-light me-2" style="font-size: 1.5rem"></i> Home</a>
        </div>
        <div id="imgbox">
            <img src="{{asset('assets/images/login-bg.jpg')}}" alt="Login background" data-aos="fade-zoom-in"
            data-aos-easing="ease-in-back"
            data-aos-delay="200"
            data-aos-offset="0">
        </div>
        <div id="contentBox" class="d-flex justify-content-center align-items-center">
            <form action="{{ route('login.post') }}" class="d-flex flex-column w-100" style="position: relative;" id="loginForm" method="POST" data-aos="fade-down" data-aos-delay="200">
                @csrf
                <div class="homeBtnTwo">
                    <a href="{{ route('home.get') }}" style="color: #000; text-decoration: none; position: absolute; top: 20px; left: 20px; z-index: 280; font-size: 1rem;">
                        <i class="fa-solid fa-house me-2" style="font-size: 1.5rem"></i>
                    </a>
                </div>
                <div class="d-flex justify-content-center align-items-center" id="loginLogo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Builder's Bridge Logo">
                </div>
                <h1 class="text-center">LOGIN</h1>

                <div class="mt-4">
                    <label for="email" class="form-label">Email Address </label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address" autocomplete="on" value="{{ old('email') }}">
                </div>
                @if(session('incorrectCredential'))
                    <span class="text-danger" style="font-size: 0.75rem;">{{session('incorrectCredential')}}</span>
                @endif
                <div class="mt-2">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" autocomplete="off">
                        <button class="btn btn-outline-secondary" type="button" id="hide" onclick="togglePassword()"><i class="fa-regular fa-eye"></i></button>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <span><input type="checkbox" id="remember" class="me-2">Remember Me</span>
                    <span><a href="#">Forgot password</a></span>
                </div>

                <div class="d-flex mt-4">
                    <button type="submit" class="btn btn-success w-100 proceedBtn">Sign In</button>
                </div>

                <div class="mt-3 text-center">
                    <span>Don't have an account? <a href="{{ route('signup.get') }}">Sign Up</a></span>
                </div>
            </form>
        </div>

    </section>
@endsection
