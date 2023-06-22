<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--====== Title ======-->
        <title>Ocean</title>

        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/png">

        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="{{asset('landing/assets/css/bootstrap.min.css')}}">

        <!--====== Line Icons css ======-->
        <link rel="stylesheet" href="{{asset('landing/assets/css/LineIcons.css')}}">

        <!--====== Magnific Popup css ======-->
        <link rel="stylesheet" href="{{asset('landing/assets/css/magnific-popup.css')}}">

        <!--====== Slick css ======-->
        <link rel="stylesheet" href="{{asset('landing/assets/css/slick.css')}}">

        <!--====== Animate css ======-->
        <link rel="stylesheet" href="{{asset('landing/assets/css/animate.css')}}">

        <!--====== Default css ======-->
        <link rel="stylesheet" href="{{asset('landing/assets/css/default.css')}}">

        <!--====== Style css ======-->
        <link rel="stylesheet" href="{{asset('landing/assets/css/style.css')}}">

        {{-- @vite(['resources/js/app.js', 'resources/css/app.css']) --}}


</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART START ======-->

    <section class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand text-white" style="font-size: 20px; font-weight: 700;" href="#">
                               Ocean
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEight" aria-controls="navbarEight" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon bg-white"></span>
                                <span class="toggler-icon bg-white"></span>
                                <span class="toggler-icon bg-white"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarEight" >
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">Tentang Kami</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#portfolio">Program</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">Kontak</a>
                                    </li>
                                    @guest
                                    <li class="nav-item">
                                        <a href="{{route('login')}}" class="cursor-pointer rounded-pill shadow-sm" style="background:  #ff5c9f" >Login</a>
                                    </li>
                                    @endguest
                                </ul>
                            </div>


                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="slider-area">
            <div class="bd-example">
                <div id="carouselOne" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">

                        @foreach ($sliders as $slider)
                        <li data-target="#carouselOne" data-slide-to="{{$loop->iteration}}" class="{{$loop->iteration == 1 ? 'active' : ''}}"></li>
                        @endforeach

                    </ol>

                    <div class="carousel-inner">

                        @foreach ($sliders as $slider)

                        <div class="carousel-item bg_cover {{$loop->iteration == 1 ? 'active' : ''}}" style="background-image: url({{asset('storage/'.$slider->img)}}">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                            <h2 class="carousel-title">{{$slider->caption}}</h2>
                                            {{-- <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="#">GET STARTED</a></li>
                                                <li><a class="main-btn rounded-one" href="#">DOWNLOAD</a></li>
                                            </ul> --}}
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                        </div>

                        @endforeach


                    </div> <!-- carousel-inner -->




                    <a class=" carousel-control-prev" href="#carouselOne" role="button" data-slide="prev">
                        <i class="d-none d-sm-block lni-arrow-left-circle"></i>
                    </a>

                    <a class=" carousel-control-next" href="#carouselOne" role="button" data-slide="next">
                        <i class="d-none d-sm-block lni-arrow-right-circle"></i>
                    </a>
                </div> <!-- carousel -->
            </div> <!-- bd-example -->
        </div>

    </section>

    <!--====== NAVBAR PART ENDS ======-->



    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="about-image text-center wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100">
                        <img src="{{asset('assets/img/hero.jpg')}}" alt="services">
                    </div>
                    <div class="section-title text-center mt-30 pb-40">
                        <h4 style="font-size: 26px" class="title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">Temukan Peluang Magang Tanpa Batas dengan Platform Kami</h4>
                        <p class="text wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">"Mulailah Perjalanan Profesional Anda: Temukan Magang Ideal bersama Kami"</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->

        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== portfolio PART START ======-->

    <section id="portfolio" class="portfolio-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Program Kami</h3>
                        {{-- <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p> --}}
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-menu pt-30 text-center">
                        <ul>
                            <li data-filter="*" class="active">Semua</li>
                            @foreach ($categories as $category)
                            <li data-filter=".{{$category->uuid}}">{{$category->category_name}}</li>
                            @endforeach

                        </ul>
                    </div> <!-- portfolio menu -->
                </div>
            </div> <!-- row -->
            <div class="row grid">

                @foreach ($programs as $program)
                <div class="col-6 col-lg-3 col-sm-6 {{$program->category->uuid}}">
                    <div class="single-portfolio mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <div class="portfolio-image">
                            <img src="{{asset('storage/'.$program->mitra->logo)}}" alt="">
                            <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                                <div class="portfolio-content">
                                    <div class="portfolio-icon">
                                        <a class="image-popup" href="{{asset('storage/'.$program->mitra->logo)}}" ><i class="lni-zoom-in" style="color:#ff5c9f"></i></a>
                                    </div>
                                    <div class="portfolio-icon">
                                        <a href="{{route('program.show', $program->slug)}}"><i class="lni-link" style="color:#ff5c9f"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-text">
                            <h4 class="portfolio-title"><a href="{{route('program.show', $program->slug)}}">{{$program->title}}</a></h4>
                        </div>
                    </div> <!-- single portfolio -->
                </div>
                @endforeach
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== portfolio PART ENDS ======-->
{{--
    <!--====== PRINICNG STYLE EIGHT START ======-->

    <section id="pricing" class="pricing-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Pricing Plan</h3>
                        <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style-one mt-40 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <div class="pricing-icon text-center">
                            <img src="assets/images/wman.svg" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Basic</h5>
                            <p class="month"><span class="price">$ 199</span>/month</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Carefully crafted components</li>
                                <li><i class="lni-check-mark-circle"></i> Amazing page examples</li>
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-three" href="#">GET STARTED</a>
                        </div>
                    </div> <!-- pricing style one -->
                </div>

                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style-one mt-40 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                        <div class="pricing-icon text-center">
                            <img src="assets/images/wman.svg" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Pro</h5>
                            <p class="month"><span class="price">$ 399</span>/month</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Carefully crafted components</li>
                                <li><i class="lni-check-mark-circle"></i> Amazing page examples</li>
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-three" href="#">GET STARTED</a>
                        </div>
                    </div> <!-- pricing style one -->
                </div>

                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style-one mt-40 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="pricing-icon text-center">
                            <img src="assets/images/wman.svg" alt="">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Enterprise</h5>
                            <p class="month"><span class="price">$ 699</span>/month</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Carefully crafted components</li>
                                <li><i class="lni-check-mark-circle"></i> Amazing page examples</li>
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <a class="main-btn rounded-three" href="#">GET STARTED</a>
                        </div>
                    </div> <!-- pricing style one -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PRINICNG STYLE EIGHT ENDS ======--> --}}

    <!--====== CALL TO ACTION TWO PART START ======-->

    <section id="call-action" class="call-action-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="call-action-content mt-45">
                        <h3 class="action-title">Dapatkan informasi terbaru kami!</h3>
                        <p class="text">kami tidak spam email Anda</p>
                    </div> <!-- call action content -->
                </div>
                <div class="col-lg-7">
                    <div class="call-action-form mt-50">
                        <form action="#">
                            <input type="text" placeholder="Masukan email anda..">
                            <div class="action-btn rounded-buttons">
                                <button type="button" class="main-btn rounded-three">subscribe</button>
                            </div>
                        </form>
                    </div> <!-- call action form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CALL TO ACTION TWO PART ENDS ======-->

    {{-- <!--====== TESTIMONIAL THREE PART START ======-->

    <section id="testimonial" class="testimonial-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Testimonial</h3>
                        <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="row testimonial-active">
                        <div class="col-lg-4">
                            <div class="single-testimonial mt-30 mb-30 text-center">
                                <div class="testimonial-image">
                                    <img src="assets/images/author-3.jpg" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                    <h6 class="author-name">Isabela Moreira</h6>
                                    <span class="sub-title">CEO, GrayGrids</span>
                                </div>
                            </div> <!-- single testimonial -->
                        </div>
                        <div class="col-lg-4">
                            <div class="single-testimonial mt-30 mb-30 text-center">
                                <div class="testimonial-image">
                                    <img src="assets/images/author-1.jpg" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                    <h6 class="author-name">Fiona</h6>
                                    <span class="sub-title">Lead Designer, UIdeck</span>
                                </div>
                            </div> <!-- single testimonial -->
                        </div>
                        <div class="col-lg-4">
                            <div class="single-testimonial mt-30 mb-30 text-center">
                                <div class="testimonial-image">
                                    <img src="assets/images/author-2.jpg" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                    <h6 class="author-name">Elon Musk</h6>
                                    <span class="sub-title">CEO, SpaceX</span>
                                </div>
                            </div> <!-- single testimonial -->
                        </div>
                        <div class="col-lg-4">
                            <div class="single-testimonial mt-30 mb-30 text-center">
                                <div class="testimonial-image">
                                    <img src="assets/images/author-4.jpg" alt="Author">
                                </div>
                                <div class="testimonial-content">
                                    <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                    <h6 class="author-name">Fajar Siddiq</h6>
                                    <span class="sub-title">CEO, MakerFlix</span>
                                </div>
                            </div> <!-- single testimonial -->
                        </div>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TESTIMONIAL THREE PART ENDS ======--> --}}

    <!--====== CLIENT LOGO PART START ======-->

    <section id="client" class="client-logo-area">
        <div class="container">
            <div class="row client-active">
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{asset('landing/assets/images/client_logo_01.png')}}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{asset('landing/assets/images/client_logo_02.png')}}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{asset('landing/assets/images/client_logo_03.png')}}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{asset('landing/assets/images/client_logo_04.png')}}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{asset('landing/assets/images/client_logo_05.png')}}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{asset('landing/assets/images/client_logo_06.png')}}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{asset('landing/assets/images/client_logo_07.png')}}" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="col-lg-3">
                    <div class="single-client text-center">
                        <img src="{{asset('landing/assets/images/client_logo_08.png')}}" alt="Logo">
                    </div> <!-- single client -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CLIENT LOGO PART ENDS ======-->

    <!--====== CONTACT TWO PART START ======-->

    <section id="contact" class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Kerja Sama</h3>

                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-two mt-50 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <h4 class="contact-title">Kerja sama bersama kami?</h4>
                        <p class="text">Kami membuka peluang bagi Anda yang ingin berkontribusi atau bekerja sama bersama Kami.</p>
                        <ul class="contact-info">
                            <li><i class="lni-money-location"></i> Elizabeth St, Melbourne, Australia</li>
                            <li><i class="lni-phone-handset"></i> +333 789-321-654</li>
                            <li><i class="lni-envelope"></i> hello@ayroui.com</li>
                        </ul>
                    </div> <!-- contact two -->
                </div>
                <div class="col-lg-6">
                    <div class="contact-form form-style-one mt-35 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                        <form  id="contact-form" action="assets/contact.php" method="post">
                            <div class="form-input mt-15">
                                <label>Nama</label>
                                <div class="input-items default">
                                    <input type="text" placeholder="Nama" name="name">
                                    <i class="lni-user"></i>
                                </div>
                            </div> <!-- form input -->
                            <div class="form-input mt-15">
                                <label>Email</label>
                                <div class="input-items default">
                                    <input type="email" placeholder="Email" name="email">
                                    <i class="lni-envelope"></i>
                                </div>
                            </div> <!-- form input -->
                            <div class="form-input mt-15">
                                <label>Pesan</label>
                                <div class="input-items default">
                                    <textarea placeholder="Pesan" name="Pesan"></textarea>
                                    <i class="lni-pencil-alt"></i>
                                </div>
                            </div> <!-- form input -->
                            <p class="form-message"></p>
                            <div class="form-input rounded-buttons mt-20">
                                <button type="button" class="main-btn rounded-three">Submit</button>
                            </div> <!-- form input -->
                        </form>
                    </div> <!-- contact form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT TWO PART ENDS ======-->

    <!--====== FOOTER FOUR PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Perusahaan</h6>
                            <ul>
                                <li><a href="#">Tentang Kami</a></li>
                                <li><a href="#">Kontak</a></li>
                                <li><a href="#">Profil</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Solusi</h6>
                            <ul>
                                <li><a href="#">Layanan</a></li>
                                <li><a href="#">Pegawai</a></li>
                                <li><a href="#">Projek</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Produk & Layanan</h6>
                            <ul>
                                <li><a href="#">Produk</a></li>
                                <li><a href="#">Bisnis</a></li>
                                <li><a href="#">Developer</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Bantuan & Support</h6>
                            <ul>
                                <li><a href="#">Pusat Bantuan</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Syarat & Ketentuan
                                </a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->

        <div class="footer-copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="copyright text-center text-lg-left mt-10">
                            <p class="text">Crafted by <a style="color: #ff5c9f" rel="nofollow" href="https://uideck.con">UIdeck</a> and UI Elements from <a style="color: #ff5c9f" rel="nofollow" href="https://ayroui.com">Ayro UI </a></p>
                        </div> <!--  copyright -->
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-logo text-center mt-10">

                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-5">
                        <ul class="social text-center text-lg-right mt-10">
                            <li><a href="https://facebook.com/uideckHQ"><i class="lni-facebook-filled"></i></a></li>
                            <li><a href="https://twitter.com/uideckHQ"><i class="lni-twitter-original"></i></a></li>
                            <li><a href="https://instagram.com/uideckHQ"><i class="lni-instagram-original"></i></a></li>
                            <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                        </ul> <!-- social -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER FOUR PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top" style="background: #ff5c9f; color:white;"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->



    <!--====== PART ENDS ======-->










     <!--====== jquery js ======-->
     <script src="{{asset('landing/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
     <script src="{{asset('landing/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>

     <!--====== Bootstrap js ======-->
     <script src="{{asset('landing/assets/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('landing/assets/js/popper.min.js')}}"></script>

     <!--====== Slick js ======-->
     <script src="{{asset('landing/assets/js/slick.min.js')}}"></script>

     <!--====== Isotope js ======-->
     <script src="{{asset('landing/assets/js/isotope.pkgd.min.js')}}"></script>

     <!--====== Images Loaded js ======-->
     <script src="{{asset('landing/assets/js/imagesloaded.pkgd.min.js')}}"></script>

     <!--====== Magnific Popup js ======-->
     <script src="{{asset('landing/assets/js/jquery.magnific-popup.min.js')}}"></script>

     <!--====== Scrolling js ======-->
     <script src="{{asset('landing/assets/js/scrolling-nav.js')}}"></script>
     <script src="{{asset('landing/assets/js/jquery.easing.min.js')}}"></script>

     <!--====== wow js ======-->
     <script src="{{asset('landing/assets/js/wow.min.js')}}"></script>

     <!--====== Main js ======-->
     <script src="{{asset('landing/assets/js/main.js')}}"></script>

</body>

</html>
