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
<!---------------------------Start User Profile Form--------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>Work Report</title>
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
<li class="nav-item"><a href="dashboard.php" class="nav-link">
<i class="fa fa-user mr-2"></i>Dashboard</a></li>    
<li class="nav-item"><a href="workorder.php" class="nav-link">
<i class="fa fa-user mr-2"></i>Work Order</a></li> 
<li class="nav-item"><a href="assests.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Assests</a></li> 
<li class="nav-item"><a href="requestapproval.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Request Approval</a></li> 
<li class="nav-item"><a href="workreport.php" class="nav-link text-white bg-dark active" style="border-radius:10px;">
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
<!-------------------------Start Second  Column----------------> 
<div class="col-sm-10">
<p class="alert alert-dark bg-dark text-white text-center" style="font-size:18px;">Work Report</p>
<form action="" method="POST">
<div class="row" style="margin-left:20px;">
<div class="col-sm-3">
<div class="form-group">
<input type="date" class="form-control" name="sDate">   
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<input type="date" class="form-control" name="eDate">   
</div>
</div>
<div class="col-sm-3">
<input type="submit" class="btn btn-info btn btn-sm" value="Search" name="Search">    
</div>
</div>
<?php
if(isset($_REQUEST['Search']))
{
if(($_REQUEST['sDate']=="")||($_REQUEST['eDate']==""))
{
echo'<div class="alert alert-warning mt-2 col-sm-4 offset-sm-1 text-center">Please Fill all The Fields</div>';
}
else
{
$sDate=$_REQUEST['sDate'];
$eDate=$_REQUEST['eDate'];
if($sDate<$eDate)
{
$sql="SELECT *FROM assignwork_tb WHERE rDate BETWEEN '".$sDate."' AND '".$eDate."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo'<table class="table table-bordered table-responsive">';
echo'<tr style="font-size:15px;">';
echo'<th>Customer Name</th>';
echo'<th>Customer Mobile</th>';
echo'<th>Technician Name</th>';
echo'<th>Faulty Product Name</th>';
echo'<th>Date of Assign</th>';
echo'<th>Customer Email</th>';
echo'<th>Customer Address</th>';
echo'<th>State</th>';
echo'</tr>';
echo'<tbody>';
while($row=mysqli_fetch_assoc($result))
{
echo'<tr style="font-size:15px;">';
echo"<td>".$row['rName']."</td>";
echo"<td>".$row['rPhone']."</td>";
echo"<td>".$row['rTechnician']."</td>";
echo"<td>".$row['rProName']."</td>";
echo"<td>".$row['rDate']."</td>";
echo"<td>".$row['rEmail']."</td>";
echo"<td>".$row['rCity']."</td>";
echo"<td>".$row['rState']."</td>";
echo'</tr>';
}
echo'</tbody>';
echo'</table>';  
}
else
{
echo'<div class="alert alert-warning mt-2 col-sm-4 offset-sm-1 text-center">Data Not Found</div>';
}    
}
else
{
echo'<div class="alert alert-warning mt-2 col-sm-4 offset-sm-1 text-center">Start Date Must Be Greater Then End Date</div>';
}
}
}
?>
</form>
</div>
<!-------------------------End Second Column-------------------> 
</div>
</div>
<!---------------------End  Container-------------------------->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<!----------------------------End User Profile Form---------------->
