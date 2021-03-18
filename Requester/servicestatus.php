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
<!----------------------------Start User Profile Form-------------------->

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>Service Status</title>
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
<div class="col-sm-2 bg-light sidebar d-print-none">
<div class="sidebar-sticky">
<ul class="nav flex-column">
<img src="<?php echo "../images/".$rImage;?>" class="rounded-circle" style="height:150px; width:150px; margin-bottom:30px;">
<li class="nav-item"><a href="profile.php" class="nav-link" style="border-radius:10px;">
<i class="fa fa-user mr-2"></i>Profile</a></li>    
<li class="nav-item"><a href="servicestatus.php" class="nav-link bg-dark text-white"
style="border-radius:10px;">
<i class="fa fa-cogs mr-2"></i>Service Status</a></li> 
<li class="nav-item"><a href="submitrequest.php" class="nav-link">
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
<div class="col-sm-4 d-print-none">
<form action="" method="POST">
<div class="form-group mt-2">
<i class="fa fa-user mr-2"></i>
<label for="CheckStatus">Enter Email</label>
<input type="email" class="form-control d-print-none" name="rEmail" 
placeholder="Type Your Email Here" readonly value="<?php echo $rEmail;?>">   
</div>
<input type="submit" class="btn btn-warning btn btn-sm d-print-none" value="Check" name="rCheck">
</form>  
</div>
<div class="row">
<div class="col-sm-10 offset-sm-4 mt-4">
<?php
if(isset($_REQUEST['rCheck']))
{
$sql="SELECT *FROM assignwork_tb WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$row=mysqli_fetch_assoc($result);
echo'<table class="table table-bordered">';
echo'<p class="alert alert-success text-center d-print-none">Congratulation Your Work Assigned Succesfully.</p>';
echo"<tr>";
echo"<thead>";
echo"<th>Product Name</th>";
echo"<td>".$row['rProName']."</td>";
echo"</thead>";
echo"</tr>";
echo"<tr>";
echo"<thead>";
echo"<th>Product Description</th>";
echo"<td>".$row['rProDesc']."</td>";
echo"</thead>";
echo"</tr>";
echo"<tr>";
echo"<thead>";
echo"<th>Name</th>";
echo"<td>".$row['rName']."</td>";
echo"</thead>";
echo"</tr>";
echo"<tr>";
echo"<thead>";
echo"<th>Email</th>";
echo"<td>".$row['rEmail']."</td>";
echo"</thead>";
echo"</tr>";
echo"<tr>";
echo"<thead>";
echo"<th>Date Of Assign</th>";
echo"<td>".$row['rDate']."</td>";
echo"</thead>";
echo"</tr>";
echo"<tr>";
echo"<thead>";
echo"<th>Phone</th>";
echo"<td>".$row['rPhone']."</td>";
echo"</thead>";
echo"</tr>";
echo"<tr>";
echo"<thead>";
echo"<th>Technician Assigned</th>";
echo"<td>".$row['rTechnician']."</td>";
echo"</thead>";
echo"</tr>";
echo'</table>';
echo'<input type="submit" class="btn btn-success d-print-none" onclick="window.print()" value="Print">';
}
else
{
echo'<div class="alert alert-dark text-center d-print-none">Your Request Have Not Assigned Yet!!!</div>';
}
}
?>
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
<!----------------------------End User Profile Form---------------->