<!------------------Start PHP Code For User Registration----------------->
<?php
include('dbconnection.php');
if(isset($_REQUEST['rRegister']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rPass']=="")
||($_REQUEST['rConPass']=="")||empty($_REQUEST['rGender'])||empty($_FILES['rImage']))
{
$msg='<div class="alert alert-warning mt-3 text-center">Please Fill all The Fields</div>';
}
else
{
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rPass=$_REQUEST['rPass'];
$rConPass=$_REQUEST['rConPass'];
$rGender=$_REQUEST['rGender'];
$rImage=$_FILES['rImage']['name'];
$tmp_name=$_FILES['rImage']['tmp_name'];
$ext=explode('.',$rImage);
$a=array("jpg","png","jpeg");
if(in_array($ext[1],$a))
{
move_uploaded_file($tmp_name,"images/".$rImage);
$sql="SELECT rEmail FROM userregistration_tb WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$msg='<div class="alert alert-warning mt-3 text-center">Email Already Registered</div>';
}
else
{
if($rPass==$rConPass)
{
$sql="INSERT INTO userregistration_tb(rName,rEmail,rPass,rConPass,rGender,rImage) VALUES('$rName','$rEmail','$rPass','$rConPass','$rGender','$rImage')";
if(mysqli_query($conn,$sql))
{
$msg='<div class="alert alert-success mt-3 text-center">Registration Succesfully</div>';
}
}
else
{
$msg='<div class="alert alert-warning mt-3 text-center"><small>Password And Confirm Password Must Be Same</small></div>';
}
}
}     
else
{
$msg='<div class="alert alert-warning mt-3 text-center">Image Extension is Not Valid</div>';
}
}
}
?>
<!------------------End PHP Code For User Registration----------------->

<!------------------Start User Registration Form----------------------->
<div class="container-fluid mt-5">
<h2 class="text-center">Registration</h2>
<div class="row">
<div class="col-lg-4 offset-lg-4">
<form action="" method="POST" class="shadow-lg p-4" enctype="multipart/form-data">
<div class="form-group">
<i class="fa fa-user text-primary"></i>
<label for="Name">Name</label>  
<input type="text" class="form-control" placeholder="Type Your Name Here"
name="rName">  
</div>
<div class="form-group">
<i class="fa fa-keyboard-o text-primary"></i>
<label for="Email">Email</label>  
<input type="text" class="form-control" placeholder="Type Your Email Here"
name="rEmail">  
<small class="font-italic">We'll Never Share Your Email With Anyone else</small> 
</div>
<div class="form-group">
<i class="fa fa-key text-primary"></i>
<label for="Password">Password</label>  
<input type="password" class="form-control" placeholder="Type Your Password Here"
name="rPass">
<small class="font-italic">We'll Never Share Your Password With Anyone else</small>   
</div>
<div class="form-group">
<i class="fa fa-key text-primary"></i>
<label for="Confirm Password">Confirm Password</label>  
<input type="password" class="form-control" placeholder="Type Your Password Again"
name="rConPass">  
<small class="font-italic">We'll Never Share Your Password With Anyone else</small> 
</div>
<div class="form-group">
<i class="fa fa-user text-primary"></i>
<label for="Gender">Gender</label><br>
Male<input type="radio" name="rGender" class="inline ml-2" value="Male">    
Female<input type="radio" name="rGender" class="inline ml-2" value="Female">    
</div>
<div class="form-group">
<label for="Profile Image">Profile Image</label>
<input type="file" name="rImage" required>   
</div>
<input type="submit" class="btn btn-success btn btn-block" value="Register" name="rRegister">
<small class="font-italic">Make Sure you Accept Our Terms And Cookie Policies</small> 
<?php if(isset($msg)){echo $msg;}?>
</form>
</div>    
</div>    
</div>
<!------------------End  User Registration Form----------------------->