
<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$street=$_POST['street'];
$city=$_POST['city'];
$state=$_POST['state'];
$zipcode=$_POST['zipcode'];
$race=$_POST['race'];
$income=$_POST['income'];
$frequency_dot=$_POST['frequency_dot'];
$distance_to_donation=$_POST['distance_to_donation'];
$drivetime=$_POST['drivetime'];
$ifshop=$_POST['ifshop'];
$frequency_shop=$_POST['frequency_shop'];
$con=mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("Goodwill",$con);
$result = mysql_query("SELECT * FROM User");
$uid=0;
while($row=mysql_fetch_array($result)){
  if($uid<$row['uid']){
    $uid=$row['uid'];
  }
}
$uid=$uid+1;


$query="INSERT INTO User (uid,firstname,lastname,email,password,
  phone,street,city,state,zipcode,race,income,frequency_dot,
  distance_to_donation,drivetime,ifshop,frequency_shop)
VALUES ('$uid','$firstname','$lastname','$email','$password',
  '$phone', '$street','$city','$state','$zipcode','$race','$income','$frequency_dot',
  '$distance_to_donation','$drivetime','$ifshop','$frequency_shop')";

if (!mysql_query($query,$con))
  {
  die('Error: ' . mysql_error());
  }
if(isset($_POST["submit"]) && $_POST["submit"] == "submit")
{
	echo "<script>alert('You have signed up successfully');location.href='index.html';</script>";
}


mysql_close($con);
?>
