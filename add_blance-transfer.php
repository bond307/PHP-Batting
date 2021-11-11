<?php 
include('lib/db.php');
include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
//add number
    
if(isset($_POST['submit'])){
    
    if(isset($_POST['uname1'])){
        $uname1 = $_POST['uname1'];
    }
    
    if(isset($_POST['uname2'])){
        $uname2 = $_POST['uname2'];
    }
    
    if(isset($_POST['uname3'])){
        $uname3 = $_POST['uname3'];
    }
    
    if(isset($_POST['uname4'])){
        $uname4 = $_POST['uname4'];
    }
    
    if(isset($_POST['uname5'])){
        $uname5 = $_POST['uname5'];
    }
    
    //insert
    $res = mysqli_query($conn, "insert into tbl_blnc_trnsfr_nuser_name (uname1,	uname2, 	uname3,	uname4,	uname5,	status, user_id) values ('$uname1', '$uname2', '$uname3', '$uname4', '$uname5', 'Pending', '$user_id') ");
    
    if($res == true){
         $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your user name listed. Wait for admin approve....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    
   
}
    
//check is able able
$showSQL = mysqli_query($conn, "select * from tbl_blnc_trnsfr_nuser_name where user_id = '$user_id'");
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
      <style>
          .from-control{
              font-weight: bold;
              color: #008000;
          }
    </style>  
       <div class="main-contant">
        <div class="col-md-8 offset-md-2 mt-4">
            <?php if(isset($msg))echo $msg;?>
        </div>
          <div class="approve">
              <h4>Your Transfer List Status <?php if(isset($success_msg))echo $success_msg;?></h4>
              <p>ট্রান্সফার লিস্ট একবারই এপ্রুভ করা হবে, ২য়বার এপ্রুভ করা হবে না।</p>
          </div>
          
           <div class="page-title">
               <h2>ইউজারনেম যোগ করুন</h2>
           </div>
           <div class="container">
               <div class="col-md-6 offset-md-3">
                   <div class="card">
                       <div class="card-body">
                           <form action="" method="post">
                                <div class="form-group">
                                    <label>একটি ইউজারনেম লিখুন - 1</label>
                                    <input type="text" name="uname1" class="form-control " <?php if(isset($class))echo $class;?> value="<?php if(isset($row['uname1']))echo $row['uname1'];?>" >
                                </div>
                                 <div class="form-group">
                                    <label>একটি ইউজারনেম লিখুন - 2</label>
                                    <input type="text" name="uname2" class="form-control " <?php if(isset($class))echo $class;?>  value="<?php if(isset($row['uname2']))echo $row['uname2'];?>" >
                                </div>
                                <div class="form-group">
                                    <label>একটি ইউজারনেম লিখুন - 3</label>
                                    <input type="text" name="uname3" class="form-control " <?php if(isset($class))echo $class;?>  value="<?php if(isset($row['uname3']))echo $row['uname3'];?>">
                                </div>
                                <div class="form-group">
                                    <label>একটি ইউজারনেম লিখুন - 4</label>
                                    <input type="text" name="uname4" class="form-control " <?php if(isset($class))echo $class;?>  value="<?php if(isset($row['uname4']))echo $row['uname4'];?>" >
                                </div>
                                 <div class="form-group">
                                    <label>একটি ইউজারনেম লিখুন - 5</label>
                                    <input type="text" name="uname5" class="form-control " <?php if(isset($class))echo $class;?>  value="<?php if(isset($row['uname5']))echo $row['uname5'];?>">
                                </div>
                                <?php if($num != true){ ?>
                                <button class="btn btn-primary btn-rounded" type="submit" name="submit">Submit</button>
                                <?php } ?>
                            </form>
                       </div>
                   </div>
               </div>
           </div> 
           
       </div>
       <!-----//End main contant -----> 
  <br><br><br>   
  <script>

//model
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>  
<?php include('inc/footer.php');
}else{
    echo '<script>window.location.href = "login.php";
</script>';
}
?>