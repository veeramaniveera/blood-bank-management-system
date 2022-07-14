<html>
<head>
<link rel= "stylesheet" type= "text/css" href= "admindonor.css">
<style>
table
{
font-size: 20px;
}
td
{
text-transform: capitalize;
text-align: center;
}
th
{
text-transform: uppercase;
}
h1
{
color: yellow;
text-align: center;
text-transform: uppercase;
}
#h11
{
margin-top: -5px;
}
#adtab
{
background-image:url("hd3.jpeg");
}

</style>
</head>
<body>
<?php
include("bm_adminside.php");
?>
<form action="" method="post"  enctype="multipart/form-data">
<div>
<h1 id= "h11">donor details</h1>
</div>
</form>

<?php
$conn=mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("Connection Error".mysqli_error());
}
$a="select * from donor";
$b=mysqli_query($conn,$a);
if(mysqli_num_rows($b))
{
echo"<div id= 'admindiv1'>";
echo"<table border='3px'cellpadding= '7px' cellspacing= '7px'id= 'adtab'>";
echo"<tr><th>User Id</th><th>Name</th><th>mail id</th><th>address</th><th>present status</th><th>height</th><th>weight</th><th>donor photo</th><th>Mobile Number</th><th>blood group</th></tr>";
while($r=mysqli_fetch_assoc($b))
{

$id=$r["user_id"];
$name=$r["name"];
$mail=$r["mail_id"];
$add=$r["address"];
$ps=$r["present_status"];
$hei=$r["height"];
$wei=$r["weight"];
$pic=$r["photo"];
$mn=$r["mobile_number"];
$bg=$r["blood_group"];
echo"<tr><td>$id</td><td>$name</td><td>$mail</td><td>$add</td><td>$ps</td><td>$hei</td><td>$wei</td><td><img src= '$pic'></td><td>$mn</td><td>$bg</td></tr>";
}
echo"</table>";
echo"</div>";
}
else
{
echo"<script>alert('No data Found');</script>";
}

?>

</body>
</html>
