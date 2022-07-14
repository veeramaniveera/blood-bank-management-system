<html>
<head>
<title>even</title>
<link rel= "stylesheet" type= "text/css" href= "hos.css">
<style>
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
<h1 id= "h11">hospital registration </h1>
<fieldset>
<h3>registration form</h3>
<table cellpadding= "5px" cellspacing= "5px">
<tr><td>hospital name</td><td><input type= "text" name= "t1" id="txt1"></td></tr>
<tr><td>hospital mobile no:</td><td><input type= "text" name= "t2" id="txt1"></td></tr>
<tr><td>hospital mail id</td><td><input type= "text" name= "t3" id="txt1"></td></tr>
<tr><td>hospital address</td><td><textarea name= "t4" id="txt1"></textarea></td></tr>
<tr><td>hospital working hours</td><td><input type= "text" name= "t5" id="txt1"></td></tr>
<tr><td>land mark</td><td><input type= "text" name= "t6" id="txt1"></td></tr>
<tr><td>user name</td><td><input type= "text" name= "t7" id="txt1"></td></tr>
<tr><td>password</td><td><input type= "password" name= "t8" id="txt1"></td></tr>
<tr><td><input type= "submit"  name= "veera" id="td1"></td></tr>
</fieldset>

<?php

if(isset($_POST["veera"]))
{
$hname= $_POST["t1"];
$hmob= $_POST["t2"];
$hmail= $_POST["t3"];
$hadd= $_POST["t4"];
$hwh= $_POST["t5"];
$lm= $_POST["t6"];
$hun= $_POST["t7"];
$hpass= $_POST["t8"];


$conn= mysqli_connect("localhost:3306","root","","blood");

if(!$conn)
{
die("connection error".mysqli_error());
}

$a="insert into hospital(hospital_name,hospital_mobile,hospital_mail,hospital_address,working_hours,land_mark,user_name,password) values('$hname','$hmob','$hmail','$hadd','$hwh','$lm','$hun','$hpass')";

if(mysqli_query($conn,$a))
{
echo"<script>alert('registerd successfully');</script>";
}
}
?>
</body>
</html>
