<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tentang Kami | Clavina Hijab</title>

  <!-- GOOGLE FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    :root {
      --brown: #6b3f24;
      --cream: #f8f5f2;
      --soft: #ffffff;
      --accent: #c7a17a;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: var(--cream);
      color: var(--brown);
      line-height: 1.8;
    }

    /* ================= HEADER SPACE ================= */
    .spacer {
      height: 90px;
    }

    /* ================= HERO ================= */
    .hero-about {
      height: 70vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .hero-about img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      top: 0;
      left: 0;
      filter: brightness(0.65);
    }

    .hero-text {
      position: relative;
      text-align: center;
      color: #fff;
      z-index: 2;
      padding: 20px;
    }

    .hero-text h1 {
      font-family: 'Playfair Display', serif;
      font-size: 46px;
      margin-bottom: 12px;
      letter-spacing: 1px;
    }

    .hero-text p {
      font-size: 18px;
      opacity: 0.95;
    }

    /* ================= SECTION ================= */
    section {
      padding: 80px 20px;
    }

    .container {
      max-width: 1100px;
      margin: auto;
    }

    .section-title {
      text-align: center;
      margin-bottom: 50px;
    }

    .section-title h2 {
      font-family: 'Playfair Display', serif;
      font-size: 34px;
      margin-bottom: 10px;
    }

    .section-title span {
      display: inline-block;
      width: 80px;
      height: 3px;
      background: var(--accent);
      margin-top: 10px;
    }

    /* ================= ABOUT TEXT ================= */
    .about-text {
      max-width: 850px;
      margin: auto;
      text-align: center;
      font-size: 17px;
    }

    .about-text p {
      margin-bottom: 18px;
    }

    /* ================= VISION MISSION ================= */
    .vm-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 30px;
      margin-top: 50px;
    }

    .vm-card {
      background: var(--soft);
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      transition: transform 0.3s ease;
    }

    .vm-card:hover {
      transform: translateY(-6px);
    }

    .vm-card h3 {
      font-family: 'Playfair Display', serif;
      font-size: 26px;
      margin-bottom: 15px;
    }

    .vm-card p, .vm-card li {
      font-size: 16px;
    }

    .vm-card ul {
      padding-left: 18px;
    }

    /* ================= VALUES ================= */
    .values {
      background: #fff;
    }

    .values-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 25px;
      margin-top: 40px;
    }

    .value-item {
      text-align: center;
      padding: 30px 20px;
    }

    .value-item i {
      font-size: 34px;
      color: var(--accent);
      margin-bottom: 15px;
    }

    .value-item h4 {
      font-size: 18px;
      margin-bottom: 8px;
    }

    /* ================= FOOTER ================= */
    footer {
      background: var(--brown);
      color: #fff;
      padding: 40px 20px;
      text-align: center;
    }

    footer p {
      font-size: 14px;
      margin-bottom: 18px;
    }

    .footer-social {
      display: flex;
      justify-content: center;
      gap: 26px;
    }

    .footer-social a {
      font-size: 26px;
      transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .footer-social a:hover {
      transform: scale(1.2);
      opacity: 0.85;
    }

    .fa-whatsapp { color: #25D366; }
    .fa-instagram { color: #E1306C; }
    .fa-tiktok { color: #00f2ea; }

    /* ================= RESPONSIVE ================= */
    @media(max-width:768px){
      .hero-text h1 { font-size: 34px; }
      section { padding: 60px 18px; }
    }
  </style>
</head>

<body>

<?php include 'header.php'; ?>
<div class="spacer"></div>

<!-- HERO -->
<section class="hero-about">
  <img src="image/ELEGANNNN.png" alt="Clavina Hijab">
  <div class="hero-text">
    <h1>Tentang Clavina Hijab</h1>
    <p>Elegance in Your Everyday</p>
  </div>
</section>

<!-- ABOUT -->
<section>
  <div class="container">
    <div class="section-title">
      <h2>Siapa Kami</h2>
      <span></span>
    </div>

    <div class="about-text">
      <p><strong>Clavina Hijab</strong> adalah brand fashion muslimah yang menghadirkan keanggunan dalam setiap aktivitas perempuan Indonesia.</p>
      <p>Kami memadukan desain modern, sentuhan elegan, serta bahan berkualitas tinggi agar setiap hijab nyaman digunakan sepanjang hari.</p>
      <p>Dari aktivitas harian hingga momen istimewa, Clavina Hijab hadir sebagai simbol kepercayaan diri dan keindahan.</p>
    </div>
  </div>
</section>

<!-- VISION MISSION -->
<section class="values">
  <div class="container">
    <div class="section-title">
      <h2>Visi & Misi</h2>
      <span></span>
    </div>

    <div class="vm-grid">
      <div class="vm-card">
        <h3>Visi</h3>
        <p>Menjadi brand hijab pilihan utama perempuan Indonesia yang mengutamakan keindahan, kenyamanan, dan kualitas.</p>
      </div>

      <div class="vm-card">
        <h3>Misi</h3>
        <ul>
          <li>Menghadirkan produk berkualitas premium</li>
          <li>Menciptakan desain modern & elegan</li>
          <li>Memberikan pelayanan terbaik</li>
          <li>Mendukung kepercayaan diri muslimah</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- VALUES -->
<section>
  <div class="container">
    <div class="section-title">
      <h2>Nilai Kami</h2>
      <span></span>
    </div>

    <div class="values-grid">
      <div class="value-item">
        <i class="fas fa-gem"></i>
        <h4>Kualitas</h4>
        <p>Bahan pilihan dan jahitan rapi</p>
      </div>
      <div class="value-item">
        <i class="fas fa-leaf"></i>
        <h4>Nyaman</h4>
        <p>Ringan dan adem digunakan</p>
      </div>
      <div class="value-item">
        <i class="fas fa-heart"></i>
        <h4>Elegan</h4>
        <p>Desain anggun untuk semua momen</p>
      </div>
      <div class="value-item">
        <i class="fas fa-star"></i>
        <h4>Kepercayaan</h4>
        <p>Menemani setiap langkah muslimah</p>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <p>© 2025 Clavina Hijab | Elegance in Your Everyday</p>
  <div class="footer-social">
    <a href="https://wa.me/625838492321" target="_blank"><i class="fab fa-whatsapp"></i></a>
    <a href="https://instagram.com/clavinahijab" target="_blank"><i class="fab fa-instagram"></i></a>
    <a href="https://tiktok.com/@clavinahijab" target="_blank"><i class="fab fa-tiktok"></i></a>
  </div>
</footer>

</body>
</html>
