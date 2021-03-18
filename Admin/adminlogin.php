<!------------------Start PHP Code For User Login----------------->
<?php
include('../dbconnection.php');
session_start();
if(!isset($_SESSION['alogin']))
{
if(isset($_REQUEST['aLogin']))
{
if(($_REQUEST['aEmail']=="")||($_REQUEST['aPass']==""))
{
$msg='<div class="alert alert-dark mt-3 text-center">Please Fill all The Fields</div>';
}
else
{
$aEmail=$_REQUEST['aEmail'];
$aPass=$_REQUEST['aPass'];
$sql="SELECT aEmail,aPass FROM adminlogin_tb WHERE aEmail='".$aEmail."'
AND aPass='".$aPass."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$_SESSION['aEmail']=$aEmail;
$_SESSION['alogin']=true;
echo'<script>location.href="dashboard.php"</script>';
}
else
{
$msg='<div class="alert alert-danger mt-3 text-center">Email and Password is Not Valid</div>';
}
}
}
}
else
{
echo'<script>location.href="dashboard.php"</script>';   
}
?>
<!------------------End PHP Code For User Login----------------->

<!---------------------Start User Login Form--------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>AdminLogin</title>
<!-------------------Start Font Awesome--------------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-------------------End  Font Awesome---------------->
</head>
<body>
<!------------------------Start Container-------------------->
<div class="container-fluid mt-5">
<h4><i class="fa fa-stethoscope text-danger mr-2" style="padding-left:460px;"></i>Online Service Management System</h4>
<h5 class="text-center mt-5">
<i class="fa fa-user text-center mr-2 text-danger"></i>Admin Login</h5>
<div class="row">
<div class="col-sm-4 offset-sm-4 mt-3">
<form action="" method="POST" class="shadow-lg p-4">
<div class="form-group">
<i class="fa fa-keyboard-o text-primary"></i>
<label for="Email">Email</label>  
<input type="text" class="form-control" placeholder="Type Your Email Here"
name="aEmail"> 
<small class="font-italic">We'll Never Share Your Email With Anyone else</small> 
</div>
<div class="form-group">
<i class="fa fa-key text-primary"></i>
<label for="Password">Password</label>  
<input type="password" class="form-control" placeholder="Type Your Password Here"
name="aPass">  
<small class="font-italic">We'll Never Share Your Password  With Anyone else</small> 
<input type="submit" class="btn btn-success btn btn-block mt-4" value="Login" name="aLogin"
style="border-radius:10px;">
<?php if(isset($msg)){echo $msg;}?>
</div>
</form>
<a href="../index.php" class="btn btn-dark" style="margin-left:160px; 
margin-top:10px;">
Back To Home</a>
</div>    
</div>    
</div>
<!------------------------End Container---------------------->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<!-------------------------------End  User Login Form-------------------->