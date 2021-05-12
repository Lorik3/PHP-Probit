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
    <h1>Manage Category</h1>
  
<br><br>
<?php 
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset ($_SESSION['add']);
    }
   
    if(isset($_SESSION['remove']))
    {
        echo $_SESSION['remove'];
        unset ($_SESSION['remove']);
    }
    
    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset ($_SESSION['delete']);
    }

    if(isset($_SESSION['no-category-found']))
    {
        echo $_SESSION['no-category-found'];
        unset ($_SESSION['no-category-found']);
    }
    
    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update'];
        unset ($_SESSION['update']);
    }

    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset ($_SESSION['upload']);
    }

    if(isset($_SESSION['failed']))
    {
        echo $_SESSION['failed'];
        unset ($_SESSION['failed']);
    }
    ?>
    <br><br><br>


 <a href ="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary"> Shto Kategori</a>
<br>
<br>

<br>
 <table class ="tbl-full">  
    <tr>
          <th>Serial Number</th>
          <th>Title</th>
          <th>Image</th>
          <th>Features</th>
          <th>Active</th>
          <th>Action</th>
    </tr>

    <?php 

    $sql = "SELECT * FROM table_category";

    $res =mysqli_query($conn,$sql);

    $count =mysqli_num_rows($res);
    $sn=1;
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
          $id= $row['id'];
          $title= $row['title'];
          $image_name= $row['image_name'];
          $featured= $row['featured'];
          $active= $row['active'];

          ?>
              <tr>
                  <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>

                    <td>
                    <?php 

                      if($image_name!="")
                      {
                          ?>
                          <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;  ?>"width ="150px" >
                          <?php
                      }
                      else
                      {
                        echo "Nuk ka foto";
                      }

                    ?>
                    </td>

                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                          <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary"> Modifiko Kategorin </a>
                          <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-third"> Fshij Kategorin </a>
                  </td>
                 </tr>
               
          <?php

        }
    }
    else 
    {
        ?>

        <tr>
            <td colspan="6">Ska kategori ende</td>
        </tr>
       
        <?php
    }

    ?>


   

    
 </table>


 <div class="cleafix"></div>
 </div>
</div>

<?php include ('inc/footer.php') ?>