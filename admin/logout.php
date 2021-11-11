<?php 
include 'lib/db.php';
session_start();

unset( $_SESSION['id']);
unset( $_SESSION['user']);
unset( $_SESSION['pass']);

if(mysqli_query($conn, "update `admin` set status = 'Ofline' WHERE id = '1'" )){
    header("Location: index.php");
}

?>