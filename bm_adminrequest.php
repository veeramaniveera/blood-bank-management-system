<html>
<head>
<style>
#pen
{
margin-left: 800px;
margin-top: 50px;
}
#pen2
{
margin-left: 600px;
}
h1
{
text-align: center;
text-transform: uppercase;
margin-top: -18px;
}
h2
{
text-transform: capitalize;
margin-left: 300px;
}
table
{
font-size: 20px;
}
.reqtab
{
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
<h1>request</h1>
<h2>pending Details</h2>
<?php
$conn=mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("Connection Error".mysqli_error());
}
$req= "Request";
$a="select * from blood_request where status= '$req'";
$b=mysqli_query($conn,$a);
if(mysqli_num_rows($b))
{
echo"<table border='3px'  cellpadding= '7px' cellspacing= '5px' class= 'reqtab'>";
echo"<tr><th>User Id</th><th>hospital id</th><th>donor id</th><th>date</th><th>request</th><th>unit</th><th>status</th><th>appointment</th></tr>";
while($r=mysqli_fetch_assoc($b))
{

$id=$r["user_id"];
$hosid=$r["hospital_id"];
$did=$r["donor_id"];
$date=$r["date"];
$req1=$r["request"];
$unit=$r["unit"];
$sta=$r["status"];
$app=$r["appointment"];


echo"<tr><td>$id</td><td>$hosid</td><td>$did</td><td>$date</td><td>$req1</td><td>$unit</td><td>$sta</td><td>$app</td></tr>";
}
echo"</table>";
}
else
{
echo"<script>alert('No data Found');</script>";
}

?>


<h2 id="pen">fulfill Details</h2>
<?php
$conn=mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("Connection Error".mysqli_error());
}
$req= "Accept";
$den= "Deny";
$a="select * from blood_request where status= '$req'";

$b=mysqli_query($conn,$a);
if(mysqli_num_rows($b))
{
echo"<table border='3px'  cellpadding= '7px' cellspacing= '5px'  id='pen2' class= 'reqtab'>";
echo"<tr><th>User Id</th><th>hospital id</th><th>donor id</th><th>date</th><th>request</th><th>unit</th><th>status</th><th>appointment</th></tr>";
while($r=mysqli_fetch_assoc($b))
{

$id=$r["user_id"];
$hosid=$r["hospital_id"];
$did=$r["donor_id"];
$date=$r["date"];
$req1=$r["request"];
$unit=$r["unit"];
$sta=$r["status"];
$app=$r["appointment"];


echo"<tr><td>$id</td><td>$hosid</td><td>$did</td><td>$date</td><td>$req1</td><td>$unit</td><td>$sta</td><td>$app</td></tr>";
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
