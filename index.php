<?php $connect = mysqli_connect("localhost","root","","stock"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

</head>
<body style="font-family: Handlee, cursive;">
<nav class="navbar bg-info">
  <div class="container text-center mx-auto">
    <span class="navbar-brand fs-4 mb-0 mx-auto text-light h1 fw-bold text-center"><i class="bi bi-dribbble text-danger fw-bold"></i> Stock</span>
  </div>
</nav>
<div class="container-fluid  bg-dark py-3 text-light">
    <div class="row">
        <div class="col-3 py-3 border border-light border-3 rounded text-light fs-4">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter product name" class="form-control" required >
                </div>
                <div class="mb-3">
                    <label for="brand">Brand Name</label>
                    <input type="text" id="brand" name="brand" placeholder="Enter brandprice name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="price">Product price</label>
                    <input type="number" id="price" name="price" placeholder="Enter product price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for=" discount_price "> discount_price Price </label>
                    <input type="number" id=" discount_price " name="discount_price" placeholder="Enter discount_price price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="discription">Product discription</label>
                    <input type="text" id="discription" name="discription" placeholder="Enter product discription" class="form-control" required>
                </div>
                
                    <input type="submit" name="create" value="Submit" class="btn btn-info w-100">
                
            </form>
        </div>

        <?php 
            if(isset($_POST['create'])){
                $name = $_POST['name'];
                $brand = $_POST['brand'];
                $price = $_POST['price'];
                $discount_price = $_POST['discount_price'];
                $discription = $_POST['discription'];
                
                $query = "insert into products(name,brand,price,discount_price,discription) value('$name','$brand','$price','$discount_price','$discription')";
                $run = mysqli_query($connect,$query);
                if($run){
                    echo "<script>window.open('index.php','_self')</script>";
    
                }
                else{
                    echo "<script>alert('failed')</script>";
                }
    
            }

        ?>

        <div class="col-9 py-3 border border-light border-3 rounded text-light fs-6">
            <table class="table table-bordered table-stripped">
                <tr class="table-info">
                    <th>id</th>
                    <th>Product Name</th>
                    <th>Brand Name</th>
                    <th>Product Price</th>
                    <th>discount_price </th>
                    <th>Product Description</th>
                    <th>Action</th>
                    
                </tr>
                <?php

                    $query = mysqli_query($connect,"select * from products");
                    while($data=mysqli_fetch_array($query)){

                        $id=$data['id'];
                        $name=$data['name'];
                        $brand=$data['brand'];
                        $price=$data['price'];
                        $discount_price=$data['discount_price'];
                        $discription=$data['discription'];
                        echo "
                        <tr>
                            <td>$id</td>
                            <td>$name</td>
                            <td>$brand</td>
                            <td>$price</td>
                            <td>$discount_price</td>
                            <td>$discription</td>
                            <td><a href = 'index.php?id=$id' class='btn btn-danger'><i class='bi bi-trash'></i>Delete</a></td>
                        </tr>
                        ";
                    }

                ?>

            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $run = mysqli_query($connect,"DELETE FROM products WHERE id='$id' ");
        if($run){
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
?>