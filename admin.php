<?php
session_start();
include 'config.php';

/* ================= CEK ADMIN ================= */
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

/* ================= TAMBAH PRODUK ================= */
if (isset($_POST['add_product'])) {

    $nama   = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga  = intval($_POST['harga']);
    $stok   = intval($_POST['stok']);
    $diskon = !empty($_POST['diskon']) ? intval($_POST['diskon']) : 0;

    // UPLOAD GAMBAR
    $gambar_name = $_FILES['gambar']['name'];
    $tmp_name    = $_FILES['gambar']['tmp_name'];

    $folder = "image/";
    if (!is_dir($folder)) {
        mkdir($folder);
    }

    $nama_file   = time() . "_" . $gambar_name;
    $path_gambar = $folder . $nama_file;

    move_uploaded_file($tmp_name, $path_gambar);

    mysqli_query($conn, "
        INSERT INTO products (nama_produk, harga, diskon, stok, gambar)
        VALUES ('$nama', $harga, $diskon, $stok, '$path_gambar')
    ");

    header("Location: admin.php");
    exit;
}

/* ================= UPDATE STOK ================= */
if (isset($_POST['update_stok'])) {
    $id   = intval($_POST['id']);
    $stok = intval($_POST['tambah_stok']);

    mysqli_query($conn, "
        UPDATE products SET stok = stok + $stok WHERE id = $id
    ");

    header("Location: admin.php");
    exit;
}

/* ================= HAPUS PRODUK ================= */
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);

    $q = mysqli_query($conn, "SELECT gambar FROM products WHERE id=$id");
    $g = mysqli_fetch_assoc($q);
    if ($g && file_exists($g['gambar'])) {
        unlink($g['gambar']);
    }

    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    header("Location: admin.php");
    exit;
}

/* ================= RIWAYAT PESANAN (SESSION) ================= */
if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = [];
}

/* ================= LOGOUT ================= */
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin Produk</title>
<style>
body { font-family:Poppins,sans-serif; background:#f5f2eb; }
.container { max-width:1100px; margin:auto; padding:20px; }
h2 { color:#7c6650; margin-top:30px; }
table { width:100%; border-collapse:collapse; margin-top:15px; }
th, td { border:1px solid #ccc; padding:10px; }
th { background:#eae6df; }
input, button { padding:8px; margin:4px 0; }
button { background:#7c6650; color:white; border:none; border-radius:5px; cursor:pointer; }
button:hover { background:#5a4a3c; }
.delete-btn { background:red; }
img { border-radius:8px; }
.order-box { background:#fff; padding:15px; margin-bottom:20px; border-radius:10px; }
</style>
</head>

<body>
<div class="container">

<h2>Tambah Produk</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="Nama Produk" required><br>
    <input type="number" name="harga" placeholder="Harga" required><br>
    <input type="number" name="stok" placeholder="Stok" required><br>
    <input type="number" name="diskon" placeholder="Diskon (opsional)"><br>
    <input type="file" name="gambar" accept="image/*" required><br>
    <button type="submit" name="add_product">Tambah Produk</button>
</form>

<h2>Daftar Produk</h2>
<table>
<tr>
    <th>ID</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
while ($p = mysqli_fetch_assoc($result)):
?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><img src="<?= $p['gambar'] ?>" width="80"></td>
    <td><?= $p['nama_produk'] ?></td>
    <td>Rp <?= number_format($p['harga'],0,",",".") ?></td>
    <td><?= $p['stok'] ?></td>
    <td>
        <form method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $p['id'] ?>">
            <input type="number" name="tambah_stok" placeholder="+stok" required style="width:70px;">
            <button name="update_stok">+Stok</button>
        </form>

        <a href="?delete_id=<?= $p['id'] ?>" onclick="return confirm('Hapus produk ini?')">
            <button type="button" class="delete-btn">Hapus</button>
        </a>
    </td>
</tr>
<?php endwhile; ?>
</table>

<h2>Riwayat Pesanan User</h2>

<?php if (empty($_SESSION['orders'])): ?>
    <p>Belum ada pesanan masuk.</p>
<?php else: ?>
    <?php foreach ($_SESSION['orders'] as $i => $order): ?>
        <div class="order-box">
            <b>Pesanan #<?= $i+1 ?></b><br>
            User: <?= $order['username'] ?? 'Guest' ?>

            <table>
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach ($order['items'] as $item): ?>
                <tr>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td>Rp <?= number_format($item['harga'],0,",",".") ?></td>
                    <td>Rp <?= number_format($item['harga'] * $item['qty'],0,",",".") ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><b>Total</b></td>
                    <td><b>Rp <?= number_format($order['total'],0,",",".") ?></b></td>
                </tr>
            </table>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<form method="POST">
    <button name="logout">Logout</button>
</form>

</div>
</body>
</html>
