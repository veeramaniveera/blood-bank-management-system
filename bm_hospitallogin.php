<html>
<head>
<title>even</title>
<link rel= "stylesheet" type= "text/css" href= "login.css">
</head>
<body>
<h1>hospital</h1>
<fieldset>
<table cellpadding= "5px" cellspacing= "5px">
<form action="" method= "post">
<h2>hospital login </h2>
<tr><td>user name</td><td><input type= "text" name= "t1" placeholder= "enter your username"></td></tr>
<tr><td>password</td><td><input type= "text" name= "t2"placeholder= "enter your password"></td></tr>

<tr><td><input type= "submit"  name= "veera" id= "in1"></td></tr>
</form>
</fieldset>

<?php
if(isset($_POST["veera"]))
{
$un= $_POST["t1"];
$pass= $_POST["t2"];
//echo"$un";
//echo"$pass";
$conn= mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("connection error".mysqli_error());
}
$a= "select password from hospital where user_name='$un'";

$b=mysqli_query($conn,$a);

if(mysqli_num_rows($b)>0)
{
while($r=mysqli_fetch_assoc($b))
{
$pass1= $r["password"];
if($pass==$pass1)
{
echo"<script>alert('LOGIN SUCCESS FULLY'); location= 'bm_hospitalside.php'</script>";
}
if($pass!=$pass1)
{
echo"<script>alert('PASSWORD INCORRECT'); location= 'bm_hospitallogin.php'</script>";
}
}
}
else
{
echo"<script>alert('No data Found'); location= 'bm_hospitallogin.php'</script>";
}

$a1="select user_id from hospital where user_name= '$un'";
$b1=mysqli_query($conn,$a1);
if(mysqli_num_rows($b1))
{
while($r=mysqli_fetch_assoc($b1))
{
$uid2=$r["user_id"];
}
}
else
{
echo"<script>alert('No data Found');</script>";
}
session_start();
$user2="$uid2";
$_SESSION["user_id"]=$user2;
}
?>
</body>
</html>
