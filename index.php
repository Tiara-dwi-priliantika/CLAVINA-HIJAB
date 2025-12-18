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
      <img src="image/Gemini_Generated_Image_9ce05f9ce05f9ce0.png">
    </div>
    <div class="slide">
      <img src="image/SAKURAAA.png">
    </div>
    <div class="slide">
      <img src="image/ELEGANNNN.png">
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
    include 'config.php';
    $query = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
    while ($item = mysqli_fetch_assoc($query)):
    ?>
      <div class="product-card">
        <img src="<?= $item['gambar']; ?>" alt="<?= $item['nama_produk']; ?>">
        <h3><?= $item['nama_produk']; ?></h3>

        <?php if ($item['diskon'] > 0): ?>
          <p>
            <del>Rp <?= number_format($item['harga'],0,',','.'); ?></del><br>
            <strong>Rp <?= number_format($item['diskon'],0,',','.'); ?></strong>
          </p>
        <?php else: ?>
          <p>Rp <?= number_format($item['harga'],0,',','.'); ?></p>
        <?php endif; ?>

        <button>Lihat Detail</button>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<!-- MODAL PRODUK -->
<div id="productModal" class="modal">
  <div class="modal-content">
    <span id="closeModal" class="close">&times;</span>
    <img id="modalImg">
    <h2 id="modalNama"></h2>
    <p id="modalHarga"></p>

    <label>Pilih Warna:</label>
    <select id="pilihWarna">
      <option>Cream</option>
      <option>Mocca</option>
      <option>Rose</option>
      <option>Black</option>
      <option>Blue</option>
      <option>Peach</option>
      <option>White</option>
      <option>Purple</option>
    </select>

    <label>Jumlah:</label>
    <input type="number" id="pilihQty" value="1" min="1">

    <div class="modal-buttons">
      <button id="addCartBtn">Tambah ke Keranjang</button>
      
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
<script src="assets/js/script.js"></script>

<form id="buyNowForm" method="POST" action="pembayaran.php" style="display:none;">
  <input type="hidden" name="cart_data" id="cartData">
</form>

</body>
</html>
