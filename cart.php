<?php include 'header.php'; ?>

<style>
.cart-page { margin-top:130px; max-width:1100px; margin:auto; padding:20px; }
.cart-title { font-family:"Playfair Display"; font-size:42px; margin-bottom:30px; color:#4b3f33; }
.cart-card { background:#faf8f6; border:1px solid #e8dfd6; border-radius:12px; padding:18px; margin-bottom:18px; display:flex; gap:18px; align-items:center; }
.cart-card img { width:120px; height:120px; border-radius:10px; object-fit:cover; }
.cart-info { flex-grow:1; }
.qty-box { display:flex; gap:10px; margin-top:10px; }
.checkout-box { margin-top:20px; padding:20px; background:white; border-radius:12px; border:1px solid #ddd; text-align:right; }
.checkout-btn { margin-top:15px; padding:14px 26px; background:#7e6b59; color:white; font-size:18px; border:none; border-radius:8px; cursor:pointer; }
</style>

<div class="cart-page">
    <h1 class="cart-title">Keranjang Belanja</h1>
    <div id="cartContainer"></div>

    <div class="checkout-box">
        <div id="checkoutTotal">Total: Rp 0</div>
        <form id="checkoutForm" method="POST" action="pembayaran.php">
            <input type="hidden" name="cart_data" id="cart_data">
            <button type="submit" class="checkout-btn">Checkout</button>
        </form>
    </div>
</div>

<script>
// Ambil cart dari localStorage
function getCart(){ return JSON.parse(localStorage.getItem("cart")) || []; }
function saveCart(cart){ localStorage.setItem("cart", JSON.stringify(cart)); }

// Load keranjang
function loadCart(){
    let cart = getCart();
    let container = document.getElementById("cartContainer");
    container.innerHTML = "";
    let total = 0;

    cart.forEach((item,index)=>{
        let subtotal = item.qty * item.harga;
        total += subtotal;
        container.innerHTML += `
        <div class="cart-card">
            <img src="${item.gambar}">
            <div class="cart-info">
                <h3>${item.nama}</h3>
                <p>Rp ${item.harga.toLocaleString()}</p>
                <div class="qty-box">
                    <button type="button" onclick="kurang(${index})">-</button>
                    <span>${item.qty}</span>
                    <button type="button" onclick="tambah(${index})">+</button>
                </div>
                <p><b>Subtotal: Rp ${subtotal.toLocaleString()}</b></p>
            </div>
            <div onclick="hapus(${index})" style="cursor:pointer;color:red;font-size:22px;">×</div>
        </div>
        `;
    });

    document.getElementById("checkoutTotal").innerText = "Total: Rp " + total.toLocaleString();
}

// Tombol tambah/kurang/hapus
function tambah(i){ let cart = getCart(); cart[i].qty++; saveCart(cart); loadCart(); }
function kurang(i){ let cart = getCart(); if(cart[i].qty>1) cart[i].qty--; saveCart(cart); loadCart(); }
function hapus(i){ let cart = getCart(); cart.splice(i,1); saveCart(cart); loadCart(); }

loadCart();

// Sebelum submit checkout, isi cart_data
document.getElementById("checkoutForm").addEventListener("submit", function(e){
    let cart = getCart();
    if(cart.length === 0){ 
        e.preventDefault(); 
        alert("Keranjang kosong!"); 
        return; 
    }
    document.getElementById("cart_data").value = JSON.stringify(cart);
});
</script>
