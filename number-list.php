<?php include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    
    //insert
    if(isset($_POST['submit'])){
        
        if(isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['num3'])){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];
           date_default_timezone_set("Asia/Dhaka");
           $date = date('d-m-y - h:m:s');
            #sql 
            $sql = mysqli_query($conn, "insert into tbl_add_numner (user_id, user_name, number1, number2, number3, status, date) values ('$user_id', '$user_name', '$num1', '$num2', '$num3', 'Pending', '$date')");
            if($sql == true){
                 $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Number add success. Wait for admin approve....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            }
        
        }else{
             $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> Fild must not be empty....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }
        
    }
    
    
    
    //show number list 
    //check is able able
$showSQL = mysqli_query($conn, "select * from tbl_add_numner where user_id = '$user_id'");
    $num = (mysqli_num_rows($showSQL)>0);
    if($num == true){
        $class = 'readonly';

    
$row = mysqli_fetch_assoc($showSQL);
//check approve or not
    if($row['status'] == 'Approve'){
        $success_msg = ' - <span class="btn btn-success">Approved</span>';
    }else{
        $success_msg = ' - <span class="btn btn-danger">Pending</span>';
    }
}
    

?>
      <!----- main contant -----> 
        
       <div class="main-contant">
          
          <div class="approve">
             <h4>Your Number List Status <?php if(isset($success_msg))echo $success_msg;?></h4>
              <p>নাম্বার লিস্ট একবারই এপ্রুভ করা হবে, ২য়বার এপ্রুভ করা হবে না।</p>
          </div>
          
           <div class="page-title">
               <h2>নাম্বার যোগ করুন</h2>
           </div>
           <div class="container">
               <div class="col-md-6 offset-md-3">
                  <?php if(isset($msg))echo $msg;?>
                   <div class="card">
                       <div class="card-body">
                           <form action="" method="post">
                                <div class="form-group">
                                    <label>একটি নাম্বার লিখুন - 1</label>
                                    <input type="number" class="form-control" name="num1" <?php if(isset($class))echo $class;?>  required  value="<?php if(isset($row['number1']))echo $row['number1'];?>">
                                </div>
                                 <div class="form-group">
                                    <label>একটি নাম্বার লিখুন - 2</label>
                                    <input type="number" class="form-control" name="num2" <?php if(isset($class))echo $class;?>  value="<?php if(isset($row['number2']))echo $row['number1'];?>">
                                </div>
                                <div class="form-group">
                                    <label>একটি নাম্বার লিখুন - 3</label>
                                    <input type="number" class="form-control" name="num3" <?php if(isset($class))echo $class;?> value="<?php if(isset($row['number1']))echo $row['number3'];?>">
                                </div>
                                
                                <?php  if($num != true){ ?>
                                <button class="btn btn-primary btn-rounded" type="submit" name="submit">Add Number</button>
                                <?php } ?>
                                
                              
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