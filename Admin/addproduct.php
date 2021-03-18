<?php
include('../dbconnection.php');
session_start();
if(isset($_SESSION['alogin']))
{
$aEmail=$_SESSION['aEmail'];
}
else
{
echo'<script>location.href="adminlogin.php"</script>';
}
?>
<!---------------------------Start PHP Code For Fetch Data---------------->

<!-------------------------Start PHP Code For Store Technician Data-------->
<?php
if(isset($_POST['tAdd']))
{
if(($_POST['pName']=="")||($_POST['pDate']=="")||($_POST['pStock']=="")||($_POST['pCostPrice']=="")||($_POST['pSellPrice']=="")||  ($_POST['cEmail']=="")||empty($_FILES['pImage'])||
($_POST['pISBNNo']==""))
{
$msg='<div class="alert alert-warning mt-2 col-sm-10 text-center">Please Fill All The Fields</div>';
}
else
{
$pName=$_POST['pName'];
$pDate=$_POST['pDate'];
$pStock=$_POST['pStock'];
$pCostPrice=$_POST['pCostPrice'];
$pSellPrice=$_POST['pSellPrice'];
$cEmail=$_POST['cEmail'];
$pISBNNo=$_POST['pISBNNo'];
$iName=$_FILES['pImage']['name'];
$i_tmp_Name=$_FILES['pImage']['tmp_name'];
move_uploaded_file($i_tmp_Name,"images/".$iName);
$sql="INSERT INTO product_tb(pName,pDate,pStock,pCostPrice,pSellPrice,pImage,cEmail,pISBNNo)
VALUES('$pName','$pDate','$pStock','$pCostPrice','$pSellPrice','$iName','$cEmail','$pISBNNo')";
if(mysqli_query($conn,$sql))
{
$msg='<div class="alert alert-success mt-2 col-sm-10 text-center">Product Added Succesfully</div>';
}     
}
}
?>
<!-------------------------End  PHP Code For Store Technician Data--------->

<!---------------------------Start Add Technician Form--------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>Add Product Details</title>
</head>
<body>
<div class="container" style="margin-top:20px;">
<div class="row">
<div class="col-sm-5 offset-sm-2">
<div class="jumbotron">
<h3 class="text-center text-danger">Product Details</h3> 
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="Poduct Name">Product Name</label>
<input type="text" class="form-control" placeholder="Enter Product Name" name="pName">    
</div>
<div class="form-group">
<label for="Date Of Purchase">Date Of Purchase</label>
<input type="date" class="form-control" placeholder="Type Date Of Purchase" name="pDate">    
</div>
<div class="form-group">
<label for="Product Available">Available</label>
<input type="text" class="form-control" placeholder="Product Available" name="pStock">   
</div>
<div class="form-group">
<label for="Cost Price">Cost Price</label>
<input type="text" class="form-control" placeholder="Product Cost" name="pCostPrice">   
</div>
<div class="form-group">
<label for="Selling Price">Selling Price</label>
<input type="text" class="form-control" placeholder="Selling Price" name="pSellPrice">   
</div>
<div class="form-group">
<label for="Customer Email">Customer Email</label>
<input type="text" class="form-control" placeholder="Enter Email" name="cEmail">   
</div>
<div class="form-group">
<label for="Product ISBN No">Produdct ISBN No</label>
<input type="text" class="form-control" placeholder="Enter ISBN No" name="pISBNNo">   
</div>
<div class="form-group">
<label for="Product Image">Product Image</label>
<input type="file" class="form-control" name="pImage" required>   
</div>
<input type="submit" class="btn btn-dark" value="Add" name="tAdd"><br><br>
<a href="assests.php" class="btn btn-primary">Close</a>
<?php if(isset($msg)){echo $msg;}?>
</form>   
</div>    
</div>    
</div>
</div>
 <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<!---------------------------End  Add Technician Form--------------------->