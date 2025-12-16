<?php
session_start();

// Pastikan ada cart
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>
        alert('Belum ada transaksi pembayaran!');
        window.location='index.php';
    </script>";
    exit;
}

$cart   = $_SESSION['cart'];
$nama   = $_POST['nama'] ?? '';
$hp     = $_POST['hp'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$metode = $_POST['metode'] ?? '';

// Hitung total
$total = 0;
foreach ($cart as $item) {
    $total += $item['harga'] * $item['qty'];
}

// Simpan ke session pembayaran
$_SESSION['pembayaran'] = [
    'nama'   => $nama,
    'hp'     => $hp,
    'alamat' => $alamat,
    'metode' => $metode,
    'cart'   => $cart,
    'total'  => $total
];

// Hapus cart setelah checkout
unset($_SESSION['cart']);

// Arahkan ke halaman sukses
header("Location: sukses.php");
exit;
