<html>
<head>
<title>even</title>
<link rel= "stylesheet" type= "text/css" href= "hos.css">
<style>
h3
{
text-transform: uppercase;
font-size: 20px;
font-weight: bold;
margin-left: 130px;
}
#h11
{
margin-top: -5px;
}
fieldset
{
background-image:url("hd3.jpeg");
}
</style>
</head>
<body>
<?php
session_start();
$nm= $_SESSION["user_id"];
//echo"$nm";

include("bm_hospitalside.php");
?>
<form action="" method= "post" enctype="multipart/form-data">
<h1 id= "h11">blood request </h1>
<fieldset>
<h3>request </h3>
<table cellpadding= "5px" cellspacing= "5px">
<tr><td>date</td><td><input type= "date" name= "t1" id="txt1"></td></tr>
<tr><td>request</td><td><select name= "t2"><option value= "Emergency">emergrncy</option><option value= "Group & Save">group & save</option><option value="Standard">standard</option></select></td></tr>
<tr><td>unit</td><td><input type= "text" name= "t3" id="txt1"></td></tr>

<tr><td><input type= "submit"  name= "veera" id="td1"></td></tr>
</fieldset>
<?php

if(isset($_POST["veera"]))
{
$date= $_POST["t1"];
$req= $_POST["t2"];
$un= $_POST["t3"];
$id1=$_GET["userid"];
$hosid=$_GET["hid"];
$req1= "Request";
$app="Not Fixed";

//echo"$hosid";
//echo"$id1";

$conn= mysqli_connect("localhost:3306","root","","blood");

if(!$conn)
{
die("connection error".mysqli_error());
}

$a="insert into blood_request(hospital_id,donor_id,date,request,unit,status,appointment) values('$hosid','$id1','$date','$req','$un','$req1','$app')";

if(mysqli_query($conn,$a))
{
echo"<script>alert('registerd successfully');</script>";
}
}
?>
</body>
</html>
