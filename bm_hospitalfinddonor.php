<html>
<head>
<link rel= "stylesheet" type= "text/css" href= "hos.css">
<style>

th
{
font-size: 30px;
fonrt-weight: bolder;
text-transform: uppercase;
}
table
{
text-align: center;'

}
td
{
text-transform: capitalize;
font-size: 20px;
}
#tab1
{
margin-left: 300px;
margin-top: 50px;
background-image:url("hd3.jpeg");
}
#h11
{
margin-top: -18px;
}
</style>
</head>
<body>
<?php
include("bm_hospitalside.php");
?>
<form action="" method="post"  enctype="multipart/form-data">
</form>

<h1 id= "h11">find donor</h1>
<?php

session_start();
$nm= $_SESSION["user_id"];
//echo"$nm";

$conn=mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("Connection Error".mysqli_error());
}
$a="select * from donor";
$b=mysqli_query($conn,$a);
if(mysqli_num_rows($b))
{
echo"<table border='3px'  cellpadding= '7px' cellspacing= '7px'id='tab1'>";
echo"<tr><th>donor Id</th><th>Name</th><th>blood group</th></tr>";
while($r=mysqli_fetch_assoc($b))
{

$id=$r["user_id"];
$name=$r["name"];
$bg=$r["blood_group"];


echo"<tr><td>$id</td><td>$name</td><td>$bg</td><td><a href= 'bm_reqblood.php?userid=$id && hid=$nm'  id= 'txt2'>request</a></td></tr>";
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
