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
<title>RequestApproval</title>
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
</div>
<!----------------------End  Navbar Code------------------------->
<!---------------------Start Container--------------------------->
<div class="container-fluid" style="margin-top:60px;margin-bottom:30px;">
<div class="row">
<div class="col-md-2 bg-light sidebar">
<ul class="nav flex-column px-1">
<li class="nav-item"><a href="dashboard.php" class="nav-link">
<i class="fa fa-user mr-2"></i>Dashboard</a></li>    
<li class="nav-item"><a href="workorder.php" class="nav-link">
<i class="fa fa-user mr-2"></i>Work Order</a></li> 
<li class="nav-item"><a href="assests.php" class="nav-link">
<i class="fa fa-keyboard-o mr-2"></i>Assests</a></li> 
<li class="nav-item"><a href="requestapproval.php" class="nav-link text-white bg-dark active" style="border-radius:10px;">
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
<!-----------------Start PHP Code For Assign Data With Technician------------------>
<?php
if(isset($_REQUEST['rSubmit']))
{
if(($_REQUEST['rTechnician']==""))
{
$msg='<div class="alert alert-danger mt-2 col-sm-5 text-center">Please Enter Technician Name</div>';
}
else
{
$rProName=$_REQUEST['rProName'];
$rProDesc=$_REQUEST['rProDesc'];
$rName=$_REQUEST['rName'];
$rAddress=$_REQUEST['rAddress'];
$rEmail=$_REQUEST['rEmail'];
$rDate=$_REQUEST['rDate'];
$rCity=$_REQUEST['rCity'];
$rState=$_REQUEST['rState'];
$rPhone=$_REQUEST['rPhone'];
$rPin=$_REQUEST['rPin'];
$rTechnician=$_REQUEST['rTechnician'];
$sql="SELECT rEmail FROM assignwork_tb  WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$msg='<div class="alert alert-danger mt-2 col-sm-5">Already Assigned</div>';
}
else
{
$sql="INSERT INTO assignwork_tb
(rProName,rProDesc,rName,rAddress,rEmail,rDate,rCity,rState,rPhone,rPin,rTechnician)
VALUES('$rProName','$rProDesc','$rName','$rAddress','$rEmail','$rDate','$rCity',
'$rState','$rPhone','$rPin','$rTechnician')";
if(mysqli_query($conn,$sql))
{
$msg='<div class="alert alert-success mt-2 col-sm-5">Work Assigned Succesfully</div>';
}
}
}
}
?>
<!-----------------End PHP Code ForAssign Data With Technician-------------------->
<div class="col-sm-3 mt-3">
<?php
$sql="SELECT *FROM submitrequest_tb";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
echo'<div class="card mb-5">';
echo'<div class="card-header bg-secondary text-white">RequestId: '.$row['rId'].'</div>';
echo'<div class="card-body"><span>Description:<br></span>'.$row['rProDesc'].'</div>';
echo'<div class="card-body"><span>Date</span>:'.$row['rDate'].'</div>';
echo'<div class="card-body"><span>Email</span>:'.$row['rEmail'].'</div>';
echo'<div class="card-footer">
<form action="" method="POST">
<input type="hidden" name="rId" value='.$row['rId'].'>
<input type="submit" class="btn btn-success float-left mr-3" value="Edit" name="Edit">
<input type="submit" class="btn btn-danger" value="Delete" name="Delete"></form></div>';
echo'</div>';
}
?>
</div> 
<div class="col-sm-7 mt-3">
<form action="" method="POST" class="shadow-lg p-4">
<?php
if(isset($_REQUEST['Edit']))  
{
$rId=$_REQUEST['rId'];
$sql="SELECT *FROM submitrequest_tb WHERE rId='".$rId."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
}
?>
<div class="form-group">
<label for="Faulty Product Name">Product Name</label>
<input type="text" class="form-control"
name="rProName" value="<?php if(isset($row['rProName'])){echo $row['rProName'];} ?>" readonly>    
</div>
<div class="form-group">
<label for="Faulty Product Description">Product Description</label>
<input type="text" class="form-control"
name="rProDesc" value="<?php if(isset($row['rProDesc'])){echo $row['rProDesc'];} ?>" readonly>   
</div>
<div class="form-group">
<label for="Name">Name</label>
<input type="text" class="form-control"
name="rName" value="<?php if(isset($row['rName'])){echo $row['rName'];} ?>" readonly>   
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
<label for="Address">Address</label>
<input type="text" class="form-control" name="rAddress" value="<?php if(isset($row['rAddress'])){echo $row['rAddress'];} ?>" readonly>   
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="Email">Email</label>
<input type="text" class="form-control"  name="rEmail" value="<?php if(isset($row['rEmail'])){echo $row['rEmail'];} ?>" readonly>   
</div>
</div> 
<div class="col-sm-4">
<div class="form-group">
<label for="Date">Date</label>
<input type="date" class="form-control" name="rDate" 
value="<?php if(isset($row['rDate'])){echo $row['rDate'];} ?>" readonly>    
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="City">City</label>
<input type="text" class="form-control" name="rCity"
value="<?php if(isset($row['rCity'])){echo $row['rCity'];} ?>" readonly> 
</div>
</div> 
<div class="col-sm-6">
<div class="form-group">
<label for="State">State</label>
<input type="text" class="form-control" name="rState" value="<?php if(isset($row['rState'])){echo $row['rState'];} ?>" readonly> 
</div>
</div>    
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
<label for="Phone">Phone</label>
<input type="text" class="form-control" name="rPhone"
value="<?php if(isset($row['rPhone'])){echo $row['rPhone'];} ?>" readonly> 
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="Pin Code">Pin</label>
<input type="text" class="form-control"
name="rPin" value="<?php if(isset($row['rPin'])){echo $row['rPin'];} ?>" readonly>    
</div>
</div> 
<div class="col-sm-4">
<div class="form-group">
<label for="Techncian">Technician</label>
<input type="text" class="form-control" placeholder="Type Technician Name" name="rTechnician"> 
</div>
</div> 
</div>
<input type="submit" class="btn btn-info mt-1" value="Assign Work" name="rSubmit" style="border-radius:10px;">
<?php if(isset($msg)){echo $msg;}?>
</form>    
</div>
</div> 
</div> 
<!-------------------------End First Column-------------------->
<!-------------------------Start Second Column----------------->
<!----------------------------End Container-------------------->
<!---------------------------Start PHP Code For Delete--------->
<?php
if(isset($_REQUEST['Delete']))
{
$rId=$_REQUEST['rId'];
$sql="DELETE FROM submitrequest_tb WHERE rId='".$rId."'";
if(mysqli_query($conn,$sql))
{
echo'<script>location.href="requestapproval.php"</script>';
}
$sql="DELETE FROM assignwork_tb WHERE rId='".$rId."'";
if(mysqli_query($conn,$sql))
{
echo'<script>location.href="requestapproval.php"</script>';
}
}
?>
<!---------------------------Start PHP Code For Delete--------->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<!----------------------------End User Profile Form---------------->
