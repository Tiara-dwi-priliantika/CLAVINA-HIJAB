<?php
session_start();

// Ambil data cart dari POST
if(isset($_POST['cart_data'])){
    $_SESSION['cart'] = json_decode($_POST['cart_data'], true);
}

// Jika cart kosong
if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
    echo "<script>alert('Keranjang kosong!'); window.location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pembayaran - Clavina Hijab</title>
<style>
/* ===== GLOBAL ===== */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f5f2eb; /* cream lembut */
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 60px auto;
    padding: 20px;
}

/* ===== JUDUL ===== */
h2 {
    color: #7c6650;
    text-align: center;
    margin-bottom: 30px;
    font-size: 32px;
}

/* ===== FORM ===== */
.box {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.box label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #4b3f33;
}

.box input, .box select {
    width: 100%;
    padding: 12px 10px;
    margin-bottom: 15px;
    border: 1px solid #d3cfc4;
    border-radius: 8px;
    font-size: 16px;
    background-color: #fdfaf5;
    color: #4b3f33;
}

.box button {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 10px;
    background-color: #7c6650;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.box button:hover {
    background-color: #5a4a3c;
}

/* ===== RINGKASAN KERANJANG ===== */
.cart-summary {
    background-color: #eae6df; /* abu lembut */
    padding: 25px;
    border-radius: 12px;
}

.cart-summary h3 {
    margin-top: 0;
    color: #7c6650;
}

.cart-summary ul {
    list-style-type: none;
    padding-left: 0;
}

.cart-summary li {
    padding: 8px 0;
    border-bottom: 1px solid #d3cfc4;
    font-size: 16px;
    color: #4b3f33;
}

.cart-summary li:last-child {
    font-weight: bold;
    border-bottom: none;
    font-size: 18px;
}
</style>
</head>
<body>

<div class="container">

    <h2>Form Pembayaran</h2>

    <div class="box">
        <form id="paymentForm" action="proses_pembayaran.php" method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>

            <label>No HP</label>
            <input type="text" name="hp" placeholder="0812xxxxxxx" required>

            <label>Alamat Lengkap</label>
            <input type="text" name="alamat" placeholder="Jl. Contoh No.123, Kota" required>

            <label>Metode Pembayaran</label>
            <select name="metode" required>
                <option value="">-- Pilih Metode --</option>
                <option value="COD">COD</option>
            </select>

            <button type="submit">Bayar Sekarang</button>
        </form>
    </div>

    <div class="cart-summary">
        <h3>Ringkasan Keranjang</h3>
        <ul>
        <?php
        $total = 0;
        foreach($_SESSION['cart'] as $item){
            $subtotal = $item['harga'] * $item['qty'];
            echo "<li>{$item['nama']} x {$item['qty']} = Rp ".number_format($subtotal,0,",",".")."</li>";
            $total += $subtotal;
        }
        echo "<li>Total: Rp ".number_format($total,0,",",".")."</li>";
        ?>
        </ul>
    </div>

</div>

<script>
// Tambahkan popup "Pembayaran Berhasil" sebelum submit
document.getElementById('paymentForm').addEventListener('submit', function(e){
    e.preventDefault(); // hentikan submit sementara
    alert("Pembayaran berhasil!");
    this.submit(); // lanjut submit form
});
</script>

</body>
</html>
