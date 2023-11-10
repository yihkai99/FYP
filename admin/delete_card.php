<?php 
include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


$id = @$_GET['card_id'];

// Corrected DELETE statement
$delete_card = mysqli_query($conn, "DELETE FROM invitation_card WHERE card_id = '$id'") or die('Error161');

echo "<script> alert('The invitation_card is deleted!');window.location.replace('view_card.php'); </script>";
?>
