<?php
session_start();

if(!isset($_SESSION['pembayaran'])){
    header("Location: index.php");
    exit;
}

$p = $_SESSION['pembayaran'];

// ================= SIMPAN KE RIWAYAT ADMIN =================
if(!isset($_SESSION['orders'])){
    $_SESSION['orders'] = [];
}

$_SESSION['orders'][] = [
    "username" => $p['nama'],
    "metode"   => $p['metode'],
    "alamat"   => $p['alamat'],
    "hp"       => $p['hp'],
    "items"    => $p['cart'],
    "total"    => $p['total'],
    "tanggal"  => date("d-m-Y H:i")
];

// hapus session pembayaran supaya tidak double
unset($_SESSION['pembayaran']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Transaksi Berhasil | Clavina Hijab</title>

<style>
body{
    margin:0;
    font-family:'Poppins', sans-serif;
    background:#f5f2eb;
}
.container{
    max-width:650px;
    margin:80px auto;
    background:#ffffff;
    padding:35px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,0.12);
}
.success-icon{
    text-align:center;
    font-size:60px;
    color:#7c6650;
}
h2{
    text-align:center;
    color:#7c6650;
}
.subtitle{
    text-align:center;
    margin-bottom:30px;
}
.section h3{
    color:#7c6650;
    border-bottom:2px solid #e5dfd6;
}
ul{list-style:none;padding:0}
ul li{
    display:flex;
    justify-content:space-between;
    padding:10px 0;
    border-bottom:1px solid #e0dad1;
}
.total{
    font-size:20px;
    font-weight:bold;
    text-align:right;
}
.btn{
    display:block;
    margin-top:30px;
    text-align:center;
    background:#7c6650;
    color:white;
    padding:14px;
    border-radius:10px;
    text-decoration:none;
}
</style>
</head>

<body>

<div class="container">
    <div class="success-icon">✔</div>
    <h2>Terima Kasih, <?= htmlspecialchars($p['nama']) ?>!</h2>
    <div class="subtitle">Pesanan kamu berhasil diproses 🎉</div>

    <div class="section">
        <h3>Ringkasan Pesanan</h3>
        <ul>
            <?php foreach($p['cart'] as $item): ?>
            <li>
                <span><?= htmlspecialchars($item['nama']) ?> (x<?= $item['qty'] ?>)</span>
                <span>Rp <?= number_format($item['harga']*$item['qty'],0,",",".") ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="total">
            Total: Rp <?= number_format($p['total'],0,",",".") ?>
        </div>
    </div>

    <a href="index.php" class="btn">Kembali ke Beranda</a>
</div>

<script>
localStorage.removeItem("cart");
</script>

</body>
</html>
