<?php
include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


if (@$_GET['q'] == 'addcard') {
    $card_image = $_POST['card_image'];
    $card_name = $_POST['card_name'];


    $query = mysqli_query($conn, "INSERT INTO invitation_card (card_image,card_name) VALUES ('$card_image', '$card_name')");
    echo "<script>alert('You have successfully added a new Invitation Card!'); window.location.replace('index_admin.php'); </script>";
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
                <h1 style="padding:10px;"><center>Add Invitation Card</center></h1>
            </span>
        
            <div class="col-md-3"></div><div class="col-md-6">   
            <form class="form-horizontal title1" name="form" action="add_card.php?q=addcard"  method="POST">
                <fieldset>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="card_image">Please Upload Card Image : </label>  
                        <div class="col-md-12">
                            <input type="file"  id="card_image" name="card_image" required> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="card_name">Enter card name : </label>  
                        <div class="col-md-12">
                            <input id="card_name" name="card_name" placeholder="Enter card name" class="form-control input-md" type="text" required>
                        </div>
                    </div>       
                    
                    <div class="row" style="padding:10px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-12 control-label" for=""></label>
                            <div class="col-md-12"> 
                                <center><a href="view_card.php" class="btn btnStyle" >Cancel</a>&nbsp; &nbsp; &nbsp;<input type="submit" value="Submit" name="submit" class="btn btnStyle"/></center>
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