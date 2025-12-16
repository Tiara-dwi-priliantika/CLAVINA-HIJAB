<?php
session_start();
include 'config.php';

$error = "";

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn,
        "SELECT * FROM users 
         WHERE username='$username' 
         AND password='$password'"
    );

    if(mysqli_num_rows($query) == 1){
        $user = mysqli_fetch_assoc($query);

        $_SESSION['username'] = $user['username'];
        $_SESSION['role']     = $user['role'];

        // ===== ADMIN =====
        if($user['role'] === 'admin'){
            header("Location: admin.php");
            exit;
        }

        // ===== USER =====
        if($user['role'] === 'user'){
            $_SESSION['login_success'] = true;
            $_SESSION['welcome_name']  = $user['username'];
        }

    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login | Clavina Hijab</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body{
    margin:0;
    min-height:100vh;
    background: linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.45)),
                url('image/Gemini_Generated_Image_9ce05f9ce05f9ce0.png') center/cover no-repeat;
    font-family: 'Poppins', sans-serif;
    display:flex;
    align-items:center;
    justify-content:center;
}

.login-card{
    width:380px;
    background: rgba(255,255,255,.9);
    backdrop-filter: blur(10px);
    padding:35px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,.35);
    animation: fadeUp .8s ease;
}

@keyframes fadeUp{
    from{opacity:0; transform:translateY(30px);}
    to{opacity:1; transform:translateY(0);}
}

.login-card h2{
    font-family: 'Playfair Display', serif;
    text-align:center;
    margin-bottom:5px;
    color:#7c6650;
}

.login-card p{
    text-align:center;
    font-size:14px;
    color:#777;
    margin-bottom:25px;
}

.login-card input{
    width:100%;
    padding:12px 14px;
    margin-bottom:15px;
    border-radius:10px;
    border:1px solid #ddd;
    font-size:14px;
    outline:none;
}

.login-card input:focus{
    border-color:#b79e83;
}

.login-card button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:30px;
    background:#b79e83;
    color:#fff;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.login-card button:hover{
    background:#9f866d;
    transform:scale(1.02);
}

.error{
    background:#ffe6e6;
    color:#c0392b;
    padding:10px;
    border-radius:10px;
    font-size:13px;
    text-align:center;
    margin-bottom:15px;
}
</style>
</head>
<body>

<div class="login-card">
    <h2>Clavina Hijab</h2>
    <p>Elegance in Your Everyday</p>

    <?php if($error): ?>
        <div class="error"><?=$error?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Masuk</button>
    </form>
</div>

<?php
// ===== POPUP USER =====
if(isset($_SESSION['login_success']) && $_SESSION['login_success'] === true):
?>
<script>
Swal.fire({
    title: 'Login Berhasil ✨',
    html: `
        <p style="font-size:15px;">
            Selamat datang, <b><?= $_SESSION['welcome_name']; ?></b><br>
            Selamat berbelanja di <b>Clavina Hijab</b>
        </p>
    `,
    imageUrl: 'image/SAKURAAA.png',
    imageWidth: 120,
    imageHeight: 120,
    confirmButtonText: 'Masuk ke Home',
    confirmButtonColor: '#b79e83',
    allowOutsideClick: false
}).then(() => {
    window.location.href = "index.php";
});
</script>
<?php
unset($_SESSION['login_success']);
unset($_SESSION['welcome_name']);
endif;
?>

</body>
</html>
