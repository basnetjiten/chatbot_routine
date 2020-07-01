<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *Must* come first in the head; any other head content must come *after* these tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>Islington Education &amp; Courses Template | Home</title>

    <!-- Favicon -->
    <link rel="icon" href="college/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="college/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

<div id="app">


<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area d-flex justify-content-between align-items-center">
        <!-- Contact Info -->
        <div class="contact-info">
            <a href="#"><span>Phone:</span> +44 300 303 0266</a>
            <a href="#"><span>Email:</span> info@clever.com</a>
        </div>
        <!-- Follow Us -->
        <div class="follow-us">
            <span>Follow us</span>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="clever-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="cleverNav">

                <!-- Logo -->
                <a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="">Home</a></li>
                                    <li><a href="#">Courses</a></li>

                                </ul>
                            </li>
                            <li><a href="#">Courses</a></li>
                            <li><a href="#">Instructors</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>

                        <!-- Search Button -->
                        <div class="search-area">
                            <form action="#" method="post">
                                <input type="search" name="search" id="search" placeholder="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Register / Login -->
                        <div class="register-login-area">
                            <a class="btn" data-toggle="modal"
                               data-target="#registerModal" href="#">Register</a>

                            @if (Route::has('login'))

                                @if (Auth::check())
                                    <a href="{{ route('home') }}">Home</a>
                                @else
                                    <a class="btn"
                                       data-toggle="modal" data-target="#loginModal" href="#">Login</a>

                                @endif

                            @endif


                        </div>

                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->
<section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(college/img/bg-img/bg1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <!-- Hero Content -->
                <div class="hero-content text-center">
                    <h2>Let's Study Together</h2>
                    <a href="#" class="btn clever-btn">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Hero Area End ##### -->

<!-- ##### Cool Facts Area Start ##### -->
<section class="cool-facts-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Single Cool Facts Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="250ms">
                    <div class="icon">
                        <img src="college/img/core-img/docs.png" alt="">
                    </div>
                    <h2><span class="counter">1912</span></h2>
                    <h5>Success Stories</h5>
                </div>
            </div>

            <!-- Single Cool Facts Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <div class="icon">
                        <img src="college/img/core-img/star.png" alt="">
                    </div>
                    <h2><span class="counter">123</span></h2>
                    <h5>Dedicated Tutors</h5>
                </div>
            </div>

            <!-- Single Cool Facts Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="750ms">
                    <div class="icon">
                        <img src="college/img/core-img/events.png" alt="">
                    </div>
                    <h2><span class="counter">89</span></h2>
                    <h5>Scheduled Events</h5>
                </div>
            </div>

            <!-- Single Cool Facts Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="1000ms">
                    <div class="icon">
                        <img src="college/img/core-img/earth.png" alt="">
                    </div>
                    <h2><span class="counter">56</span></h2>
                    <h5>Available Courses</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Cool Facts Area End ##### -->

<!-- ##### Popular Courses Start ##### -->
<section class="popular-courses-area section-padding-100-0" style="background-image: url(img/core-img/texture.png);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>Popular Online Courses</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                    <img src="img/bg-img/c1.jpg" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>English Grammar</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#" class="free">Free</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <img src="img/bg-img/c2.jpg" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>Vocabulary</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#">$20</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Popular Course -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="750ms">
                    <img src="img/bg-img/c3.jpg" alt="">
                    <!-- Course Content -->
                    <div class="course-content">
                        <h4>Expository writing</h4>
                        <div class="meta d-flex align-items-center">
                            <a href="#">Sarah Parker</a>
                            <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            <a href="#">Art &amp; Design</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus
                            in, sagittis</p>
                    </div>
                    <!-- Seat Rating Fee -->
                    <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="seat-rating h-100 d-flex align-items-center">
                            <div class="seat">
                                <i class="fa fa-user" aria-hidden="true"></i> 10
                            </div>
                            <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i> 4.5
                            </div>
                        </div>
                        <div class="course-fee h-100">
                            <a href="#">$45</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Popular Courses End ##### -->

<!-- ##### Best Tutors Start ##### -->
<section class="best-tutors-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>The Best Tutors in Town</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="tutors-slide owl-carousel wow fadeInUp" data-wow-delay="250ms">

                    <!-- Single Tutors Slide -->
                    <div class="single-tutors-slides">
                        <!-- Tutor Thumbnail -->
                        <div class="tutor-thumbnail">
                            <img src="college/img/bg-img/t1.png" alt="">
                        </div>
                        <!-- Tutor Information -->
                        <div class="tutor-information text-center">
                            <h5>Alex Parker</h5>
                            <span>Teacher</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit,
                                sit amet tincidunt mauris ultrices vitae.</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tutors Slide -->
                    <div class="single-tutors-slides">
                        <!-- Tutor Thumbnail -->
                        <div class="tutor-thumbnail">
                            <img src="college/img/bg-img/t2.png" alt="">
                        </div>
                        <!-- Tutor Information -->
                        <div class="tutor-information text-center">
                            <h5>Alex Parker</h5>
                            <span>Teacher</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit,
                                sit amet tincidunt mauris ultrices vitae.</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tutors Slide -->
                    <div class="single-tutors-slides">
                        <!-- Tutor Thumbnail -->
                        <div class="tutor-thumbnail">
                            <img src="college/img/bg-img/t3.png" alt="">
                        </div>
                        <!-- Tutor Information -->
                        <div class="tutor-information text-center">
                            <h5>Alex Parker</h5>
                            <span>Teacher</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit,
                                sit amet tincidunt mauris ultrices vitae.</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tutors Slide -->
                    <div class="single-tutors-slides">
                        <!-- Tutor Thumbnail -->
                        <div class="tutor-thumbnail">
                            <img src="college/img/bg-img/t4.png" alt="">
                        </div>
                        <!-- Tutor Information -->
                        <div class="tutor-information text-center">
                            <h5>Alex Parker</h5>
                            <span>Teacher</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit,
                                sit amet tincidunt mauris ultrices vitae.</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Best Tutors End ##### -->


<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <!-- Top Footer Area -->
    <div class="top-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Footer Logo -->
                    <div class="footer-logo">
                        <a href="college/index.html"><img src="img/core-img/logo2.png" alt=""></a>
                    </div>

                    <p><a href="#">
                            Copyright &copy; All rights reserved </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Footer Area -->
    <div class="bottom-footer-area d-flex justify-content-between align-items-center">
        <!-- Contact Info -->
        <div class="contact-info">
            <a href="#"><span>Phone:</span> +44 300 303 0266</a>
            <a href="#"><span>Email:</span> info@clever.com</a>
        </div>
        <!-- Follow Us -->
        <div class="follow-us">
            <span>Follow us</span>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
    </div>
</footer>
    <main class="py-4">
        @yield('content')
    </main>
</div>
@include('partials.login-modal')
@include('partials.register-modal')

<script src="{{ asset('js/app.js') }}" defer></script>
@yield('scripts')
<!-- ##### Footer Area End ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="college/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="college/js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="college/js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="college/js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="college/js/active.js"></script>


</body>

</html>

