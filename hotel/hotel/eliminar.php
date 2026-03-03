<?php include 'includes/auth.php'; ?>
<?php
include 'includes/database.php';

$id = $_GET['id'];

$conn->query("DELETE FROM reservaciones WHERE id=$id");

header("Location:index.php");
?>