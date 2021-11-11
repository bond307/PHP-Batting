<?php include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    
    //select number
    $number = mysqli_query($conn, "SELECT * FROM `tbl_add_numner` WHERE user_id = '".$_SESSION['user_id']."' AND status = 'Approve' ");
    //check avilaty
    if(mysqli_num_rows($number)>0){
    
    
    if(isset($_POST['submit'])){
        
        $option = mysqli_real_escape_string($conn, $_POST['option']);
        $w_amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $w_number = mysqli_real_escape_string($conn, $_POST['number']);
        $date = date("d-m-y h:m:s");
        
        if( $amount > $w_amount){
            if($pass == $_SESSION['user_pass']){
                $insert = mysqli_query($conn, "INSERT INTO `tbl_cashout`(`user_id`, `user_name`, `options`, `number`, `amount`, `date`, `status`, `w_time`) VALUES ('".$_SESSION['user_id']."', '".$_SESSION['user_name']."', '$option', '$w_number', '$w_amount', '$date', 'Pending', '0') ");
                if($insert == true){
                    $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Cashout prosess success.... <span><a href="cashout-report.php">Cashout Reports</a></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
                }
            }else{
               $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> Password is not match ....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
            }
        }else{
            $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> Your cashout amount is too hight....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
        }
        
        
    }
    }else{
       $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> Please first add your numbers.... <span><a href="number-list.php">Add Numbers</a></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';  
    }
    
    
    
//condintion
   
?>
      <!----- main contant -----> 
       <div class="main-contant">
           
          <div class="approve">
         
              <h3 class="text-center mt-3">সকাল ১০ টা থেকে বিকাল ৪ টা পর্যন্ত লেনদেন করতে পারবেন</h3>
          </div>
          
           <div class="page-title">
               <h2>টাকা উত্তলোন করুন </h2>
           </div>
           <div class="container">
              <?php 
     $check = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `cashout_time` WHERE 1 "));
    if($check['status'] == '1'){ 
              
               ?>
               <div class="col-md-6 offset-md-3">
                  <?php if(isset($msg))echo $msg;?>
                   <div class="card">
                       <div class="card-body">
                           <form action="" method="post">
                                <div class="form-group">
                                    <label>বিকাশ/রকেট একটি সিলেক্ট করুন </label>
                                  <select required class="form-control" name="option">
                                      <option selected disabled>Select options...</option>
                                      <option value="Bkash">Bkash</option>
                                      <option value="Roket">Roket</option>
                                  </select>
                                </div>
                                
                                 <div class="form-group">
                                    <label>নাম্বার সিলেক্ট করুন </label>
                                  <select required class="form-control" name="number">
                                      <option selected disabled>Select options...</option>
                                      <?php 
                                      if(mysqli_num_rows($number)>0){
                                        $rows = mysqli_fetch_assoc($number);?>
                                         
                                          <option value="<?= $rows['number1']?>"><?= $rows['number1']?></option>
                                            <option value="<?= $rows['number2']?>"><?= $rows['number2']?></option>
                                              <option value="<?= $rows['number3']?>"><?= $rows['number3']?></option>
                                        <?php } ?>  
                                        
                                  </select>
                                </div>
                                 <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" readonly class="form-control" name="name" value="<?php echo $_SESSION['user_name'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Blance</label>
                                    <input type="number" class="form-control" name="amount" value="<?php if(isset($amount))echo $amount;?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Amount </label>
                                    <input required name="amount" type="number" class="form-control" placeholder="<?php if(isset($amount))echo $amount;?>">
                                </div>
                                
                                <div class="form-group">
                                    <label>Your Password </label>
                                    <input required name="pass" type="password" class="form-control" >
                                </div>
                                
                                <button class="btn btn-primary btn-rounded" type="submit" name="submit">Withdrow</button>
                               
                                
                              
                            </form>
                       </div>
                   </div>
               </div>
               <?php }else{ ?>
               <div class="col-md-6 offset-md-3">
                   <div class="card">
                       <div class="card-body">
                           <div class="alert alert-danger">
                               <strong>সকাল ১০ টা থেকে বিকাল ৪ টা পর্যন্ত লেনদেন করতে পারবেন</strong>
                           </div>
                       </div>
                   </div>
               </div>
               <?php } ?>
           </div> 
           
       </div>
       <!-----//End main contant -----> 
       
<?php include('inc/footer.php');
}else{
    echo '<script>window.location.href = "login.php";
</script>';
}
?>