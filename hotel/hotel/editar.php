<?php include 'includes/auth.php'; ?>
<?php include 'includes/database.php';

$id=$_GET['id'];

if($_POST){

$conn->query("UPDATE reservaciones SET
cliente_nombre='{$_POST['nombre']}',
cliente_email='{$_POST['email']}',
telefono='{$_POST['telefono']}',
habitacion='{$_POST['habitacion']}',
tipo_habitacion='{$_POST['tipo']}',
fecha_entrada='{$_POST['entrada']}',
fecha_salida='{$_POST['salida']}',
num_huespedes='{$_POST['huespedes']}',
precio_total='{$_POST['precio']}',
estado_reserva='{$_POST['estado']}'
WHERE id=$id");

header("Location:index.php");
exit;
}

$res=$conn->query("SELECT * FROM reservaciones WHERE id=$id");
$r=$res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Reservación</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="build/css/style.css">
<script src="build/js/validation.js"></script>
</head>

<body>

<div class="container">

<div class="hotel-header">
  <div class="hotel-brand">GRAND RESERVA</div>
  <div class="hotel-sub">Luxury Hotel Management</div>
</div>

<div class="hotel-nav">
  <a href="index.php">Reservaciones</a>
  <a href="crear.php">Nueva</a>
  <a href="logout.php">Salir</a>
</div>

<h2>Editar Reservación</h2>

<form method="POST" onsubmit="return validarReserva()">

<label>Nombre del cliente</label>
<input name="nombre" value="<?= $r['cliente_nombre'] ?>">

<label>Email</label>
<input name="email" value="<?= $r['cliente_email'] ?>">

<label>Teléfono</label>
<input name="telefono" value="<?= $r['telefono'] ?>">

<label>Habitación</label>
<input name="habitacion" value="<?= $r['habitacion'] ?>">

<label>Tipo de habitación</label>
<input name="tipo" value="<?= $r['tipo_habitacion'] ?>">

<label>Fecha entrada</label>
<input type="date" name="entrada" value="<?= $r['fecha_entrada'] ?>">

<label>Fecha salida</label>
<input type="date" name="salida" value="<?= $r['fecha_salida'] ?>">

<label>Número de huéspedes</label>
<input name="huespedes" value="<?= $r['num_huespedes'] ?>">

<label>Precio total</label>
<input name="precio" value="<?= $r['precio_total'] ?>">

<label>Estado reserva</label>
<input name="estado" value="<?= $r['estado_reserva'] ?>">

<button>Actualizar</button>

</form>

</div>

</body>
</html>