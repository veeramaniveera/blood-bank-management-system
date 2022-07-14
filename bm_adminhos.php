<html>
<head>
<style>
h1
{
text-align: center;
text-transform: uppercase;
margin-top: -18px;
}
#tabbl2
{
margin-left: 200px;
margin-top: 50px;
font-size: 20px;
background-image:url("hd3.jpeg");
}
</style>
<link rel= "stylesheet" type= "text/css" href= "admindonor.css">
</head>
<body>
<?php
include("bm_adminside.php");
?>
<form action="" method="post"  enctype="multipart/form-data">
</form>

<h1>hospital Details</h1>
<?php
$conn=mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("Connection Error".mysqli_error());
}
$a="select * from hospital";
$b=mysqli_query($conn,$a);
if(mysqli_num_rows($b))
{
echo"<table border='3px'  cellpadding= '5px' cellspacing= '5px'id='tabbl2'>";
echo"<tr><th>User Id</th><th>hospital Name</th><th>hospital mobile number</th><th>hospital mail id</th><th>hospital address</th><th>working hours</th><th>land mark</th><th>user name</th><th>password</th></tr>";
while($r=mysqli_fetch_assoc($b))
{


$id=$r["user_id"];
$hosname=$r["hospital_name"];
$hosmob=$r["hospital_mobile"];
$hosmail=$r["hospital_mail"];
$hosadd=$r["hospital_address"];
$hosworking=$r["working_hours"];
$hosland=$r["land_mark"];
$hosun=$r["user_name"];
$hospass=$r["password"];

echo"<tr><td>$id</td><td>$hosname</td><td>$hosmob</td><td>$hosmail</td><td>$hosadd</td><td>$hosworking</td><td>$hosland</td><td>$hosun</td><td>$hospass</td></tr>";
}
echo"</table>";
}
else
{
echo"<script>alert('No data Found');</script>";
}

?>

</body>
</html>
