<?php 
session_start();
if(isset($_SESSION['admin_name'])){
session_destroy();}

echo"<script> window.location.replace('admin.php'); </script>";
echo"<script>alert('You have successfully logged out! Thank you.'); </script>";
?>
