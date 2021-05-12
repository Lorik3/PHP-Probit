<?php include 'inc/header.php';?>
<?php
 if (isset($_GET['category_id']))
 {
     $category_id = $_GET['category_id'];
     $sql = "SELECT title FROM table_category WHERE id=$category_id";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
    $category_title = $row['title'];
    }
 else 
 {
     header('location:'.SITEURL);
 }

?>
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


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $sql2 = "SELECT * FROM table_food WHERE category_id=$category_id";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            if ($count2 > 0 )
            {
                while ($row2 = mysqli_fetch_assoc($res2))
                {
                    $id =$row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>
                <div class="food-menu-box">
                <div class="food-menu-img">
                <?php 
                if ($image_name=="")
                {
                    echo "Nuk ka foto";
                }
                else 
                {
                    ?>
                     <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    <?php
                }
                
                ?>
              
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title ?></h4>
                    <p class="food-price"><?php echo $price ?></p>
                    <p class="food-detail">
                  <?php echo $description ?>
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                    <?php 
                }
            }
            else 
            {
                echo "Ska ushqim";
            }

            ?>
           
          


            <div class="clearfix"></div>

            

        </div>

    </section>
    
    <?php include 'inc/socialMedia.php'; ?>

    <?php include 'inc/footer.php'; ?>

</body>
</html>