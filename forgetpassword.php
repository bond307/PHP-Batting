<?php include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    
//conditon
    if(isset($_POST['reset'])){
        //chekoold pass
        $oldPass = mysqli_real_escape_string($conn, $_POST['oldpass']);
        $newpass = mysqli_real_escape_string($conn, $_POST['newpass']);
        $Cnewpass = mysqli_real_escape_string($conn, $_POST['Cnewpass']);
        if($oldPass == $_SESSION['user_pass']){
            if($newpass == $Cnewpass){
                $cheng = mysqli_query($conn, "UPDATE `tbl_user` SET password = '$newpass' WHERE id = '".$_SESSION['user_id']."'");
                if($cheng == true){
                    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> your password is change.... <span><a href="logout.php">Please logout Now</a><span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
                
                }
            }else{
               $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Sorry!</strong> New Password and Confirm Password is not match....
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>'; 
            }
        }else{
            $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Sorry!</strong> Your old Password is not match....
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>'; 
        }
    }
?>
      <!----- main contant -----> 
       <div class="main-contant">
             <div class="page-title">
               <h2> পাসওয়ার্ড পরিবর্তন করুন  </h2>
           </div>
           
           <div class="col-md-6 offset-md-3">
             <?php if(isset($msg))echo $msg; ?>
              <form method="post" action="">
                  <div class="form-group">
                     <label>Old Password</label>
                     <input required type="password" name="oldpass" class="form-control">
                  </div>
                  
                  <div class="form-group">
                     <label>New Password</label>
                     <input required type="password" name="newpass" class="form-control">
                  </div>
                  
                   <div class="form-group">
                     <label>Confirm Password</label>
                     <input required type="password" name="Cnewpass" class="form-control">
                  </div>
                  <button class="btn btn-success btn-rounded" type="submit" name="reset">Change Password</button>
              </form> 
           </div>
           
       </div>
       <!-----//End main contant -----> 
       
<?php include('inc/footer.php');
}else{
    echo '<script>window.location.href = "login.php";
</script>';
}
?>