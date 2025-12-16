<!-- search.php -->
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search - Clavina Hijab</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
<style>
body {
  font-family: 'Poppins', sans-serif;
  margin: 0;
  background-color: #f5f1eb; /* cream */
}

/* NAVBAR */
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #bfbfbf; /* abu */
  padding: 10px 30px;
  color: white;
  position: sticky;
  top: 0;
  z-index: 1000;
}

nav .logo {
  font-family: 'Playfair Display', serif;
  font-size: 20px;
  font-weight: 700;
  color: #333;
}

nav .menu a {
  color: #333;
  text-decoration: none;
  margin-left: 20px;
  font-weight: 500;
  font-size: 14px;
}

nav .menu a:hover { color: #7c6650; }

nav .icons img {
  width: 22px;
  height: 22px;
  margin-left: 15px;
  cursor: pointer;
}

/* SEARCH POPUP */
#searchBox {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.4);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

#searchBox .search-content {
  background: #f5f1eb; /* cream */
  padding: 30px 20px;
  border-radius: 12px;
  text-align: center;
  width: 90%;
  max-width: 500px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

#searchBox h2 {
  color: #7c6650;
  font-size: 22px;
  margin-bottom: 20px;
}

#searchBox input[type="text"] {
  width: 100%;
  padding: 12px 15px;
  font-size: 16px;
  border: 1px solid #bfbfbf;
  border-radius: 6px;
  outline: none;
}

#searchBox button {
  margin-top: 15px;
  width: 100%;
  padding: 12px;
  font-size: 16px;
  background-color: #bfbfbf;
  color: #333;
  border: none;
  border-radius: 6px;
  cursor: pointer;
}

#searchBox button:hover { background-color: #a6a6a6; }

/* RESULTS */
#results {
  margin-top: 20px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.product-item {
  background: #e8e4de; /* cream gelap */
  border-radius: 8px;
  padding: 10px 15px;
  text-align: left;
  cursor: pointer;
  transition: transform 0.2s, background 0.3s;
}

.product-item:hover {
  background: #d7d3ca; /* hover abu-cream */
  transform: translateY(-2px);
}

.product-item p {
  margin: 0;
  font-size: 14px;
}

.product-item .price {
  font-weight: 600;
  color: #7c6650;
}
</style>
</head>
<body>

<nav>
  <div class="logo">Clavina Hijab</div>
  <div class="menu">
    <a href="index.php">HOME</a>
    <a href="NEWARRIVAL.php">NEW ARRIVAL</a>
    <a href="bestseller.php">BEST SELLER</a>
    <a href="kontak.php">CONTACT</a>
  </div>
  <div class="icons">
    <a href="login.php"><img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" alt="user"></a>
    <a href="cart.php"><img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="cart"></a>
    <img src="https://cdn-icons-png.flaticon.com/512/54/54481.png" alt="search" id="openSearch">
  </div>
</nav>

<div id="searchBox">
  <div class="search-content">
    <h2>Cari Produk</h2>
    <input type="text" id="searchInput" placeholder="Ketik kata kunci...">
    <button id="closeSearch">Tutup</button>
    <div id="results"></div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const searchBox = document.getElementById('searchBox');
  const openSearch = document.getElementById('openSearch');
  const closeSearch = document.getElementById('closeSearch');
  const searchInput = document.getElementById('searchInput');
  const results = document.getElementById('results');

  const products = [
    {nama: "Primrose Scarf", harga: 149000},
    {nama: "Sakura Set", harga: 189000},
    {nama: "Elegant Shawl", harga: 179000},
    {nama: "Sakura Exclusive", harga: 169000},
    {nama: "Bloom Scarf", harga: 159000},
    {nama: "Velvet Hijab", harga: 155000},
    {nama: "Rosemary Shawl", harga: 165000},
    {nama: "Luna Satin", harga: 175000}
  ];

  openSearch.addEventListener('click', () => {
    searchBox.style.display = 'flex';
    searchInput.value = '';
    results.innerHTML = '';
    searchInput.focus();
  });

  closeSearch.addEventListener('click', () => {
    searchBox.style.display = 'none';
    searchInput.value = '';
    results.innerHTML = '';
  });

  searchInput.addEventListener('input', () => {
    const keyword = searchInput.value.trim().toLowerCase();
    results.innerHTML = '';

    if(keyword === '') return;

    const filtered = products.filter(p => p.nama.toLowerCase().includes(keyword));

    if(filtered.length === 0){
      results.innerHTML = '<p>Produk tidak ditemukan.</p>';
    } else {
      results.innerHTML = filtered.map(p => `
        <div class="product-item">
          <p>${p.nama}</p>
          <p class="price">Rp ${p.harga.toLocaleString()}</p>
        </div>
      `).join('');
    }
  });
});
</script>
</body>
</html>
