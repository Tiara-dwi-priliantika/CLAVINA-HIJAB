<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Clavina Hijab</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #f5f5f5;
    }

    .header {
      background: #7c6650;
      color: white;
      padding: 18px;
      text-align: center;
      font-size: 22px;
    }

    .container {
      padding: 30px;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      margin-top: 20px;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      text-align: center;
    }

    .card h3 {
      margin-bottom: 10px;
      color: #7c6650;
    }

    .menu-btn {
      display: inline-block;
      padding: 12px 20px;
      background: #7c6650;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      margin: 10px;
    }

    .menu-btn:hover {
      background: #6a5744;
    }
  </style>
</head>
<body>

<div class="header">Dashboard Clavina Hijab</div>

<div class="container">
  <h2>Selamat datang, Admin!</h2>
  <p>Ini adalah halaman dashboard utama.</p>

  <div>
    <a class="menu-btn" href="index.php">Lihat Website</a>
    <a class="menu-btn" href="NEWARRIVAL.php">New Arrival</a>
    <a class="menu-btn" href="bestseller.php">Best Seller</a>
    <a class="menu-btn" href="cart.php">Keranjang</a>
    <a class="menu-btn" href="logout.php">Logout</a>
  </div>

  <div class="card-grid">
    <div class="card">
      <h3>Total Produk</h3>
      <p>25 Items</p>
    </div>

    <div class="card">
      <h3>Order Hari Ini</h3>
      <p>3 Pesanan</p>
    </div>

    <div class="card">
      <h3>Pengunjung</h3>
      <p>178 Orang</p>
    </div>

    <div class="card">
      <h3>Produk Baru</h3>
      <p>5 Item</p>
    </div>
  </div>
</div>

</body>
</html>
