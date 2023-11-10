<?php

include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


$select_restaurants = mysqli_query($conn, "SELECT * FROM restaurant") or die('Error161');
$rowcount = mysqli_num_rows($select_restaurants);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>placed reservations</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/header.css">
<style>
    img
    {
        width:100%;
        height:100%;
    }
</style>
</head>
<body>
<section>
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
   
   

<!-- placed reservations section starts  -->

<section class="placed-orders">

   <h1 class="heading">View Restaurant</h1>

   <div class="box-container">

   <?php
   $select_restaurants = mysqli_query($conn, "SELECT * FROM restaurant") or die('Error161');
   $rowcount = mysqli_num_rows($select_restaurants);
   if ($rowcount > 0) {
    while ($fetch_accounts = mysqli_fetch_assoc($select_restaurants)) {
?>
   <div class="box">
      <span ><a href="delete_restaurant.php?id=<?php echo $fetch_accounts['rest_id']; ?>"><i class="fas fa-trash" style="margin-left:220px; font-size: 20px;"></i>Delete</a></span>
      <p> Restaurant ID : <span><?php echo $fetch_accounts['rest_id']; ?></span> </p>
      <p> Restaurant Type : <span><?php echo $fetch_accounts['restaurant_type']; ?></span> </p>
      <p> Restaurant Image : <span><img src="../images/<?php echo $fetch_accounts['restaurant_image']; ?>"/></span> </p>
      <p> Restaurant name : <span><?php echo $fetch_accounts['restaurant_name']; ?></span> </p>
      <p> Restaurant Table Limit : <span><?php echo $fetch_accounts['restaurant_tablelimit']; ?></span> </p>
      <?php
         $restaurant_menu = explode(' , ', $fetch_accounts['restaurant_menu']);
         $menus = $restaurant_menu;

         for ($a=0; $a<3 ; $a++){
      
      ?>
      <?php
      echo $menus[$a];
      
      ?>

        <img src="../images/<?php echo $menus[$a]; ?>"/>
    </span>
         <?php
   
            }
         ?>
      <p> Restaurant price : <span><?php echo $fetch_accounts['restaurant_price']; ?></span> </p>
      <p> Restaurant Addres : <span><?php echo $fetch_accounts['rest_address']; ?></span> </p>
      <p> Restaurant Phone Number : <span><?php echo $fetch_accounts['rest_phoneno']; ?></span> </p>
      <button style="margin-left:80px;"><a href="edit_restaurant.php?id=<?php echo $fetch_accounts['rest_id']; ?>" style="font-size:20px;">Edit Restaurant</a></button>
     
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">No reservations placed yet!</p>';
   }
   ?>

   </div>

</section>

<!-- placed reservations section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>
</section>
</body>
</html>