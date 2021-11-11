<?php include 'inc/header.php';?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
include 'inc/side-bar.php';
include 'lib/db.php';
    
//delete 
if(isset($_GET['delete'])){
    $delete = mysqli_query($conn, "delete from product where id = '".$_GET['delete']."' ");
    if($delete == true){
        $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Delete!</strong> Product Delete Success....
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

           
            <div class="row">
              
              <div class="col-md-12 mt-4">
               <?php if(isset($msg)) echo $msg;?>
              <div class="card">
            <div class="card-header">
               <h2> প্রোডাক্ট মেনেজ </h2>
           </div>
                  <div class="card-body">
                      
                      <table id="example" class="table table-striped table-bordered ">
                          <thead>
                              <tr>
                                  <th>#SR No.</th>
                                  <th>Date & Time</th>
                                  <th>Match Name</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php 
                              $sr = '0';
                         
                        $ShowSql = mysqli_query($conn, "select * from product order by id desc");
                        if(mysqli_num_rows($ShowSql)){
                            while($showProduct = mysqli_fetch_assoc($ShowSql)){
                        $sr++;
                              ?>
                              <tr>
                              <td><?= $sr;?></td>
                              <td><?= $showProduct['dateTime'];?></td>
                              <td><?= $showProduct['name'];?></td>
                                <td>
                                 <?php if($showProduct['status'] == 'Pending'){ ?>
                                    <button class="btn btn-primary btn-rounded"><?= $showProduct['status'];?></button>
                                  <?php }else{ ?>
                                  
                                   <button class="btn btn-success btn-rounded"><?= $showProduct['status'];?></button>
                                <?php }?>
                              </td>
                              <td>
                                <a href="edit-product.php?product_id=<?= $showProduct['id']?>" class="btn btn-warning">Edit</a>
                                <a href="?product_id=<?= $showProduct['id']?>&delete=<?= $showProduct['id']?>" class="btn btn-danger">Delete</a>
                              </td>
                          </tr>
                          <?php } }  ?>
                          </tbody>
                      </table>
                      
                      
                  </div>
              </div>
              </div>

            </div>
            

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