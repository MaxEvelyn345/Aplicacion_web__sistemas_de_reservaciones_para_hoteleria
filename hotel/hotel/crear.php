<?php include 'includes/auth.php'; ?>
<?php include 'includes/database.php';

if($_POST){

$habitacion = $_POST['habitacion'];
$entrada = $_POST['entrada'];
$salida = $_POST['salida'];

$check = $conn->query("
SELECT id FROM reservaciones
WHERE habitacion = '$habitacion'
AND fecha_entrada < '$salida'
AND fecha_salida > '$entrada'
");

if($check && $check->num_rows > 0){
  echo "<h3>Habitación no disponible en esas fechas</h3>";
  exit;
}

$sql="INSERT INTO reservaciones
(cliente_nombre,cliente_email,telefono,habitacion,tipo_habitacion,fecha_entrada,fecha_salida,num_huespedes,precio_total,estado_reserva)
VALUES
('{$_POST['nombre']}','{$_POST['email']}','{$_POST['telefono']}','{$_POST['habitacion']}',
'{$_POST['tipo']}','{$_POST['entrada']}','{$_POST['salida']}',
'{$_POST['huespedes']}','{$_POST['precio']}','{$_POST['estado']}')";

$conn->query($sql);
header("Location:index.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Nueva Reservación</title>

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

<h2>Nueva Reservación</h2>

<form method="POST" onsubmit="return validarReserva()">

<label>Nombre del cliente</label>
<input name="nombre">

<label>Email</label>
<input name="email">

<label>Teléfono</label>
<input name="telefono">

<label>Habitación</label>
<input name="habitacion">

<label>Tipo de habitación</label>
<input name="tipo">

<label>Fecha entrada</label>
<input type="date" name="entrada">

<label>Fecha salida</label>
<input type="date" name="salida">

<label>Número de huéspedes</label>
<input name="huespedes">

<label>Precio total</label>
<input name="precio">

<label>Estado reserva</label>
<input name="estado">

<button>Guardar</button>

</form>

</div>

</body>
</html>