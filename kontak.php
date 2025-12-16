<?php include 'header.php'; ?>

<style>
:root{
    --primary:#5A3E36;
    --secondary:#C9B8A8;
    --light:#F7F4F0;
    --white:#FFFFFF;
}

body{
    font-family:"Poppins",sans-serif;
    background:var(--light);
    margin:0;
}

/* HERO */
.contact-hero{
    background:var(--white);
    text-align:center;
    padding:60px 20px;
    border-bottom:2px solid var(--secondary);
    margin-top:20px;
}
.contact-hero h1{
    font-family:"Playfair Display",serif;
    color:var(--primary);
    font-size:36px;
}
.contact-hero p{
    color:#6f5b52;
}

/* CONTAINER – PRESISI */
.contact-container{
    max-width:1000px;
    margin:50px auto;
    display:grid;
    grid-template-columns:1fr 1fr; /* KIRI & KANAN SAMA */
    gap:35px;
    padding:0 20px;
    align-items:stretch;
}

/* CARD */
.contact-info,
.contact-form{
    background:var(--white);
    padding:30px;
    border-radius:15px;
    box-shadow:0 4px 20px rgba(0,0,0,.08);
    width:100%;
    box-sizing:border-box;
}

/* INFO */
.contact-info{
    border-left:6px solid var(--primary);
}
.contact-info h2{
    color:var(--primary);
    margin-bottom:15px;
}
.contact-info p{
    color:#4a3e38;
    line-height:1.8;
}

/* FORM */
.contact-form{
    display:flex;
    flex-direction:column;
}
.contact-form h2{
    color:var(--primary);
    margin-bottom:15px;
}

.form-group{
    margin-bottom:18px;
}

.contact-form label{
    font-weight:600;
    color:var(--primary);
    margin-bottom:6px;
    display:block;
}

.contact-form input,
.contact-form textarea{
    width:100%;
    padding:14px;
    border:1px solid var(--secondary);
    border-radius:8px;
    background:var(--light);
    font-size:15px;
    box-sizing:border-box;
}

.contact-form input:focus,
.contact-form textarea:focus{
    outline:none;
    border-color:var(--primary);
    background:var(--white);
    box-shadow:0 0 8px rgba(90,62,54,.25);
}

.contact-form button{
    margin-top:10px;
    width:100%;
    padding:14px;
    background:var(--primary);
    color:var(--white);
    border:none;
    border-radius:8px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
}
.contact-form button:hover{
    background:#4b332c;
}

.success-msg{
    display:none;
    margin-top:16px;
    padding:12px;
    background:#f0ebe6;
    border-radius:8px;
    text-align:center;
    color:var(--primary);
    font-weight:600;
}

/* RESPONSIVE */
@media(max-width:800px){
    .contact-container{
        grid-template-columns:1fr;
    }
}
</style>

<!-- HERO -->
<section class="contact-hero">
    <h1>Hubungi Kami</h1>
    <p>Kami siap membantu semua kebutuhan & pertanyaan Anda.</p>
</section>

<!-- CONTENT -->
<section class="contact-container">

    <!-- INFO -->
    <div class="contact-info">
        <h2>Informasi Kontak</h2>
        <p><strong>Clavina Hijab Customer Service</strong></p>
        <p>Email: support@clavina.com</p>
        <p>Telepon: 0812-3456-7890</p>
        <p>Jam Layanan: 08.00 – 17.00 WIB</p>
    </div>

    <!-- FORM -->
    <form class="contact-form" id="contactForm">
        <h2>Kirim Pesan</h2>

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
        </div>

        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
        </div>

        <div class="form-group">
            <label for="pesan">Pesan</label>
            <textarea id="pesan" name="pesan" rows="5" placeholder="Tulis pesan Anda..." required></textarea>
        </div>

        <button type="submit">Kirim Pesan</button>

        <div class="success-msg" id="successMsg">
            Pesan berhasil dikirim. Terima kasih telah menghubungi kami 🤍
        </div>
    </form>

</section>

<script>
const form = document.getElementById("contactForm");
const successMsg = document.getElementById("successMsg");

form.addEventListener("submit", function(e){
    e.preventDefault();

    const nama  = document.getElementById("nama").value.trim();
    const email = document.getElementById("email").value.trim();
    const pesan = document.getElementById("pesan").value.trim();

    if(nama==="" || email==="" || pesan===""){
        alert("Semua field wajib diisi.");
        return;
    }

    successMsg.style.display="block";
    form.reset();

    setTimeout(()=>{
        successMsg.style.display="none";
    },3500);
});
</script>

<?php include 'footer.php'; ?>
