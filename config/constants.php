<?php 
   session_start();

    define('SITEURL','http://localhost/root/');
   // ekzekuton query dhe e ruan ne databaz 
   $conn = mysqli_connect('localhost','root','') or die (mysqli_error()); //lidhja me databaz
   $db_select = mysqli_select_db($conn,'food') or die (mysqli_error()); //selekton databazen 
?>