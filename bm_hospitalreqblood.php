<html>
<head>
<link rel= "stylesheet" type= "text/css" href= "hos.css">
<style>
#field1
{
background-image:url("hd3.jpeg");
}
#table1
{

}
#field2
{
background-image:url("hd3.jpeg");
}
h2
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
</style>
</head>
<body>
<?php
include("bm_hospitalside.php");
?>
<h1 id= "h11">request blood</h1>
<fieldset id="field1">
<form action="" method="post"  enctype="multipart/form-data">
<table id="table1">
<h2>region wise</h2>
<tr><td>region</td><td><input type= "text" name= "t1" id="txt1" placeholder= "enter region"></td></tr>
<tr><td>date</td><td><input type= "date" name= "t2" id="txt1"></td></tr>
<tr><td>request</td><td><select name= "t3"><option value= "Emergency">emergrncy</option><option value= "Group & Save">group & save</option><option value="Standard">standard</option></select></td></tr>
<tr><td>blood unit</td><td><input type= "text" name= "t4" id="txt1"></td></tr>

<tr><td><input type= "submit"  name= "veera" id="td1" value= "request"></td></tr>
</table>
</form>
</fieldset>

<fieldset id="field2">
<form action="" method="post"  enctype="multipart/form-data">
<h2>blood wise</h2>
<table id="table2">
<tr><td>blood group</td><td><input type= "text" name= "t1" id="txt1" placeholder= "enter blood group"></td></tr>
<tr><td>date</td><td><input type= "date" name= "t2" id="txt1"></td></tr>
<tr><td>request</td><td><select name= "t3" id="txt1"><option value= "Emergency">emergrncy</option><option value= "Group & Save">group & save</option><option value="Standard">standard</option></select></td></tr>
<tr><td>blood unit</td><td><input type= "text" name= "t4" id="txt1"></td></tr>

<tr><td><input type= "submit"  name= "akash" id="td1" value= "request"></td></tr>
</form>
</table>
</fieldset>
<?php

session_start();
$nm= $_SESSION["user_id"];
//echo"$nm";


if(isset($_POST["veera"]))
{
$region= $_POST["t1"];
$date= $_POST["t2"];
$req= $_POST["t3"];
$un= $_POST["t4"];
$req1= "Request";
$app="Not Fixed";


$conn=mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("Connection Error".mysqli_error());
}
$a="select user_id from donor where address= '$region'";
$b=mysqli_query($conn,$a);
$count=0;
if(mysqli_num_rows($b))
{
while($r=mysqli_fetch_assoc($b))
{
$id=$r["user_id"];

$b1="insert into blood_request(hospital_id,donor_id,date,request,unit,status,appointment) values('$nm','$id','$date','$req','$un','$req1','$app')";

if(mysqli_query($conn,$b1))
{
$count=$count+1;
}
}
//echo"$count";
if($count>0)
{
echo"<script>alert('Registerd Successfully');</script>";
}
}
else
{
echo"<script>alert('No Data');</script>";
}
}

if(isset($_POST["akash"]))
{
$bg= $_POST["t1"];
$date1= $_POST["t2"];
$req1= $_POST["t3"];
$un1= $_POST["t4"];
$req2= "Request";
$app1="Not Fixed";
$bg1= strtoupper($bg);
//echo"$bg1";
//echo"$date1";

$conn=mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("Connection Error".mysqli_error());
}
$a3="select user_id from donor where blood_group= '$bg1'";
$b3=mysqli_query($conn,$a3);
$count1=0;
if(mysqli_num_rows($b3))
{
while($r=mysqli_fetch_assoc($b3))
{
$id2=$r["user_id"];


$b4="insert into blood_request(hospital_id,donor_id,date,request,unit,status,appointment) values('$nm','$id2','$date1','$req1','$un1','$req2','$app1')";
if(mysqli_query($conn,$b4))
{
$count1=$count1+1;
}
}
//echo"$count1";
if($count1>0)
{
echo"<script>alert('Registerd Successfully');</script>";
}
}
else
{
echo"<script>alert('No Data');</script>";
}
}

?>

</body>
</html>
