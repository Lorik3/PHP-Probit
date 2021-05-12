<?php include ('inc/menu.php'); ?>

<style>
.btn-secondary 
{
  background-color: #81C784;
  padding:1%;
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
    <h1>Change Password</h1>
    <br><br>

    <?php
        if (isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
    
    ?>

    <form action="" method="POST">
    
        <table class="tbl-30">
            <tr>
                <td>Passwordi i vjeter: </td>
                <td>
                    <input type="password"name="old_password" placeholder="Passwordi i vjeter">
                </td>
            </tr>

            <tr>
                <td>Passwordi i ri: </td>
                <td>
                <input type="password"name="new_password" placeholder="Passwordi i ri">
                </td>
            
            </tr>

            <tr>
                <td>Konfirmo Passwordin: </td>
                <td>
                <input type="password"name="confirm_password" placeholder="Konfirmo Passwordin ">
            
                </td>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id"value="<?php echo $id; ?>">
                        <br>
                        <input type="submit" name="submit" value="Ndrysho Passwordin" class="btn-secondary">
                    </td>

                </tr>

            </tr>

        </table>

    
    </form>



</div>
</div>

<?php

        if(isset($_POST['submit']))
        {
            $id=$_POST['id'];
            $old_password = md5($_POST['old_password']);
            $new_password = md5($_POST['new_password']); 
            $confirm_password = md5($_POST['confirm_password']); 


            $sql ="SELECT * FROM table_admin WHERE id=$id 
            AND password='$old_password'
            ";

            $res = mysqli_query($conn,$sql);
            if($res)
            {
                    $count = mysqli_num_rows($res);
                    if($count==1)
                    {
                        if($new_password==$confirm_password)
                        {
                                $sql2= "UPDATE table_admin SET
                                password='$new_password'
                                WHERE id=$id
                                ";

                                $res2=mysqli_query($conn,$sql2);

                                if($res2)
                                {
                                    $_SESSION['change-pwd']="Passwordi u ndryshua me sukses";
                                    header('Location:'.SITEURL.'admin/manage-admin.php');
                               
                                }
                                else 
                                {
                                    $_SESSION['change-pwd']="Passwordi nuk u ndryshua me sukses";
                                    header('Location:'.SITEURL.'admin/manage-admin.php');
                                }
                        }
                        else
                        {
                        $_SESSION['pwd-not-match']="Passwordi nuk eshte i njejt";
                        header('Location:'.SITEURL.'admin/manage-admin.php');
                   
                        }
                    }
                    else 
                     {
                        $_SESSION['user-not-found']="Useri nuk u gjend";
                        header('Location:'.SITEURL.'admin/manage-admin.php');
                    }
            }
        }

?>



<?php include ('inc/footer.php') ?>