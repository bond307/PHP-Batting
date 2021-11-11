<?php include 'inc/header.php';?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
include 'inc/side-bar.php';
include 'lib/db.php';
    
 
# ============================================================== -->
# add product  -->
# ============================================================== -->   
    
if(isset($_POST['submit'])){
    
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
    
    $sql = mysqli_query($conn, "INSERT INTO `product` (`id`, `name`, `team1`, `team1_titel`, `team1_price`, `team1_bid`, `team1_bid_limit`, `team2`, `team2_titel`, `team2_price`, `team2_bid`, `team2_bid_limit`, `team3`, `team3_titel`, `team3_price`, `team3_bid`, `team3_bid_limit`, `team4`, `team4_titel`, `team4_price`, `team4_bid`, `tem4_bid_limit`, `status`, `dateTime`) VALUES (NULL, '$title', '$t1_name', '$t1_title', '$t1_price', '$t1_persent', '$t1_limit', '$t2_name', '$t2_title', '$t2_price', '$t2_persent', '$t2_limit', '$t3_name', '$t3_title', '$t3_price', '$t3_persent', '$t3_limit', '$t4_name', '$t4_title', '$t4_price', '$t4_persent', '$t4_limit', 'Pending', '$date')");
    
    if($sql == true){
        $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Product added success....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
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
                              <input type="text" name="title" class="form-control" required>
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
                          <input type="text" name="t1_name" class="form-control" required>
                      </div>
                        <div class="form-group">
                          <label>Team -1 Title</label>
                          <input type="text" name="t1_title" class="form-control" required>
                      </div>
                       <div class="form-group">
                          <label>Team -1 Bid Price</label>
                          <input type="text" name="t1_price" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label>Team -1 Bid % </label>
                          <input type="text" name="t1_persent" class="form-control" required placeholder="type: 125% ">
                      </div>
                      
                      <div class="form-group">
                          <label>Team -1 Bid Limit </label>
                          <input type="text" name="t1_limit" class="form-control" required >
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
                          <input type="text" name="t2_name" class="form-control" required>
                      </div>
                        <div class="form-group">
                          <label>Team -2 Title</label>
                          <input type="text" name="t2_title" class="form-control" required>
                      </div>
                       <div class="form-group">
                          <label>Team -2 Bid Price</label>
                          <input type="text" name="t2_price" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label>Team -2 Bid % </label>
                          <input type="text" name="t2_persent" class="form-control" required placeholder="type: 125% ">
                      </div>
                      
                      <div class="form-group">
                          <label>Team -2 Bid Limit </label>
                          <input type="text" name="t2_limit" class="form-control" required >
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
                          <input type="text" name="t3_name" class="form-control" required >
                      </div>
                        <div class="form-group">
                          <label>Team -3 Title</label>
                          <input type="text" name="t3_title" class="form-control" required >
                      </div>
                       <div class="form-group">
                          <label>Team -3 Bid Price</label>
                          <input type="text" name="t3_price" class="form-control" required >
                      </div>
                      <div class="form-group">
                          <label>Team -3 Bid % </label>
                          <input type="text" name="t3_persent" class="form-control" required  placeholder="type: 1225% ">
                      </div>
                      
                      <div class="form-group">
                          <label>Team -3 Bid Limit </label>
                          <input type="text" name="t3_limit" class="form-control" required  >
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
                          <input type="text" name="t4_name" class="form-control" required >
                      </div>
                        <div class="form-group">
                          <label>Team -4 Title</label>
                          <input type="text" name="t4_title" class="form-control" required >
                      </div>
                       <div class="form-group">
                          <label>Team -4 Bid Price</label>
                          <input type="text" name="t4_price" class="form-control" required >
                      </div>
                      <div class="form-group">
                          <label>Team -4 Bid % </label>
                          <input type="text" name="t4_persent" class="form-control" required  placeholder="type: 125% ">
                      </div>
                      
                      <div class="form-group">
                          <label>Team -4 Bid Limit </label>
                          <input type="text" name="t4_limit" class="form-control" required  >
                      </div>
                           </div>
                       </div>
                  </div>
             </div>
             
             
             <button class="btn btn-success btn-rounded col-md-4 offset-md-4" type="submit" name="submit">Add Product</button>

            
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