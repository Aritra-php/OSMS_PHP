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
<title>Technician</title>
<!-------------------Start Font Awesome--------------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-------------------End  Font Awesome---------------->
<!---------------------Start Cutom CSS---------------->
<link rel="stylesheet" href="../style.css">
<!---------------------End  Cutom CSS----------------->
<style>
span
{
color:red;
font-weight:bold;
}    
</style>
</head>
<body>
<!----------------------Start Navbar Code------------------------>
<div class="navbar navbar-expand-md navbar-dark fixed-top pl-5" 
style="background-color:#1e272e;">
<a href="index.php" class="navbar-brand">
<span class="brand">O</span>S<span class="brand">M</span>S</a>
<a href="addtechnician.php" class="btn btn-danger btn btn-sm ml-auto">Add Technician</a>
</div>
<!----------------------End  Navbar Code------------------------->
<!---------------------Start Container--------------------------->
<div class="container-fluid" style="margin-top:65px;">
<div class="row">
<div class="col-md-2 bg-light sidebar">
<ul class="nav flex-column px-1">
<li class="nav-item"><a href="dashboard.php" class="nav-link">
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
<li class="nav-item"><a href="technician.php" class="nav-link text-white bg-dark active" style="border-radius:10px;">
<i class="fa fa-keyboard-o mr-2"></i>Technician</a></li>
<li class="nav-item"><a href="feedbackstore.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Feedback</a></li>  
<li class="nav-item"><a href="../logout.php" class="nav-link">
<i class="fa fa-sign-out mr-2"></i>Logout</a></li>    
</ul>   
</div>
<!-------------------------End First Column-------------------->  
<!-------------------------Start Second Column----------------->
<div class="col-md-10">
<?php
$sql="SELECT *FROM technician_tb";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo'<div class="row">';
while($row=mysqli_fetch_assoc($result))
{
echo'<div class="col-md-4">';
echo'<div class="card mb-5">';
echo'<div class="card-header bg-secondary text-white">
Technician Id: &nbsp;'.$row['tId'].'</div>';
echo'<div class="card-body"><span>Name:</span>'.$row['tName'].'</div>';
echo'<div class="card-body"><span>Email</span>:'.$row['tEmail'].'</div>';
echo'<div class="card-body"><span>City</span>:'.$row['tCity'].'</div>';
echo'<div class="card-body"><span>Qualification</span>:'.$row['tQualification'].'</div>';
echo'<div class="card-body"><span>Contact</span>:'.$row['tContact'].'</div>';
echo'<div class="card-body"><span>Exertize:</span>:'.$row['tExpertize'].'</div>';
echo'<div class="card-footer form-inline">
<form action="" method="POST">
<input type="hidden" name="tId" value='.$row['tId'].'>
<input type="submit" class="btn btn-danger btn btn-sm" value="Delete" name="Delete"></form>
<form action="EditUpdateTech.php" method="POST">
<input type="hidden" name="tId" value='.$row['tId'].'>
<input type="submit" class="btn btn-success btn btn-sm float-left mr-3 ml-3" value="Edit" name="Edit"></form>';
echo'</div>';
echo'</div>';
echo'</div>';
}
}
else
{
echo'<div class="alert alert-warning col-sm-10 mt-2">No Technician Found</div>';
}
?>
</div>
<!-------------------------End  Second Column----------------->
</div> 
</div> 
<!---------------------End  Container-------------------------->
<!---------------------Start PHP Code For Delete Technician------------>
<?php
if(isset($_REQUEST['Delete']))
{
$tId=$_REQUEST['tId'];
$sql="DELETE FROM technician_tb WHERE tId='".$tId."'";
if(mysqli_query($conn,$sql))
{
echo'<script>location.href="technician.php"</script>';
}
}
?>
<!---------------------End  PHP Code For Delete Technician------------->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<!----------------------------End User Profile Form---------------->
