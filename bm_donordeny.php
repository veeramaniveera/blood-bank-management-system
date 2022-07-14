<html>
<head>
<title>even</title>
</head>
<body>
<?php
$usid=$_GET["userid"];
//echo"$usid";
$den="Deny";
$conn= mysqli_connect("localhost:3306","root","","blood");
if(!$conn)
{
die("connection error".mysqli_error());
}
$a="update blood_request set status='$den' where user_id='$usid'";
if(mysqli_query($conn,$a))
{
echo"<script>alert(' deny successfully'); location= 'bm_donorside.php'</script>";
}

?>
</body>
</html>
