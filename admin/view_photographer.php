<?php

include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];
;

$select_photographer = mysqli_query($conn, "SELECT * FROM photographer") or die('Error161');
$rowcount = mysqli_num_rows($select_photographer);
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

   <h1 class="heading">View Photographer List</h1>

   <div class="box-container">
      

   <?php
   $select_photographer = mysqli_query($conn, "SELECT * FROM photographer") or die('Error161');
   $rowcount = mysqli_num_rows($select_photographer);
   if ($rowcount > 0) {
    while ($fetch_accounts = mysqli_fetch_assoc($select_photographer)) {
?>
   <div class="box">
   <span ><a href="delete_photographer.php?id=<?php echo $fetch_accounts['id']; ?>"><i class="fas fa-trash" style="margin-left:220px; font-size: 20px;"></i>Delete</a></span>
      <p> photographer ID : <span><?php echo $fetch_accounts['id']; ?></span> </p>
      <p> photographer name : <span><?php echo $fetch_accounts['name']; ?></span> </p>
      <p> photographer Image : <span><img src =" ../images/<?php echo $fetch_accounts['photographer_image']; ?>"/></span> </p>
      <p> Photographer Phone Number : <span><?php echo $fetch_accounts['phone_number']; ?></span> </p>
      <p> Photographer Project Sample: 
    <span>
    <?php
         $project_sample = explode(' , ', $fetch_accounts['project_sample']);
         $menus = $project_sample;

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
</p>
      <br/>
      <button style="margin-left:80px;"><a href="edit_photographer.php?id=<?php echo $fetch_accounts['id']; ?>"style="font-size:20px;">Edit Photographer</a></button>
     
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">No Photographer Added yet!</p>';
   }
   ?>

   </div>

</section>











<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>
</section>
</body>
</html>