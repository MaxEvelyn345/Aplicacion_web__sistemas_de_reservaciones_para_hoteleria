<?php
include 'includes/database.php';
session_start();

if($_POST){
  $user=$_POST['usuario'];
  $pass=md5($_POST['password']);

  $res=$conn->query("SELECT * FROM usuarios
                     WHERE usuario='$user'
                     AND password='$pass'");

  if($res->num_rows){
    $_SESSION['admin']=$user;
    header("Location:index.php");
  }else{
    $error="Datos incorrectos";
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="build/css/style.css">
</head>

<body class="login-bg">

<div class="container login">

<div class="hotel-header">
  <div class="hotel-brand">GRAND RESERVA</div>
  <div class="hotel-sub">Luxury Hotel Management</div>
</div>

<h2>Acceso Administrador</h2>

<form method="POST">
<label>Usuario</label>
<input name="usuario">

<label>Password</label>
<input type="password" name="password">

<button>Entrar</button>
</form>

<?php if(isset($error)) echo "<p>$error</p>"; ?>

</div>

</body>
</html>