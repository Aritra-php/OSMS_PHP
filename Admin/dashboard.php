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
<!-----------------------Start PHP Code For 1st Card Data-------------------->
<?php
$sql="SELECT *FROM submitrequest_tb";
$result=mysqli_query($conn,$sql);
$count1=mysqli_num_rows($result);
?>
<!-----------------------End  PHP Code For 1st Card Data--------------------->
<!-----------------------Start PHP Code For 2nd Card Data-------------------->
<?php
$sql="SELECT *FROM assignwork_tb";
$result=mysqli_query($conn,$sql);
$count2=mysqli_num_rows($result);
?>
<!-----------------------End  PHP Code For 2nd Card Data--------------------->
<!-----------------------Start PHP Code For 3rd Card Data-------------------->
<?php
$sql="SELECT *FROM technician_tb";
$result=mysqli_query($conn,$sql);
$count3=mysqli_num_rows($result);
?>
<!-----------------------End  PHP Code For 3rd Card Data--------------------->
<!----------------------------Start User Profile Form------------------------>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>Dashboard</title>
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
</div>
<!----------------------End  Navbar Code------------------------->
<!---------------------Start Container--------------------------->
<div class="container-fluid" style="margin-top:65px;">
<div class="row">
<div class="col-md-2 bg-light sidebar">
<ul class="nav flex-column px-1">
<li class="nav-item"><a href="dashboard.php" class="nav-link text-white bg-dark active" style="border-radius:10px;">
<i class="fa fa-user mr-2"></i>Dashboard</a></li>    
<li class="nav-item"><a href="workorder.php" class="nav-link">
<i class="fa fa-user mr-2"></i>Work Order</a></li> 
<li class="nav-item"><a href="assests.php" class="nav-link">
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
<!-------------------------End First Column-------------------->
<!-------------------------Start Second Column----------------->
<div class="col-md-9 mt-2 ml-3">
<div class="row text-center">
<div class="col-sm-4 mt-2">
<div class="card bg-danger text-white" style="width:15rem; height:12rem;">
<div class="card-header">
<small class="card-text" style="font-size:18px;">Request Recieved</small>    
</div>
<div class="card-body">
<h3><?php echo $count1;?></h3> 
<a href="requestapproval.php" class="btn btn-dark btn btn-sm" value="View">View</a>    
</div>    
</div>   
</div>  
<div class="col-md-4 mt-2">
<div class="card bg-info text-white" style="width:15rem; height:12rem;">
<div class="card-header">
<small class="card-text" style="font-size:18px;">Assigned Work</small>  
</div>
<div class="card-body"> 
<h3><?php echo $count2;?></h3> 
<a href="workorder.php" class="btn btn-dark btn btn-sm" value="View">View</a>   
</div>    
</div>  
</div> 
<div class="col-md-4 mt-2">
<div class="card bg-success text-white" style="width:15rem; height:12rem;">
<div class="card-header">
<small class="card-text" style="font-size:18px;">No of Technician</small>    
</div>
<div class="card-body">
<h3><?php echo $count3;?></h3> 
<a href="technician.php" class="btn btn-dark btn btn-sm" value="View">View</a>
</div>    
</div>    
</div>   
</div>
<div class="row">
<div class="col-md-12 mt-5 ml-0">
<p class="alert alert-dark bg-dark text-white text-center" style="font-size:16px;">List of Registered User</p>   
<?php
$sql="SELECT rName,rEmail,rGender FROM userregistration_tb";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo'<table class="table table-border">';
echo'<tr>';
echo'<thead class="text-center">';
echo"<th>Name</th>";
echo"<th>Email</th>";
echo"<th>Gender</th>";
echo"</thead>";
echo"</tr>";
echo"<tbody>";
while($row=mysqli_fetch_assoc($result))
{
echo'<tr class="text-center">';
echo"<small><td>".$row['rName']."</td></small>";
echo"<td>".$row['rEmail']."</td>";
echo"<td>".$row['rGender']."</td>";
echo"</tr>";
}
echo"</tbody>";
}
else
{
$msg='<div class="alert alert-warning mt-2 text-center>Data Not Found</div>';
}
?>
</div>    
</div>
</div> 
</div> 
</div> 
<!-------------------------End Second Column-------------------> 
<!---------------------End  Container-------------------------->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<!----------------------------End User Profile Form---------------->