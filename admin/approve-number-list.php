<?php include 'inc/header.php';?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
include 'inc/side-bar.php';
include 'lib/db.php';
    
 

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
                      $res = mysqli_query($conn, "select * from tbl_add_numner  where status = 'Approve' order by id desc ");
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
                                    <a class="btn btn-success btn-rounded"><?= $row['status']?></a>
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