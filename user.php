<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['role'] !== 'user'){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Clavina Hijab</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Poppins', sans-serif;
    background:#f5f2eb;
}

/* HEADER */
.header{
    background:#7e6b59;
    color:white;
    padding:14px 30px;
    display:flex;
    align-items:center;
    justify-content:space-between;
}
.logo{
    font-family:"Playfair Display";
    font-size:22px;
}
.menu{
    display:flex;
    gap:20px;
}
.menu a{
    color:white;
    text-decoration:none;
    font-size:14px;
}
.menu a:hover{
    text-decoration:underline;
}

/* MAIN */
.container{
    display:flex;
    max-width:1200px;
    margin:25px auto;
    gap:20px;
}

/* SIDEBAR */
.sidebar{
    width:230px;
    background:#fff;
    border-radius:12px;
    padding:20px;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
}
.sidebar h3{
    margin-top:0;
    color:#7e6b59;
}
.sidebar a{
    display:block;
    padding:10px 0;
    color:#444;
    text-decoration:none;
    font-size:14px;
}
.sidebar a:hover{
    color:#7e6b59;
    font-weight:600;
}

/* CONTENT */
.content{
    flex:1;
    background:#fff;
    border-radius:12px;
    padding:40px;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
    text-align:center;
}
.content h2{
    color:#7e6b59;
}
.content p{
    color:#555;
}
</style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <div class="logo">Clavina Hijab</div>

    <div class="menu">
        <a href="index.php">Home</a>
        <a href="NEWARRIVAL.php">New Arrival</a>
        <a href="cart.php">🛒 Cart</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="container">

<!-- SIDEBAR -->
<div class="sidebar">
    <h3>Akun Saya</h3>
    <a href="#">Profil</a>
    <a href="#">Pesanan Saya</a>
    <a href="#">Alamat</a>
    <a href="#">Riwayat Pembelian</a>
</div>

<!-- CONTENT -->
<div class="content">
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['username']); ?> 👋</h2>
    <p>Silakan pilih menu di atas atau kategori produk untuk mulai berbelanja.</p>
</div>

</div>

</body>
</html>
