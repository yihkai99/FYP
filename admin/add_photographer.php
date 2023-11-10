<?php
include '../config.php';

session_start();

$admin_name = $_SESSION['admin_name'];


if (@$_GET['q'] == 'addphotographer') {
    $photographer_name = $_POST['photographer_name'];
    $photographer_image = $_POST['photographer_image'];
    $photographer_no = $_POST['photographer_no'];
    $sample1 = $_POST['sample1'];
    $sample2 = $_POST['sample2'];
    $sample3 = $_POST['sample3'];

    $project_sample = "$sample1 , $sample2 , $sample3";

    $query = mysqli_query($conn, "INSERT INTO photographer (name, photographer_image, phone_number, project_sample) VALUES ('$photographer_name', '$photographer_image', '$photographer_no', '$project_sample')");
    echo "<script>alert('You have successfully added a new photographer!'); window.location.replace('index_admin.php'); </script>";
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
    <div class="row justify-content-center" style="padding-left:430px;">
            <span class="title1">
                <h1 style="padding:10px;"><center>Add a new photographer vendor</center></h1>
            </span>
        
            <div class="col-md-3"></div><div class="col-md-6">   
            <form class="form-horizontal title1" name="form" action="add_photographer.php?q=addphotographer"  method="POST">
                <fieldset>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="photographer_name">Enter photographer vendor name : </label>  
                        <div class="col-md-12">
                            <input id="photographer_name" name="photographer_name" placeholder="Enter photographer vendor name" class="form-control input-md" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="photographer_image">Please Upload Your photographer Image : </label>  
                        <div class="col-md-12">
                            <input type="file"  id="photographer_image" name="photographer_image" required> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 control-label" for="photographer_no">Enter photographer vendor phone number : </label>  
                        <div class="col-md-12">
                            <input id="photographer_no" name="photographer_no" placeholder="Enter photographer vendor no" class="form-control input-md" type="text" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="sample1">Upload Sample 1 : </label>  
                        <div class="col-md-12">
                            <input type="file"  id="sample1" name="sample1" required> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="sample2">Upload Sample 2 : </label>  
                        <div class="col-md-12">
                        <input type="file"  id="sample2" name="sample2" required>                         </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="sample">Upload Sample 3 : </label>  
                        <div class="col-md-12">
                        <input type="file"  id="sample3" name="sample3" required>                         </div>
                    </div>
                    
                    <div class="row" style="padding:10px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-12 control-label" for=""></label>
                            <div class="col-md-12"> 
                                <center><a href="view_photographer.php" class="btn btnStyle" >Cancel</a>&nbsp; &nbsp; &nbsp;<input type="submit" value="Submit" name="submit" class="btn btnStyle"/></center>
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