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
    $update = mysqli_query($conn, "update tbl_add_numner set status = 'Approve' where id = '".$_GET['approve']."'  ");
    if($update == true){
        $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Number list is approve....
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
                      <strong>Pending Number List</strong>
                  </div>
                  <div class="card-body">
                      
                      <table id="example" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Account Holder</th>
                                  <th>Number1</th>
                                  <th>Number2</th>
                                  <th>Number3</th>
                                  <th>Date & Time</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php 
                              $sr = '0';
                      $res = mysqli_query($conn, "select * from tbl_add_numner  where status = 'Pending' order by id desc ");
                            while($row = mysqli_fetch_assoc($res)){
                                $sr++;
                              ?>
                              <tr>
                              <td><?= $sr;?></td>
                              <td style="color:red; font-width:blod; font-size:20px;"><?= $row['user_name'];?></td>
                              <td><?= $row['number1'];?></td>
                              <td><?= $row['number2'];?></td>
                              <td><?= $row['number3'];?></td>
                              <td><?= $row['date'];?></td>
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