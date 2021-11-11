<?php
include('lib/db.php');
include 'inc/header.php';?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

?>
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <div class="row">
              
              <div class="col-md-8 offset-md-2 mt-4">
               
              <div class="card">
            <div class="page-title">
               <h2> ব্যালেন্স যোগ করার রিপর্ট</h2>
           </div>
                  <div class="card-body">
                      
                      <table id="example" class="table table-striped table-bordered table-responsive">
                          <thead>
                              <tr>
                                  <th>#SR No.</th>
                                  <th>User Name</th>
                                  <th>Type</th>
                                  <th>Number</th>
                                  <th>Amount</th>
                                  <th>Date & Time</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php 
                              $sr = '0';
                      $res = mysqli_query($conn, "select * from tbl_add_blance where user_id = '".$_SESSION['user_id']."' order by id desc");
                            while($row = mysqli_fetch_assoc($res)){
                                $sr++;
                              ?>
                              <tr>
                              <td><?= $sr;?></td>
                              <td style="color:red; font-width:blod; font-size:20px;"><?= $row['user_name'];?></td>
                              <td><?= $row['type'];?></td>
                              <td><?= $row['number'];?></td>
                              <td><?= $row['amount'];?></td>
                              <td><?= $row['date'];?></td>
                             
                              <td>
                                 <?php if($row['status'] == 'Pending'){ ?>
                                  <a class="badge badge-primary"><?= $row['status'];?></a>
                                  <?php }else{ ?>
                                  
                                   <a class="badge badge-success"><?= $row['status'];?></a>
                                <?php }?>
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