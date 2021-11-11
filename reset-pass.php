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

$user =mysqli_query($conn, "select * from tbl_user");
while($rows = mysqli_fetch_assoc($user)){
    $user_name =  $rows['user_name'];
    $user_pass =  $rows['password'];
}

//################################# user login #######################//
if(isset($_POST['login'])){
    
    $userName = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    //check username 
    if($userName == $user_name){
        $to = "somebody@example.com";
        $subject = "Forget password. ";
        $txt = "Your Password is: ".$user_pass." user this password and you can login.";
        $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";

        mail($to,$subject,$txt,$headers);
    }else{
        $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Seoory!</strong> your user name is not match....
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
    
}///
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forget password</title>
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
                      <strong class="text-center font-20">Reset your password</strong>
                  </div>
                  <div class="card-body">
            <form action="" method="post">
                  <div class="form-group">
                      <label>User Name</label>
                      <input type="text" required class="form-control" name="user_name">
                  </div>
                  
                  <div class="form-group">
                      <label>Email</label>
                      <input type="text" required class="form-control" name="email">
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