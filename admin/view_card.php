<?php

include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


$select_card = mysqli_query($conn, "SELECT * FROM invitation_card") or die('Error161');
$rowcount = mysqli_num_rows($select_card);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Photographer List</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/header.css">
   <style>
   img{
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
   


<section class="placed-orders">

   <h1 class="heading">View Invitation Card List</h1>

   <div class="box-container">

   <?php
   $select_card = mysqli_query($conn, "SELECT * FROM invitation_card") or die('Error161');
   $rowcount = mysqli_num_rows($select_card);
   if ($rowcount > 0) {
    while ($fetch_accounts = mysqli_fetch_assoc($select_card)) {
?>
   <div class="box">
   <span ><a href="delete_card.php?card_id=<?php echo $fetch_accounts['card_id']; ?>"><i class="fas fa-trash" style="margin-left:230px; font-size: 20px;"></i>Delete</a></span>
      <p> Invitation card Image : <img src =" ../images/<?php echo $fetch_accounts['card_image']; ?>"/> </p>
      <p> Invitation card Name : <span><?php echo $fetch_accounts['card_name']; ?></span> </p>
      
      <button style="margin-left:80px;"><a href="edit_card.php?card_id=<?php echo $fetch_accounts['card_id']; ?>"style="font-size:20px;">Edit Card</a></button>
     
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">No Card Added yet!</p>';
   }
   ?>

   </div>

</section>











<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>
</section>
</body>
</html>