// === SLIDER OTOMATIS ===
const slides = document.querySelectorAll(".slide");
let currentSlide = 0;

function showSlide(index) {
  slides.forEach(slide => slide.classList.remove("active"));
  slides[index].classList.add("active");
}

setInterval(() => {
  currentSlide = (currentSlide + 1) % slides.length;
  showSlide(currentSlide);
}, 4000);


// === UBAH TEKS HERO DINAMIS ===
document.getElementById("heroLabel").style.color = "#ffffff";
document.getElementById("heroTitle").style.color = "#ffffff";
document.getElementById("heroDesc").style.color = "#ffffff";


// Ambil keranjang dari localStorage
function getCart() {
  return JSON.parse(localStorage.getItem("cart")) || [];
}

// Simpan ke localStorage
function saveCart(cart) {
  localStorage.setItem("cart", JSON.stringify(cart));
}

// Update jumlah item pada icon keranjang
function updateCartCount() {
  const cart = getCart();
  const count = cart.reduce((acc, item) => acc + item.qty, 0);

  let cartCount = document.getElementById("cartCount");

  if (!cartCount) {
    const icon = document.querySelector(".icon img[alt='cart']");
    cartCount = document.createElement("span");
    cartCount.id = "cartCount";
    cartCount.className = "cart-count";
    icon.parentElement.appendChild(cartCount);
  }

  cartCount.textContent = count;
}

updateCartCount();

// Tombol Tambah ke Keranjang
document.querySelectorAll(".product-card button").forEach(btn => {
  btn.addEventListener("click", (e) => {
    const card = e.target.closest(".product-card");

    const nama = card.querySelector("h3").textContent;
    const harga = card.querySelector("p").textContent.replace("Rp ", "").replace(/\./g, "");
    const gambar = card.querySelector("img").getAttribute("src");

    let cart = getCart();

    // Cek apakah produk sudah ada
    const existing = cart.find(item => item.nama === nama);

    if (existing) {
      existing.qty++;
    } else {
      cart.push({
        nama: nama,
        harga: parseInt(harga),
        gambar: gambar,
        qty: 1
      });
    }

    saveCart(cart);
    updateCartCount();

    // Animasi klik
    btn.classList.add("clicked");
    setTimeout(() => btn.classList.remove("clicked"), 300);

    // Popup info
    alert(nama + " berhasil ditambahkan ke keranjang!");
  });
});


// === NOTIFIKASI WELCOME ===
const notif = document.createElement("div");
notif.className = "notif-banner";
notif.textContent = "Welcome to Clavina Hijab!";
document.body.prepend(notif);

setTimeout(() => notif.remove(), 3000);


// === SEARCH POPUP ===
const searchIcon = document.querySelector(".search-icon");
const searchBox = document.getElementById("searchBox");
const closeSearch = document.getElementById("closeSearch");

searchIcon.addEventListener("click", () => {
  searchBox.style.display = "block";
});

closeSearch.addEventListener("click", () => {
  searchBox.style.display = "none";
});


// === HOVER HIGHLIGHT PRODUK ===
document.querySelectorAll(".product-card").forEach(card => {
  card.addEventListener("mouseenter", () => {
    card.style.border = "2px solid #b79e83";
    card.style.transform = "scale(1.03)";
  });

  card.addEventListener("mouseleave", () => {
    card.style.border = "1px solid #e8dfd6";
    card.style.transform = "scale(1)";
  });
});


// === SCROLL REVEAL ===
function scrollReveal() {
  const reveals = document.querySelectorAll(".reveal");

  reveals.forEach(el => {
    const windowH = window.innerHeight;
    const top = el.getBoundingClientRect().top;

    if (top < windowH - 100) {
      el.classList.add("active");
    }
  });
}

window.addEventListener("scroll", scrollReveal);
scrollReveal();

const modal = document.getElementById("productModal");
const closeModal = document.getElementById("closeModal");

const modalImg = document.getElementById("modalImg");
const modalNama = document.getElementById("modalNama");
const modalHarga = document.getElementById("modalHarga");

const pilihWarna = document.getElementById("pilihWarna");
const pilihQty = document.getElementById("pilihQty");

let produkDipilih = {};

document.querySelectorAll(".product-card").forEach(card => {
  card.addEventListener("click", () => {
    
    let nama = card.querySelector("h3").textContent;
    let hargaText = card.querySelector("p").textContent;
    let gambar = card.querySelector("img").getAttribute("src");

    modal.style.display = "flex";

    modalImg.src = gambar;
    modalNama.textContent = nama;
    modalHarga.textContent = hargaText;

    produkDipilih = {
      nama: nama,
      gambar: gambar,
      harga: parseInt(hargaText.replace("Rp ", "").replace(/\./g, ""))
    };
  });
});

// Tutup popup
closeModal.addEventListener("click", () => modal.style.display = "none");
window.addEventListener("click", (e) => {
  if (e.target === modal) modal.style.display = "none";
});


// === Tombol Tambah ke Keranjang Dari Modal ===
document.getElementById("addCartBtn").addEventListener("click", () => {

  let warna = pilihWarna.value;
  let qty = parseInt(pilihQty.value);

  let cart = getCart();

  // Cek produk + warna
  const exist = cart.find(item => item.nama === produkDipilih.nama && item.warna === warna);

  if (exist) {
    exist.qty += qty;
  } else {
    cart.push({
      nama: produkDipilih.nama,
      harga: produkDipilih.harga,
      gambar: produkDipilih.gambar,
      warna: warna,
      qty: qty
    });
  }

  saveCart(cart);
  updateCartCount();
  alert("Produk berhasil ditambahkan!");
  modal.style.display = "none";
});

  document.getElementById("cartData").value = JSON.stringify(produk);
  document.getElementById("buyNowForm").submit();
;
