<html>
<head>
<link rel= "stylesheet" type= "text/css" href= "hos.css">
<style>
#h11
{
margin-top: -18px;
}
h1
{
}
#dotab
{
margin-top: 60px;
margin-left: 200px;
background-image:url("hd3.jpeg");
margin-right: 500px;
}
a
{
color: black;
}
table
{
color: black;
text-align: center;

}
th
{
text-transform: uppercase;
}
.txt2
{
color: black;
}
</style>
</head>
<body>
<?php
include("bm_donorside.php");
?>
<form action="" method="post"  enctype="multipart/form-data">
</form>

<h1 id ="h11">request</h1>
<?php

session_start();
$nm= $_SESSION["user_id"];
//echo"$nm";

$conn=mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("Connection Error".mysqli_error());
}
$a="select user_id,hospital_id,donor_id,date,request,unit from blood_request where donor_id= '$nm'&& status= 'Request'";
$b=mysqli_query($conn,$a);
if(mysqli_num_rows($b))
{
echo"<table border='3px'  cellpadding= '7px' cellspacing= '7px' id='dotab'>";
echo"<tr><th>user Id</th><th>hospital  id</th><th>donor id</th><th>date</th><th>request</th><th>unit</th><th colspan= 2>status</th></tr>";
while($r=mysqli_fetch_assoc($b))
{

$id=$r["user_id"];
$hospitalid=$r["hospital_id"];
$did=$r["donor_id"];
$date=$r["date"];
$request=$r["request"];
$unit=$r["unit"];

echo"<tr><td>$id</td><td>$hospitalid</td><td>$did</td><td>$date</td><td>$request</td><td>$unit</td><td><a href= 'bm_donordeny.php?userid=$id class= 'txt2'>deny</a></td><td><a href= 'bm_donoraccpet.php?userid1=$id class='txt2' >accept</a></td></tr>";
}
echo"</table>";
}
else
{
echo"<script>alert('No Pending Request'); location= 'bm_donorside.php'</script>";
}

?>

</body>
</html>
