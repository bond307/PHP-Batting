<?php include 'inc/header.php';?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
include 'inc/side-bar.php';
include 'lib/db.php';
    
    //update
    
if(isset($_GET['approve'])){
    $update = mysqli_query($conn, "update tbl_blnc_trnsfr_nuser_name set status = 'Approve' where id = '".$_GET['approve']."'  ");
    if($update == true){
        $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Transfer list is approve success....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
}
    
    
$res = mysqli_query($conn, "select * from tbl_blnc_trnsfr_nuser_name");
$row = mysqli_fetch_assoc($res);

//show user name
$uName =  mysqli_fetch_assoc(mysqli_query($conn, "select * from tbl_user where id = '".$row['user_id']."' ")) 
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
                      <strong>Blance transfer user name pending list </strong>
                  </div>
                  <div class="card-body">
                      
                      <table id="example" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Account Holder</th>
                                  <th>User name 1</th>
                                  <th>User name 2</th>
                                  <th>User name 3</th>
                                  <th>User name 4</th>
                                  <th>User name 5</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php 
                              $sr = '0';
                      $res = mysqli_query($conn, "select * from tbl_blnc_trnsfr_nuser_name  where status = 'Pending' order by id desc");
                            while($row = mysqli_fetch_assoc($res)){
                                $sr++;
                              ?>
                              <tr>
                              <td><?= $sr;?></td>
                              <td style="color:red; font-width:blod; font-size:20px;"><?= $uName['user_name'];?></td>
                              <td><?= $row['uname1'];?></td>
                              <td><?= $row['uname2'];?></td>
                              <td><?= $row['uname3'];?></td>
                              <td><?= $row['uname4'];?></td>
                              <td><?= $row['uname5'];?></td>
                             
                              <td>
                                  <a href="?approve=<?= $row['id'];?>" class="btn btn-success btn-rounded">Approve</a>
                                
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