<?php
include '../config.php';


session_start();

$admin_name = $_SESSION['admin_name'];


?>

<!DOCTYPE html>
<html lang="en">
   
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="stylesheet" href="../css/header.css">

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
 
<body>
<section class="dashboard">
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
                                            <li><a href="../demo.php"><i class="fas fa-sign-out-alt"></i></a></li>
                                 </ul>
                                </nav>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
   </div>



   <!-- admin dashboard section starts  -->
  
   <h1 class="heading" style="margin-top:120px; float:center;" >Welcome Administrator: <?php echo $admin_name;?> </h1>

      <div class="box-container">
         <div class="box">
         <?php

            $select_users=mysqli_query($conn,"SELECT * FROM user_table" )or die('Error161');
            $rowcount=mysqli_num_rows($select_users);

        
            ?>
            <h3><?php echo $rowcount; ?></h3>
            <p>Users</p>
        </div>

        <div class="box">
         <?php
            $select_users=mysqli_query($conn,"SELECT * FROM restaurant" )or die('Error161');
            $rowcount=mysqli_num_rows($select_users);
            ?>
            <h3><?php echo $rowcount; ?></h3>
            <p>Total Restaurant </p>
        </div>
      
        <div class="box">
         <?php
            $select_users=mysqli_query($conn,"SELECT * FROM photographer" )or die('Error161');
            $rowcount=mysqli_num_rows($select_users);
            ?>
            <h3><?php echo $rowcount; ?></h3>
            <p>Total Photographer </p>
        </div>

        <div class="box">
         <?php
            $select_users=mysqli_query($conn,"SELECT * FROM booking" )or die('Error161');
            $rowcount=mysqli_num_rows($select_users);
            ?>
            <h3><?php echo $rowcount; ?></h3>
            <p>Total Vendor booking </p>
        </div>

        <div class="box">
         <?php
            $select_users=mysqli_query($conn,"SELECT * FROM admin" )or die('Error161');
            $rowcount=mysqli_num_rows($select_users);
            ?>
            <h3><?php echo $rowcount; ?></h3>
            <p>Admin </p>
        </div>

    </div>
</section>       
</body>
</html>
