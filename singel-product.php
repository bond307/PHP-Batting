<?php include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
   
 if(isset($_GET['product_id'])){
     $p_id = $_GET['product_id'];
 }
# ============================================================== -->
# show product  -->
# ============================================================== -->   

$ShowSql = mysqli_query($conn, "select * from product where id = '$p_id'");
if(mysqli_num_rows($ShowSql)){
    $showProduct = mysqli_fetch_assoc($ShowSql);
}
    
?>
      <!----- main contant -----> 
       <div class="main-contant">
             <div class="page-title">
               <h2>Product</h2>
           </div>
           
      <!----- Product one ----->   
          <div class="col-md-4 offset-md-4 single-product">
                  
              <h5><?= $showProduct['team1']?></h5>
              <p><?= $showProduct['team1_titel']?></p>
               <a href="team-1.php?team_no=team_1&product_id=<?= $showProduct['id'];?>&team_name=<?= $showProduct['team1'];?>&price=<?= $showProduct['team1_price'];?>">
                 <div class="product-box">
                  <p><span>%: <?= $showProduct['team1_bid']?></span> | <span>Price: <?= $showProduct['team1_price']?></span> | <span>Limit: <?= $showProduct['team1_bid_limit']?></span> </p>
              </div>
               </a> 
          </div>
          
           <!----- Product one ----->   
          <div class="col-md-4 offset-md-4 single-product">
                  
              <h5><?= $showProduct['team2']?></h5>
              <p><?= $showProduct['team2_titel']?></p>
               <a href="team-2.php?team_no=team_2&product_id=<?= $showProduct['id'];?>&team_name=<?= $showProduct['team2'];?>&price=<?= $showProduct['team2_price'];?>">
              <div class="product-box">
                  <p><span>%: <?= $showProduct['team2_bid']?></span> | <span>Price: <?= $showProduct['team2_price']?></span> | <span>Limit: <?= $showProduct['team2_bid_limit']?></span> </p>
              </div>
               </a> 
          </div> 
          
          
            <!----- Product one ----->   
          <div class="col-md-4 offset-md-4 single-product">
                  
              <h5><?= $showProduct['team3']?></h5>
              <p><?= $showProduct['team3_titel']?></p>
               <a href="team-3.php?team_no=team_3&product_id=<?= $showProduct['id'];?>&team_name=<?= $showProduct['team3'];?>&price=<?= $showProduct['team3_price'];?>">
                 <div class="product-box">
                  <p><span>%: <?= $showProduct['team3_bid']?></span> | <span>Price: <?= $showProduct['team3_price']?></span> | <span>Limit: <?= $showProduct['team3_bid_limit']?></span> </p>
              </div>
               </a> 
          </div> 
          
              
            <!----- Product one ----->   
          <div class="col-md-4 offset-md-4 single-product">
                  
              <h5><?= $showProduct['team4']?></h5>
              <p><?= $showProduct['team4_titel']?></p>
               <a href="team-4.php?team_no=team_4&product_id=<?= $showProduct['id'];?>&team_name=<?= $showProduct['team4'];?>&price=<?= $showProduct['team4_price'];?>">
                <div class="product-box">
                  <p><span>%: <?= $showProduct['team4_bid']?></span> | <span>Price: <?= $showProduct['team4_price']?></span> | <span>Limit: <?= $showProduct['tem4_bid_limit']?></span> </p>
              </div>
               </a> 
          </div> 
          
           
    
           
       </div>
       <!-----//End main contant -----> 
       
<?php include('inc/footer.php');
}else{
    echo '<script>window.location.href = "login.php";
</script>';
}
?>