<?php include ('inc/menu.php'); ?>

<?php 
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $sql2="SELECT * FROM table_food WHERE id=$id";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description= $row2['description'];
        $price= $row2['price'];
        $current_image= $row2['image_name'];
        $current_category= $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
      

    }
    else 
    {
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>

<div class="main-contet">
    <div class="wrapper">
        <h1>Modifiko Ushqimin</h1>

        <form action=""method="POST"enctype="multipart/form-data">
        <table>

            <tr>
                <td>Title:</td>
                <td>
                <input type="text"name="title"placeholder="Titulli"value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Pershkrimi:</td>
                <td>
                <textarea type="text"name="description"cols="30"rows="5" ><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price:</td>
                <td>
                <input type="number"name="price"placeholder="Price"value="<?php echo $price; ?>">
                 </td>
            </tr>

            <tr>
                <td>Fotoja:</td>
                <td>
                    <?php
                        if($current_image =="")
                        {
                            echo "Nuk ka foto";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                    ?>
                 </td>
            </tr>

            <tr>
                <td>Select new image</td>
                <td>
                    <input type="file"name="image">
                </td>
            </tr>
        
            <tr>
                <td>Kategoria:</td>
                <td>
               <select name="category">

               <?php
               $sql = "SELECT * FROM table_category WHERE active='Yes'";
                $res = mysqli_query($conn,$sql);
                $count= mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $category_title = $row['title'];
                        $category_id = $row['id'];
                        ?>
                        <option <?php if($current_category==$category_id){echo "selected";} ?>value="<?php echo $category_id; ?>" ><?php echo $category_title; ?> </option>
                        <?php
                    }
                }
                else
                {
                   echo "<option value='0'>Category </option>";
                }
               ?>
              
                </select>
                 </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if($featured=="Yes"){ echo "checked"; } ?> type="radio"name="featured" value="Yes">Yes
                    <input <?php if($featured=="No"){ echo "checked"; } ?>  type="radio"name="featured" value="No">No
                 </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if($active=="Yes"){ echo "checked"; } ?>  type="radio"name="active" value="Yes">Yes
                    <input <?php if($active=="No"){ echo "checked"; } ?> type="radio"name="active" value="No">No
                 </td>
            </tr>

            <tr>
            <td>
            <input type="hidden"name="id"value="<?php echo $id; ?>">
            <input type="hidden"name="current_image"value="<?php echo $current_image; ?>">
                <input type="submit"name="submit"value="Submit">
            </td>
            </tr>
        
        </table>
        
        </form>

        <?php
        
                if(isset($_POST['submit']))
                {
                    $id=$_POST['id'];
                    $title=$_POST['title'];
                    $description=$_POST['description'];
                    $price=$_POST['price'];
                    $current_image=$_POST['current_image'];
                    $category =$_POST['category'];

                    $featured=$_POST['featured'];
                    $active=$_POST['active'];

                    if(isset($_FILES['image']['name']))
                    {
                        $image_name=$_FILES['image']['name'];
                        if($image_name!="")
                        {
                            $ext =end(explode('.',$image_name));
                            $image_name= "Food-Name-".rand(0000,9999).'.'.$ext;
                            $src_path =$_FILES['image']['tmp_name'];
                            $dest_path ="../images/food/".$image_name;
                            $upload = move_uploaded_file($src_path,$dest_paths);
                            if($upload == false)
                            {
                                $_SESSION['upload']="Deshtoi te ngargohet fotoja";
                                header('location:'.SITEURL.'admin/manage-food.php');
                                die();
                            }
                            if(current_image !="")
                            {
                                $remove_path ="../images/food/".$current_image;
                                $remove = unlink($remove_path);
                                if(!$remove)
                                {
                                    $_SESSION['remove']="Deshtoi te fshihet  fotoja";
                                    header('location:'.SITEURL.'admin/manage-food.php');
                                    die();
                                }
                            }
                        }
                        else 
                        {
                            $image_name = $current_image;
                        }
                    }
                    else
                    {
                        $image_name = $current_image;
                    }

                }
                $sql3= "UPDATE table_food SET
                title='$title',
                description='$description',
                price = $price,
                image_name = '$image_name',
                category_id='$category',
                featured='$featured',
                active='$active'
                WHERE id=$id
                ";
                $res3 = mysqli_query($conn,$sql3);
                if($res3)
                {
                    $_SESSION['update']="Food updated succesfully";
                    header('location:'.SITEURL.'admin/manage-food.php');
                                  
                                   
                }
                else
                {
                    $_SESSION['update']="Food updated faild";
                    header('location:'.SITEURL.'admin/manage-food.php');
                
                }
        
        ?>



    </div>
</div>
<?php include ('inc/footer.php') ?>