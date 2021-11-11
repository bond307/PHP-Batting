<?php include 'inc/header.php';?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
include 'inc/side-bar.php';
include 'lib/db.php';
    
 if(isset($_GET['product_id'])){
     $p_id = $_GET['product_id'];
 }
# ============================================================== -->
# add product  -->
# ============================================================== -->   

//show roduct

$ShowSql = mysqli_query($conn, "select * from product where id = '$p_id' order by id desc");
if(mysqli_num_rows($ShowSql)){
    $showProduct = mysqli_fetch_assoc($ShowSql);
    $status = $showProduct['status'];
}
    

 
# ============================================================== -->
# Edite product  -->
# ============================================================== -->   
    
if(isset($_POST['edit'])){
    
   $title = mysqli_real_escape_string($conn, $_POST['title']);
    
   $t1_name = mysqli_real_escape_string($conn, $_POST['t1_name']);
   $t1_title = mysqli_real_escape_string($conn, $_POST['t1_title']);
   $t1_price = mysqli_real_escape_string($conn, $_POST['t1_price']);
   $t1_persent = mysqli_real_escape_string($conn, $_POST['t1_persent']);
   $t1_limit = mysqli_real_escape_string($conn, $_POST['t1_limit']);
    
   $t2_name = mysqli_real_escape_string($conn, $_POST['t2_name']);
   $t2_title = mysqli_real_escape_string($conn, $_POST['t2_title']);
   $t2_price = mysqli_real_escape_string($conn, $_POST['t2_price']);
   $t2_persent = mysqli_real_escape_string($conn, $_POST['t2_persent']);
   $t2_limit = mysqli_real_escape_string($conn, $_POST['t2_limit']);
    
   $t3_name = mysqli_real_escape_string($conn, $_POST['t3_name']);
   $t3_title = mysqli_real_escape_string($conn, $_POST['t3_title']);
   $t3_price = mysqli_real_escape_string($conn, $_POST['t3_price']);
   $t3_persent = mysqli_real_escape_string($conn, $_POST['t3_persent']);
   $t3_limit = mysqli_real_escape_string($conn, $_POST['t3_limit']);
    
   $t4_name = mysqli_real_escape_string($conn, $_POST['t4_name']);
   $t4_title = mysqli_real_escape_string($conn, $_POST['t4_title']);
   $t4_price = mysqli_real_escape_string($conn, $_POST['t4_price']);
   $t4_persent = mysqli_real_escape_string($conn, $_POST['t4_persent']);
   $t4_limit = mysqli_real_escape_string($conn, $_POST['t4_limit']);
    
    $date = date("d-m-y - h:m:s");
    
    $sql = mysqli_query($conn, "update product set `name` = '$title', `team1` = '$t1_name', `team1_titel` = '$t1_title', `team1_price` = '$t1_price', `team1_bid` = '$t1_persent', `team1_bid_limit` = '$t1_limit', `team2` = '$t2_name', `team2_titel` = '$t2_title', `team2_price` = '$t2_price', `team2_bid` = '$t2_persent', `team2_bid_limit` = '$t2_limit', `team3` = '$t3_name', `team3_titel` = '$t3_title', `team3_price` = '$t3_price', `team3_bid` = '$t3_persent', `team3_bid_limit` ='$t3_limit', `team4` = '$t4_name', `team4_titel` = '$t4_title', `team4_price` = '$t4_price', `team4_bid` = '$t4_persent', `tem4_bid_limit` = '$t4_limit', `status` = '$status', `dateTime` = '$date' where id = '".$showProduct['id']."'");
    
    if($sql == true){
        $msg = '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Update!</strong> Product Update Success....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        
    }
    
}

    
 
# ============================================================== -->
# active product   -->
# ============================================================== -->       
if(isset($_POST['active'])){
    
   $active = mysqli_query($conn, "update product set status = 'Active' where id = '$p_id'"); 
     if($active == true){
        $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Active!</strong> Product Active Success....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} 
}
# ============================================================== -->
# Deactive product   -->
# ============================================================== -->       
if(isset($_POST['deactive'])){
    
   $active = mysqli_query($conn, "update product set status = 'Pending' where id = '$p_id'"); 
     if($active == true){
        $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Deactive!</strong> Product Deactive Success....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} 
}
    
# ============================================================== -->
# Delete product   -->
# ============================================================== -->       
if(isset($_POST['delete'])){
   
   $active = mysqli_query($conn, "delete from product where id = '$p_id'"); 
     if($active == true){
         echo '<script>window.location.href = "manage-product.php";</script>';
} 
}
?>
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
        <?php if(isset($msg))echo $msg;?>
  <form action="" method="post">
            <div class="row">
              
              <div class="card col-md-12">
                  <div class="card-header">
                      <h3>Add New Product</h3>
                  </div>
                  <div class="card-body">
                          <div class="form-group">
                              <label>Title</label>
                              <input type="text" name="title" class="form-control" required value="<?= $showProduct['name']?>">
                          </div>
                  </div>
              </div>
             </div> 
             <div class="row">
     <!----- ##################################### Team-2 details ################---->
                  <div class="col-md-6">
                       <div class="card">
                           <div class="card-header">
                              <h5>Team 1 Details</h5>
                          </div>
                           <div class="card-body">
                               <div class="form-group">
                          <label>Team -1 Name</label>
                          <input type="text" name="t1_name" class="form-control" required value="<?= $showProduct['team1']?>">
                      </div>
                        <div class="form-group">
                          <label>Team -1 Title</label>
                          <input type="text" name="t1_title" class="form-control" required value="<?= $showProduct['team1_titel']?>">
                      </div>
                       <div class="form-group">
                          <label>Team -1 Bid Price</label>
                          <input type="text" name="t1_price" class="form-control" required value="<?= $showProduct['team1_price']?>">
                      </div>
                      <div class="form-group">
                          <label>Team -1 Bid % </label>
                          <input type="text" name="t1_persent" class="form-control" required value="<?= $showProduct['team1_bid']?>" placeholder="type: 125% ">
                      </div>
                      
                      <div class="form-group">
                          <label>Team -1 Bid Limit </label>
                          <input type="text" name="t1_limit" class="form-control" required value="<?= $showProduct['team1_bid_limit']?>" >
                      </div>
                           </div>
                       </div>
                  </div>
                 
                 
<!----- ##################################### Team-2 details ################---->
                  <div class="col-md-6">
                       <div class="card">
                           <div class="card-header">
                              <h5>Team 2 Details</h5>
                          </div>
                           <div class="card-body">
                               <div class="form-group">
                          <label>Team -2 Name</label>
                          <input type="text" name="t2_name" class="form-control" required value="<?= $showProduct['team2']?>">
                      </div>
                        <div class="form-group">
                          <label>Team -2 Title</label>
                          <input type="text" name="t2_title" class="form-control" required value="<?= $showProduct['team2_titel']?>">
                      </div>
                       <div class="form-group">
                          <label>Team -2 Bid Price</label>
                          <input type="text" name="t2_price" class="form-control" required value="<?= $showProduct['team2_price']?>">
                      </div>
                      <div class="form-group">
                          <label>Team -2 Bid % </label>
                          <input type="text" name="t2_persent" class="form-control" required value="<?= $showProduct['team2_bid']?>" placeholder="type: 125% ">
                      </div>
                      
                      <div class="form-group">
                          <label>Team -2 Bid Limit </label>
                          <input type="text" name="t2_limit" class="form-control" required value="<?= $showProduct['team2_bid_limit']?>" >
                      </div>
                           </div>
                       </div>
                  </div>
             </div>
             
              <div class="row">
     <!----- ##################################### Team-3 details ################---->
                  <div class="col-md-6">
                       <div class="card">
                           <div class="card-header">
                              <h5>Team 3 Details</h5>
                          </div>
                           <div class="card-body">
                               <div class="form-group">
                          <label>Team -3 Name</label>
                          <input type="text" name="t3_name" class="form-control" required  value="<?= $showProduct['team3']?>" >
                      </div>
                        <div class="form-group">
                          <label>Team -3 Title</label>
                          <input type="text" name="t3_title" class="form-control" required  value="<?= $showProduct['team3_titel']?>" >
                      </div>
                       <div class="form-group">
                          <label>Team -3 Bid Price</label>
                          <input type="text" name="t3_price" class="form-control" required  value="<?= $showProduct['team3_price']?>" >
                      </div>
                      <div class="form-group">
                          <label>Team -3 Bid % </label>
                          <input type="text" name="t3_persent" class="form-control" required  value="<?= $showProduct['team3_bid']?>"  placeholder="type: 1225% ">
                      </div>
                      
                      <div class="form-group">
                          <label>Team -3 Bid Limit </label>
                          <input type="text" name="t3_limit" class="form-control" required  value="<?= $showProduct['team3_bid_limit']?>"  >
                      </div>
                           </div>
                       </div>
                  </div>
                 
                 
<!----- ##################################### Team-4 details ################---->
                  <div class="col-md-6">
                       <div class="card">
                           <div class="card-header">
                              <h5>Team 4 Details</h5>
                          </div>
                           <div class="card-body">
                               <div class="form-group">
                          <label>Team -4 Name</label>
                          <input type="text" name="t4_name" class="form-control" required value="<?= $showProduct['team4']?>"  >
                      </div>
                        <div class="form-group">
                          <label>Team -4 Title</label>
                          <input type="text" name="t4_title" class="form-control" required value="<?= $showProduct['team4_titel']?>"  >
                      </div>
                       <div class="form-group">
                          <label>Team -4 Bid Price</label>
                          <input type="text" name="t4_price" class="form-control" required value="<?= $showProduct['team4_price']?>"  >
                      </div>
                      <div class="form-group">
                          <label>Team -4 Bid % </label>
                          <input type="text" name="t4_persent" class="form-control" required value="<?= $showProduct['team4_bid']?>"   placeholder="type: 125% ">
                      </div>
                      
                      <div class="form-group">
                          <label>Team -4 Bid Limit </label>
                          <input type="text" name="t4_limit" class="form-control" required value="<?= $showProduct['tem4_bid_limit']?>"   >
                      </div>
                           </div>
                       </div>
                  </div>
             </div>
             
             
           <div class="row">
        
          
               <button type="submit" name="active" class="btn btn-success btn-rounded col-md-3">Active</button>
               <button type="submit" name="deactive" class="btn btn-warning btn-rounded col-md-3">Deactive</button>
               <button type="submit" name="edit" class="btn btn-primary btn-rounded col-md-3">Edit</button>
               <button type="submit" name="delete" class="btn btn-danger btn-rounded col-md-3">Delete</button>
         
           </div>

            
 </form>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>