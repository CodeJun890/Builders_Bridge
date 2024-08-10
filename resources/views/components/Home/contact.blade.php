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
    <div class="container-fluid contact">
        <h1 class="fw-bold text-light" data-aos="fade-down">Contact Us</h1>
    </div>
    <div class="container nav-responsive-breadcrumb" style="overflow: hidden">
        <nav class="my-5 text-start"  id="contact-nav" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb" style='font-family: "Lato", "sans-serif";'>
            <li class="breadcrumb-item fw-bold"><a href="{{route('home.get')}}" class="text-muted" style='text-decoration: none; '>Home</a></li>
            <li class="breadcrumb-item fw-bold active text-dark" style='text-decoration: none; ' aria-current="page">Contacts</li>
            </ol>
        </nav>
        <div class="row justify-content-center align-items-start py-2 my-5">
            <div class="col-lg-7 mt-5 contact-cont" data-aos="zoom-in-down" data-aos-delay="200">
                <div class="contact-text">
                    <h1 class="fw-bold">Get in touch</h1>
                    <p class="mt-5"><i class="fa-solid fa-location-dot"></i> Bancod, Indang, Cavite</p>
                    <p class="mt-4"><i class="fa-solid fa-envelope"></i> buildersbridge@gmail.com</p>
                    <p class="mt-4"><i class="fa-solid fa-phone"></i> +639762649036</p>
                    <div class="map mt-4 py-3">
                        <h3 class="fw-bold">Vicinity Map</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15470.407940522198!2d120.8748995658767!3d14.21806805035402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd81f30e112897%3A0xdc9e103f06d68ecd!2sBancod%2C%20Indang%2C%20Cavite!5e0!3m2!1sen!2sph!4v1716976446438!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mt-5 shadow p-5 contact-send" data-aos="zoom-in-down" data-aos-delay="400">
                <h3 class="text-center">Feel free to send us a message!</h3>
                <p class="text-center">You can contact us through here</p>
                <form action="{{route('post-message.get')}}" method="post">
                    @csrf
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 d-flex flex-column">
                            <div class="form mt-2">
                                <label for="name" class="form-label">Name <span style="color: red"> *</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="form mt-2">
                                <label for="email" class="form-label">Email <span style="color: red"> *</span></label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter your E-Mail">
                            </div>
                            <div class="form mt-2">
                                <label for="phoneNumber" class="form-label">Contact Number <span style="color: red"> *</span></label>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Enter your number">
                            </div>
                            <div class="form mt-2">
                                <label for="message" class="form-label">Message<span style="color: red"> *</span></label>
                                <textarea type="text" name="message" id="message" class="form-control" placeholder="message" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn text-uppercase btn-success mt-5">
                                Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

