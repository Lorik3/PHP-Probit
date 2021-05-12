<?php 
    
if(!isset($_SESSION['user']))
{
    $_SESSION['no-login-message'] = "Kyqy si admin:";
    header('location:'.SITEURL.'admin/login.php');
}

?>