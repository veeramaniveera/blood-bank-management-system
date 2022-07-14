<html>
<head>
<title>even</title>
<link rel= "stylesheet" type= "text/css" href= "login.css">
<style>
fieldset
{

background-image:url("hd1.jpg");
}
</style>
</head>
<body>

<?php
//include("bm_donorside.php");
?>
<h1>donor</h1>
<fieldset>

<table cellpadding= "7px" cellspacing= "7px">
<form action="" method= "post">
<h2>donor login </h2>
<tr><td>user name</td><td><input type= "text" name= "t1" placeholder= "enter your mail id"></td></tr>
<tr><td>password</td><td><input type= "text" name= "t2"placeholder= "enter your mobile number"></td></tr>

<tr><td><input type= "submit"  name= "veera" id= "in1"></td></tr>
</form>
</fieldset>

<?php
if(isset($_POST["veera"]))
{
$mail= $_POST["t1"];
$mob= $_POST["t2"];

$conn= mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("connection error".mysqli_error());
}
$a= "select mobile_number from donor where mail_id='$mail'";

$b=mysqli_query($conn,$a);

if(mysqli_num_rows($b)>0)
{
while($r=mysqli_fetch_assoc($b))
{
$mob1= $r["mobile_number"];
if($mob==$mob1)
{
echo"<script>alert('LOGIN SUCCESS FULLY'); location= 'bm_donorside.php'</script>";
}
if($mob!=$mob1)
{
echo"<script>alert('PASSWORD INCORRECT'); location= 'bm_donorlogin.php'</script>";
}
}
}
else
{
echo"<script>alert('No data Found'); location= 'bm_donorlogin.php'</script>";
}

$a1="select user_id from donor where mail_id= '$mail'";
$b1=mysqli_query($conn,$a1);
if(mysqli_num_rows($b1))
{
while($r=mysqli_fetch_assoc($b1))
{
$uid=$r["user_id"];
}
}
else
{
echo"<script>alert('No data Found');</script>";
}
session_start();
$user="$uid";
$_SESSION["user_id"]=$user;
}
?>
</body>
</html>
