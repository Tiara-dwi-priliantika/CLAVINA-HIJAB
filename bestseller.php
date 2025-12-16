<?php include 'header.php'; ?>

<style>
/* FIX NAVBAR */
.best-page {
    margin-top: 120px;
    padding: 0 40px;
}

/* JUDUL */
.best-title {
    font-family: "Playfair Display";
    font-size: 42px;
    color: #3b312b;
    margin-bottom: 40px;
}

/* GRID PRODUK */
.best-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 50px 40px;
    max-width: 1300px;
    margin-bottom: 80px;
}

.best-card {
    width: 100%;
}

.best-card img {
    width: 100%;
    height: 360px;
    object-fit: cover;
    border-radius: 6px;
}

/* TEKS NAMA PRODUK */
.best-card h3 {
    margin-top: 12px;
    margin-bottom: 4px;
    font-size: 20px;
    font-weight: 500;
    color: #555;
}

/* HARGA NORMAL */
.best-card .price {
    font-size: 18px;
    font-weight: bold;
    color: #000;
}

/* HARGA DISKON */
.best-card .price-discount {
    font-size: 18px;
    font-weight: bold;
    color: #7e6b59;
}

.best-card .old-price {
    color: #b9b9b9;
    text-decoration: line-through;
    margin-top: 4px;
    font-size: 15px;
}

/* RESPONSIVE */
@media (max-width: 992px) {
    .best-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .best-grid {
        grid-template-columns: repeat(1, 1fr);
    }
}
</style>

<div class="best-page">

    <h1 class="best-title">Best Seller</h1>

    <div class="best-grid">

        <?php
        $best_seller = [
            [
                "gambar" => "image/pink soft.jpg",
                "nama" => "Paris Premium Pink Soft",
                "harga" => 135000,
                "diskon" => 0
            ],
            [
                "gambar" => "image/turkish.jpg",
                "nama" => "Paris Premium Turkish",
                "harga" => 121500,
                "diskon" => 135000
            ],
            [
                "gambar" => "image/purple.jpg",
                "nama" => "Paris Premium Purple",
                "harga" => 135000,
                "diskon" => 0
            ],
            [
                "gambar" => "image/dusty purple.jpg",
                "nama" => "Paris Premium Dusty Purple",
                "harga" => 135000,
                "diskon" => 0
            ],
            [
                "gambar" => "image/grey.jpg",
                "nama" => "Paris Premium Soft Grey",
                "harga" => 135000,
                "diskon" => 0
            ],
            [
                "gambar" => "image/black.jpg",
                "nama" => "Paris Premium Black",
                "harga" => 121500,
                "diskon" => 135000
            ]
        ];

        foreach ($best_seller as $item) {

            echo "<div class='best-card detailBtn'>
                    <img src='{$item['gambar']}' alt='{$item['nama']}'>

                    <h3>{$item['nama']}</h3>";

            if ($item['diskon'] > 0) {
                echo "<div class='price-discount'>Rp " . 
                        number_format($item['harga'], 0, ',', '.') . "</div>
                      <div class='old-price'>Rp " . 
                        number_format($item['diskon'], 0, ',', '.') . "</div>";
            } else {
                echo "<div class='price'>Rp " . 
                        number_format($item['harga'], 0, ',', '.') . "</div>";
            }

            echo "</div>";
        }
        ?>

    </div>

</div>

<?php include 'footer.php'; ?>