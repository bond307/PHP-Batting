<?php 

include 'lib/db.php';

/*--------------------------------Order's----------------------------------*/
//Total Order's
    $sql = "SELECT COUNT(*) FROM `product`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $total_product = array_shift($row);

//Total users
    $sql = "SELECT COUNT(*) FROM `tbl_user`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $total_user = array_shift($row);

//Total users
    $sql = "SELECT COUNT(*) FROM `tbl_add_blance` WHERE status = 'Pending'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $total_cashin = array_shift($row);

//Total users
    $sql = "SELECT COUNT(*) FROM `tbl_cashout`  WHERE status = 'Pending'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $total_cashout = array_shift($row);

   //Total match's
$check = mysqli_query($conn, "SELECT COUNT(*) FROM `product` WHERE status = 'Active' ");

    if($check ==  true){
  
   $res = mysqli_query($conn, "select * from tbl_bid_report  ");
   while($row = mysqli_fetch_assoc($res)){
       $team = $row['bet']; 
   }
    $sql = "SELECT COUNT(*) FROM `tbl_bid_report`  ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
   echo $total_order = array_shift($row);
       
}


?>