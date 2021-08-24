<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CV. ARPANO OCEAN</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('dist/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('dist/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('dist/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/vendor/remixicon/remixicon.css" rel') }}" rel="stylesheet">
    <link href="{{ asset('dist/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Selecao - v4.0.1
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center  header-transparent">
        <div class="container" style="width: 10em; margin-left:70px">
            <div class="container" style="width: 900em;">
                <nav id="navbar" class="navbar justify-content-between">
                    <ul class=" mr-auto">
                        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                        <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                        <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
                    </ul>
                    <ul class="float-right">
                        <li>
                            <a class="nav-link scrollto" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>

            </div>
        </div>
        <div class="container d-flex justify-content-around">

            <div class="logo">
                <h1><a href="index.html"></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            {{-- <nav id="navbar" class="navbar" class="float-right"> --}}
            {{-- <ul>
                <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i> --}}
            {{-- </nav> --}}

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center"
        style="position: relative; background: linear-gradient(0deg, #597ae6 0%, #597ae6 0%);">
        <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <div class="row">
                        <!-- <div class="col-sm-7"> -->
                        <h2 class="animate__animated animate__fadeInRight"><img src="{{ 'gambar/gambar2.png' }}"
                                alt=""></h2>
                        {{-- <p class="animate__animated animate__fadeInRight">Jasa pembuatan website dan toko online dengan
                            tampilan design web yang menarik, handal, dan banyak fitur. Cocok untuk company profile,
                            online shop, personal website, e-commerce, microsite, website portal, dll.</p> --}}
                        <!-- </div> -->
                        <!-- <div class="col-sm-5">
              <img class="animate__animated animate__fadeInRight" src="img/design-web.png" width="100%" alt="" srcset="">
            </div> -->
                    </div>
                    {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInRight"><img src="{{ 'gambar/gambar2.png' }}" alt="">
                    </h2>
                    {{-- <p class="animate__animated animate__fadeInRight">Jasa pembuatan dan pengembangan sistem informasi
                        berbasis web atau sistem informasi online. Cocok untuk semua jenis bidang seperti POS(Point Of
                        Sales), Akademik, Rumah Sakit, Hotel, Travelling, Industri, dll.</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInRight"><img src="{{ 'gambar/gambar2.png' }}" alt="">
                    </h2>
                    {{-- <p class="animate__animated animate__fadeInRight">Jasa pembuatan dan pengembangan sistem informasi
                        berbasis Desktop. Cocok untuk semua jenis bidang. Menggunakan Bahasa Pemograman standart
                        aplikasi dan user friendly.</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Tentang Kami</h2>
                    <p>CV . ARPANO OCEAN</p>
                </div>

                <div class="row content" data-aos="fade-up">
                    <div class="col-lg-6">
                        <p>
                            CV. ARPANO OCEAN adalah perusahaan pengolahan ikan laut segar yang berlokasi di
                            Padang, Indonesia. Kami membeli, mengolah dan menjual ikan segar yang di ekspor ke luar
                            indonesia. Tanpa mengesampingkan prioritas ramah lingkungan dan meningkatkan kualitas mutu
                            hasil olahan kami.
                        </p>
                        <a href="#" class="btn-learn-more">Learn More</a>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <img src="{{ asset('gambar/tentang_kami.jpeg') }}" alt="" srcset="">
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">


                <div class="section-title" data-aos="zoom-out">
                    <h2>Contact</h2>
                    <p>Kontak Kami</p>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <img src="{{ asset('gambar/gambar1.png') }}" data-aos="fade-right" width="250px" alt=""
                            srcset="">
                        <p data-aos="fade-right">CV.ARPANO OCEAN merupakan perusahaan <br> yang bergerak di
                            bidang mengelola dan menjual <br>ikan segar, Di Kota Padang</p>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>CV . ARPANO OCEAN</h3>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>CV.ARPANO OCEAN </span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/selecao-bootstrap-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('dist/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('dist/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('dist/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('dist/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('dist/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('dist/js/main.js') }}"></script>

</body>

</html>
