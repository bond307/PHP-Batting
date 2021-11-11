<?php include 'inc/header.php';?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
include 'inc/side-bar.php';
include 'lib/db.php';
    
    //update
    
if(isset($_GET['delete'])){
    $update = mysqli_query($conn, "delete from tbl_user where id = '".$_GET['delete']."'  ");
    if($update == true){
        $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Account is deleted success....
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
              
              <div class="col-md-12">
                 <?php if(isset($msg))echo $msg;?> 
              <div class="card">
                  <div class="card-header">
                      <strong>All Approve User's</strong>
                  </div>
                  <div class="card-body">
                      
                      <table id="example" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Phone Number</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php 
                              $sr = 0;
                    $res = mysqli_query($conn, "SELECT * FROM tbl_user WHERE status = 'Approved' ");
                             while($row = mysqli_fetch_assoc($res)){
                            $sr++;
                              ?>
                              <tr>
                              <td><?= $sr;?></td>
                              <td><?= $row['user_name'];?></td>
                              <td><?= $row['number'];?></td>
                              <td class="btn btn-success btn-rounded ml-5"><?= $row['status'];?></td>
                              <td>
                                  <a href="?delete=<?= $row['id'];?>" class=""><i class="fa fa-trash-alt"></i></a>
                                
                              </td>
                          </tr>
                          <?php } ?>
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