<?php
  $conn = new mysqli('localhost','root','','ims');
  if($conn->connect_error){
      echo "$conn->connect_error";
      die("Connection Failed : ". $conn->connect_error);
  }

  if($_SERVER['REQUEST_METHOD']== "POST")
  {
    $id=$_GET['id'];
    $productName = $_POST['product_name'];
	$category = $_POST['cat_name'];
	$sku = $_POST['sku'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$description = $_POST['description'];

     $query=mysqli_query($conn,"update products set product_name='$productName',cat_name='$category',sku='$sku',quantity='$quantity',price='$price',description='$description' where p_id='$id'");

     if($query)
     {
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script> document.location='viewproducts.php';</script>";
     }
  }
?>

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
<br><br>

<div class="col-sm-4">
    <div class="card" style="width:20rem;">
      <div class="card-body">
        <h5 class="card-title">Update Products</h5>
        <p class="card-text">Here you can update your products</p>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_products">Update</a>
        
      </div>
    </div>
  </div>

<!-- Products -->
<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form  method="post">
            <?php 
            $conn = new mysqli('localhost','root','','ims');
            if($conn->connect_error){
                echo "$conn->connect_error";
                die("Connection Failed : ". $conn->connect_error);
            }
            $id=$_GET['id'];
             // Database connection
             
	
   
       $query=mysqli_query($conn,"SELECT * FROM products WHERE p_id='$id'");
       while($row=mysqli_fetch_array($query))
       {
         ?>
  <div class="form-group">
    <label>Product name</label>
    <input type="text" class="form-control" value="<?php echo $row['product_name']?>" id="product_name" name="product_name" aria-describedby="emailHelp" placeholder="Enter product name" required>
   
  </div>
  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="cat_name" required>
     
      <?php
	$category = $_POST['cat_name'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','ims');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
  $category= mysqli_query($conn,"SELECT * FROM category");
  while($cat=mysqli_fetch_array($category))
  {
?>
<option value="<?php echo $cat['cat_name']?>"><?php echo $cat['cat_name'] ?></option>
<?php } ?>
    </select>
    <small id="emailHelp" class="form-text text-muted">Please choose correct product category</small>
  </div>
  <div class="form-group">
    <label>Stock Keeping Unit</label>
    <input type="text" class="form-control" value="<?php echo $row['sku']?>"  id="sku" name="sku" aria-describedby="emailHelp" placeholder="Enter SKU" required minlength="8">
    <small id="emailHelp" class="form-text text-muted">Please enter the product's correct SKU</small>
  </div>
  <div class="form-group">
    <label>Quantity</label>
    <input type="number" class="form-control" value="<?php echo $row['quantity']?>"  id="quantity" name="quantity" aria-describedby="emailHelp" placeholder="Enter quantity" required>
    <small id="emailHelp" class="form-text text-muted">Please enter the total calculated quantity if a product is already added</small>
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="number" class="form-control" value="<?php echo $row['price']?>"  id="price" name="price" aria-describedby="emailHelp" placeholder="Enter price" required>
    <small id="emailHelp" class="form-text text-muted">Please enter the total calculated price if a product is already added</small>
  </div>
  <div class="form-group">
    <label>Product description</label>
    <textarea  id="description" name="description" rows="4" cols="50" placeholder="Enter decsription" required>
    <?php echo $row['description']?>
    </textarea>
    
  </div>
  <?php } ?>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
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