<html>
<head>
<title>even</title>
<link rel= "stylesheet" type= "text/css" href= "hos.css">
<style>
fieldset
{
background-image:url("hd3.jpeg");
}
#h11
{
margin-top: -5px;
}
h2
{
text-transform: uppercase;
margin-left: 100px;
}
</style>

</head>
<body>
<?php
session_start();
$nm= $_SESSION["user_id"];
//echo"$nm";
include("bm_donorside.php");
?>
<form action="" method= "post" enctype="multipart/form-data">
<h1 id ="h11"> donor registration </h1>
<fieldset>
<h2>registration form</h2>
<table cellpadding= "5px" cellspacing= "5px">
<tr><td>name</td><td><input type= "text" name= "t1" id="txt1"></td></tr>
<tr><td>mobile number</td><td><input type= "text" name= "t2" id="txt1"></td></tr>
<tr><td>mail id</td><td><input type= "text" name= "t3" id="txt1"></td></tr>
<tr><td>address</td><td><textarea name= "t4" id="txt1"></textarea></td></tr>
<tr><td>present status</td><td><input type= "text" name= "t5" id="txt1"></td></tr>
<tr><td>height</td><td><input type= "text" name= "t6" id="txt1"></td></tr>
<tr><td>weight</td><td><input type= "text" name= "t7" id="txt1"></td></tr>
<tr><td>blood group</td><td><input type= "text" name= "t8" id="txt1"></td></tr>
<tr><td>photo</td><td><input type= "file" name= "image_file1" id="txt1"></td></tr>

<tr><td><input type= "submit"  name= "veera" id="td1"></td></tr>
</fieldset>
<?php

if(isset($_POST["veera"]))
{
$n= $_POST["t1"];
$mob= $_POST["t2"];
$ma= $_POST["t3"];
$add= $_POST["t4"];
$ps= $_POST["t5"];
$hei= $_POST["t6"];
$wei= $_POST["t7"];
$bg= $_POST["t8"];

$bg1= strtoupper($bg);
//echo"$bg1";
$var="donor/";
$var1=$var.basename($_FILES['image_file1']['name']);

$hei2= substr($hei,1,3);
//echo"$hei2";
$conn= mysqli_connect("localhost:3306","root","","blood");

if(!$conn)
{
die("connection error".mysqli_error());
}

$a="insert into donor(name,mail_id,address,present_status,height,weight,photo,mobile_number,blood_group) values('$n','$ma','$add','$ps','$hei','$wei','$var1','$mob','$bg1')";

if($hei2==$wei)
{
if((move_uploaded_file($_FILES['image_file1']['tmp_name'],$var1)))
{
if(mysqli_query($conn,$a))
{
echo"<script>alert('registerd successfully');</script>";
}
}
}
else
{
echo"<script>alert('you are not eligible for blood donation');</script>";
}
}
?>
</body>
</html>
