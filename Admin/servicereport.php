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
<title>Request Reciept</title>
</head>
<body>

<!---------------------Start Container--------------------------->
<div class="container-fluid">
<div class="row">
<div class="col-sm-5 offset-sm-3 mb-4">
<h3 class="text-center mb-3 text-danger">Technician Reciept</h3>
<?php
$sql1="SELECT *FROM submitrequest_tb";
$result=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result);
$rId=$_REQUEST['rId'];
$sql1="SELECT *FROM submitrequest_tb WHERE rId='".$rId."'";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$pImage=$row['pImage'];
if(!isset($rId))
{
echo'<script>location.href="workorder.php"</script>';
}
else
{
echo '<table class="table table-bordered table-dark" style="font-size:15px;">';
echo "<tr>";
echo "<thead>";
echo "<th>Name</th>";
echo "<td>".$row['rName']."</td>";
echo "</tr>";
echo "<tr>";
echo "<thead>";
echo "<th>Email</th>";
echo "<td>".$row['rEmail']."</td>";
echo "</tr>";
echo "<tr>";
echo "<thead>";
echo "<th>Phone</th>";
echo "<td>".$row['rPhone']."</td>";
echo "</tr>";
echo "<tr>";
echo "<thead>";
echo "<th>City</th>";
echo "<td>".$row['rCity']."</td>";
echo "</tr>";
echo "<tr>";
echo "<thead>";
echo "<th>Date</th>";
echo "<td>".$row['rDate']."</td>";
echo "</tr>";
echo "<tr>";
echo "<thead>";
echo "<th>Description</th>";
echo "<td>".$row['rProDesc']."</td>";
echo "</tr>";
echo "<tr>";
echo "<thead>";
echo "<th>Address</th>";
echo "<td>".$row['rAddress']."</td>";
echo"</tr>";
echo "<tr>";
echo "<thead>";
echo "<th>Faulty Product Image</th>";
echo '<td><img src="../Requester/images/'.$pImage.'"></td>';
echo"</tr>";
echo "<tr>";
echo "<thead>";
echo "<th>Technician Signature</th>";
echo '<td></td>';
echo"</tr>";
echo "<tr>";
echo "<thead>";
echo "<th>Customer Signature</th>";
echo '<td></td>';
echo"</tr>";
echo "</tbody>";
echo "</table>";
echo'<td><form>
<a href="workorder.php" class="btn btn-success d-print-none" onclick="window.print()">Print</a></form></td>';
echo"<br>";
echo '<a href="workorder.php" class="btn btn-info d-print-none">Back</a>';   
}
?>
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