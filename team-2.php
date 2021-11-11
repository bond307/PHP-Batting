<?php include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
     if(isset($_GET['product_id']) && isset($_GET['team_name'])){
     $p_id = $_GET['product_id'];
     $team_name = $_GET['team_name'];
 }
# ============================================================== -->
# show product  -->
# ============================================================== -->   

$ShowSql = mysqli_query($conn, "select * from product where id = '$p_id'");
if(mysqli_num_rows($ShowSql)){
    $showProduct = mysqli_fetch_assoc($ShowSql);
    $match_name = $showProduct['name'];
    $product_id = $showProduct['id'];
    //check 
    
    if($showProduct['team1'] == $team_name){
        $item = $showProduct['team1'];
        $price = $showProduct['team1_price'];
        $limit = $showProduct['team1_bid_limit'];
        $bid = $showProduct['team1_bid'];
        $title = $showProduct['team1_titel'];
    }
    
    if($showProduct['team2'] == $team_name){
        $item = $showProduct['team2'];
        $price = $showProduct['team2_price'];
        $limit = $showProduct['team2_bid_limit'];
        $bid = $showProduct['team2_bid'];
        $title = $showProduct['team2_titel'];
    }
    
    
    if($showProduct['team3'] == $team_name){
        $item = $showProduct['team3'];
        $price = $showProduct['team3_price'];
        $limit = $showProduct['team3_bid_limit'];
        $bid = $showProduct['team3_bid'];
        $title = $showProduct['team3_titel'];
    }
    
    if($showProduct['team4'] == $team_name){
        $item = $showProduct['team4'];
        $price = $showProduct['team4_price'];
        $limit = $showProduct['team4_bid_limit'];
        $bid = $showProduct['team4_bid'];
        $title = $showProduct['team4_titel'];
    }
}

//check limitation     
$report = mysqli_query($conn, "select * from tbl_bid_report where user_id = '".$_SESSION['user_id']."' ");

//add data 
if(isset($_POST['buy'])){
     $tk = mysqli_real_escape_string($conn, $_POST['bet_amount']);
     if($amount >= $tk){
     if( $limit*$price > $tk){
    
      $profit = $tk/100*$bid-$tk;  
          
      $date = date('d-m-y - h:m:s');

    $next_blnc = ($amount - $tk);
   
    $insert = mysqli_query($conn, "INSERT INTO `tbl_bid_report` (`id`, `user_id`, `product_id`, `Match Name`, `bet`, `best_status`, `best_result`, `bet_price`, `bet_amount`, `profit`, `old_balance`, `nest_blance`, `date`) VALUES (NULL, '$user_id', '$product_id', '$match_name', '$item', 'OK', 'Waiting', '$price', '$tk', '$profit', '$amount', '$next_blnc', '$date')");
    
    if($insert == true){
        echo ' <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Success! </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Sccessfully your bet is accpected. Go to reapor page to see update and reports.</p>
               <a class="btn btn-primary btn-rounded col-md-6 offset-md-3" href="my-product.php">Go to report page</a>
            </div>
        </div>
    </div>
</div>';
    }
     }else{
        $msg = '<div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> The bit amount is crouch our limit  ....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
         
     }else{
        $msg = '<div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> Your Balaence is too low ....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    

}
    //check limitation
    
    
?>
    
     
      <!----- main contant -----> 
       <div class="main-contant">
           <div class="col-md-6 offset-md-3">
               <?php if(isset($msg))echo $msg;?>
               <div class="buy">
                   <div class="card">
                      <?php
                          if(mysqli_num_rows($report) < $limit){
                       ?>
                       <div class="card-body">
                          <p>শর্তঃ <?= $title; ?></p>
                           <form action="" method="post">
                               <div class="form-group">
                                   <label>Item Name: </label>
                                   <input type="text" readonly value="<?= $item?>" name="" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label>Price: </label>
                                   <input type="text" readonly value="<?= $price;?>" name="" class="form-control">
                               </div>
                               <div class="form-group">
                                   <label>Limit: </label>
                                   <input type="text" readonly value="<?= $limit?>" name="" class="form-control">
                               </div>
                                <div class="form-group">
                                   <label>TK: </label>
                                   <input type="text" required placeholder="Limit: <?php echo ($limit*$price); ?>" name="bet_amount" class="form-control">
                               </div>
                               

                                   <button type="submit" class="col-md-6 offset-md-3 btn btn-success btn-rounded" name="buy">Confirm Buy</button>
                        
                           </form>
                       </div>
                       <?php }else{ ?>
                       
                       <div class="card-body">
                          <h2 class="text-center mt-5">Sorry bet is limited...</h2>
                       </div>
                       <?php } ?>
                   </div>
               </div>
           </div>
           
           
       </div>
       <!-----//End main contant -----> 
       
<?php include('inc/footer.php');
}else{
    echo '<script>window.location.href = "login.php";
</script>';
}
?>