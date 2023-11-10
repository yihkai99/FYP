<?php
include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


if (isset($_POST['submit'])) {
    $id = @$_GET['card_id'];

    $query = mysqli_query($conn, "SELECT * FROM invitation_card WHERE card_id='$id'");
    while ($row = mysqli_fetch_array($query)) {
        
        $card_image = isset($_POST['card_image']) && !empty($_POST['card_image']) ? $_POST['card_image'] : $row['card_image'];
        $card_name = isset($_POST['card_name']) && !empty($_POST['card_name']) ? $_POST['card_name'] : $row['card_name'];
        
        
            
        // Update query using prepared statements
        $updateQuery = "UPDATE invitation_card SET 
            card_name=?, card_image=?
            WHERE card_id=?";

        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ssi", $card_name, $card_image, $id); // Adjusted the placeholder and parameters
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<script>alert('Card updated successfully!'); window.location.replace('view_card.php');</script>";
        } else {
            echo "<script>alert('Error updating card: " . mysqli_error($conn) . "'); window.location.replace('view_card.php');</script>";
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
    $id=@$_GET['card_id'];
    ?>

    <div class="col-md-10">
        <div class="row justify-content-center"  style="padding-left:430px;">
            <span class="title1">
                <h1 style="padding:10px;"><center>Edit card</center></h1>
            </span>
        </div>
            <div class="col-md-3"></div><div class="col-md-6">   
            <form class="form-horizontal title1" name="form" action="edit_card.php?card_id=<?php echo $id; ?> " method="POST">
                <fieldset>
            
            <div class="form-group"style="padding-left:430px;">
                        <label class="col-md-12 control-label" for="card_image">Please Upload Invitation Card Image : </label>  
                        <div class="col-md-12">
                            <input type="file"  id="card_image" name="card_image"> 
                        </div>
            </div>
                    
                <div class="form-group"style="padding-left:430px;">
                        <label class="col-md-12 control-label" for="card_name">Enter card name : </label>  
                        <div class="col-md-12">
                            <input id="card_name" name="card_name" placeholder="Enter card name" class="form-control input-md" type="text" padding="0 20px;">
                        </div>
                    </div>
  
                    <div class="row" style="padding:10px;">
                    <div class="col-md-12">
                        <div class="form-group"style="padding-left:430px;">
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
    </section>
</body>
</html>