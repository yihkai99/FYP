<?php
include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];



if(!isset($admin_name)){
   header('location:user_account.php');
}

if (@$_GET['q'] == 'rmguest') {
    $id = @$_GET['id']; // Assuming your URL parameter is 'id'
    $result = mysqli_query($conn, "SELECT * FROM user_table WHERE id='$id' ") or die('Error');

    while ($row = mysqli_fetch_array($result)) {
        $r1 = mysqli_query($conn, "DELETE FROM user_table WHERE id='$id'") or die('Error');
    }

    echo "<script>alert('You have successfully deleted a user!'); window.location.replace('user_account.php'); </script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users accounts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/header.css">
    <style>
        img{
            height:100%;
            width:100%;
        }
    </style>
</head>
<body>
<section class="accounts">
<div class="header-area "style="margin-bottom:50px;">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                
                    <div class="row align-items-center">  
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu  d-none d-lg-block">
                            
                            <nav>
                                 <ul id="navigation" style="padding-left:-10px;">
                                 <li style="float:left;"><a href="index_admin.php" class="logo">Sunshine<span>Agency Panel</span></a></li>
                                 <li style="padding-left:20px;"><a  href="user_account.php">User</a></li>
                                 <li><a  href="placed_booking.php">View Booking</a></li>
                                 <li><a href="view_restaurant.php">Restaurant <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="add_restaurant.php">Add Restaurant</a></li>
                                                <li><a href="view_restaurant.php">View/Edit Restaurant</a></li>
                                            </ul>
                                 <li><a href="view_photographer.php">Photographer <i class="ti-angle-down"></i></a>
                                             <ul class="submenu">
                                                <li><a href="add_photographer.php">Add Photographer</a></li>
                                                <li><a href="view_photographer.php">View/Edit Photographer</a></li>
                                             </ul>
                                 <li><a href="view_card.php">invitation_card <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="add_card.php">Add invitation_card</a></li>
                                                <li><a href="view_card.php">View/Edit invitation_card</a></li>
                                            </ul>                                            
                                 </ul>
                                </nav>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
   </div>
   

<!-- user accounts section starts  -->



   <h1 class="heading">users account</h1>

   <div class="box-container">

   <?php
            $select_users = mysqli_query($conn, "SELECT * FROM user_table") or die('Error161');
            $rowcount = mysqli_num_rows($select_users);

            if ($rowcount > 0) {
                while ($fetch_accounts = mysqli_fetch_assoc($select_users)) {
            ?>
        <div class="box">
            <p> user id : <span><?php echo $fetch_accounts['id']; ?></span> </p>
            <p> username : <span><?php echo $fetch_accounts['name']; ?></span> </p>
            <p> Email Address: <span><?php echo $fetch_accounts['email']; ?></span> </p>
            <p> Your Image: <span><img src=" ../images/<?php echo $fetch_accounts['image']; ?>"/></span> </p>
            <a href="user_account.php?q=rmguest&id=<?php echo $fetch_accounts['id']; ?>" class="btn btn-danger"onclick="return confirm('delete this account?');">Delete</a>
        </div>
<?php
    }
} else {
    echo '<p class="empty">no accounts available</p>';
}
?>

   </div>

</section>

<!-- user accounts section ends -->







<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>