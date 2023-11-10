<?php

include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


$select_bookings = mysqli_query($conn, "SELECT * FROM booking") or die('Error161');
$rowcount = mysqli_num_rows($select_bookings);
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >


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
   
   


<!-- placed Booking section starts  -->

<section class="placed-orders">
   <form action="../send_email/send_notice.php" method="POST">
   <h1 class="heading">placed Booking</h1>

   <div class="box-container">

   <?php
   $select_bookings = mysqli_query($conn, "SELECT * FROM booking") or die('Error161');
   $rowcount = mysqli_num_rows($select_bookings);
   if ($rowcount > 0) {
    while ($fetch_accounts = mysqli_fetch_assoc($select_bookings)) {
?>
   <div class="box">
   <span><a href="delete_booking.php?id=<?php echo $fetch_accounts['booking_id']; ?>"><i class="fas fa-trash" style="margin-left:180px; font-size: 20px;"></i> <span style="font-size: 20px;">Delete</span></a></span>

   <p style="font-size: 25px;"> Booking ID : <span style="font-size: 25px;"><?php echo $fetch_accounts['booking_id']; ?></span> </p>
   <p style="font-size: 25px;"> Name: <span style="font-size: 25px;"><?php echo $fetch_accounts['name']; ?></span> </p>
   <p style="font-size: 25px;"> Email Address : <span style="font-size: 25px;"><?php echo $fetch_accounts['email_address']; ?></span> </p>
   <p style="font-size: 25px;"> Phone Number : <span style="font-size: 25px;"><?php echo $fetch_accounts['phone_number']; ?></span> </p>
   <p style="font-size: 25px;"> Restaurant Type : <span style="font-size: 25px;"><?php echo $fetch_accounts['restaurant_type']; ?></span> </p>
   <p style="font-size: 25px;"> Restaurant Name : <span style="font-size: 25px;"><?php echo $fetch_accounts['restaurant_name']; ?></span> </p>
   <p style="font-size: 25px;"> Restaurant Menu : <img src =" ../images/<?php echo $fetch_accounts['restaurant_menu']; ?>"/></p>
   <p style="font-size: 25px;"> Restaurant Price : <span style="font-size: 25px;"><?php echo $fetch_accounts['restaurant_price']; ?></span> </p>
   <p style="font-size: 25px;"> Number of Table : <span style="font-size: 25px;"><?php echo $fetch_accounts['table']; ?></span> </p>
   <p style="font-size: 25px;"> Photographer Name : <span style="font-size: 25px;"> <?php echo $fetch_accounts['photographer_name']; ?></span> </p>
   <p style="font-size: 25px;"> Date of Booking: <span style="font-size: 25px;"><?php echo $fetch_accounts['date']; ?></span> </p>
   <p style="font-size: 25px;"> Time of Booking : <span style="font-size: 25px;"><?php echo $fetch_accounts['time']; ?></span> </p>
     
   <p style="font-size: 20px;"> Status : <span style="font-size: 25px;"><?php echo $fetch_accounts['status']; ?></span> </p>


   <input type="hidden" name="name" value="<?php echo $fetch_accounts['name']; ?>">
   <input type="hidden" name= "email_address" value="<?php echo $fetch_accounts['email_address']; ?>">
   <input type="hidden" name= "status" value="<?php echo $fetch_accounts['status']; ?>">
   <input type="hidden" name= "booking_id" value="<?php echo $fetch_accounts['booking_id']; ?>">
   <input type="hidden" name= "phone_number" value="<?php echo $fetch_accounts['phone_number']; ?>">
   <input type="hidden" name= "restaurant_type" value="<?php echo $fetch_accounts['restaurant_type']; ?>">
   <input type="hidden" name= "restaurant_name" value="<?php echo $fetch_accounts['restaurant_name']; ?>">
   <input type="hidden" name= "restaurant_menu" value="<?php echo $fetch_accounts['restaurant_menu']; ?>">
   <input type="hidden" name= "restaurant_price" value="<?php echo $fetch_accounts['restaurant_price']; ?>">
   <input type="hidden" name= "table" value="<?php echo $fetch_accounts['table']; ?>">
   <input type="hidden" name= "photographer_name" value="<?php echo $fetch_accounts['photographer_name']; ?>">
   <input type="hidden" name= "date" value="<?php echo $fetch_accounts['date']; ?>">
   <input type="hidden" name= "time" value="<?php echo $fetch_accounts['time']; ?>">
   
      
      <?php
      if($fetch_accounts['status'] == 'Approved' ||  $fetch_accounts['status'] == 'Rejected') {
         echo "<input type='submit'name='send' id='button' style='margin-left:116px;' value='Send'>";

      }
      else {
         echo"<button style='margin-left:95px;'><a href='approve_booking.php?id={$fetch_accounts['booking_id']}'>Approve</a></button>";
         echo"<button style='margin-left:95px;'><a href='reject_booking.php?id={$fetch_accounts['booking_id']}'>Reject</a></button>";
        

      }
      ?>



   </div>
   <?php
      }
   }else{
      echo '<p class="empty">No Booking placed yet!</p>';
   }
   ?>

   </div>

</section>

<!-- placed Booking section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>
</section>
</body>
</html>