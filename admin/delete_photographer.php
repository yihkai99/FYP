<?php 
include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


$id = @$_GET['id'];

// Corrected DELETE statement
$delete_card = mysqli_query($conn, "DELETE FROM photographer WHERE id = '$id'") or die('Error161');

echo "<script> alert('The photographer is deleted!');window.location.replace('view_photographer.php'); </script>";
?>
