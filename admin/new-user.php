<?php include 'inc/header.php';?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
include 'inc/side-bar.php';
include 'lib/db.php';
    
    //update
    
if(isset($_GET['approdve'])){
    $update = mysqli_query($conn, "update tbl_user set status = 'Approved' where id = '".$_GET['approdve']."'  ");
    if($update == true){
        $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Update user status...
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
                      <strong>New User's</strong>
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
                    $res = mysqli_query($conn, "SELECT * FROM tbl_user WHERE status = 'OFF' ");
                             while($row = mysqli_fetch_assoc($res)){
                            $sr++;
                              ?>
                              <tr>
                              <td><?= $sr;?></td>
                              <td><?= $row['user_name'];?></td>
                              <td><?= $row['number'];?></td>
                              <td class="badge badge-danger mt-2 ml-5">OFF</td>
                              <td>
                                  <a href="?approdve=<?= $row['id'];?>" class="btn btn-success btn-rounded">Approve</a>
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