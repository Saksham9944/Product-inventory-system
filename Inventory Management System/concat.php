<?php
	$category = $_POST['cat_name'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','ims');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO `category`(`cat_name`) VALUES (?)");
        
		$stmt->bind_param("s", $category);
		$execval = $stmt->execute();
		
		echo "<script>alert('Category added successfully')</script>";
        echo "<script> document.location='index.php';</script>";
		$stmt->close();
		$conn->close();
	}
?>