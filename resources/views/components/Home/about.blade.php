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
    <div class="container-fluid contact">
        <h1 class="fw-bold text-light" data-aos="fade-down">About Us</h1>
    </div>
    <div class="container pb-4 nav-responsive-breadcrumb" style="overflow: hidden">
        <nav class="my-5 text-start"  id="contact-nav" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb" style='font-family: "Lato", "sans-serif";'>
            <li class="breadcrumb-item fw-bold"><a href="{{route('home.get')}}" class="text-muted" style='text-decoration: none; '>Home</a></li>
            <li class="breadcrumb-item fw-bold active text-dark" style='text-decoration: none; ' aria-current="page">About Us</li>
            </ol>
        </nav>
        <div class="container about-section">
            <h1 class="about-title">About Builders Bridge</h1>
            <p class="about-text">
                Builders Bridge is a revolutionary platform designed to connect service providers and renters within the construction industry. Our mission is to facilitate seamless transactions between those who offer services or items and those who need them, fostering a community of trust and reliability.
            </p>
            <p class="about-text">
                Whether you're a contractor looking to rent specialized equipment or a service provider offering skilled labor, Builders Bridge is your go-to solution. Our platform streamlines the rental process, making it easy for users to find what they need, when they need it.
            </p>
            <h2 class="about-title">Why Choose Builders Bridge?</h2>

            <ul class="list-group about-list">
                <li class="list-group-item">
                    <strong>Comprehensive Listings:</strong> Access a wide range of services and items available for rent, all in one place.
                </li>
                <li class="list-group-item">
                    <strong>User-Friendly Interface:</strong> Our platform is designed with ease of use in mind, allowing you to quickly navigate and find what you need.
                </li>
                <li class="list-group-item">
                    <strong>Community Trust:</strong> Build your reputation within our community through ratings and reviews, ensuring reliable and trustworthy interactions.
                </li>
                <li class="list-group-item">
                    <strong>Support:</strong> Our dedicated support team is here to help you with any questions or issues you may encounter.
                </li>
            </ul>
        </div>
        <div class="container-fluid mt-5">
            <header class="text-center  team-header d-flex justify-content-center align-items-center flex-column" >
                <h2 class="text-capitalize fw-bold">Meet our team</h2>
                <div class="lead text-secondary" >Meet the driving force behind Builders Bridge</div>
            </header>
            <div class="container my-3 d-flex justify-content-center align-items-center flex-wrap gap-2">
                <div class="card" style="width: 20rem;">
                    <img src="{{asset('assets/images/team-1.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                      <span class="lead text-center mb-1 fw-bold">Danelle Beltran</span>
                      <span><i class="bi bi-envelope-at-fill"></i> danelle.beltran@cvsu.edu.ph</span>
                      <span><i class="bi bi-backpack-fill"></i> BS Civil Engineering | BSCE 4-2</span>
                      <hr>
                      <div class="d-flex align-items-center justify-content-between">
                        <span><i class="bi bi-telephone-fill me-1"></i> 09851644332</span>
                        <a href="https://www.facebook.com/danellesjb?mibextid=LQQJ4d" target="_blank" style="text-decoration: none;" class="d-flex align-items-center gap-2">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>Facebook
                        </a>
                      </div>
                    </div>
                  </div>
                <div class="card" style="width: 20rem;">
                    <img src="{{asset('assets/images/team-2.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                      <span class="lead text-center mb-1 fw-bold">Ray Mark Roguel</span>
                      <span><i class="bi bi-envelope-at-fill"></i> raymark.roguel@cvsu.edu.ph</span>
                      <span><i class="bi bi-backpack-fill"></i> BS Civil Engineering | BSCE 4-2</span>
                      <hr>
                      <div class="d-flex align-items-center justify-content-between">
                        <span><i class="bi bi-telephone-fill me-1"></i> 09762649036</span>
                        <a href="https://www.facebook.com/raymarkabol?mibextid=ZbWKwL" target="_blank" style="text-decoration: none;" class="d-flex align-items-center gap-2">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>Facebook
                        </a>
                      </div>
                    </div>
                  </div>
                <div class="card" style="width: 20rem;">
                    <img src="{{asset('assets/images/team-3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                      <span class="lead text-center mb-1 fw-bold">Wency J. Romea</span>
                      <span><i class="bi bi-envelope-at-fill"></i> wency.romea@cvsu.edu.ph</span>
                      <span><i class="bi bi-backpack-fill"></i> BS Civil Engineering | BSCE 4-2</span>
                      <hr>
                      <div class="d-flex align-items-center justify-content-between">
                        <span><i class="bi bi-telephone-fill me-1"></i> 09929967541</span>
                        <a href="https://www.facebook.com/wency.romea/" target="_blank" style="text-decoration: none;" class="d-flex align-items-center gap-2">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>Facebook
                        </a>
                      </div>
                    </div>
                  </div>
                <div class="card" style="width: 20rem;">
                    <img src="{{asset('assets/images/team-4.png')}}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                      <span class="lead text-center mb-1 fw-bold">Alyssah Suyat</span>
                      <span><i class="bi bi-envelope-at-fill"></i> alyssah.suyat@cvsu.edu.ph</span>
                      <span><i class="bi bi-backpack-fill"></i> BS Civil Engineering | BSCE 4-2</span>
                      <hr>
                      <div class="d-flex align-items-center justify-content-between">
                        <span><i class="bi bi-telephone-fill me-1"></i> 09177070677</span>
                        <a href="https://www.facebook.com/alyssahsuyat/" target="_blank" style="text-decoration: none;" class="d-flex align-items-center gap-2">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>Facebook
                        </a>
                      </div>
                    </div>
                  </div>
                <div class="card" style="width: 20rem;">
                    <img src="{{asset('assets/images/team-5.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                      <span class="lead text-center mb-1 fw-bold">Christine Jane B.Tinte</span>
                      <span><i class="bi bi-envelope-at-fill"></i> christinejane.tinte@cvsu.edu.ph</span>
                      <span><i class="bi bi-backpack-fill"></i> BS Civil Engineering | BSCE 4-2</span>
                      <hr>
                      <div class="d-flex align-items-center justify-content-between">
                        <span><i class="bi bi-telephone-fill me-1"></i> 09317929587</span>
                        <a href="https://www.facebook.com/chrstnjane05?mibextid=ZbWKwL" target="_blank" style="text-decoration: none;" class="d-flex align-items-center gap-2">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>Facebook
                        </a>
                      </div>
                    </div>
                  </div>
                <div class="card" style="width: 20rem;">
                    <img src="{{asset('assets/images/team-6.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                      <span class="lead text-center mb-1 fw-bold">Paul Andrei N. Vidallo</span>
                      <span><i class="bi bi-envelope-at-fill"></i> paulandrei.vidallo@cvsu.edu.ph</span>
                      <span><i class="bi bi-backpack-fill"></i> BS Civil Engineering | BSCE 4-2</span>
                      <hr>
                      <div class="d-flex align-items-center justify-content-between">
                        <span><i class="bi bi-telephone-fill me-1"></i> 09452348076</span>
                        <a href="https://www.facebook.com/paul.vidallo.507?mibextid=ZbWKwL" target="_blank" style="text-decoration: none;" class="d-flex align-items-center gap-2">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>Facebook
                        </a>
                      </div>
                    </div>
                  </div>
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

