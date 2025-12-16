<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Arrival - Clavina Hijab</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #fcf3e5ff;
      margin: 0;
      padding: 0;
    }

    .new-banner {
      width: 100%;
      height: 380px;
      background-image: url('image/Gemini_Generated_Image_9ce05f9ce05f9ce0.png');
      background-size: cover;
      background-position: center;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .new-banner .banner-text {
      text-align: center;
      color: #6b553a;
      backdrop-filter: blur(2px);
    }

    .new-banner h1 {
      font-size: 58px;
      font-family: 'Playfair Display', serif;
      margin: 0;
    }

    .new-banner p {
      font-size: 20px;
      letter-spacing: 1px;
    }

    .new-arrival-section {
      max-width: 1250px;
      margin: 60px auto;
      padding: 0 20px;
    }

    .new-arrival-section h2 {
      text-align: center;
      font-size: 36px;
      font-family: 'Playfair Display', serif;
      color: #6b553a;
      margin-bottom: 40px;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
      gap: 30px;
    }

    .product-card {
      background: #fff;
      border-radius: 12px;
      padding: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      text-align: center;
      transition: 0.3s;
    }

    .product-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 18px rgba(0,0,0,0.12);
    }

    .product-card img {
      width: 100%;
      border-radius: 10px;
    }

    .product-card h3 {
      font-size: 20px;
      margin-top: 15px;
      color: #4a3a27;
      font-weight: 600;
    }

    .product-card p {
      font-size: 18px;
      color: #8b6f4e;
      margin: 10px 0;
    }

    .product-card button {
      padding: 10px 20px;
      background: #8b6f4e;
      border: none;
      color: #fff;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
      margin-top: 10px;
    }

    .product-card button:hover {
      background: #6b553a;
    }
  </style>
</head>

<body>

<section class="new-banner">
  <div class="banner-text">
    <h1>New Arrivals</h1>
    <p>Koleksi terbaru dari Clavina Hijab</p>
  </div>
</section>

<section class="new-arrival-section">
  <h2>Koleksi Terbaru</h2>

  <div class="product-grid">

    <?php
    $produk_baru = [
      ["gambar" => "image/HIJAB SAKURA.jpg", "nama" => "Primrose Scarf", "harga" => 149000],
      ["gambar" => "image/HIJABBBB 1.jpg", "nama" => "Sakura Set", "harga" => 189000],
      ["gambar" => "image/HIJABBBB 2.jpg", "nama" => "Elegant Shawl", "harga" => 179000],
      ["gambar" => "image/SAKURAAA.png", "nama" => "Sakura Exclusive", "harga" => 169000],
      ["gambar" => "image/ELEGANNNN.png", "nama" => "Bloom Scarf", "harga" => 159000],
      ["gambar" => "image/HIJABBARU1.jpg", "nama" => "Velvet Hijab", "harga" => 155000],
      ["gambar" => "image/HIJABBARU2.jpg", "nama" => "Rosemary Shawl", "harga" => 165000],
      ["gambar" => "image/HIJABBARU3.jpg", "nama" => "Luna Satin", "harga" => 175000],
    ];

    foreach ($produk_baru as $item) {
      echo "
      <div class='product-card'>
        <img src='{$item['gambar']}' alt='{$item['nama']}'>
        <h3>{$item['nama']}</h3>
        <p>Rp " . number_format($item['harga'], 0, ',', '.') . "</p>

        <button onclick=\"addToCart('{$item['nama']}', {$item['harga']}, '{$item['gambar']}')\">
          Tambah ke Keranjang
        </button>
      </div>";
    }
    ?>

  </div>
</section>

<!-- ========== JAVASCRIPT KERANJANG ========== -->
<script>
function addToCart(nama, harga, gambar) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    let found = cart.find(item => item.nama === nama);

    if (found) {
        found.qty++;
    } else {
        cart.push({
            nama: nama,
            harga: harga,
            gambar: gambar,
            qty: 1
        });
    }

    localStorage.setItem("cart", JSON.stringify(cart));

    alert(nama + " berhasil ditambahkan ke keranjang!");

    if (typeof updateCartCount === "function") {
        updateCartCount();
    }
}
</script>

<?php include 'footer.php'; ?>

</body>
</html>