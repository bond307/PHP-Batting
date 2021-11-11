<?php include 'inc/header.php';
include 'function.php';
?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php


if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
include 'inc/side-bar.php';
include 'lib/db.php';
     $check = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `cashout_time` WHERE 1 "));
      $checkin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `cashin_time` WHERE 1 "));
//permission casout
if(isset($_GET['cashout_permission'])){
    if(mysqli_query($conn, "update cashout_time set status = '1' where id = '1' ")){
        $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> উজার এখন ক্যশ অউট করতে পারবে  ....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
    }
}
if(isset($_GET['cashout_dispermission'])){
    if(mysqli_query($conn, "update cashout_time set status = '0' where id = '1' ")){
        $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> উজার এখন ক্যশ অউট করতে পারবে না ....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
    }
}
    
    
    
//permission cashin
if(isset($_GET['cashin_permission'])){
    if(mysqli_query($conn, "update cashin_time set status = '1' where id = '1' ")){
        $msgIN = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> উজার এখন টাকা জমা দিতে পারবে  ....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
    }
}
if(isset($_GET['cashin_dispermission'])){
    if(mysqli_query($conn, "update cashin_time set status = '0' where id = '1' ")){
        $msgIN = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> উজার এখন টাকা জমা দিতে পারবে না ....
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
    }
}
?>
<!-- ============================================================== -->
<div class="dashboard-wrapper">


    <div class="container-fluid dashboard-content ">

        <!-- ============================================================== -->

        <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">Total Open Match</h5>
                            <h2 class="mb-0"> <?= $total_product;?></h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                            <i class="fa fa-shopping-cart fa-fw fa-sm text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted"> User's Request</h5>
                            <h2 class="mb-0"><?= $total_user;?></h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                            <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">CashIn Request</h5>
                            <h2 class="mb-0"> <?= $total_cashin;?></h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                            <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">CashOut Request</h5>
                            <h2 class="mb-0"><?= $total_cashout;?></h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                            <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- ============================================================== -->
        
        
        <div class="row">

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
               <?php if(isset($msg))echo $msg;?>
                <div class="card">
                    <div class="card-body">
                      <?php 
                         if($check['status'] == '1'){ 
                            $clsss = 'disabled';
                         }
                        if($checkin['status'] == '1'){ 
                            $clsssin = 'disabled';
                         }
                        ?>
                       <a href="?cashout_permission=permission" class=" <?= $clsss;?> btn btn-success"> এখন ক্যশ আউট করতে পারবে </a>
                      
                       <a href="?cashout_dispermission=dispermission" class="  btn btn-danger"> এখন ক্যশ আউট করতে পারবে না</a>
                      
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
               <?php if(isset($msgIN))echo $msgIN;?>
                 <?php 
                        if($checkin['status'] == '1'){ 
                            $clsssin = 'disabled';
                         }
                        ?>
                <div class="card">
                    <div class="card-body">
                       <a href="?cashin_permission=permission" class="<?= $clsssin;?> btn btn-success"> এখন টাকা জমা দিতে পারবে </a>
                       <a href="?cashin_dispermission=dispermission" class="btn btn-danger"> এখন টাকা জমা দিতে পারবে না</a>
                    </div>
                </div>
            </div>
         
        </div>
        
        
        <div class="row">
            <div class="col-md-12">

                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-header">
                        <h4>Open Match</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead class="dash-tbl-head">
                                <tr>
                                    <th>#ID</th>
                                    <th>Date</th>
                                    <th>Match Name</th>
                                    <th>Team One</th>
                                    <th>Team Two</th>
                                    <th>Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                $sr = 0;
                                 $res = mysqli_query($conn, "select * from product where status = 'Active' order by id desc limit 0,8");
                                 while($row = mysqli_fetch_assoc($res)){
                                $sr++;
                             
                                ?>
                                <tr>
                                    <td><?= $sr;?></td>
                                    <td><?= $row['dateTime']?></td>
                                    <td><?= $row['name']?></td>
                                    <td><?= $row['team1']?> <span class="badge badge-success">3</span></td>
                                    <td><?= $row['team2']?></td>
                                    <?php if($row['status'] == 'Active'){ ?>
                                    <td><a href="manage-product.php" class="badge badge-success"><?= $row['status']?></a></td>
                                    <?php }else{ ?>
                                     <td>&nbsp;&nbsp; &nbsp;<a class="badge badge-warning" ><?= $row['status']?></a> </td>
                                    <?php }?>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        
        
        <div class="row">
            <div class="col-md-12">

                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Cash In Request</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead class="dash-tbl-head">
                                <tr>
                                    <th>#Invoic</th>
                                    <th>Date</th>
                                    <th>Payment Type</th>
                                    <th>Number</th>
                                    <th>Amount</th>
                                    <th>Order Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                $sr = 0;
                                 $res = mysqli_query($conn, "select * from tbl_add_blance order by id desc limit 0,8");
                            while($row = mysqli_fetch_assoc($res)){
                                $sr++;
                                ?>
                                <tr>
                                    <td><?= $sr;?></td>
                                    <td><?= $row['date']?></td>
                                    <td><?= $row['type']?></td>
                                    <td><?= $row['number']?></td>
                                    <td><?= $row['amount']?></td>
                                    <?php if($row['status'] == 'Approve'){ ?>
                                    <td><a href="" class="badge badge-success"><?= $row['status']?></a></td>
                                    <?php }else{ ?>
                                     <td>&nbsp;&nbsp; &nbsp;<a class="badge badge-warning" ><?= $row['status']?></a> </td>
                                    <?php }?>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

       
       
        <div class="row">
            <div class="col-md-12">

                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Cash Out Request</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead class="dash-tbl-head">
                                <tr>
                                    <th>#Invoic</th>
                                    <th>Date</th>
                                    <th>User Name</th>
                                    <th>Payment Type</th>
                                    <th>Number</th>
                                    <th>Amount</th>
                                    <th>Order Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                $sr = 0;
                                 $res = mysqli_query($conn, "select * from tbl_cashout order by id desc limit 0,8");
                            while($row = mysqli_fetch_assoc($res)){
                                $sr++;
                                ?>
                                <tr>
                                    <td><?= $sr;?></td>
                                    <td><?= $row['date']?></td>
                                    <td><?= $row['user_name']?></td>
                                    <td><?= $row['options']?></td>
                                    <td><?= $row['number']?></td>
                                    <td><?= $row['amount']?></td>
                                    <?php if($row['status'] == 'Success'){ ?>
                                    <td><a href="" class="badge badge-success"><?= $row['status']?></a></td>
                                    <?php }else{ ?>
                                    <td>&nbsp;&nbsp; &nbsp;<a class="badge badge-warning" ><?= $row['status']?></a> </td>
                                    <?php }?>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- ============================================================== -->
    </div>


    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <?php include 'inc/footer.php';
    }else{
    echo '<script>window.location.href = "index.php";</script>';
}
    ?>