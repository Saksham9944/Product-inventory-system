<div class="modal fade" id="form_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="concat.php" method="post">
  <div class="form-group">
    <label >Category name</label>
    <input type="text" class="form-control" name="cat_name" id="cat_name"   aria-describedby="emailHelp" placeholder="Enter category name" required>
    <small id="cat_error" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label>Parent category</label>

    <select class="form-control" name="category" >
      <option value='0'>Root</option>
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
<option value="<?php echo $cat['cat_name'] ?>"><?php echo $cat['cat_name'] ?></option>
<?php } ?>
    </select>
    
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>