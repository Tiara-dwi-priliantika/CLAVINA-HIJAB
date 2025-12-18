<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clavina Hijab | Elegance in Your Everyday</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<!-- HERO SLIDER -->
<section class="hero">
  <div class="slides">
    <div class="slide active">
      <img src="image/Gemini_Generated_Image_9ce05f9ce05f9ce0.png" alt="Hero Image">
    </div>
    <div class="slide">
      <img src="image/SAKURAAA.png" alt="Sakura Exclusive">
    </div>
    <div class="slide">
      <img src="image/ELEGANNNN.png" alt="Bloom Scarf">
    </div>
  </div>

  <div class="overlay"></div>

  <div class="hero-text">
    <h4 id="heroLabel">New Collection</h4>
    <h1 id="heroTitle">Elegance & Cozy Wear</h1>
    <p id="heroDesc">Elegance in Your Everyday</p>
    <a href="#new-arrival" class="btn">Shop Now</a>
  </div>
</section>

<!-- PRODUK -->
<section id="new-arrival" class="products reveal">
  <h2>Produk Clavina</h2>

  <div class="product-grid">
    <?php
    $produk = [
      ["gambar" => "image/HIJABBBB 1.jpg", "nama" => "Sakura Set", "harga" => 189000],
      ["gambar" => "image/HIJAB SAKURA.jpg", "nama" => "Primrose Scarf", "harga" => 149000],
      ["gambar" => "image/HIJABBBB 2.jpg", "nama" => "Elegant Shawl", "harga" => 179000],
      ["gambar" => "image/SAKURAAA.png", "nama" => "Sakura Exclusive", "harga" => 169000],
      ["gambar" => "image/ELEGANNNN.png", "nama" => "Bloom Scarf", "harga" => 159000],
      ["gambar" => "image/HIJABBARU1.jpg", "nama" => "Velvet Hijab", "harga" => 155000],
      ["gambar" => "image/HIJABBARU2.jpg", "nama" => "Rosemary Shawl", "harga" => 165000],
      ["gambar" => "image/HIJABBARU3.jpg", "nama" => "Luna Satin", "harga" => 175000],
       ["gambar" => "image/pink soft.jpg", "nama" => "Paris Premium Pink Soft", "harga" => 135000, "diskon" => 0],
      ["gambar" => "image/turkish.jpg", "nama" => "Paris Premium Turkish", "harga" => 121500, "diskon" => 135000],
      ["gambar" => "image/purple.jpg", "nama" => "Paris Premium Purple", "harga" => 135000, "diskon" => 0],
      ["gambar" => "image/dusty purple.jpg", "nama" => "Paris Premium Dusty Purple", "harga" => 135000, "diskon" => 0],
      ["gambar" => "image/grey.jpg", "nama" => "Paris Premium Soft Grey", "harga" => 135000, "diskon" => 0],
      ["gambar" => "image/HIJAB SAKURA.jpg", "nama" => "Primrose Scarf", "harga" => 149000],
      ["gambar" => "image/HIJABBBB 1.jpg", "nama" => "Sakura Set", "harga" => 189000],
      ["gambar" => "image/HIJABBBB 2.jpg", "nama" => "Elegant Shawl", "harga" => 179000],
    ];

    foreach ($produk as $item) {
      echo "
      <div class='product-card detailBtn'>
        <img src='{$item['gambar']}' alt='{$item['nama']}'>
        <h3>{$item['nama']}</h3>
        <p>Rp " . number_format($item['harga'], 0, ',', '.') . "</p>
        <button class='detailBtn'>Lihat Detail</button>
      </div>";
    }
    ?>
  </div>
</section>

<!-- POPUP DETAIL PRODUK -->
<div id="productModal" class="modal">
  <div class="modal-content">
    <span id="closeModal" class="close">&times;</span>

    <img id="modalImg" src="" alt="">
    <h2 id="modalNama"></h2>
    <p id="modalHarga"></p>

    <label>Pilih Warna:</label>
    <select id="pilihWarna">
      <option value="Cream">Cream</option>
      <option value="Mocca">Mocca</option>
      <option value="Rose">Rose</option>
      <option value="Black">Black</option>
       <option value="Black">Blue</option>
        <option value="Black">peach</option>
         <option value="Black">White</option>
          <option value="Black">Purple</option>
    </select>

    <label>Jumlah:</label>
    <input type="number" id="pilihQty" value="1" min="1">

    <div class="modal-buttons">
      <button id="addCartBtn">Tambah ke Keranjang</button>
      <button id="buyNowBtn" class="buy">Beli Sekarang</button>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
<script src="assets/js/script.js"></script>
</body>
</html>
