
<?php
 $conn = new mysqli('localhost','root','','ims');
 if($conn->connect_error){
  echo "$conn->connect_error";
  die("Connection Failed : ". $conn->connect_error);
}

$id=$_GET['delid'];


 if($_SERVER['REQUEST_METHOD']== "POST"){

  $productName = $_POST['product_name'];
	$reason = $_POST['reason'];
	$sku = $_POST['sku'];
	$datetime = $_POST['datetime'];

  $stmt = $conn->prepare(" INSERT INTO `deleteproduct`(`product_name`, `reason`, `sku`, `datetime`) VALUES (?,?,?,?)");
       
		$stmt->bind_param("ssss", $productName, $reason, $sku, $datetime);
		$execval = $stmt->execute();
    $sql=mysqli_query($conn,"delete from products where p_id='$id'");

    if($sql)
    {
        echo "<script>alert('Product deleted successfully')</script>";
        echo "<script> document.location='viewproducts.php';</script>";
    }
		$stmt->close();
		$conn->close();
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
   
   <style>
        #otherReasonInput {
            display: none;
            margin-top: 10px;
        }
    </style>
    <script>
        function handleReasonChange() {
            var reasonDropdown = document.getElementById('reasonDropdown');
            var otherReasonInputDiv = document.getElementById('otherReasonInput');
            var otherReasonInput = document.getElementById('otherReason');

            if (reasonDropdown.value === 'Other') {
                otherReasonInputDiv.style.display = 'block';
                otherReasonInput.required = true; // Make the input field required
            } else {
                otherReasonInputDiv.style.display = 'none';
                otherReasonInput.value = ''; // Clear the input field
                otherReasonInput.required = false; // Make the input field not required
            }
        }

        function handleSubmit(event) {
            var reasonDropdown = document.getElementById('reasonDropdown');
            var otherReasonInput = document.getElementById('otherReason');

            if (reasonDropdown.value === 'Other') {
                reasonDropdown.options[reasonDropdown.selectedIndex].value = otherReasonInput.value;
            }
        }
    </script>
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
        <h5 class="card-title">Delete Products</h5>
        <p class="card-text">Here you can delete your products by filling a form for a reason</p>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_products">Delete reason</a>
       
      </div>
    </div>
  </div>


<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Reason Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form  method="post" onsubmit="handleSubmit(event)">
            <?php 
            $conn = new mysqli('localhost','root','','ims');
            if($conn->connect_error){
                echo "$conn->connect_error";
                die("Connection Failed : ". $conn->connect_error);
            }
            $id=$_GET['delid'];
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
  <label for="reasonDropdown">Reason:</label>
        <select id="reasonDropdown" name="reason" onchange="handleReasonChange()" class="form-control">
            <option value="Sold">Sold</option>
            <option value="Damaged">Damaged</option>
            <option value="Lost">Lost</option>
            <option value="Other">Other</option>
        </select>

        <div id="otherReasonInput">
            <label for="otherReason">Other Reason:</label>
            <input type="text" id="otherReason" name="otherReason" class="form-control">
        </div>
    
  </div>
  <div class="form-group">
    <label>Stock Keeping Unit</label>
    <input type="text" class="form-control" value="<?php echo $row['sku']?>"  id="sku" name="sku" aria-describedby="emailHelp" placeholder="Enter SKU" required minlength="8">
    <small id="emailHelp" class="form-text text-muted">Please enter the product's correct SKU</small>
  </div>
  
  <div class="form-group">
  <label for="datetime">Choose Date and Time:</label>
        <input type="datetime-local" id="datetime" name="datetime" required>
  </div>
  
  <?php } ?>
  <button type="submit" class="btn btn-primary">Delete</button>
  
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

