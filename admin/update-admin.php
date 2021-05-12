<?php include ('inc/menu.php'); ?>
<style>
.btn-secondary 
{
  background-color: #81C784;
  margin-top:5%;
  padding:5%;
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
   
} </style>
<div class="main-content">
        <div class="wrapper">
            <h1>Modifiko Adminin</h1>
        <br><br>
        <?php
            $id=$_GET['id'];

            $sql="SELECT * FROM table_admin WHERE id=$id";

            $res = mysqli_query($conn,$sql);

            if($res)
            {
                $count =mysqli_num_rows($res);

                if($count==1)
                {
                       $row=mysqli_fetch_assoc($res);
                       $full_name=$row['full_name'];
                       $username=$row['username'];
                     
                }
                else 
                {
                    header('Location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>
            <form action="" method="POST">
            
            <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td>
                <input type="text"name="full_name"value="<?php echo $full_name; ?>">
                </td>
            </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text"name="username" value="<?php echo $username; ?>"></td>
                </tr>

                <tr>
                    <td colspawn="2"></td> 

                    <td>
                    
                    <input type="hidden"name="id"value="<?php echo $id; ?>">
                    <input type="submit"name="submit" value="Modifiko Adminin" class="btn-secondary">
                    </td>            
                </tr>

                
        </table>
            
            

            
            </form>
        </div>
</div>

<?php 
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
         $full_name =$_POST['full_name'];
         $username =$_POST['username'];


         $sql = "UPDATE table_admin SET
         full_name = '$full_name',
         username = '$username'
         WHERE id='$id'
         ";

         $res = mysqli_query($conn,$sql);

         if ($res)
         {
            $_SESSION['update'] = "Admini u modifikua me sukses ";
            header('Location:'.SITEURL.'admin/manage-admin.php');
           
         }
         else 
         {
            $_SESSION['update'] = "Admini nuk u modifikua me sukses ";
            header('Location:'.SITEURL.'admin/manage-admin.php');
         }
    }

?>


<?php include ('inc/footer.php'); ?>