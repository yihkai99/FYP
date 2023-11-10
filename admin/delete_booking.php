<?php 
include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


$id = @$_GET['id'];

// Corrected DELETE statement
$delete_card = mysqli_query($conn, "DELETE FROM booking WHERE booking_id = '$id'") or die('Error161');

echo "<script> alert('The booking is deleted!');window.location.replace('placed_booking.php'); </script>";
?>
