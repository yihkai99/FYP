<?php
include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


if (isset($_POST['submit'])) {
    $rest_id = @$_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM restaurant WHERE rest_id='$rest_id'");
    while ($row = mysqli_fetch_array($query)) {
        $restaurant_menu = $row['restaurant_menu'];
        $project = explode(' , ', $restaurant_menu);

        $restaurant_price = $row['restaurant_price'];
        $project1 = explode(' , ', $restaurant_price);

        $menu1 = isset($_POST['menu1']) && !empty($_POST['menu1']) ? $_POST['menu1'] : $row[$project[0]];
        $menu2 = isset($_POST['menu2']) && !empty($_POST['menu2']) ? $_POST['menu2'] : $row[$project[1]];
        $menu3 = isset($_POST['menu3']) && !empty($_POST['menu3']) ? $_POST['menu3'] : $row[$project[2]];

        $menu_price1 = isset($_POST['menu_price1']) && !empty($_POST['menu_price1']) ? $_POST['menu_price1'] : $row[$project1[0]];
        $menu_price2 = isset($_POST['menu_price2']) && !empty($_POST['menu_price2']) ? $_POST['menu_price2'] : $row[$project1[1]];
        $menu_price3 = isset($_POST['menu_price3']) && !empty($_POST['menu_price3']) ? $_POST['menu_price3'] : $row[$project1[2]];

        $restaurant_type = isset($_POST['restaurant_type']) && !empty($_POST['restaurant_type']) ? $_POST['restaurant_type'] : $row['restaurant_type'];
        $restaurant_image = isset($_POST['restaurant_image']) && !empty($_POST['restaurant_image']) ? $_POST['restaurant_image'] : $row['restaurant_image'];
        $restaurant_name = isset($_POST['restaurant_name']) && !empty($_POST['restaurant_name']) ? $_POST['restaurant_name'] : $row['restaurant_name'];
        $restaurant_tablelimit = isset($_POST['restaurant_tablelimit']) && !empty($_POST['restaurant_tablelimit']) ? $_POST['restaurant_tablelimit'] : $row['restaurant_tablelimit'];
        $restaurant_address = isset($_POST['restaurant_address']) && !empty($_POST['restaurant_address']) ? $_POST['restaurant_address'] : $row['rest_address'];
        $restaurant_no = isset($_POST['restaurant_no']) && !empty($_POST['restaurant_no']) ? $_POST['restaurant_no'] : $row['rest_phoneno'];

        // Update query using prepared statements
        $updateQuery = "UPDATE restaurant SET 
            restaurant_type=?, restaurant_image=?, restaurant_name=?,
            restaurant_tablelimit=?, restaurant_menu=?, restaurant_price=?,
            rest_address=?, rest_phoneno=?
            WHERE rest_id=?";

        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ssssssssi", $restaurant_type, $restaurant_image, $restaurant_name, $restaurant_tablelimit, $restaurant_menu, $restaurant_price, $restaurant_address, $restaurant_no, $rest_id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<script>alert('Restaurant updated successfully!'); window.location.replace('view_restaurant.php');</script>";
        } else {
            echo "<script>alert('Error updating restaurant: " . mysqli_error($conn) . "'); window.location.replace('view_restaurant.php');</script>";
        }

        mysqli_stmt_close($stmt);
    }
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

    <?php
    $rest_id=@$_GET['id'];
    ?>

    <div class="col-md-10">
    <div class="row justify-content-center"  style="padding-left:430px;">
            <span class="title1">
                <h1 style="padding:10px;"><center>Edit Restaurant</center></h1>
            </span>
        
            <div class="col-md-3"></div><div class="col-md-6">   
            <form class="form-horizontal title1" name="form" action="edit_restaurant.php?id=<?php echo $rest_id; ?> " method="POST">
                <fieldset>


                <div class="form-group">
                        <label class="col-md-12 control-label" for="restaurant_type">Enter restaurant vendor type : </label>  
                        <div class="col-md-12">
                            <select id="restaurant_type" name="restaurant_type" placeholder="Enter restaurant vendor type" class="form-control input-md" type="text">
                            <option value="Chinese Restaurant">Chinese Restaurant</option>
                            <option value="Malay Restaurant">Malay Restaurant </option>
                            <option value="Indian Restaurant">Indian Restaurant</option>
                            </select>
                        
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="restaurant_image">Please Upload Your Restaurant Image : </label>  
                        <div class="col-md-12">
                            <input type="file"  id="restaurant_image" name="restaurant_image"> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="restaurant_name">Enter restaurant vendor name : </label>  
                        <div class="col-md-12">
                            <input id="restaurant_name" name="restaurant_name" placeholder="Enter restaurant vendor name" class="form-control input-md" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="restaurant_tablelimit">Enter restaurant vendor tablelimit : </label>  
                        <div class="col-md-12">
                            <input id="restaurant_tablelimit" name="restaurant_tablelimit" placeholder="Enter restaurant vendor tablelimit" class="form-control input-md" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="restaurant_no">Enter restaurant vendor phone number : </label>  
                        <div class="col-md-12">
                            <input id="restaurant_no" name="restaurant_no" placeholder="Enter restaurant vendor no" class="form-control input-md" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="restaurant_address">Enter restaurant vendor address : </label>  
                        <div class="col-md-12">
                            <input id="restaurant_address" name="restaurant_address" placeholder="Enter restaurant vendor address" class="form-control input-md" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu1">Upload menu 1 : </label>  
                        <div class="col-md-12">
                            <input type="file"  id="menu1" name="menu1"> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu_price1">Enter menu 1  price : </label>  
                        <div class="col-md-12">
                            <input id="menu_price1" name="menu_price1" placeholder="Enter menu 1 price" class="form-control input-md" type="text" >
                        </div>
                    </div> 
                  
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu_price2">Enter menu 2  price : </label>  
                        <div class="col-md-12">
                            <input id="menu_price2" name="menu_price2" placeholder="Enter menu 2 price" class="form-control input-md" type="text" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu2">Upload menu 2 : </label>  
                        <div class="col-md-12">
                        <input type="file"  id="menu2" name="menu2">                         </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu_price3">Enter menu 3  price : </label>  
                        <div class="col-md-12">
                            <input id="menu_price3" name="menu_price3" placeholder="Enter menu 3 price" class="form-control input-md" type="text" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="menu3">Upload menu 3 : </label>  
                        <div class="col-md-12">
                        <input type="file"  id="menu3" name="menu3">                         </div>
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