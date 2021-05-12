<?php include ('inc/menu.php'); ?>
<?php
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id =$_GET['id'];
    $image_name =$_GET['image_name'];

    if($image_name !="")
    {
        $path = "../images/category/".$image_name;
        $remove = unlink($path); //me fshi edhe foton nga databaza
  
        if(!$remove)
        {
            $_SESSION['remove']="Deshtoi te hiqet fotoja";
            header('location:'.SITEURL.'admin/manage-category.php');

            die();
        }
        
    }
        
    $sql = "DELETE FROM table_category WHERE id=$id";
    $res =mysqli_query($conn,$sql);
    if($res)
    {
        $_SESSION['delete']="Kategoria u fshi me sukses";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else 
    {
        $_SESSION['delete']="Kategoria nuk u fshi me sukses";
        header('location:'.SITEURL.'admin/manage-category.php');
    }



}
else
{
header('location:'.SITEURL.'admin/manage-category.php');
}
?>

<?php include ('inc/footer.php') ?>