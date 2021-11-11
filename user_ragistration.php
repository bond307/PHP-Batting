<?php 
require('lib/db.php');


//################################# user login #######################//
if(isset($_POST['submit'])){
    if(isset($_POST['name'])){
        $name = $_POST['name'];
     }
    if(isset($_POST['number'])){
        $number = $_POST['number'];
     }
    
    if(isset($_POST['pass'])){
        if($_POST['pass'] == $_POST['Cpass']){
            if(strlen($_POST['pass']) <= 6 ){
                $pass = $_POST['pass'];
            }else{
                 $err = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong class=" fa fa-error">Sorry! </strong> Password must be 6 character or more...
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
        }else{
             $err = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong class=" fa fa-error">Sorry! </strong> Password do not match...
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
        }
     }
    
    if(isset($name) && isset($number) && isset($pass) ){
        
        $insert = mysqli_query($conn, "INSERT INTO tbl_user (user_name, number, password, status) VALUES ('$name', '$number', '$pass', 'OFF') " );
        
        if($insert == true){
            header("Location: login.php?success=success");
        }
        
        
    }////    
    
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
       <div class="container">
           
              <div class="col-md-6 offset-md-3 mt-5">
                 <?php if(isset($err)) echo $err;?>
                  <div class="card mt-5">
                      <div class="card-header">
                          <strong>User Registration From</strong>
                      </div>
                      <div class="card-body">
                         <form action="" method="post">
                             <div class="form-group">
                                 <label>User Name</label>
                                 <input type="text" class="form-control" name="name">
                             </div>
                             <div class="form-group">
                                 <label>Phone Number</label>
                                 <input type="number" class="form-control" name="number">
                             </div>
                             <div class="form-group">
                                 <label>Password</label>
                               <div class="input-group">
                                  <input type="password" class="form-control pwd" name="pass">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default reveal" type="button"><i class="fa fa-eye"></i></button>
                                  </span>          
                                </div>
                             </div>
                             
                              <div class="form-group">
                                 <label>Confirm Password</label>
                               <div class="input-group">
                                  <input type="password" class="form-control pwd" name="Cpass">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default reveal" type="button"><i class="fa fa-eye"></i></button>
                                  </span>          
                                </div>
                             </div>
                             
                             
                          <button class="btn btn-primary btn-rounded" type="submit" name="submit"><i class="fa fa-sign-out"></i> Sign Up</button>   
                             
                         </form><br>
                         
                         <a href="login.php" class="text-center mt-5">I have an account </a>
                      </div>
                  </div>
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
<script src="assets/js/custom.js"></script>
</html>