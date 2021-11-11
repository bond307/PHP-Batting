<?php

include 'lib/db.php';
include 'function.php';

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
    echo '<script>window.location.href = "login.php";
</script>';
}

//admin login or not 
$admin = mysqli_fetch_assoc(mysqli_query($conn, "select * from admin where id = '1' "));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<!--------- custome css ------->
<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
   <div class="main-templete">
      <div class="top-section">
          <p class="">Nirapodbet</p>
      </div>
       <div class="top-menu">
          
           <div class="top-menu-left">Name: <?= $_SESSION['user_name'];?></div>
           <div class="top-menu-right">Blance: <?php if($amount>0){ echo $amount;}else{ echo '0.00';}?></div>
           <div class="top-menu-center">Phone: <?= $_SESSION['user_number'];?></div>
       </div>
       
       <?php if($admin['status'] == 'Online'){ ?>
       <div class="admin-online">
           <p class="text-center">Admin is online <span class="element"></span></p> 
       </div>
       <?php }else{ ?>
       <div class="admin-offline">
           <p class="text-center">Admin is Offline</p> 
       </div>
       <?php } ?>
       <div class="menu">
           <div class="scrollmenu">
              <a href="info.php">Info</a>
              <a href="product.php">Product</a>
              <a href="my-product.php">My Product</a>
              <a href="add_blance-transfer.php">টাকা Transfer List</a>
              <a href="blance_transfer.php">টাকা Transfer</a>
              <a href="tk-transfer-report.php">টাকা Transfer Report</a>
              <a href="number-list.php">নাম্বার লিস্ট</a>
              <a href="cashout.php">টাকা উত্তোলন </a>  
              <a href="cashout-report.php">উত্তোলন রিপর্ট</a>
              <a href="add_balance.php">টাকা যোগকরন</a>
              <a href="add_balance_report.php">টাকা যোগকরন রিপর্ট</a>
              <a href="forgetpassword.php">পাসওয়ার্ড পরির্বতন </a>
              <a target="_blank" href="user_ragistration.php"> নতুন একাউন্ট যোগ </a>
              <a href="#friends">Contact</a>
              <a href="logout.php">Logout</a>
            </div>
       </div>