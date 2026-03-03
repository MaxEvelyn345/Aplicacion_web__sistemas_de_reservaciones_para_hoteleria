<?php include 'includes/auth.php'; ?>
<?php include 'includes/database.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reservaciones</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="build/css/style.css">
</head>

<body>

<div class="container">

<!-- HEADER HOTEL -->
<div class="hotel-header">
  <div class="hotel-brand">GRAND RESERVA</div>
  <div class="hotel-sub">Luxury Hotel Management</div>
</div>

<!-- NAV -->
<div class="hotel-nav">
  <a href="index.php">Reservaciones</a>
  <a href="crear.php">Nueva</a>
  <a href="logout.php">Salir</a>
</div>

<!-- TITULO -->
<h2>Reservaciones</h2>

<!-- FILTRO -->
<form method="GET" class="filter-box">
  <div>
    <label>Desde</label>
    <input type="date" name="desde">
  </div>
  <div>
    <label>Hasta</label>
    <input type="date" name="hasta">
  </div>
  <button>Filtrar</button>
</form>

<!-- TABLA -->
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Cliente</th>
      <th>Habitación</th>
      <th>Entrada</th>
      <th>Salida</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>

  <tbody>
  <?php
  $sql="SELECT * FROM reservaciones";

  if(!empty($_GET['desde']) && !empty($_GET['hasta'])){
    $d=$_GET['desde'];
    $h=$_GET['hasta'];
    $sql.=" WHERE fecha_entrada >= '$d' AND fecha_salida <= '$h'";
  }

  $res=$conn->query($sql);

  while($r=$res->fetch_assoc()){
  ?>
    <tr>
      <td><?= $r['id'] ?></td>
      <td><?= $r['cliente_nombre'] ?></td>
      <td><?= $r['habitacion'] ?></td>
      <td><?= $r['fecha_entrada'] ?></td>
      <td><?= $r['fecha_salida'] ?></td>
      <td>
        <span class="badge <?= strtolower($r['estado_reserva']) ?>">
          <?= $r['estado_reserva'] ?>
        </span>
      </td>
      <td class="actions">
        <a href="editar.php?id=<?= $r['id'] ?>" class="edit">Editar</a>
        <a href="eliminar.php?id=<?= $r['id'] ?>" class="delete">Eliminar</a>
      </td>
    </tr>
  <?php } ?>
  </tbody>

</table>

</div>

</body>
</html>