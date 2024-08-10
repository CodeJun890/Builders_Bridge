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
    <div class="container-fluid contact faq">
        <h1 class="fw-bold text-light" data-aos="fade-down">Frequently Ask Question</h1>
    </div>
    <div class="container nav-responsive-breadcrumb pb-5">
        <nav class="my-5 text-start"  id="contact-nav" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb" style='font-family: "Lato", "sans-serif";'>
            <li class="breadcrumb-item fw-bold"><a href="{{route('home.get')}}" class="text-muted" style='text-decoration: none;'>Home</a></li>
            <li class="breadcrumb-item fw-bold active text-dark" style='text-decoration: none; ' aria-current="page">Frequently Ask Question</li>
            </ol>
        </nav>
        <!---------- START QUESTIONS ---------->
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        How do I list my services or items for rent on Builders Bridge?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        To list your services or items for rent on Builders Bridge, follow these simple steps:
                        <ol class="mt-2">
                            <li><strong>Sign Up or Log In:</strong> Create an account or log in to your existing account on Builders Bridge.</li>
                            <li><strong>Navigate to the Listing Page:</strong> Go to the 'List a Service' or 'List an Item' section from your dashboard.</li>
                            <li><strong>Fill in the Details:</strong> Provide detailed information about your service or item, including description, availability, pricing, and any special terms.</li>
                            <li><strong>Upload Photos:</strong> Add high-quality photos to make your listing more attractive to potential renters.</li>
                            <li><strong>Submit to post:</strong> Once you’ve filled in all the details, submit your listing.</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="accordion-item my-4">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        How does the rental process work on Builders Bridge?
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        The process of connecting with service providers on Builders Bridge is straightforward:
                        <ol class="mt-2">
                            <li><strong>Browse and Select:</strong> Explore the listings to find the service or item you need. Use filters to narrow down your search.</li>
                            <li><strong>Contact the Provider:</strong> Click on the listing to view details. Contact the provider directly through the provided social links (e.g., email, LinkedIn, etc.) to discuss your needs and requirements.</li>
                            <li><strong>Discuss and Confirm:</strong> Communicate with the provider to finalize the details of the service or rental. Agree on terms, pricing, and any additional requirements directly.</li>
                            <li><strong>Service Delivery:</strong> Coordinate directly with the provider for the delivery of the service or item, according to your agreed-upon terms.</li>
                            <li><strong>Feedback:</strong> After the service is completed or item is received, provide feedback to the provider through the platform's review system, helping others make informed decisions.</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        What should I do if I encounter an issue with a rental?
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        If you encounter any issues with a rental on Builders Bridge, please follow these steps:
                        <ol class="mt-2">
                            <li><strong>Contact the Owner:</strong> Reach out to the owner directly through our messaging system to discuss and resolve the issue.</li>
                            <li><strong>Provide Details:</strong> When reporting an issue, provide as much detail as possible, including photos if applicable, to help our support team understand and address the problem quickly.</li>
                            <li><strong>Resolution:</strong> Our support team will investigate the issue and work towards a fair resolution for both parties. This may include refunds, repairs, or other necessary actions depending on the nature of the problem.</li>
                        </ol>
                        By following these steps, we aim to ensure a smooth and satisfactory experience for both renters and owners on Builders Bridge.
                    </div>
                </div>

            </div>
        </div>
           <!---------- END QUESTIONS ---------->
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

