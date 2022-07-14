<html>
<head>
<title>even</title>
<link rel= "stylesheet" type= "text/css" href= "hos.css">
<style>
#h11
{
margin-top: -5px;
}
h2
{
text-transform: uppercase;
margin-left: 100px;
}
</style></head>
<body>
<?php
include("bm_donorside.php");
?>
<h1 id="h11">Appointment</h1>
<fieldset>
<form action="" method= "post" enctype="multipart/form-data">
<table cellpadding= "7px" cellspacing= "7px">
<tr><td>available</td><td><select name= "t1" id="txt1"><option value= "Morning">Morning</option><option value= "Evening">Evening</option><option value="Night">Night</option><option value="Any Time">Any Time</option></select></td></tr>

<tr><td><input type= "submit"  name= "veera" id="td1"></td></tr>
</fieldset>
</form>

<?php

if(isset($_POST["veera"]))
{
$avatime= $_POST["t1"];
//echo"$avatime";
$usid1=$_GET["userid1"];
//echo"$usid1";
$acc="Accept";
$conn= mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("connection error".mysqli_error());
}
$a="update blood_request set status='$acc', appointment= '$avatime' where user_id='$usid1'";
if(mysqli_query($conn,$a))
{
echo"<script>alert('Accpeted successfully');</script>";
}
}
?>
</body>
</html>
