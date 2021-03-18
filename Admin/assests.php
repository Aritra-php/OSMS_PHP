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
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>Assests</title>
<!-------------------Start Font Awesome--------------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-------------------End  Font Awesome---------------->
<!---------------------Start Cutom CSS---------------->
<link rel="stylesheet" href="../style.css">
<!---------------------End  Cutom CSS----------------->
</head>
<body>
<!----------------------Start Navbar Code------------------------>
<div class="navbar navbar-expand-md navbar-dark fixed-top pl-5" 
style="background-color:#1e272e;">
<a href="index.php" class="navbar-brand">
<span class="brand">O</span>S<span class="brand">M</span>S</a>
<a href="addproduct.php" class="btn btn-primary btn btn-sm ml-auto">Add Product</a>
</div>
<!----------------------End  Navbar Code------------------------->
<!---------------------Start Container--------------------------->
<div class="container-fluid" style="margin-top:65px;">
<div class="row">
<div class="col-md-2 bg-light sidebar">
<ul class="nav flex-column px-1">
<li class="nav-item"><a href="dashboard.php" class="nav-link" 
style="border-radius:10px;">
<i class="fa fa-user mr-2"></i>Dashboard</a></li>    
<li class="nav-item"><a href="workorder.php" class="nav-link">
<i class="fa fa-user mr-2"></i>Work Order</a></li> 
<li class="nav-item"><a href="assests.php" class="nav-link text-white bg-dark active"
style="border-radius:10px;">
<i class="fa fa-keyboard-o mr-2"></i>Assests</a></li> 
<li class="nav-item"><a href="requestapproval.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Request Approval</a></li> 
<li class="nav-item"><a href="workreport.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Work Report</a></li> 
<li class="nav-item"><a href="sellreport.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Sell Report</a></li> 
<li class="nav-item"><a href="adminpasschange.php" class="nav-link">
<i class="fa fa-key mr-2"></i>Change Password</a></li>
<li class="nav-item"><a href="technician.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Technician</a></li>
<li class="nav-item"><a href="feedbackstore.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Feedback</a></li>  
<li class="nav-item"><a href="../logout.php" class="nav-link">
<i class="fa fa-sign-out mr-2"></i>Logout</a></li>    
</ul>   
</div>
<div class="col-sm-10">
<p class="alert alert-dark bg-dark text-white text-center" style="font-size:18px;">Product Details</p>  
<?php
$sql="SELECT *FROM product_tb";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo'<table class="table table-border table table-responsive">';
echo'<tr>';
echo'<thead class="text-center">';
echo"<th>Product Name</th>";
echo"<th>Date</th>";
echo"<th>Stock</th>";
echo"<th>Cost Price</th>";
echo"<th>Selling Price</th>";
echo"<th>Product Image</th>";
echo"<th>Product ISBN No</th>";
echo"<th>Delete</th>";
echo"</thead>";
echo"</tr>";
echo"<tbody>";
while($row=mysqli_fetch_assoc($result))
{
echo'<tr class="text-center">';
echo"<small><td>".$row['pName']."</td></small>";
echo"<td>".$row['pDate']."</td>";
echo"<td>".(--$row['pStock'])."</td>";
echo"<td>".$row['pCostPrice']."</td>";
echo"<td>".$row['pSellPrice']."</td>";
echo'<td><img src="images/'.$row['pImage'].'" style="border-radius:50px; 
heigth:100px; width:100px;"></td>';
echo"<td>".$row['pISBNNo']."</td>";
echo'<td><form action="" method="POST">
<input type="hidden" name="pId" value='.$row['pId'].'>
<input type="submit" class="btn btn-danger btn btn-sm" value="Delete" name="Delete">
</form></td>';
echo"</tr>";
}
echo"</tbody>";
}
else
{
echo '<div class="alert alert-warning mt-2 text-center">Data Not Found</div>';
}
?>
</div>
</div> 
</div> 
<!-------------------------End First Column-------------------->
<!-------------------------Start Second Column----------------->
<!---------------------End  Container-------------------------->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<!----------------------------End User Profile Form---------------->
<!----------------------------Start PHP Code For Delete Assests--------->
<?php
if(isset($_REQUEST['Delete']))
{
$pId=$_REQUEST['pId'];
$sql1="SELECT *FROM product_tb WHERE pId='".$pId."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$del_img=$row['pImage'];
unlink("images/".$del_img);
$sql="DELETE FROM product_tb WHERE pId='".$pId."'";
if(mysqli_query($conn,$sql))
{
echo'<script>location.href="assests.php"</script>';
}
}
?>
<!----------------------------End PHP Code For Delete Assests--------->