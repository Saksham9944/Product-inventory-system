<?php
	$productName = $_POST['product_name'];
	$category = $_POST['cat_name'];
	$sku = $_POST['sku'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$description = $_POST['description'];

	// Database connection
	$conn = new mysqli('localhost','root','','ims');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare(" INSERT INTO `products`(`product_name`, `cat_name`, `sku`, `quantity`, `price`, `description`) VALUES (?,?,?,?,?,?)");
       
		$stmt->bind_param("sssiis", $productName, $category, $sku, $quantity, $price , $description);
		$execval = $stmt->execute();
		echo "<script>alert('Product added successfully')</script>";
        echo "<script> document.location='viewproducts.php';</script>";
		$stmt->close();
		$conn->close();
	}
?>