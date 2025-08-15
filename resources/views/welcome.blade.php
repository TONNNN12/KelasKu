<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KelasKu | Beranda</title>
  <meta name="description" content="Aplikasi Manajemen Tugas Modern">
  <meta name="keywords" content="manajemen tugas, produktivitas, aplikasi">

  <!-- Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --oxford-blue: #002147;
      --light-blue: #4A90E2;
      --accent-blue: #007BFF;
      --gradient-bg: linear-gradient(135deg, #002147 0%, #4A90E2 100%);
      --shadow: 0 10px 30px rgba(0, 33, 71, 0.2);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      line-height: 1.6;
      color: #333;
      overflow-x: hidden;
    }

    /* Header Styles */
    .navbar {
      background: rgba(0, 33, 71, 0.95);
      backdrop-filter: blur(10px);
      padding: 1rem 0;
      transition: all 0.3s ease;
      box-shadow: var(--shadow);
    }

    .navbar.scrolled {
      background: var(--oxford-blue);
      padding: 0.5rem 0;
    }

    .navbar-brand {
      font-size: 2rem;
      font-weight: 800;
      background: linear-gradient(45deg, #fff, #f5d042);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .navbar-nav .nav-link {
      color: white !important;
      font-weight: 500;
      margin: 0 10px;
      position: relative;
      transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #f5d042 !important;
      transform: translateY(-2px);
    }

    .navbar-nav .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -5px;
      left: 50%;
      background: #f5d042;
      transition: all 0.3s ease;
      transform: translateX(-50%);
    }

    .navbar-nav .nav-link:hover::after {
      width: 100%;
    }

    .btn-login {
      background: linear-gradient(45deg, #4A90E2, #f5d042);
      border: none;
      padding: 12px 30px;
      border-radius: 50px;
      color: white;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
    }

    .btn-login:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(74, 144, 226, 0.6);
      color: white;
      text-decoration: none;
    }

    /* Hero Section */
    .hero {
      background: var(--gradient-bg);
      min-height: 100vh;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle cx="200" cy="200" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="800" cy="300" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="400" cy="600" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="900" cy="700" r="3" fill="rgba(255,255,255,0.1)"/></svg>');
      animation: float 20s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
    }

    .hero-content {
      position: relative;
      z-index: 2;
      padding: 120px 0;
    }

    .hero h1 {
      font-size: 4rem;
      font-weight: 800;
      color: #f5d042;
      margin-bottom: 20px;
      text-shadow: 0 4px 8px rgba(0,0,0,0.3);
      animation: slideInLeft 1s ease-out;
    }
    .gradient-text {
      background: linear-gradient(45deg, #ffffff, #ffcc00); /* gradasi */
      -webkit-background-clip: text; /* untuk Chrome/Safari */
      -webkit-text-fill-color: transparent; /* supaya hanya teks yang kelihatan */
      background-clip: text; /* untuk browser modern */
      color: transparent;
    }

    @keyframes slideInLeft {
      from { opacity: 0; transform: translateX(-50px); }
      to { opacity: 1; transform: translateX(0); }
    }

    .hero p {
      font-size: 1.5rem;
      color: rgba(255,255,255,0.9);
      margin-bottom: 30px;
      animation: slideInLeft 1s ease-out 0.2s both;
    }

    .btn-get-started {
      background: white;
      color: var(--oxford-blue);
      padding: 15px 40px;
      border-radius: 50px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.4s ease;
      box-shadow: 0 8px 30px rgba(0,0,0,0.3);
      animation: slideInLeft 1s ease-out 0.4s both;
    }

    .btn-get-started:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(0,0,0,0.4);
      color: var(--oxford-blue);
      text-decoration: none;
    }

    .hero-image {
      animation: slideInRight 1s ease-out 0.6s both;
    }

    @keyframes slideInRight {
      from { opacity: 0; transform: translateX(50px); }
      to { opacity: 1; transform: translateX(0); }
    }

    .hero-image img {
      filter: drop-shadow(0 20px 40px rgba(0,0,0,0.3));
      animation: bounce 3s ease-in-out infinite;
    }

    @keyframes bounce {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }

    /* About Section */
    .about-section {
      padding: 100px 0;
      background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
    }

    .section-title {
      text-align: center;
      margin-bottom: 80px;
    }

    .section-title span {
      color: var(--light-blue);
      font-weight: 600;
      font-size: 1.1rem;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .section-title h2 {
      color: var(--oxford-blue);
      font-size: 3rem;
      font-weight: 800;
      margin: 10px 0 20px;
    }

    .section-title p {
      color: #666;
      font-size: 1.1rem;
      max-width: 600px;
      margin: 0 auto;
    }

    .about-content {
      background: white;
      padding: 60px;
      border-radius: 20px;
      box-shadow: var(--shadow);
      transform: translateY(0);
      transition: all 0.3s ease;
    }

    .about-content:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 60px rgba(0, 33, 71, 0.15);
    }

    .about-content h3 {
      color: var(--oxford-blue);
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .about-content ul {
      list-style: none;
      padding: 0;
    }

    .about-content ul li {
      padding: 10px 0;
      position: relative;
      padding-left: 30px;
      color: #555;
      font-size: 1.1rem;
    }

    .about-content ul li i {
      color: var(--light-blue);
      position: absolute;
      left: 0;
      top: 12px;
      font-size: 1.2rem;
    }

    /* Contact Section */
    .contact-section {
      padding: 100px 0;
      background: var(--gradient-bg);
    }

    .contact-section .section-title span,
    .contact-section .section-title h2,
    .contact-section .section-title p {
      color: white;
    }

    .info-item {
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(10px);
      padding: 30px;
      border-radius: 15px;
      margin-bottom: 30px;
      border: 1px solid rgba(255,255,255,0.1);
      transition: all 0.3s ease;
    }

    .info-item:hover {
      background: rgba(255,255,255,0.2);
      transform: translateY(-5px);
    }

    .info-item i {
      color: #4A90E2;
      font-size: 2rem;
      margin-right: 20px;
    }

    .info-item h3 {
      color: white;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .info-item p {
      color: rgba(255,255,255,0.8);
      margin: 0;
      font-size: 1.1rem;
    }

    .map-container {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: var(--shadow);
      margin-top: 30px;
    }

    .map-container iframe {
      width: 100%;
      height: 300px;
      border: none;
    }

    /* Scroll Top Button */
    .scroll-top {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: var(--gradient-bg);
      color: white;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: var(--shadow);
      transition: all 0.3s ease;
      opacity: 0;
      visibility: hidden;
      z-index: 1000;
    }

    .scroll-top.show {
      opacity: 1;
      visibility: visible;
    }

    .scroll-top:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 40px rgba(0, 33, 71, 0.4);
      color: white;
      text-decoration: none;
    }

    /* Animations */
    .fade-in {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease;
    }

    .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2.5rem;
      }

      .hero p {
        font-size: 1.2rem;
      }

      .section-title h2 {
        font-size: 2rem;
      }

      .about-content {
        padding: 40px 30px;
      }
    }
  </style>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="#hero">KelasKu</a>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon">
          <i class="fas fa-bars text-white"></i>
        </span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="#hero">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">Tentang Kita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Kontak</a>
          </li>
        </ul>
        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-login">dashboard</a>    
        @else
            <a href="{{ route('login') }}" class="btn btn-login">Login</a>
        @endauth
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container hero-content">
      <div class="row align-items-center">
        <div class="col-lg-6">
        <h1 class="gradient-text">KelasKu</h1>
          <p>Aplikasi Manajemen Tugas Kelas</p>
          @auth
            <a href="{{ route('dashboard') }}" class="btn btn-get-started">Mulai Sekarang</a>
          @else
            <a href="{{ route('login') }}" class="btn btn-get-started">Mulai Sekarang</a>
          @endauth
        </div>
        <div class="col-lg-6 hero-image">
          <div class="hero-img order-1 order-lg-2" data-aos="zoom-out" data-aos-delay="100">
          <img src="{{ asset('enno/assets/img/hero-new.png') }}" class="img-fluid animated hero-big" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="about-section">
    <div class="container">
      <div class="section-title fade-in">
        <span>Tentang Kita</span>
        <h2>Solusi Manajemen Tugas Terdepan</h2>
        <p>Tingkatkan produktivitas dan organisasi tugas Anda dengan platform yang dirancang khusus untuk kebutuhan modern</p>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="about-content fade-in">
            <h3>Mengapa Memilih KelasKu?</h3>
            <p class="text-muted mb-4">
              KelasKu adalah platform manajemen tugas yang revolusioner, dirancang untuk membantu individu dan tim mencapai produktivitas maksimal dengan antarmuka yang intuitif dan fitur-fitur canggih.
            </p>
            <ul>
              <li>
                <i class="fas fa-check-circle"></i>
                <span>Manajemen tugas real-time dengan notifikasi pintar yang membantu Anda tetap fokus pada prioritas utama</span>
              </li>
              <li>
                <i class="fas fa-check-circle"></i>
                <span>Kolaborasi tim yang seamless dengan sistem berbagi dan tracking progress yang komprehensif</span>
              </li>
              <li>
                <i class="fas fa-check-circle"></i>
                <span>Dashboard analytics yang memberikan insight mendalam tentang produktivitas dan performa kerja Anda</span>
              </li>
            </ul>
            <p class="mt-4">
              Dengan teknologi terdepan dan desain user-friendly, KelasKu memastikan setiap tugas terorganisir dengan baik, deadline terpenuhi, dan tujuan tercapai dengan efisien.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact-section">
    <div class="container">
      <div class="section-title fade-in">
        <span>Hubungi Kami</span>
        <h2>Mari Berkolaborasi</h2>
        <p>Kami siap membantu Anda mengoptimalkan produktivitas dengan solusi terbaik</p>
      </div>

      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="info-item fade-in">
            <i class="fas fa-map-marker-alt"></i>
            <div>
              <h3>Lokasi Kami</h3>
              <p>SMK Negeri 1 Dukuhturi</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="info-item fade-in">
            <i class="fas fa-phone"></i>
            <div>
              <h3>Hubungi Kami</h3>
              <p>+62 812-3456-7890</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="info-item fade-in">
            <i class="fas fa-envelope"></i>
            <div>
              <h3>Email Kami</h3>
              <p>info@kelasku.com</p>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="map-container fade-in">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.0000567647194!2d109.13310507356488!3d-6.890595067425408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9b5d0e5151d%3A0xe909e36128b1e1f7!2sSMK%20Negeri%201%20Dukuhturi!5e0!3m2!1sen!2sid!4v1753104829962!5m2!1sen!2sid" allowfullscreen loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Scroll Top Button -->
  <a href="#hero" class="scroll-top" id="scrollTop">
    <i class="fas fa-arrow-up"></i>
  </a>

  <!-- Bootstrap 4 JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {
      // Navbar scroll effect
      $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
          $('#navbar').addClass('scrolled');
          $('#scrollTop').addClass('show');
        } else {
          $('#navbar').removeClass('scrolled');
          $('#scrollTop').removeClass('show');
        }
      });

      // Smooth scrolling
      $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
          event.preventDefault();
          $('html, body').stop().animate({
            scrollTop: target.offset().top - 70
          }, 1000);
        }
      });

      // Fade in animation on scroll
      function fadeInOnScroll() {
        $('.fade-in').each(function() {
          var elementTop = $(this).offset().top;
          var elementBottom = elementTop + $(this).outerHeight();
          var viewportTop = $(window).scrollTop();
          var viewportBottom = viewportTop + $(window).height();

          if (elementBottom > viewportTop && elementTop < viewportBottom) {
            $(this).addClass('visible');
          }
        });
      }

      // Check for elements in view on scroll and load
      $(window).on('scroll', fadeInOnScroll);
      fadeInOnScroll(); // Check on page load
    });
  </script>
</body>

</html>