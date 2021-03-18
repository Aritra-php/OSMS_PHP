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
<!----------------------Start PHP Code For Fetch Data From Database------->
<?php
$sql="SELECT aPass FROM adminlogin_tb WHERE aEmail='".$aEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$aPass=$row['aPass'];
?>
<!----------------------End PHP Code For Fetch Data From Database------->

<!----------------------Start PHP Code For Update Data------------------->
<?php
if(isset($_REQUEST['aUpdate']))
{
if($_REQUEST['aPass']=="")
{
$msg='<div class="alert alert-danger mt-3 text-center">Please Fill all The Fields</div>';
}
else
{
$aPass=$_REQUEST['aPass'];
$sql="UPDATE adminlogin_tb SET aPass='".$aPass."' WHERE aEmail='".$aEmail."'";
if(mysqli_query($conn,$sql))
{
$msg='<div class="alert alert-success mt-3 text-center">Updated Successfully</div>';
}
else
{
$msg='<div class="alert alert-warning mt-3 text-center">Unable To Update</div>';
}
}
}
?>
<!----------------------End PHP Code For Update Data--------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>PassChange</title>
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
<li class="nav-item"><a href="workreport.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Work Report</a></li> 
<li class="nav-item"><a href="sellreport.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Sell Report</a></li> 
<li class="nav-item"><a href="adminpasschange.php" class="nav-link bg-dark text-white" style="border-radius:10px;">
<i class="fa fa-key mr-2"></i>Change Password</a></li>
<li class="nav-item"><a href="technician.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Technician</a></li>
<li class="nav-item"><a href="feedbackstore.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Feedback</a></li>  
<li class="nav-item"><a href="../logout.php" class="nav-link">
<i class="fa fa-sign-out mr-2"></i>Logout</a></li>    
</ul>   
</div> 
<div class="col-sm-4" style="margin-top:20px;">
<form action="" method="POST">
<div class="form-group">
<i class="fa fa-user mr-2"></i>
<label for="Email">Email</label>
<input type="email" class="form-control" value="<?php echo $aEmail; ?>" readonly>   
</div>
<div class="form-group">
<i class="fa fa-keyboard-o mr-2"></i>
<label for="Password">Password</label>
<input type="text" class="form-control" value="<?php echo $aPass; ?>" name="aPass"> 
</div>
<input type="submit" class="btn btn-success btn btn-sm" value="Update" name="aUpdate">
<?php if(isset($msg)){echo $msg;}?>
</form> 
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
