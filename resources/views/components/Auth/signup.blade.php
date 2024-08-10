@extends('components.Layout.signup_layout')


@section('signup')
    <section id="signup">
        <div class="homeBtnOne">
            <a href="{{route('home.get')}}" style="color: #fff; text-decoration: none; position: absolute; top: 30px; left: 30px; z-index: 280; font-size: 1rem;"><i class="fa-solid fa-house text-light me-2" style="font-size: 1.5rem"></i> Home</a>
        </div>
        <div id="imgbox">
            <img src="{{asset('assets/images/login-bg.jpg')}}" alt="Login background" data-aos="fade-zoom-in"
            data-aos-easing="ease-in-back"
            data-aos-delay="200"
            data-aos-offset="0">
        </div>
        <div id="contentBox" class="d-flex justify-content-center align-items-center" >
            <form action="{{route('signup.post')}}" class="d-flex flex-column w-100" style="position: relative;" id="signupForm" method="POST" data-aos="fade-down"  data-aos-delay="200">
                @csrf
                <div class="homeBtnTwo">
                    <a href="{{route('home.get')}}" style="color: #000; text-decoration: none; position: absolute; top: 20px; left: 20px; z-index: 280; font-size: 1rem;"><i class="fa-solid fa-house me-2" style="font-size: 1.5rem"></i></a>
                </div>
                <div class="d-flex justify-content-center align-items-center" id="signupLogo">
                    <img src="{{asset('assets/images/logo.png')}}" alt="Builder's Bridge Logo">
                </div>
                <div class="d-flex justify-content-center align-items-center flex-column mt-2">
                    <h3>Create a new account</h3>
                    <span>It's quick and easy!</span>
                </div>
                <div class="row justify-content-center align-items-center mt-4">
                    <div class="col-sm-4  col-12 pe-sm-1 p-0">
                        <input type="text" name="firstname" id="firstname" placeholder="Firstname" class="form-control" autocomplete="on" required>
                    </div>
                    <div class="col-sm-4  col-12 px-sm-1 p-0 my-2 my-sm-0">
                        <input type="text" name="middlename" id="middlename" placeholder="Middlename" class="form-control" autocomplete="on">
                    </div>
                    <div class="col-sm-4  col-12 ps-sm-1 p-0">
                        <input type="text" name="lastname" id="lastname" placeholder="Lastname" class="form-control" autocomplete="on" required>
                    </div>
                    <div class="col-sm-12 col-12  p-0 mt-2">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" autocomplete="on" required>
                    </div>
                    <div class="col-sm-12 col-12  p-0 mt-2">
                        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Mobile Number" class="form-control" autocomplete="on" required>
                    </div>
                    <div class="col-sm-6 col-12 mt-2 pe-sm-1 p-0">
                        <div class="input-group">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" autocomplete="off" required>
                            <span class="input-group-text" id="togglePassword"><i class="fa-regular fa-eye"></i></span>
                        </div>
                        <span class="text-danger pass-not-match">Password does not match</span>
                    </div>
                    <div class="col-sm-6 col-12 mt-2 ps-sm-1 p-0">
                        <div class="input-group">
                            <input type="password" id="confirmPassword" placeholder="Confirm Password" class="form-control" autocomplete="off" required>
                            <span class="input-group-text" id="toggleConfirmPassword"><i class="fa-regular fa-eye"></i></span>
                        </div>
                        <span class="text-danger pass-not-match pass-not-match-confirm">Confirm password does not match</span>
                    </div>
                    <div class="col-sm-12 col-12  p-0 mt-1">
                        <label for="birthday">Birthday <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-placement="right" title="Please enter your birthday in the format MM/DD/YYYY."></i></label>
                        <input type="text" name="birthday" id="birthday" class="form-control" placeholder="mm/dd/yyyy" required>
                    </div>
                    <div class="col-sm-12 col-12  p-0 mt-1">
                        <label for="gender">Gender <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-placement="right" title="Select your gender."></i></label>
                        <select class="form-select" name="gender" id="gender" required>
                            <option value="" hidden>Select your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                            <option value="Prefer not to say">Prefer not to say</option>
                        </select>
                    </div>
                    <div class="text-center mt-4 ">
                        <button type="button" id="submitBtn" class="btn btn-success w-50 proceedBtn">Sign Up</button>
                        <div class="mt-3 text-center">
                            <span>Already have an account? <a href="{{route('login.get')}}">Log In</a></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection


