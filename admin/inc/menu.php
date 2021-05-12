
<?php include ('../config/constants.php');
        include ('login-check.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    *
    {
        margin:0;
        padding:0;
        font-family:Arial , Helvetica, sans-serif;
    }
.menu 
{
    text-align: center;
    padding-top: 1%;
    border-bottom: 1px solid;
   
}
.menu .wrapper {
    padding: 2%;
}

    .menu ul
    {
        list-style-type:none;
        display: inline;

        
    }

    .menu ul li
    {
        display: inline;
        padding: 1%;
       
        
    }
    .menu ul li a 
    {
        text-decoration: none;
        font-weight: bold;
        color:black;
    }
    .wrapper 
      {
           
            padding: 1px;
            width: 80%;
            margin:0 auto; 
      }
     
/* main content  */
      .main-content 
      {
          margin: 1% 0%;
          padding: 3% 0%;
      }
      .col-4 
      
      {
          text-align: center;
        width: 18%;
        background-color: grey;
        margin: 1%;
        padding: 2%;
        float: left;
      }
      .cleafix 
      {
          float: none;
          clear: both;
      }
       

    </style>
</head>
<body>
<div class="menu">

<div class="wrapper" >
       <ul><li><a href="admin.php">Home</a></li></ul>
       <ul><li><a href="manage-admin.php">Admin</a></li></ul>
       <ul><li><a href="manage-category.php">Kategorit</a></li></ul>
       <ul><li><a href="manage-food.php">Ushqimet</a></li></ul>
       <ul><li><a href="manage-order.php">Posorit</a></li></ul>    
       <ul><li><a href="logout.php">Log Out</a></li></ul>   
</div>
</div>