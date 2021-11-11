<?php 
session_start();
require('lib/db.php');

//set get var
if(isset($_GET['success'])){
    $success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
 <strong class=" fa fa-error">Success! </strong> Registration is success...
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

//################################# user login #######################//
if(isset($_POST['login'])){
    
    
    if(isset($_POST['user_name'])){
        $user = $_POST['user_name'];
     }
    if(isset($_POST['user_pass'])){
        $pass = $_POST['user_pass'];
     }
    
    $result = mysqli_query($conn, "SELECT * FROM `tbl_user`  WHERE user_name = '$user' AND password = '$pass'  ");
    
    
    if($result == true){
        if(mysqli_num_rows($result) > 0){
         
        
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['user_login'] = 'Yes';
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_number'] = $row['number'];
            $_SESSION['user_pass'] = $row['password'];
            $st = $row['status'];
            $ID = $row['id'];
        }
        if($st == 'OFF'){
            header("Location: approve.php?user_id=$ID ");
        }else{
            header("Location: welcome.php");
        } 
        
        
        
    }else{
         $err = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 <strong class=" fa fa-error">Sorry! </strong> We could not find you...
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    
    }//
    
}///
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
             <?php if(isset($success)) echo $success;?>
              <div class="card mt-5">
                  <div class="card-header">
                      <strong class="text-center font-20">User Log In Form</strong>
                  </div>
                  <div class="card-body">
            <form action="" method="post">
                  <div class="form-group">
                      <label>User Name</label>
                      <input type="text" required class="form-control" name="user_name">
                  </div>
               <div class="form-group">
                 <label>Password</label>
               <div class="input-group">
                  <input type="password" class="form-control pwd" name="user_pass">
                  <span class="input-group-btn">
                    <button class="btn btn-default reveal" type="button"><i class="fa fa-eye"></i></button>
                  </span>          
                </div>
             </div>
                  <button class="btn btn-secondary btn-rounded " type="submit" name="login"><i class="fa fa-sign-in"></i> Login</button>
              </form> <br>
                   <a href="user_ragistration.php" class="text-center mt-5">I have no account </a><br>
                   <a href="reset-pass.php">Forget password? </a>
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
<script type="text/javascript" src="assets/js/custom.js"></script>
</html>