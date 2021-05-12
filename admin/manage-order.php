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
 <h1>Manage Order</h1>
 <table class ="tbl-full">  
    <tr>
          <th>Serial Number</th>
          <th>Food</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Total</th>
          <th>Order Date</th>
          <th>Status</th>
          <th>Costumer Name</th>
          <th>Costumer Contact</th>
          <th>Email</th>
          <th>Adress</th>
          
          
    </tr>

<?php
  $sql = "SELECT * FROM table_order ORDER BY id DESC" ;
  $res = mysqli_query($conn,$sql);
  $count = mysqli_num_rows($res);
  $sn = 1;
  if($count > 0)
  {
    while ($row=mysqli_fetch_assoc($res))
    {
       $id = $row['id'];
       $food = $row['food'];
       $price = $row['price'];
       $qty = $row['qty'];
       $total = $row['total'];
       $order_date = $row['order_date'];
       $status = $row['status'];
       $customer_name = $row['customer_name'];
       $customer_contact = $row['customer_contact'];
       $customer_email = $row['customer_email'];
       $customer_address = $row['customer_address'];
      ?>
         <tr>
            <td><?php echo $sn++; ?>.</td>
            <td><?php echo $food ?></td>
            <td><?php echo $price ?></td>
            <td><?php echo $qty ?></td>
            <td><?php echo $total ?></td>
            <td><?php echo $order_date ?></td>
            <td><?php echo $status ?></td>
            <td><?php echo $customer_name ?></td>
            <td><?php echo $customer_contact ?></td>
            <td><?php echo $customer_email ?></td>
            <td><?php echo $customer_address ?></td>
            
           
    </tr>
      <?php
    }
  }
  else 
  {
    echo "Ska Porosi";
  }
?>
   

   
 </table>
 

  <div class="cleafix"></div>
</div>
</div>


<?php include ('inc/footer.php') ?>

</body>
</html>