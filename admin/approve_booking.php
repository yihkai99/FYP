<?php
include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


$id = @$_GET['id'];

// Update query using prepared statements
$updateQuery = mysqli_prepare($conn, "UPDATE booking SET status = 'Approved' WHERE booking_id = ?");
mysqli_stmt_bind_param($updateQuery, "i", $id);

if (mysqli_stmt_execute($updateQuery)) {
    echo "<script>alert('Booking status updated successfully!'); window.location.replace('placed_booking.php');</script>";
} else {
    echo "<script>alert('Error updating booking status: " . mysqli_error($conn) . "'); window.location.replace('placed_booking.php');</script>";
}

mysqli_stmt_close($updateQuery);
?>
