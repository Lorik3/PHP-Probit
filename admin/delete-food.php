<?php include ('inc/menu.php'); ?>
<?php 

if(isset($_GET['id']) && isset($_GET['image_name']))
{

    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    if($image_name !="")
    {
        $path = "../images/food/".$image_name;
        $remove = unlink($path);
        if(!$remove)
        {
            $_SESSION['upload']= "Faild to remove img";
            header('location:'.SITEURL.'admin/manage-food.php');
            die();
        }
    }

    $sql = "DELETE FROM table_food WHERE id=$id";
    $res = mysqli_query($conn,$sql);
    if($res)
    {
        $_SESSION['delete']="U fshie me sukses";
        header('location:'.SITEURL.'admin/manage-food.php');
            
    }
    else 
    {
        $_SESSION['delete']="Deshtoi";
        header('location:'.SITEURL.'admin/manage-food.php');
         
    }
}
else
{
    $_SESSION['delete']="ka je nis be";
    header('location:'.SITEURL.'admin/manage-food.php');
}

?>
