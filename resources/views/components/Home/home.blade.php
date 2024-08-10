@extends('components.Layout.home_layout')

@section('navbar')
    <nav class="py-3">
        <a href="{{route('home.get')}}" class="logo">
            <img src="{{asset('assets/images/logo.png')}}" alt="Builder's Bridge Logo">
        </a>
        <ul class="nav-links">
            <li><a href="{{route('home.get')}}">Home</a></li>
            <li><a href="{{route('about.get')}}">About</a></li>
            <li><a href="{{route('contact.get')}}">Contact</a></li>
            <li><a href="{{route('faq.get')}}">FAQs</a></li>
            <li><a href="{{route('login.get')}}" id="loginBtn">Login</a></li>
        </ul>
        <div class="menu-icon">
            <i class="fa-solid fa-bars"></i>
        </div>
    </nav>
@endsection

@section('home')
    <section id="hero-section">
        <div class="text-center text-light" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" data-aos="fade-down" data-aos-delay="200">
            <span class="text-uppercase" style="font-size: 0.8rem">
                Bridge Your Engineering Needs
            </span>
            <div class="display-1 fw-bold">
                Builders Bridge
            </div>
            <span>
                Rentals and Services Tailored to Your Engineering Projects
            </span>
            <div class="mt-4">
                <a href="{{route('signup.get')}}" id="registerBtn">Register Now</a>
            </div>
        </div>
    </section>
    <section id="features">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5 feature-text text-center" data-aos="fade-up">
                    <span style="font-size: 0.8rem">
                        TAKING CARE OF EVERY CLIENT
                    </span>
                    <div class="display-4 fw-bold">
                        Key Features
                    </div>
                    <span>
                        At Builder's Bridge, we're committed to providing you with the tools and support you need to succeed
                    </span>
                </div>
                <div class="col-12 py-5 text-center">
                    <div class="row justify-content-center gap-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-md-3 d-flex flex-column justify-content-center border border-2 border-dark rounded p-3 ">
                            <div class="d-flex align-items-center flex-column">
                                 <i class="fas fa-toolbox" style="font-size: 3rem;"></i>
                            </div>
                            <span class="mt-2">
                             Builder's Bridge offers a tailored rental catalog for engineering projects.
                            </span>
                         </div>
                         <div class="col-md-3  d-flex flex-column justify-content-center border border-2 border-dark rounded p-3 ">
                            <div class="text-center">
                                 <i class="fas fa-hands-helping" style="font-size: 3rem;"></i>
                            </div>
                             <span class="mt-2">
                                 Our expert team guides you from equipment selection to troubleshooting, ensuring project success.
                             </span>
                         </div>
                         <div class="col-md-3  d-flex flex-column justify-content-center border border-2 border-dark rounded p-3 ">
                             <div class="d-flex align-items-center flex-column">
                                 <i class="far fa-clock" style="font-size: 3rem;"></i>
                             </div>
                             <span class="mt-2">
                                 We offer flexible rental options to suit project durations, ensuring timely access to resources.
                             </span>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------ Scroll to top icon --------->
    <a href="#" id="goTop"><i class="fa-solid fa-arrow-up text-light"></i></a>
@endsection

@section('footer')
    <section class="bg-dark" id="footer" style="position: relative;">
        <div class="row justify-content-center align-items-center py-5">
            <div class="col-4 text-center text-light">
                <span style="font-size: 0.8rem">&copy; 2024 BUILDERS BRIDGE</span>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <a href="{{route('home.get')}}" class="logo">
                    <img src="{{asset('assets/images/logo.png')}}" alt="Builder's Bridge Logo" style="filter: brightness(0) invert(1);">
                </a>
            </div>
            <div class="col-4 text-center text-light">
                <div class="icons">
                    <i class="fa-brands fa-facebook-f mx-2"></i>
                    <i class="fa-brands fa-square-instagram mx-2"></i>
                    <i class="fa-brands fa-youtube mx-2"></i>
                </div>
            </div>
        </div>
        <div class="text-center text-light w-100 border-top border-1 border-secondary p-2" id="bottom-footer" style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%);">
            <span>&copy; 2024 All Rights Reserved</span>
        </div>
    </section>
@endsection


