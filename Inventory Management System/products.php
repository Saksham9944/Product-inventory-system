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
        <form action="connproducts.php" method="post">
  <div class="form-group">
    <label>Product name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="emailHelp" placeholder="Enter product name" required>
   
  </div>
  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="cat_name" required>
      <option value='0'>Choose category</option>
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
<option value="<?php echo $cat['cat_name'] ?>" ><?php echo $cat['cat_name'] ?></option>
<?php } ?>
    </select>
    <small id="emailHelp" class="form-text text-muted">Please choose correct product category</small>
  </div>
  <div class="form-group">
    <label>Stock Keeping Unit</label>
    <input type="text" class="form-control" id="sku" name="sku" aria-describedby="emailHelp" placeholder="Enter SKU" required minlength="8">
    <small id="emailHelp" class="form-text text-muted">Please enter the product's correct SKU</small>
  </div>
  <div class="form-group">
    <label>Quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity" aria-describedby="emailHelp" placeholder="Enter quantity" required>
    <small id="emailHelp" class="form-text text-muted">Please enter the total calculated quantity if a product is already added</small>
  </div>
  <div class="form-group">
    <label>Price</label>
    <input type="number" class="form-control" id="price" name="price" aria-describedby="emailHelp" placeholder="Enter price" required>
    <small id="emailHelp" class="form-text text-muted">Please enter the total calculated price if a product is already added</small>
  </div>
  <div class="form-group">
    <label>Product description</label>
    <textarea id="description" name="description" rows="4" cols="50" placeholder="Enter decsription" required>
    </textarea>
    
  </div>
  <button type="submit" class="btn btn-primary">Add Product</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>