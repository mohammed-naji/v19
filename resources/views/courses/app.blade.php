<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Education')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('coursesassets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('coursesassets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/progressbar_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('coursesassets/css/style.css') }}">
    @yield('css')

    <style>
        .main-header .main-menu ul li a.active {
            color: #ff9f67
        }
    </style>
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('coursesassets/img/logo/loder.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('courses.index') }}"><img src="{{ asset('coursesassets/img/logo/logo.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a class="{{ request()->routeIs('courses.index') ? 'active' : '' }}" href="{{ route('courses.index') }}">Home</a></li>
                                                <li><a class="{{ request()->routeIs('courses.courses') ? 'active' : '' }}" href="{{ route('courses.courses') }}">Courses</a></li>
                                                <li><a class="{{ request()->routeIs('courses.about') ? 'active' : '' }}" href="{{ route('courses.about') }}">About</a></li>
                                                <li><a href="#">Blog</a>
                                                    <ul class="submenu">
                                                        <li><a class="{{ request()->routeIs('courses.blog') ? 'active' : '' }}" href="{{ route('courses.blog') }}">Blog</a></li>
                                                        <li><a class="{{ request()->routeIs('courses.blog_details') ? 'active' : '' }}" href="{{ route('courses.blog_details') }}">Blog Details</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="{{ request()->routeIs('courses.contact') ? 'active' : '' }}" href="{{ route('courses.contact') }}">Contact</a></li>
                                                <!-- Button -->
                                                <li class="button-header margin-left "><a href="#" class="btn">Join</a></li>
                                                <li class="button-header"><a class="{{ request()->routeIs('courses.login') ? 'active' : '' }}" href="{{ route('courses.login') }}" class="btn btn3">Log in</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
     <div class="footer-wrappper footer-bg">
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo mb-25">
                                    <a href="index.html"><img src="{{ asset('coursesassets/img/logo/logo2_footer.png') }}" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>The automated process starts as soon as your clothes go into the machine.</p>
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Our solutions</h4>
                                <ul>
                                    <li><a href="#">Design & creatives</a></li>
                                    <li><a href="#">Telecommunication</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li><a href="#">Programing</a></li>
                                    <li><a href="#">Architecture</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Design & creatives</a></li>
                                    <li><a href="#">Telecommunication</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li><a href="#">Programing</a></li>
                                    <li><a href="#">Architecture</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Company</h4>
                                <ul>
                                    <li><a href="#">Design & creatives</a></li>
                                    <li><a href="#">Telecommunication</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li><a href="#">Programing</a></li>
                                    <li><a href="#">Architecture</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer End-->
      </div>
  </footer>
  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<script src="{{ asset('coursesassets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('coursesassets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('coursesassets/js/popper.min.js') }}"></script>
<script src="{{ asset('coursesassets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('coursesassets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('coursesassets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('coursesassets/js/slick.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('coursesassets/js/wow.min.js') }}"></script>
<script src="{{ asset('coursesassets/js/animated.headline.js') }}"></script>
<script src="{{ asset('coursesassets/js/jquery.magnific-popup.js') }}"></script>

<!-- Date Picker -->
<script src="{{ asset('coursesassets/js/gijgo.min.js') }}"></script>
<!-- Nice-select, sticky -->
<script src="{{ asset('coursesassets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('coursesassets/js/jquery.sticky.js') }}"></script>
<!-- Progress -->
<script src="{{ asset('coursesassets/js/jquery.barfiller.js') }}"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="{{ asset('coursesassets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('coursesassets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('coursesassets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('coursesassets/js/hover-direction-snake.min.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('coursesassets/js/contact.js') }}"></script>
<script src="{{ asset('coursesassets/js/jquery.form.js') }}"></script>
<script src="{{ asset('coursesassets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('coursesassets/js/mail-script.js') }}"></script>
<script src="{{ asset('coursesassets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('coursesassets/js/plugins.js') }}"></script>
<script src="{{ asset('coursesassets/js/main.js') }}"></script>
@yield('js')
</body>
</html>
