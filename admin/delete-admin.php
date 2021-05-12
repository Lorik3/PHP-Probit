<?php 
    include ('../config/constants.php');
  $id = $_GET['id'];

  $sql = "DELETE FROM table_admin WHERE id=$id";

  $res = mysqli_query($conn, $sql);

  if ($res)
  {
      $_SESSION['delete'] = "Admini u fshi me sukses ";
      header('Location:'.SITEURL.'admin/manage-admin.php');
      
  }
  else 
  {
      $_SESSION['delete'] = "<div class='text'>Admini nuk eshte fshir</div> ";
  }
?>