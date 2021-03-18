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
if(isset($_REQUEST['tAdd']))
{
if(($_REQUEST['tName']=="")||($_REQUEST['tAddress']=="")||($_REQUEST['tQualification']=="")||($_REQUEST['tEmail']=="")||empty($_REQUEST['tGender'])||empty($_REQUEST['tCity'])||
($_REQUEST['tContact']=="")||empty($_REQUEST['tExpertize']))
{
$msg='<div class="alert alert-warning mt-2 col-sm-10 text-center">Please Fill All The Fields</div>';
}
else
{
$tName=$_REQUEST['tName'];
$tAddress=$_REQUEST['tAddress'];
$tQualification=$_REQUEST['tQualification'];
$tEmail=$_REQUEST['tEmail'];
$tGender=$_REQUEST['tGender'];
$tCity=$_REQUEST['tCity'];
$tContact=$_REQUEST['tContact'];
$tExpertize=$_REQUEST['tExpertize'];
$Expertize=implode(',',$tExpertize);
$sql="SELECT tEmail FROM technician_tb WHERE tEmail='".$tEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$msg='<div class="alert alert-warning mt-2 col-sm-10 text-center">This Technician Already Added</div>';
}
else
{
$sql="INSERT INTO technician_tb(tName,tAddress,tQualification,tEmail,tGender,tCity,tContact,tExpertize)
VALUES('$tName','$tAddress','$tQualification','$tEmail','$tGender','$tCity','$tContact','$Expertize')";
if(mysqli_query($conn,$sql))
{
$msg='<div class="alert alert-success mt-2 col-sm-10 text-center">Technician Added Succesfully</div>';
}       
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
<title>Add Technician</title>
<style>
.genderbutton
{
display:inline;
}
</style>
</head>
<body>
<div class="container" style="margin-top:20px;">
<div class="row">
<div class="col-sm-5 offset-sm-2">
<div class="jumbotron">
<h3 class="text-center text-danger">Technician Details</h3> 
<form action="" method="POST">
<div class="form-group">
<label for="Name">Name</label>
<input type="text" class="form-control" placeholder="Technician Name" name="tName">    
</div>
<div class="form-group">
<label for="Name">Address</label>
<input type="text" class="form-control" placeholder="Technician Address" name="tAddress">    
</div>
<div class="form-group">
<label for="Name">Qualification</label>
<input type="text" class="form-control" placeholder="Technician Qualification" name="tQualification">    
</div>
<div class="form-group">
<label for="Email">Email</label>
<input type="text" class="form-control" placeholder="Technician Email" name="tEmail">   
</div>
<div class="form-group">
<label for="Gender">Gender</label><br>
Male <input type="radio" class="genderbutton" name="tGender" value="Male">    
Female <input type="radio" class="genderbutton" name="tGender" value="Female">    
</div>
<div class="form-group">
<label for="City">City</label>  
<select name="tCity">
<option value=""></option>
<option value="Durgapur">Durgapur</option>
<option value="Asansol">Asansol</option>
<option value="Ranchi">Ranchi</option>
<option value="Delhi">Delhi</option>
<option value="Mumbai">Mumbai</option>
<option value="Jaipur">Jaipur</option>
<option value="Jharkhand">Jharkhand</option>
</select> 
</div>
<div class="form-group">
<label for="Mobile">Contact</label>
<input type="text" class="form-control" placeholder="Type Contact No" name="tContact">   
</div>
<div class="form-group">
<input type="checkbox" name="tExpertize[]" class="mr-3" value="Fridge">Fridge
<input type="checkbox" name="tExpertize[]" class="mr-3" value="Washing Machine">Washing Machine
<input type="checkbox" name="tExpertize[]" class="mr-3" value="TV">TV
<input type="checkbox" name="tExpertize[]" class="mr-3" value="Laptop">Laptop
</div>
<input type="submit" class="btn btn-dark" value="Add" name="tAdd"><br><br>
<a href="technician.php" 
class="btn btn-primary float-down">Close</a>
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
<!---------------------------End Add Technician Form--------------------->