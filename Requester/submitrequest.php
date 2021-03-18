<?php
include('../dbconnection.php');
session_start();
if(isset($_SESSION['islogin']))
{
$rEmail=$_SESSION['rEmail'];
}
else
{
echo'<script>location.href="requesterlogin.php"</script>';
}
?>
<!----------------------Start PHP Code For Fetch Data From Database------->
<?php
$sql="SELECT *FROM userregistration_tb WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$rImage=$row['rImage'];
$rPass=$row['rPass'];
?>
<!----------------------End PHP Code For Fetch Data From Database------->
<?php
if(isset($_POST['rSubmit']))
{
if(($_REQUEST['rProName']=="")||($_REQUEST['rProDesc']=="")||($_REQUEST['rName']=="")||($_REQUEST['rAddress']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rDate']=="")||($_REQUEST['rCity']=="")||($_REQUEST['rState']=="")||($_REQUEST['rPhone']=="")||($_REQUEST['rPin']=="")||empty($_FILES['pImage']))
{
$msg='<div class="alert alert-danger mt-2 col-sm-5 text-center">Please Fill all The Fields</div>';
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
$iName=$_FILES['pImage']['name'];
$i_tmp_Name=$_FILES['pImage']['tmp_name'];
$ext=explode('.',$iName);
$a=array("jpg","png","jpeg");
if(in_array($ext[1],$a))
{
move_uploaded_file($i_tmp_Name,"images/".$iName);
$sql="INSERT INTO submitrequest_tb
(rProName,rProDesc,rName,rAddress,rEmail,rDate,rCity,rState,rPhone,rPin,pImage)
VALUES('$rProName','$rProDesc','$rName','$rAddress','$rEmail','$rDate','$rCity',
'$rState','$rPhone','$rPin','$iName')";
if(mysqli_query($conn,$sql))
{
$genid=mysqli_insert_id($conn);
$msg='<div class="alert alert-success mt-2 col-sm-5">Request Submited Succesfully</div>';
$_SESSION['myid']=$genid;
echo'<script>location.href="success.php"</script>';
}
}
else
{
$msg='<div class="alert alert-warning mt-2 col-sm-5">Image Extension Not Valid</div>';
}
}
}
?>
<!----------------------------Start User Profile Form-------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>Submit Request</title>
<!-------------------Start Font Awesome--------------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-------------------End  Font Awesome---------------->
<!---------------------Start Cutom CSS---------------->
<link rel="stylesheet" href="../style.css">
<!---------------------End  Cutom CSS----------------->
</head>
<body>
<!----------------------Start Navbar Code------------------------>
<div class="navbar navbar-dark flex-md-nowrap fixed-top pl-5" 
style="background-color:#1e272e;">
<a href="index.php" class="navbar-brand">
<span class="brand">O</span>S<span class="brand">M</span>S</a>
</div>
<!----------------------End  Navbar Code------------------------->
<!---------------------Start Container--------------------------->
<div class="container-fluid" style="margin-top:65px;">
<div class="row">
<div class="col-sm-2 bg-light sidebar">
<div class="sidebar-sticky">
<ul class="nav flex-column">
<img src="<?php echo "../images/".$rImage;?>" class="rounded-circle" style="height:150px; width:150px; margin-bottom:30px;">
<li class="nav-item"><a href="profile.php" class="nav-link">
<i class="fa fa-user mr-2"></i>Profile</a></li>    
<li class="nav-item"><a href="servicestatus.php" class="nav-link">
<i class="fa fa-cogs mr-2"></i>Service Status</a></li> 
<li class="nav-item"><a href="submitrequest.php" class="nav-link bg-dark text-white"
style="border-radius:10px;">
<i class="fa fa-keyboard-o mr-2"></i>Submit Request</a></li> 
<li class="nav-item"><a href="changepass.php" class="nav-link">
<i class="fa fa-key mr-2"></i>Change Password</a></li> 
<li class="nav-item"><a href="feedback.php" class="nav-link">
<i class="fa fa-sign-out mr-2"></i>Feedback</a></li>
<li class="nav-item"><a href="../logout.php" class="nav-link">
<i class="fa fa-sign-out mr-2"></i>Logout</a></li>    
</ul>  
</div> 
</div>
<div class="col-sm-9 mt-3 mb-3">
<form action="" method="POST" class="shadow-lg p-4" enctype="multipart/form-data">
<div class="form-group">
<label for="Faulty Product Name">Product Name</label>
<input type="text" class="form-control" placeholder="Type Your Product Name Here"
name="rProName">    
</div>
<div class="form-group">
<label for="Faulty Product Description">Product Description</label>
<input type="text" class="form-control" placeholder="Write Faulty Product Description"
name="rProDesc">   
</div>
<div class="form-group">
<label for="Name">Name</label>
<input type="text" class="form-control" placeholder="Type Your Name Here"
name="rName">   
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
<label for="Address">Address</label>
<input type="text" class="form-control" placeholder="Type Your Address Here" name="rAddress">   
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="Email">Email</label>
<input type="text" class="form-control" value="<?php echo $rEmail;?>" readonly name="rEmail">   
</div>
</div> 
<div class="col-sm-4">
<div class="form-group">
<label for="Date">Date</label>
<input type="date" class="form-control" name="rDate">    
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="City">City</label>
<input type="text" class="form-control" placeholder="Type Your City Here" name="rCity"> 
</div>
</div> 
<div class="col-sm-6">
<div class="form-group">
<label for="State">State</label>
<input type="text" class="form-control" placeholder="Type Your State Here" name="rState">    
</div>
</div>    
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
<label for="Phone">Phone</label>
<input type="text" class="form-control" placeholder="Enter Your Mobile Number" name="rPhone">   
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="Pin Code">Pin</label>
<input type="text" class="form-control" placeholder="Type Your Pin Code Here"
name="rPin">    
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="Product Image">Product Image</label>
<input type="file" class="form-control" name="pImage" required>   
</div>
</div>
</div>  
<input type="submit" class="btn btn-danger mt-1" value="Submit" name="rSubmit">
<?php if(isset($msg)){echo $msg;}?>
</form>    
</div>
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