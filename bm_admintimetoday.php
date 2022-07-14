<html>
<head>
<style>
h1
{
text-align: center;
text-transform: uppercase;
}
#tabbl
{
margin-left: 200px;
margin-top: 50px;
font-size: 20px;
background-image:url("hd3.jpeg");

}
</style>
<link rel= "stylesheet" type= "text/css" href= "admindonor.css">
</head>
<body>
<?php
include("bm_adminside.php");
?>
<form action="" method="post"  enctype="multipart/form-data">
</form>

<fieldset>
<h1>time frame- today</h1>

<?php
$conn=mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("Connection Error".mysqli_error());
}
$date=Date("Y-m-d");
//echo"$date";

$a="select * from blood_request where date= '$date'";
$b=mysqli_query($conn,$a);
if(mysqli_num_rows($b))
{
echo"<table border='3px'  cellpadding= '5px' cellspacing= '5px' id = 'tabb1'>";
echo"<tr><th>User Id</th><th>hospital id</th><th>donor id</th><th>date</th><th>request</th><th>unit</th><th>status</th><th>appointment</th></tr>";
while($r=mysqli_fetch_assoc($b))
{

$id=$r["user_id"];
$hosid=$r["hospital_id"];
$did=$r["donor_id"];
$date=$r["date"];
$req1=$r["request"];
$unit=$r["unit"];
$sta=$r["status"];
$app=$r["appointment"];


echo"<tr><td>$id</td><td>$hosid</td><td>$did</td><td>$date</td><td>$req1</td><td>$unit</td><td>$sta</td><td>$app</td></tr>";
}
echo"</table>";
}
else
{
echo"<script>alert('No data Found in today'); location= 'bm_admintime.php'</script>";
}

?>
</fieldset>
</body>
</html>
