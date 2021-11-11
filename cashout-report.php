<?php include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
?>
      <!----- main contant -----> 
       <div class="main-contant">
           
        <div class="row ">
            <div class="col-md-8 offset-md-2 mt-5 mb-5">
            <?php if(isset($msg))echo $msg;?>
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Recent Cash Out Request</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead class="dash-tbl-head">
                                <tr>
                                    <th>#Invoic</th>
                                    
                                    <th>User Name</th>
                                    <th>Payment Type</th>
                                    <th>Number</th>
                                    <th>Amount</th>
                                    <th> Status</th>
                                   
                                    <th>Date</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                $sr = 0;
                                 $res = mysqli_query($conn, "select * from tbl_cashout order by id desc");
                            while($row = mysqli_fetch_assoc($res)){
                                $sr++;
                                ?>
                                <tr>
                                    <td><?= $sr;?></td>
                                 
                                    <td><?= $row['user_name']?></td>
                                    <td><?= $row['options']?></td>
                                    <td><?= $row['number']?></td>
                                    <td><?= $row['amount']?></td>
                                    <?php if($row['status'] == 'Success'){ ?>
                                    <td><a href="" class="badge badge-success"><?= $row['status']?></a></td>
                                    <?php }else{ ?>
                                    <td>&nbsp;&nbsp; &nbsp;<a class="badge badge-warning" ><?= $row['status']?></a> </td>
                                    <?php }?>
                                     <td><?= $row['date']?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
           
       </div>
       <!-----//End main contant -----> 
       
<?php include('inc/footer.php');
}else{
    echo '<script>window.location.href = "login.php";
</script>';
}
?>