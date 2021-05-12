<?php include ('inc/menu.php'); ?>
<style>
.btn-secondary 
{
  background-color: #81C784;
  padding:4%;
  color:white;
  text-decoration:none;
  font-weight : bold;
}
.btn-secondary:hover
{
  background-color:#06d6a0
}

.tbl-30
{
    width:30%;
   
}
 </style>
<div class="main-content">
<div class="wrapper">
<h1>Add Admin</h1>
<br><br>
<?php
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']) ;
}
?>
        <form action="" method="POST">
        
        
        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td><input type="text"name="full_name"placeholder="Enter your name"></td>
            </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text"name="username"placeholder="Your username"></td>            
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password"name="password"placeholder="Enter your password "></td>            
                </tr>
       

                <tr>
                    <td colspawn="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
        </table>
        
        </form>

</div>
</div>
<?php include ('inc/footer.php') ?>

<?php 

if(isset($_POST['submit']))
{
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);


        // SQL Query mi rujt ne databaz

        $sql = "INSERT INTO table_admin SET 

                full_name='$full_name',
                username='$username',
                password='$password'
        ";


     

        $res = mysqli_query($conn,$sql);
        if($res)
        {
       
             $_SESSION['add']="Admini u shtua me sukses  ";
             header("Location:".SITEURL.'admin/manage-admin.php');

        }
        else 
        {
            $_SESSION['add']="Failed to Add Admin";
            header("location:".SITEURL.'admin/add-admin.php');

        }
      
}   


?>
