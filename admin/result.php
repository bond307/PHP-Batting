<?php include 'inc/header.php';?>

<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<?php
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
include 'inc/side-bar.php';
include 'lib/db.php';
$match = mysqli_query($conn, "select * from product where status = 'Active'"); 
    
//search 
if(isset($_GET['search'])){
    $matchId = $_GET['match'];
}
    
    //update result 
    
if(isset($_GET['win'])){
    $update = mysqli_query($conn, "update tbl_bid_report set best_result = 'Win' where id = '".$_GET['win']."'"); 
}
        
if(isset($_GET['loss'])){
    $update = mysqli_query($conn, "update tbl_bid_report set best_result = 'Loss' where id = '".$_GET['loss']."'"); 
}
?>
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

           <div class="card">
                 <div class="card-body">
                     <form action="" method="get">
                        <div class="row">
                            <div class="col-md-7">
                           
                         <div class="form-group">
                             <label>Select Match</label>
                             <select class="form-control" name="match">
                                 <option selected disabled>Select active match...</option>
                                 <?php 
                                 if(mysqli_num_rows($match)>0){
                                     while($match_rows = mysqli_fetch_assoc($match)){
                                        echo '<option value='.$match_rows['id'].'>'.$match_rows['name'].'</option>'; 
                                     }
                                   }
                                 ?>
                             </select>
                         </div>
                            </div>
                         <div class="col-md-5">
                             <button class="mt-4 col-md-12 btn btn-danger btn-rounded" type="submit" name="search">Search</button>
                         </div>
                            </div>
                     </form>
                 
                </div>
            </div>
            
            <!---- show result --->
            
           
              <div class="card">
                  <div class="card-header">
                      <strong>Pending Number List</strong>
                  </div>
                  <div class="card-body">
                      
                      <table id="example" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Match</th>
                                  <th>Team</th>
                                  <th>Result</th>
                                  <th>Bet Price</th>
                                  <th>Bet Amount</th>
                                  <th>Profit</th>
                                  <th>Date & Time</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
<?php 
    $sr = '0';
    if(isset($matchId)){
    $beters = mysqli_query($conn, "select * from tbl_bid_report where best_result != 'Wating' and product_id = '$matchId'"); 
    if(mysqli_num_rows($beters)>0){
    while($row = mysqli_fetch_assoc($beters)){
        $sr++;
      ?>
      <tr>
      <td><?= $sr;?></td>
      <td style="color:red; font-width:blod; "><?= $row['Match Name'];?></td>
      <td><?= $row['bet'];?></td>
      <td><?= $row['best_result'];?></td>
      <td><?= $row['bet_price'];?></td>
      <td><?= $row['bet_amount'];?></td>
      <td><?= $row['profit'];?></td>
      <td><?= $row['date'];?></td>
      <td>
           <?php if($row['best_result'] == 'Waiting'){ ?>
            <button class="btn btn-success btn-rounded"><a href="?win=<?= $row['id']?>&match=<?= $matchId?>&search=">Win</a></button>
            <button class="btn btn-danger text-dark btn-rounded mt-1"><a href="?loss=<?= $row['id']?>&match=<?= $matchId?>&search=">Loss</a></button>
            <?php }else{ ?>
            <button class="btn btn-info"><?= $row['best_result']?></button>
            <?php }?>
            
      </td>
    </tr>
<?php }}} ?>
                          </tbody>
                      </table>
                      
                      
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