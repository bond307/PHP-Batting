<?php include('inc/header.php');
//check user is login or not
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
?>
      <!----- main contant -----> 
       <div class="main-contant">
           
           <div class="jumbotron jumbotron-fluid">
  <div class="container" style="text-align:center;">
    <h1 class="display-4">Hello: <strong><?= $_SESSION['user_name'];?></strong></h1>
    <p class="lead">Welcome to Nirapod360</p>
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