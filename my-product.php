<?php 

include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    
//show 
$ShowSql = mysqli_query($conn, "SELECT * FROM `tbl_bid_report` WHERE user_id = '$user_id' ORDER BY `tbl_bid_report`.`id` DESC ");
$showReport = mysqli_fetch_assoc($ShowSql);
$product_id = $showReport['product_id'];
    
    
//select product 
$showPrd = mysqli_query($conn, "select * from product where id = '$product_id'");
$showProdRows = mysqli_fetch_assoc($showPrd);

?>
      <!----- main contant -----> 
       <div class="main-contant">
            <div class="page-title">
               <h2>My Product</h2>
           </div>
           <div class="container-fluid">
               
           <table id="example" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>SR NO.</th>
                <th>Match Name</th>
                <th>Bet</th>
                <th>Bet Status</th>
                <th>Result</th>
                <th>Price</th>
                <th>Bet Amount	</th>
                <th>Profit</th>
                <th>Old Balance	</th>
                <th>Next BalanceDate</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
           <?php 
    $sr = '0';
       $ShowSql = mysqli_query($conn, "SELECT * FROM `tbl_bid_report` WHERE user_id = '$user_id' ORDER BY `tbl_bid_report`.`id` DESC ");
            if(mysqli_num_rows($ShowSql) > 0){
                while($rows = mysqli_fetch_assoc($ShowSql)){
              $sr++;
            ?>
            <tr>
                <td><?= $sr;?></td>
                <td><?= $rows['Match Name'];?></td>
                <td><?= $rows['bet']?></td>
                <td><?= $rows['best_status']?></td>
                <td><?= $rows['best_result']?></td>
                <td><?= $rows['bet_price']?></td>
                <td><?= $rows['bet_amount']?></td>
                <?php if($rows['best_result'] == 'Loss'){ 
                echo '<td>-'.$rows['profit'].'</td>';
            }else{
                echo '<td>'.$rows['profit'].'</td>';
            }
                ?>
                <td><?= $rows['old_balance']?></td>
                <td><?= $rows['nest_blance']?></td>
                <td><?= $rows['date']?></td>
               
            </tr>
<?php } } ?>
        </tbody>
   
    </table>
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