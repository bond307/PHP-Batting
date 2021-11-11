<?php 
session_start();
require('lib/db.php');


if($_GET['user_id']){
    $id = $_GET['user_id'];
if(mysqli_query($conn, "select * from tbl_user where status = 'Approved' and user_id = '$id'")){
    header("Location: welcome.php");
 }
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--------- custome css ------->
<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
   <div class="main-templete">
           <div class="jumbotron"  style="widht:100%;height:100vh">
             <br><br>
             <br>
              <div class="container" style="text-align:center;">
                <h1 class="display-4">Hello: <strong><?= $_SESSION['user_name'];?></strong></h1>
                <p class="lead">Welcome to Nirapod360</p>
                <h4>Your account under review. Please wait 1-2 hours. After that call : 018145+985</h4>
              </div>
            </div>
       </div>
    
</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
</html>