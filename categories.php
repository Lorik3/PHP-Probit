<?php include 'inc/header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crunch Caffe</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>




    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            
            $sql = "SELECT * FROM table_category WHERE active='Yes'";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if ($count > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    <a href="<?php echo SITEURL; ?>category-food.php?category_id=<?php echo $id; ?>">
                     <div class="box-3 float-container">
                         <?php
                            if($image_name=="")
                            {
                                echo "Nuk ka foto";
                            }
                            else 
                            {
                                ?>
                                  <img style="width:350px;height:350px;" src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

                                <?php
                            }
                         ?>
                  
                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                     </div>
                    </a>

                    <?php
                }

            }
            else
            {
                echo "Nuk ka kategori";
            }

            ?>
            

            

            

            <div class="clearfix"></div>
        </div>
    </section>
   


            <!-- Social Media -->
    <?php include 'inc/socialMedia.php'; ?>
            <!-- Footer  -->
    <?php include 'inc/footer.php'; ?>

</body>
</html>