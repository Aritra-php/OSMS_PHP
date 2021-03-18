<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>www.osms.com</title>
</head>
<!-------------------Start Font Awesome--------------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-------------------End  Font Awesome---------------->
<!---------------------Start Cutom CSS---------------->
<link rel="stylesheet" href="style.css">
<!---------------------End  Cutom CSS----------------->
<body>
<!---------------Start Navbar Code------------------>
<div class="navbar navbar-expand-lg navbar-dark fixed-top pl-5" 
style="background-color:#1e272e;">
<a href="index.php" class="navbar-brand">
<span class="brand">O</span>S<span class="brand">M</span>S</a>
<span class="navbar-text text-white">Customer Hapiness is Our Aim</span> 
<button type="button" class="navbar-toggler" data-toggle="collapse" 
data-target="#myMenu">
<span class="navbar-toggler-icon"></span>
</button> 
<div class="collapse navbar-collapse" id="myMenu">
<ul class="navbar-nav ml-auto">
<li class="nav-item"><a href="" class="nav-link text-white">Home</a></li>
<li class="nav-item"><a href="" class="nav-link text-white">About</a></li>
<li class="nav-item"><a href="" class="nav-link text-white">Services</a></li>
<li class="nav-item"><a href="" class="nav-link text-white">Registration</a></li>
<li class="nav-item"><a href="Requester/requesterlogin.php" class="nav-link text-white">Login</a></li>
<li class="nav-item"><a href="" class="nav-link text-white">Contact</a></li>
</ul> 
</div> 
</div>
<!---------------End  Navbar Code-------------------->
<!---------------Start Header Image------------------>
<div class="container-fluid back-image">
<div style="padding-top:120px; padding-left:20px;">
<h3><span class="brand">O</span>S<span class="brand">M</span>S</h3>
<big class="font-italic">Customer's Hapiness is Our Aim</big> <br><br>
<a href="" class="btn btn-dark mr-3">Register</a>
<a href="Requester/requesterlogin.php" class="btn btn-primary">Login</a>
</div>   
</div> 
<!---------------End  Header Image------------------->
<!---------------Start Stylish Footer------------------>
<div class="footer hide" style="height:auto; background-color:#ff3838;">
<div class="container">
<div class="row text-center">
<div class="col-sm-3">
<h5 class="text-white"> <i class="fa fa-keyboard-o mr-3 pt-2"></i> Online Booking</h5>
</div> 
<div class="col-sm-3">
<h5 class="text-white"><i class="fa fa-truck mr-2 mr-3 pt-2"></i>Quick Delivery</h5> 
</div> 
<div class="col-sm-3">
<h5 class="text-white"><i class="fa fa-dollar mr-3  pt-2"></i>Refund Guranteed</h5> 
</div> 
<div class="col-sm-3">
<h5 class="text-white"><i class="fa fa-user mr-3  pt-2"></i>Expert Technician</h5> 
</div>    
</div>    
</div> 
</div>
<!---------------End Stylish Footer------------------>
<!---------------Start OSMS Services----------------->
<div class="container mt-5">
<div class="jumbotron">
<h3 class="text-center">About Us</h3>
<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, ducimus, cumque? Saepe aliquam aut repellendus in hic inventore fuga, ullam corporis ad. Doloribus necessitatibus, vel dignissimos deserunt laudantium reprehenderit ad quos numquam pariatur maiores magnam doloremque et adipisci, nemo animi illo possimus? Fugit vero rem necessitatibus culpa nam, tempora aliquid, optio praesentium dignissimos minus cumque voluptates, suscipit labore vitae. Consectetur ab, deleniti, id reiciendis minima doloremque nihil saepe. Nostrum molestiae, aperiam perspiciatis mollitia aspernatur est impedit veniam error omnis deleniti magnam autem, unde, cumque dolore laborum, et animi rerum facere saepe! At culpa doloribus totam! Aspernatur accusamus soluta ullam incidunt.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque dicta quidem repudiandae velit ullam laudantium nulla maiores illum delectus dolorem. Ad asperiores sit dicta quas, nisi ab temporibus voluptate voluptas.
</p>  
</div>  
</div>
<!---------------End  OSMS Services------------------->
<!---------------Start Our Services Section----------->
<div class="container-fluid mb-5">
<h3 class="text-center">Our Services</h3>
<div class="row text-center mt-2">
<div class="col-sm-4 mt-2">
<i class="fa fa-tv text-success" style="font-size:120px;"></i><br>
<h5>Preventive Maintainance</h5>    
</div>   
<div class="col-sm-4 mt-2">
<i class="fa fa-cogs text-warning" style="font-size:120px;"></i><br>
<h5>High Quality Services</h5>  
</div> 
<div class="col-sm-4 mt-2">
<i class="fa fa-sliders text-danger" style="font-size:120px;"></i><br>
<h5>Modern Equipments</h5>   
</div>  
</div>    
</div>
<!---------------End Our Services Section------------->
<!---------------Start User Registration Form--------->
<?php 
include('userregistration.php');
?>
<!---------------End User Registration Form---------------->
<!----------------Start PHP Code For User Feedback---------->
<?php
$sql="SELECT rFeedback,rImage FROM feedback_tb f,userregistration_tb u WHERE f.rEmail=u.rEmail";
$result=mysqli_query($conn,$sql);
?>
<!----------------End PHP Code For User Feedback------------>
<!--------------Start Our Happy Customers------------------->
<?php
if(mysqli_num_rows($result)>0)
{
echo'<div class="container-fluid" style="background-color:#7d5fff; height:auto;">
<h2 class="text-center pt-4 text-white"><span>Our Happy Customers</span></h2>';  
echo'<div class="row">';
while($row=mysqli_fetch_assoc($result))
{
echo'<div class="col-lg-3 col-md-6 mt-2 mb-3">';
echo'<div class="card text-center">';
echo'<div class="card-body">';
echo'<img src="images/'.$row['rImage'].'" style="height:100px; width:100px; border-radius:50px;"><br>';
echo'<div class="card-text">'.$row['rFeedback'].'</div>';
echo'</div>';    
echo'</div>';    
echo'</div>';
}
echo'</div>';
echo'</div>';
}
?>            
<!--------------End Our Happy Customers---------------->
<!---------------Start Stylish Footer------------------>
<div class="footer hide" style="height:auto; background-color:#ff3838;">
<div class="container">
<div class="row text-center">
<div class="col-sm-3">
<h5 class="text-white"> <i class="fa fa-facebook mr-3 pt-2"></i> Facebook</h5>
</div> 
<div class="col-sm-3">
<h5 class="text-white"><i class="fa fa-instagram mr-3 pt-2"></i>Instagram</h5> 
</div> 
<div class="col-sm-3">
<h5 class="text-white"><i class="fa fa-whatsapp mr-3  pt-2"></i>Whatsapp</h5> 
</div> 
<div class="col-sm-3">
<h5 class="text-white"><i class="fa fa-google mr-3  pt-2"></i>Gmail</h5> 
</div>    
</div>    
</div> 
</div>
<!---------------End Stylish Footer------------------>
<!--------------Start Address Section and Contact Section--------->
<div class="container mt-4">
<h2 class="text-center">Contact Us</h2>
<div class="row">
<div class="col-sm-6">
 <form action="" method="POST" class="shadow-lg p-4">
<div class="form-group">
<i class="fa fa-user"></i>
<label for="Name">Name</label>  
<input type="text" class="form-control" placeholder="Type Your Name Here">  
</div>
<div class="form-group">
<i class="fa fa-keyboard-o"></i>
<label for="Email">Email</label>  
<input type="text" class="form-control" placeholder="Type Your Email Here">  
</div>
<div class="form-group">
<i class="fa fa-keyboard-o"></i>
<label for="Tell Us">Tell Us</label>  
<textarea class="form-control" style="height:120px;" placeholder="Tell Us What You Want"></textarea> 
</div>
<input type="submit" class="btn btn-primary" value="Send">
</form>   
</div>
<div class="col-sm-4 hide">
<div class="styleaddress text-white text-center">
<strong>Main Branch:</strong> <br>
OSMS Pvt Ltd, <br>
Sec IV, Kolkata <br>
West Bengal-7000021 <br>
Phone: +961408093 <br><br>
<strong>Headquarter:</strong> <br>
OSMS Pvt Ltd, <br>
Sec IV, Bokaro <br>
Mumbai - 834005 <br>
Phone: +9876543219 <br>
</div>   
</div>    
</div>    
</div>
<!--------------End Address Section and Contact Section---------->
<!-----------------Start Footer Part----------------------------->
<div class="footer bg-dark text-center px-2 mt-2" style="height:auto;">
<small class="text-white">Copyright OSMS&copy;2021 || 
Developed By Subhankar Pandey&nbsp;&nbsp;<a href="Admin/adminlogin.php" style="text-decoration:none; color:#ff3838;">(Admin Login)</a></small>   
</div>
<!-----------------End  Footer Part------------------->
<!----------------Optional JavaScript----------------->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>