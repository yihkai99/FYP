<?php 
include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


$id = @$_GET['id'];

// Corrected DELETE statement
$delete_card = mysqli_query($conn, "DELETE FROM restaurant WHERE rest_id = '$id'") or die('Error161');

echo "<script> alert('The restaurant is deleted!');window.location.replace('view_restaurant.php'); </script>";
?>
