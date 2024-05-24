<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>KUA Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('landingpage') }}/img/logo.png" rel="icon">
    <link href="{{ asset('landingpage') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landingpage') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('landingpage') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('landingpage') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('landingpage') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('landingpage') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('landingpage') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landingpage') }}/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: KUA
  * Template URL: https://bootstrapmade.com/KUA-bootstrap-startup-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('landingpage') }}/img/logo.png" alt="">
                <span>KUA</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#pendaftaran_online">Alur Pendaftaran Online</a></li>
                    <li><a class="nav-link scrollto" href="#pendaftaran_offline">Alur Pendaftaran Offline</a></li>
                    <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                    {{-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --}}
                    <li><a class="getstarted scrollto" href="{{ route('login') }}">Masuk/Daftar</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">
                        Sistem Informasi
                        Manajeman Nikah</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Sistem Pengelolan Data Pernikahan </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('register') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Daftar</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('landingpage') }}/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Section Alur Pendaftaran Offline ======= -->
        <section id="pendaftaran_offline" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Alur Pendaftaran Offline</p>
                </header>
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ asset('landingpage') }}/img/values-1.png" class="img-fluid" alt="">
                            <h3>Langkah Pertama</h3>
                            <ul class="text-start">
                                <li class="">Mendatangi RT/RW untuk mengurus surat pengantar nikah yang
                                    akan
                                    dibawa oleh calon
                                    pengantin ke kelurahan.</li>
                                <li class="">Mendatangi kantor kelurahan untuk mengurus surat pengantar
                                    nikah
                                    (N1-N4) yang akan dibawa oleh calon pengantin ke KUA Kecamatan.</li>
                                <li class=""><span class="fw-bold">Apabila pernikahan
                                        diadakan
                                        diluar kecamatan
                                        setempat,</span> maka perlu
                                    mengurus surat rekomendasi nikah untuk dibawa ke KUA kecamatan tempat calon
                                    pengantin
                                    melaksanakan akad nikah.</li>
                                <li class=""><span class="fw-bold">Apabila pernikahan
                                        kurang
                                        dari 10 hari kerja,</span> Maka mendatangi kantor
                                    kecamatan tempat akad nikah untuk memohon dispensasi nikah jika kurang dari 10 hari
                                    kerja.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="{{ asset('landingpage') }}/img/values-2.png" class="img-fluid" alt="">
                            <h3>Langkah Kedua</h3>
                            <ul class="text-start">
                                <li class="">Melakukan pendaftaran nikah di KUA tempat dilaksanakan akad
                                    nikah.
                                </li>
                                <li class="">Apabila pernikahan dilakukan di kantor KUA, maka biaya
                                    layanan
                                    <span class="fw-bold">GRATIS.</span>
                                </li>
                                <li class="">Apabila pernikahan di luar
                                    kantor KUA, maka membayar biaya layanan sebesar Rp.600.000 di BANK persepsi yang ada
                                    di
                                    wilayah KUA tempat menikah, dan menyerahkan slip setoran bea nikah ke KUA tempat
                                    akad nikah.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('landingpage') }}/img/values-3.png" class="img-fluid" alt="">
                            <h3>Langkah Ketiga</h3>
                            <ul class="text-start">
                                <li class="">Pemeriksaan data nikah calon pengantin dan wali nikah di KUA
                                    tempat akad nikah oleh petugas KUA.</li>
                                <li class="">Pelaksanaan akad nikah dan penyerahan buku nikah di lokasi
                                    nikah
                                    apabila pernikahan dilaksanakan diluar kantor KUA.</li>
                                <li class="">Pelaksanaan akad nikah dan penyerahan buku nikah di kantor
                                    KUA
                                    apabila pernikahan dilaksanakan di kantor KUA..</li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- End Alur Pendaftaran Offline -->

        <!-- ======= Section Alur Pendaftaran Online ======= -->
        <section id="pendaftaran_online" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Alur Pendaftaran Online</p>
                </header>
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ asset('landingpage') }}/img/values-1.png" class="img-fluid" alt="">
                            <h3>Langkah Pertama</h3>
                            <ul class="text-start">
                                <li class=""> Kunjungi Website SIMKAH <a href="#">Isi Link</a></li>
                                <li class="">Pilih Menu <a href="#">Masuk/Daftar.</a></li>
                                <li class=""><span class="fw-bold">Apabila kamu sudah
                                        mendaftar dan sudah mempunyai akun</span> maka perlu
                                    , maka kamu bisa langsung masuk.</li>
                                <li class="">Kamu akan di arahkan ke menu dashboard area, silahkan
                                    lengkapi
                                    data diri kamu.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="{{ asset('landingpage') }}/img/values-2.png" class="img-fluid" alt="">
                            <h3>Langkah Kedua</h3>
                            <ul class="text-start">
                                <li class="">Pilih menu <span class="fw-bold">Daftar
                                        Nikah</span> pada dashboard area.
                                </li>
                                <li class=""> Siapkan dokumen-dokumen yang diperlukan.</li>
                                <li class="">Isi dan lengkapi semua form-form yang disediakan.</li>
                                <li class="">
                                    Apabila pernikahan dilakukan di kantor KUA, maka biaya layanan <span
                                        class="fw-bold">GRATIS.</span></li>
                                <li class="">Apabila pernikahan di luar kantor KUA, maka membayar biaya
                                    layanan sebesar
                                    Rp.600.000</li>
                                <li class="">Invoice pembayaran akan tergenerate otomatis oleh sistem.
                                </li>
                                <li class="">Bayar tagihan sesuai dengan informasi yang tertera dalam
                                    Invoice
                                    pembayaran</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('landingpage') }}/img/values-3.png" class="img-fluid" alt="">
                            <h3>Langkah Ketiga</h3>
                            <ul class="text-start">
                                <li class="">Pemeriksaan data nikah calon pengantin dan wali nikah di KUA
                                    tempat akad nikah oleh petugas KUA.</li>
                                <li class="">Pelaksanaan akad nikah dan penyerahan buku nikah di lokasi
                                    nikah
                                    apabila pernikahan dilaksanakan diluar kantor KUA.</li>
                                <li class="">Pelaksanaan akad nikah dan penyerahan buku nikah di kantor
                                    KUA
                                    apabila pernikahan dilaksanakan di kantor KUA.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Alur Pendaftaran Online -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>F.A.Q</h2>
                    <p>Pertanyaan yang sering ditanyakan (FAQ)</p>
                </header>

                <div class="row">
                    <div class="col-lg-6">
                        <!-- F.A.Q List 1-->
                        <div class="accordion accordion-flush" id="faqlist1">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                        Setelah melakukan daftar online, apa langkah selanjutnya yang dilakukan oleh
                                        masyarakat??
                                    </button>
                                </h2>
                                <div id="faq-content-1" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Langkah selanjutnya adalah masyarakat bisa datang ke KUA yang dituju untuk
                                        melakukan pemeriksaan nikah dan membawa berkas yang diperlukan paling lambat 15
                                        hari kerja sesuai dengan PMA No. 20 Tahun 2019 Tentang Pencatatan Pernikahan.
                                        Jika sampai 15 hari kerja masyarakat tidak juga datang ke KUA yang dituju, maka
                                        berkas pendaftaran online akan hangus dan harus mendaftar dari awal kembali.
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                                    </button>
                                </h2>
                                <div id="faq-content-3" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                        Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                        suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis
                                        convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>

                    <div class="col-lg-6">

                        <!-- F.A.Q List 2-->
                        <div class="accordion accordion-flush" id="faqlist2">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                        Bagaimana cara masyarakat mendapatkan Kartu Nikah Digital?
                                    </button>
                                </h2>
                                <div id="faq-content-2" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        <p class="grey-text-1 font-light">Bagi masyarakat yang akad nikah setelah
                                            2020 sampai saat ini yang buku nikahnya terdapat QR Code dapat melakukan
                                            hal berikut.
                                        </p>
                                        <ul>
                                            <li>Pindai QR Code.</li>
                                            <li>Setelah diarakhan otomatis ke browser dan muncul tampilan data
                                                pernikahan ybs, kemudian scroll/usap ke bawah dan klik “Download
                                                Kartu Nikah Digital”.</li>
                                            <li>Kartu Nikah Digital siap diunduh, bagi masyarakat yang ingin
                                                mencetak dapat dilakukan secara mandiri dengan alat cetak sesuai
                                                ukuran yang diinginkan.</li>
                                        </ul><br>
                                        Bagi masyarakat yang akad nikah sebelum 2020/ buku nikahnya tidak ada QR
                                        Code dapat melakukan hal berikut.
                                        <ul>
                                            <li>Datang ke KUA tempat menikah membawa buku nikah dan pasfoto digital
                                                dengan background biru maks 500kb.</li>
                                            <li>Kemudian petugas KUA menginputkan data pernikahan masyarakat sesuai
                                                dengan arsip yang ada di KUA tersebut.</li>
                                            <li>Petugas KUA menambahkan QR Code pada buku nikah.</li>
                                            <li>Pindai QR Code.</li>
                                            <li>Setelah diarakhan otomatis ke browser dan muncul tampilan data
                                                pernikahan ybs, kemudian scroll/usap ke bawah dan klik “Download
                                                Kartu Nikah Digital”.</li>
                                            <li>Kartu Nikah Digital siap diunduh, bagi masyarakat yang ingin
                                                mencetak dapat dilakukan secara mandiri dengan alat cetak sesuai
                                                ukuran yang diinginkan.</li>
                                        </ul>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- End F.A.Q Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Kontak</h2>
                    <p>Kontak Kami</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Alamat</h3>
                                    <p>Jl. .......... </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Telepon / Whatsapp</h3>
                                    <p>061 7273123<br>+628227485739</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email</h3>
                                    <p>info@example.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>Jam Operasional</h3>
                                    <p>Senin - Jumat<br>09:00 - 15:00</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Masukan Nama Mu" required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Masukan Email Mu" required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Masukan Pesan Mu" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>

                                    <button type="submit">Kirim Pesan</button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="{{ asset('landingpage') }}/img/logo.png" alt="">
                            <span>KUA</span>
                        </a>
                        <p>Sistem Pengelolan Data Pernikahan.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Menu</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#hero">Beranda</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#pendaftaran_online">Alur Pendaftaran
                                    Online</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#pendaftaran_offline">Alur Pendaftaran
                                    Offline</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#faq">FAQ</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#contact">Kontak</a></li>
                        </ul>

                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contact Us</h4>
                        <p>
                            Jl. .......... <br>
                            Kabupaten, Kecamatan, Provinsi<br>
                            Indonesia <br><br>
                            <strong>Phone:</strong> 061 7273123 / +628227485739<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>KUA</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landingpage') }}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('landingpage') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('landingpage') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landingpage') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('landingpage') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('landingpage') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('landingpage') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landingpage') }}/js/main.js"></script>

</body>

</html>
