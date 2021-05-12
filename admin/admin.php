<?php include ('inc/menu.php'); ?>


<div class="main-content">
<div class="wrapper">
 <h1>DASHBOARD</h1>
<br><br>
<?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset ($_SESSION['login']);
        }

    ?>
    <br>
 

 <div class="col-4">
 <?php 
      $sql = "SELECT *  FROM table_category";
      $res = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($res);
 
?>
    <h1><?php echo $count;?></h1>
    <br>
    Category

 </div>

 <div class="col-4">
 <?php 
      $sql2 = "SELECT *  FROM table_category";
      $res2 = mysqli_query($conn,$sql2);
      $count2 = mysqli_num_rows($res2);
 
?>
    <h1><?php echo $count2;?></h1>
    <br>
    Ushqimet

 </div>

 <div class="col-4">
 <?php 
      $sql3 = "SELECT *  FROM table_category";
      $res3 = mysqli_query($conn,$sql3);
      $count3 = mysqli_num_rows($res3);
 
?>
    <h1><?php echo $count3;?></h1>
    <br>
    Porosit Totale

 </div>

 

  <div class="cleafix"></div>
</div>
</div>


<?php include ('inc/footer.php') ?>
</body>
</html>