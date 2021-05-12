<?php
include ('../config/constants.php'); 
    session_destroy();// unset   $_SESSION['user']="$username";

    header('location:'.SITEURL.'admin/login.php');

?>