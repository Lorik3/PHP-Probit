<style>
.tbl-30
{
    width:30%;
   
}
</style>

<?php include ('inc/menu.php'); ?>

<div class="main-content">

<div class="wrapper">

    <h1>Add Category</h1>

    <br><br>
<?php 
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset ($_SESSION['add']);
    }
    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset ($_SESSION['upload']);
    }

    ?>

    <form action=""method="POST" enctype="multipart/form-data" > 
    <!-- oshte property per upload fjlla -->
    
    <table class="tbl-30">

        <tr>
        <td>Title: </td>
        <td>
            <input type="text"name="title"placeholder="Category Title">
        </td>
        </tr>

        <tr>
            <td>Featured: </td>
                <td>
                    <input type="radio"name="featured"value="Yes" >Yes
                    <input type="radio"name="featured"value="No" >No
                </td>
        </tr>

        <tr>
            <td>Select image: </td>
                <td>
                    <input type="file"name="image" >
                </td>
        </tr>

        <tr>
            <td>Active: </td>
                <td>
                    <input type="radio"name="active"value="Yes" >Yes
                    <input type="radio"name="active"value="No" >No
                </td>
        </tr>

        <tr>
            <td colspan>
                <input type="submit"name="submit" value="Add category">
            </td>
                
        </tr>
    
    </table>
    
    </form>

    <?php
     if(isset($_POST['submit']))
     {
        $title = $_POST['title'];

            // per buttona radio na vyn me bo check a o click
        if(isset($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
        else 
        {
            $featured = "No";
        }

        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else
        {
            $active = "No";
        }
        
        if(isset($_FILES['image']['name']))
        {
            // per me upload image na vyn image name , source path edhe destination path
            $image_name =$_FILES['image']['name'];
            if($image_name !="")
            {

            
            $ext=end(explode('.',$image_name));

            $image_name = "Food_Category_".rand(000,999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];
            $destionation_path="../images/category/".$image_name;

            $upload=move_uploaded_file($source_path,$destionation_path);

            if(!$upload)
            {
                $_SESSION['upload'] = "Deshtoi te ngarohet fotoja";
                header('location:'.SITEURL.'admin/add-category.php');
                die();
            }
        }
        }
        else 
        {
            $image_name ="";
        }

        
        $sql = "INSERT INTO table_category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
        ";
        $res = mysqli_query($conn,$sql);

        if($res)
        {
            $_SESSION['add']= "Category added succesfully";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else 
        {
            $_SESSION['add']= "Category faild to added succesfully";
            header('location:'.SITEURL.'admin/add-category.php');
        }
     }
    
    ?>

</div>
</div>
<?php include ('inc/footer.php') ?>