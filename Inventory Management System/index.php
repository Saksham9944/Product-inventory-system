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
    .welcome
    {
      text-align:center;
      display:flex;
      justify-content:center;
      align-items:center;
      flex-direction: column;
    }
    .welcome h1
    {
      color:green;
    }
    .welcome p{
      width: 30rem;
      color:black;
    }
   </style>
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="#">
    <img src="https://cdn-icons-png.flaticon.com/512/7656/7656409.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Product Inventory Management System
  </a>
</nav>

<div class="jumbotron welcome">
    <h1>WELCOME TO INVENTORY SYSTEM!</h1>
    <p>This is a product inventory management system where you can able to add your products according to their categories and manage thier stocks according to the requirement</p>
</div>


<div class="container">
<div class="row">
  <div class="col-sm-4 " >
    <div class="card" >
      <div class="card-body" >
        <h5 class="card-title">Categories</h5>
        <p class="card-text">Here you can add new categories for your Products that you want to keep in stock.</p>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_category">Add</a>
        <!-- <a href="#" class="btn btn-primary">Manage</a> -->
      </div>
    </div>
  </div>
 
 

  <div class="col-sm-4">
    <div class="card" >
      <div class="card-body">
        <h5 class="card-title">Products</h5>
        <p class="card-text">Here you can add new products and also you can manage your products. </p>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#form_products">Add</a>
        <a href="viewproducts.php" class="btn btn-primary">Manage</a>
      </div>
    </div>
  </div>

 
  <div class="col-sm-4 " >
    <div class="card" >
      <div class="card-body" >
        <h5 class="card-title">Deleted Products List</h5>
        <p class="card-text">Here you can see your past products that you have deleted.</p>
        <a href="deletedproducts.php" class="btn btn-primary">View</a>
        <!-- <a href="#" class="btn btn-primary">Manage</a> -->
      </div>
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