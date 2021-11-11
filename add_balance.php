<?php 

include('lib/db.php');
include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
//add number
    
if(isset($_POST['submit'])){
    
    if(isset($_POST['type']) && isset($_POST['user_name']) && isset($_POST['balnace']) && isset($_POST['number']) && isset($_POST['amount'])){
        $type = $_POST['type'];
        $user_name = $_POST['user_name'];
        $balnace = $_POST['balnace'];
        $number = $_POST['number'];
        $amount = $_POST['amount'];
        date_default_timezone_set("Asia/Dhaka");
        $dateTime = date("d-m-y - h:m:s");
        //sql
        $res = mysqli_query($conn, "insert into tbl_add_blance (user_id, user_name,	type, number, amount, status, date) values ('$user_id', '$user_name', '$type', '$number', '$amount', 'Pending', '$dateTime') ");
        
         if($res == true){
         $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your blance is added. Wait for admin approve....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    }else{
         $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> fuild must not be empty....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
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
              <h4>সকাল 9 টা থেকে রাত 11 টা পর্যন্ত লেনদেন করতে পারবেন</h4>
              <p>বিকাশ এজেন্ট নাম্বার--01794183310, ROKET AGENT -- 01314046341+9, আগে টাকা পাঠিয়ে টাকা যোগ করুন। টাকা না পাঠিয়ে টাকা যোগকরলে আপনার একাউন্ট ব্লক করে দেয়া হবে।</p>
          </div>
          
           <div class="page-title">
               <h2> ব্যালেন্স যোগ করুন</h2>
           </div>
           <div class="container">
               <div class="col-md-6 offset-md-3">
                   <div class="card">
                       <div class="card-body">
                           <form action="" method="post">
                                <div class="form-group">
                                    <label>এখানে বিকাশ/রকেট যেকোন একটি সিলেক্ট করুন।</label>
                                    <select class="form-control" name="type" required>
                                        <option value="bKash">bKahs</option>
                                        <option value="Roket">Roket</option>
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>ইউজারনেম </label>
                                       <input type="text" class="form-control" checked readonly value="<?= $_SESSION['user_name'];?>" name="user_name">
                                </div>
                                <div class="form-group">
                                    <label>ব্যালেন্স</label>
                                    <input type="text" class="form-control " readonly value="<?= $amount;?>" name="balnace">
                                </div>
                                <div class="form-group">
                                    <label>BKASH/ROCKET :</label>
                                   <input type="text" name="number" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    <label>টাকার পরিমান</label>
                                    <input type="text" name="amount" class="form-control " required>
                                </div>
                              
                                <button class="btn btn-primary btn-rounded" type="submit" name="submit">Add Blance</button>
                              
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