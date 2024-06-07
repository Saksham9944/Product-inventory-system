<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory Management System</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://kit.fontawesome.com/db669c5823.js" crossorigin="anonymous"></script>
   
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="#">
    <img src="https://cdn-icons-png.flaticon.com/512/7656/7656409.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Product Inventory Management System
  </a>
</nav>
<br> <br>

<div class="container">
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">P_id</th>
      <th scope="col">Product name</th>
      <th scope="col">Cat_name</th>
      <th scope="col">SKU</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    
    <?php

	// Database connection
	$conn = new mysqli('localhost','root','','ims');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
    $fetch = mysqli_query($conn,"SELECT * FROM products");
    
        while($r=mysqli_fetch_array($fetch))
        {
            ?>
            <tr>
                <td><?php echo $r['p_id']?></td>
                <td><?php echo $r['product_name']?></td>
                <td><?php echo $r['cat_name']?></td>
                <td><?php echo $r['sku']?></td>
                <td><?php echo $r['quantity']?></td>
                <td><?php echo $r['price']?></td>
                <td><?php echo $r['description']?></td>
                <td><a href="update.php?id=<?php echo $r['p_id'] ?>" class="btn btn-info btn-sm">Edit</a>
                <a href="delete.php?delid=<?php echo $r['p_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                
                </td>
            </tr>
            <?php
        }
    
  ?>
  </tbody>
</table>
</div>

<?php 
// products
include_once("products.php");
?>
<?php 
// category
include_once("category.php");
?>

<script type="text/javascript" src="script.js"></script>
</body>
</html>