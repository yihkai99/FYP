<?php
   include '../config.php';
   
   session_start();
   
   $admin_name = $_SESSION['admin_name'];


   
    if (@$_GET['q'] == 'addrestaurant') {

        $restaurant_type = $_POST['restaurant_type'];
        $restaurant_image = $_POST['restaurant_image'];
        $restaurant_name = $_POST['restaurant_name'];
        $restaurant_tablelimit = $_POST['restaurant_tablelimit'];
        $restaurant_address = $_POST['restaurant_address'];
        $restaurant_no = $_POST['restaurant_no'];
        $menu_price1 = $_POST['menu_price1'];
        $menu_price2 = $_POST['menu_price2'];
        $menu_price3 = $_POST['menu_price3'];

        $menu1 = $_POST['menu1'];
        $menu2 = $_POST['menu2'];
        $menu3 = $_POST['menu3'];

        $restaurant_menu ="$menu1 , $menu2 , $menu3";
        $restaurant_price ="$menu_price1 , $menu_price2 , $menu_price3";
        
    
        $query = mysqli_query($conn, "INSERT INTO restaurant (rest_id, restaurant_type,restaurant_image, restaurant_name, rest_phoneno, restaurant_tablelimit, rest_address, restaurant_menu, restaurant_price) 
        VALUES ('', '$restaurant_type','$restaurant_image','$restaurant_name', '$restaurant_no', '$restaurant_tablelimit', '$restaurant_address','$restaurant_menu' ,'$restaurant_price' )");
        echo"<script>alert('You have successfully add a new restaurant!'); window.location.replace('index_admin.php.'); </script>";			
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Subject | Online Quiz System</title>
    <link  rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="../css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="../css/welcome.css">
    <link  rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/form.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/header.css">

</head>

<body>
<section>

   
    <div class="col-md-10">
    <div class="row justify-content-center"  style="padding-left:430px;">
            <span class="title1">
                <h1 style="padding-left:175px;">Add a new restaurant vendor</h1>
            </span>
        
            <div class="col-md-3"></div><div class="col-md-6">   
            <form class="form-horizontal title1" name="form" action="add_restaurant.php?q=addrestaurant"  method="POST">
                <fieldset>
                <br/>

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="restaurant_type" style="font-size: 20px;">Enter restaurant vendor type : </label>
                            <div class="col-md-12">
                                <select id="restaurant_type" name="restaurant_type" placeholder="Enter restaurant vendor type" style="font-size: 20px;" class="form-control input-md" type="text" required>
                                    <option value="Chinese Restaurant">Chinese Restaurant</option>
                                    <option value="Malay Restaurant">Malay Restaurant </option>
                                    <option value="Indian Restaurant">Indian Restaurant</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="restaurant_image" style="font-size: 20px;">Please Upload Your Restaurant Image : </label>
                            <div class="col-md-12" style="font-size: 20px;">
                                <input type="file" id="restaurant_image" name="restaurant_image">
                            </div>
                        </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="restaurant_name"style="font-size: 20px;">Enter restaurant vendor name : </label>  
                        <div class="col-md-12">
                            <input id="restaurant_name" name="restaurant_name" placeholder="Enter restaurant vendor name" class="form-control input-md" type="text" style="font-size: 20px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="restaurant_tablelimit"style="font-size: 20px;">Enter restaurant vendor tablelimit : </label>  
                        <div class="col-md-12">
                            <input id="restaurant_tablelimit" name="restaurant_tablelimit" placeholder="Enter restaurant vendor tablelimit" class="form-control input-md" type="text" style="font-size: 20px;"required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="restaurant_no"style="font-size: 20px;">Enter restaurant vendor phone number : </label>  
                        <div class="col-md-12">
                            <input id="restaurant_no" name="restaurant_no" placeholder="Enter restaurant vendor no" class="form-control input-md" type="text"style="font-size: 20px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="restaurant_address"style="font-size: 20px;">Enter restaurant vendor address : </label>  
                        <div class="col-md-12">
                            <input id="restaurant_address" name="restaurant_address" placeholder="Enter restaurant vendor address" class="form-control input-md" type="text"style="font-size: 20px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu1"style="font-size: 20px;">Upload menu 1 : </label>  
                        <div class="col-md-12">
                            <input type="file"  id="menu1" name="menu1"style="font-size: 20px;"> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu_price1"style="font-size: 20px;">Enter menu 1  price : </label>  
                        <div class="col-md-12">
                            <input id="menu_price1" name="menu_price1" placeholder="Enter menu 1 price" class="form-control input-md" type="text"style="font-size: 20px;" required>
                        </div>
                    </div> 
                  
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu_price2"style="font-size: 20px;">Enter menu 2  price : </label>  
                        <div class="col-md-12">
                            <input id="menu_price2" name="menu_price2" placeholder="Enter menu 2 price" class="form-control input-md" type="text"style="font-size: 20px;" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu2"style="font-size: 20px;">Upload menu 2 : </label>  
                        <div class="col-md-12">
                        <input type="file"  id="menu2" name="menu2"style="font-size: 20px;">                         </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu_price3"style="font-size: 20px;">Enter menu 3  price : </label>  
                        <div class="col-md-12">
                            <input id="menu_price3" name="menu_price3" placeholder="Enter menu 3 price" class="form-control input-md" type="text"style="font-size: 20px;" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu3"style="font-size: 20px;">Upload menu 3 : </label>  
                        <div class="col-md-12">
                        <input type="file"  id="menu3" name="menu3"style="font-size: 20px;">                         </div>
                    </div>
                    
                    <div class="row" style="padding:10px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-12 control-label" for=""></label>
                            <div class="col-md-12"> 
                                <center><a href="view_restaurant.php" class="btn btnStyle" >Cancel</a>&nbsp; &nbsp; &nbsp;<input type="submit" value="Submit" name="submit" class="btn btnStyle"/></center>
                            </div>
                        </div>
                    </div>
                </div>

                </fieldset>
            </form>
        </div>
    
    </div>
    </section>
</body>
</html>