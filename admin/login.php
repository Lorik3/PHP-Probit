<?php include ('../config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <style>
    .login 
    {
        border: 1px solid grey;
        width:20%;
        margin:10% auto;
        padding:2%;
    }
    .text-center
    {
        text-align:center;
    }
    .btn-primary 
    {
    background-color: #1e90ff;
    padding:1%;

    color:white;
    text-decoration:none;
    font-weight : bold;
    }
    .btn-primary:hover
    {
    background-color:#3742fa
    }
    .error 
    {
        color:red;
    }
    .error2
    {
        color:green;
    }
    
    </style>
</head>
<body>
    <div class="login">
    <h1 class="text-center">Login</h1>
    <br>
    <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset ($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset ($_SESSION['no-login-message']);
        }

    ?>
    <br>


    <form  action=""method="POST"class="text-center">
    Username: <br>   
    <input type="text"name="username"placeholder="Enter User name"><br>   <br>
    Password: <br>   
    <input type="password"name="password"placeholder="Enter User password"> <br>   <br>
    <br>
    <input type="submit"name="submit"value="Submit" class="btn-primary">
    <br>   
    </form>
    </div>

</body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $username =$_POST['username'];
         $password = md5($_POST['password']);

        $sql = "SELECT * FROM table_admin WHERE username='$username'
         AND password='$password'";
        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);
        if($count==1)
        {
           
            $_SESSION['login'] = "<div class='text-center error2'>Login Succesfull</div>";
            $_SESSION['user']= $username; // check a osht useri log in a jo
            header('location:'.SITEURL.'/admin/admin.php');
        }
        else
        {
            $_SESSION['login'] = "<div class='text-center error'>Login not succesfull</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>