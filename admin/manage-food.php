<?php include ('inc/menu.php'); ?>
<style>
.tbl-full
{
  width: 100%;
}
table tr td a 
{
  margin:1%;
}
table tr th 
{
  border-bottom:1px solid black;
  padding:1%;
  text-align:left;
}
table tr td 
{
  padding:1%;
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
.btn-third
{
  background-color: #ba181b;
  padding:1%;
  color:white;
  text-decoration:none;
  font-weight : bold;
} 
.btn-third:hover 
{
  background-color:#660708;
}
</style>

<div class="main-content">
<div class="wrapper">
 <h1>Manage Food</h1>
<br>
 <a href ="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary"> Shto Ushqime</a>
<br>
<br>
  
  <?php
    if(isset($_SESSION['add']))
    {
      echo $_SESSION['add'];
      unset ($_SESSION['add']);          
    }
    if(isset($_SESSION['delete']))
    {
      echo $_SESSION['delete'];
      unset ($_SESSION['delete']);          
    }
  
    if(isset($_SESSION['upload']))
    {
      echo $_SESSION['upload'];
      unset ($_SESSION['upload']);          
    }
    if(isset($_SESSION['update']))
    {
      echo $_SESSION['update'];
      unset ($_SESSION['update']);          
    }
  
  ?>

<br>
 <table class ="tbl-full">  
    <tr>
          <th>Serial Number</th>
          <th>Title</th>
          <th>Price</th>
          <th>Image</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Action</th>
    </tr>
      <?php

        $sql = "SELECT * FROM table_food";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        $sn=1;
        if($count > 0)
        {
          while($row=mysqli_fetch_assoc($res))
          {
            
            $id=$row['id'];
            $title=$row['title'];
            $price=$row['price'];
            $image_name = $row['image_name'];
            $featured = $row['featured'];
            $active=$row['active'];
           ?>
            <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $title; ?></td>
              <td><?php echo $price; ?></td>
              <td><?php
                  if($image_name=="")
                  {
                    echo "Nuk ka foto";
                  }
                  else 
                  {
                    ?>
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"width="150px">
                    <?php
                  }
                  ?>
              </td>
              <td><?php echo $featured; ?></td>
              <td><?php echo $active; ?></td>
            <td>
                  <a href="<?php echo SITEURL;  ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Food </a>
                  <a href="<?php echo SITEURL;  ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-third"> Delete Food </a>
            </td>
    </tr>
           <?php 
          }
        }     
        else 
        {
          echo "<tr><td colspan='7' > Food not added </td> </tr>";
        } 
      ?>
    

    
 </table>

  <div class="cleafix"></div>
</div>
</div>


<?php include ('inc/footer.php') ?>

</body>
</html>