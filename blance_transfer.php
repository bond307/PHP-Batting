<?php 
include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    $user_id= $_SESSION['user_id'];


//submit blance transter
    //check pass 
    if(isset($_POST['submit'])){
        //check password
        if($_POST['pass'] == $_SESSION['user_pass']){
          
            //check amount 
            if($_POST['amount'] <= $amount){
                $Tamount = $_POST['amount'];
                
                if(isset($_POST['user_name'])){
                    $user_name = $_POST['user_name'];
                }
                date_default_timezone_set("Asia/Dhaka");
                $date = date('d-m-y - h:m:s');
                //sql 
                $sql = mysqli_query($conn, "insert into tbl_blance_transfer (user_id, holder_name, user_name, amount, status, date) values ('$user_id', '".$_SESSION['user_name']."', '$user_name', '$Tamount', 'Pending', '$date')");
                
                if($sql == true){
                     $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Blance transfer is success. Wait for admin approve....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                }
                
            }else{
                  $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> Your amount is too low....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            }
            
            
        }else{
             $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> Your password do not match....
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
               <h2>Balance Transfer</h2>
           </div>
           <div class="container">
               <div class="col-md-6 offset-md-3">
                  <?php if(isset($msg))echo $msg;?>
                   <div class="card">
                       <div class="card-body">
                           <form action="" method="post">
                               <div class="form-group">
                                   <label>Username</label>
                                   <select class="form-control" name="user_name">
                                      <?php 
                                     $res = mysqli_query($conn, "select * from tbl_blnc_trnsfr_nuser_name  where status = 'Approve' and user_id = '$user_id' ");
                                    if(mysqli_num_rows($res)>0){
                                    $row = mysqli_fetch_assoc($res);
                                            
                                       ?>
                                       <?php if($row['uname1'] != ''){ ?>
                                       <option value="<?= $row['uname1'];?>"><?= $row['uname1'];?></option>
                                       <?php }if($row['uname2'] != ''){ ?>
                                       <option value="<?= $row['uname2'];?>"><?= $row['uname2'];?></option>
                                       <?php }if($row['uname3'] != ''){ ?>
                                       <option value="<?= $row['uname3'];?>"><?= $row['uname3'];?></option>
                                       <?php }if($row['uname4'] != ''){ ?>
                                       <option value="<?= $row['uname4'];?>"><?= $row['uname4'];?></option>
                                       <?php }if($row['uname5'] != ''){ ?>
                                       <option value="<?= $row['uname5'];?>"><?= $row['uname5'];?></option>
                                       <?php } }  ?>
                                       
                                   </select>
                               </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" placeholder="Amount: <?= $amount;?>" name="amount" required>
                                </div>
                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="pass">
                                </div>
                                
                                <button class="btn btn-primary btn-rounded" type="submit" name="submit">Transfer</button>
                            </form>
                       </div>
                   </div>
               </div>
           </div> 
           
       </div>
       <!-----//End main contant -----> 
  <br><br><br>     
<?php include('inc/footer.php');
}else{
    echo '<script>window.location.href = "login.php";
</script>';
}
?>