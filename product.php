<?php include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    
    
//show roduct

$ShowSql = mysqli_query($conn, "select * from product order by id desc");


  
?>
      <!----- main contant -----> 
       <div class="main-contant">
           
           <div class="page-title">
               <h2>Product</h2>
           </div>
           
           
        <?php 
           
        if(mysqli_num_rows($ShowSql)){
    while($showProduct = mysqli_fetch_assoc($ShowSql)){
   
     if($showProduct['status'] == 'Active'){  ?>
         <div class="product">
        </div>
        <div class="product-active">
         <a href="singel-product.php?product_id=<?= $showProduct['id'];?>&product_name=<?= $showProduct['name'];?>"><?= $showProduct['name']?></a>
        </div>
           <div class="product">
        </div>
    <?php }else{ ?>       
             <div class="product">
        </div>
         <div class="product">
         <p><?= $showProduct['name']?></p>
        </div>
            <div class="product">
        </div>
        <?php } } }?>  
           
       </div>
       <!-----//End main contant -----> 
       
<?php include('inc/footer.php');
}else{
    echo '<script>window.location.href = "login.php";
</script>';
}
?>