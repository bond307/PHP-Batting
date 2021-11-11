<?php session_start(); 
include 'lib/db.php';
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $user_name = $_SESSION['user_name'];
}
//balnce transfer
$blnc  = mysqli_query($conn, "SELECT SUM(amount) FROM tbl_add_blance WHERE  status = 'Approve' AND user_id = '$user_id'");
$balance_row = mysqli_fetch_assoc($blnc);
$total_amount = $balance_row['SUM(amount)'];

//transfer balnce sum
$blnc  = mysqli_query($conn, "SELECT SUM(amount) FROM tbl_blance_transfer WHERE  status = 'Approve' AND user_id = '$user_id'");
$balance_row = mysqli_fetch_assoc($blnc);
$total_transfer_amount = $balance_row['SUM(amount)'];

//transfer balnce sum and add user account
$blnc  = mysqli_query($conn, "SELECT SUM(amount) FROM tbl_blance_transfer WHERE  status = 'Approve' AND user_name = '$user_name'");
$balance_row = mysqli_fetch_assoc($blnc);
$total_transfer_amount_user = $balance_row['SUM(amount)'];

//transfer balnce sum and add user account
$blnc  = mysqli_query($conn, "SELECT SUM(bet_amount) FROM tbl_bid_report WHERE  user_id = '$user_id'");
$balance_row = mysqli_fetch_assoc($blnc);
$total_bet_amount = $balance_row['SUM(bet_amount)'];

//total amount
$amount = ($total_amount - $total_transfer_amount);

$amount = ($total_amount - $total_transfer_amount)+$total_transfer_amount_user-$total_bet_amount;


$ShowSql = mysqli_query($conn, "SELECT * FROM `tbl_bid_report` WHERE user_id = '$user_id'");
 if(mysqli_num_rows($ShowSql) > 0){
  while($rows = mysqli_fetch_assoc($ShowSql)){
    if($rows['best_result'] == 'Win'){ 
        $amount = ($amount+$rows['profit']+$rows['bet_amount']);
    }
       
  }
 }

//transfer balnce sum and add user account
$blnc  = mysqli_query($conn, "SELECT SUM(amount) FROM tbl_cashout WHERE  user_id = '$user_id' and  status = 'Success'");
$balance_row = mysqli_fetch_assoc($blnc);
$total_chasout = $balance_row['SUM(amount)'];


$amount = $amount-$total_chasout;









?>