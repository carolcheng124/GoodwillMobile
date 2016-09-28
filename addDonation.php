
<?php
$month=$_POST['month'];
$day=$_POST['day'];
$year=$_POST['year'];
$itemname=$_POST['itemname'];
$price=$_POST['price'];
$amount=$_POST['amount'];

$con=mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("Goodwill",$con);
$result = mysql_query("SELECT * FROM Donation");
$did=0;
while($row=mysql_fetch_array($result)){
  if($did<$row['did']){
    $did=$row['did'];
  }
}
$did=$did+1;

session_start();
$uid=$_SESSION['uid'];

$query="INSERT INTO Donation (did,month,day,year,dname,value,amount)
VALUES ('$did','$month','$day','$year','$itemname','$price','$amount')";


if (!mysql_query($query,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_query("INSERT INTO User_Donation (uid,did)
VALUES ('$uid','$did')");
if(isset($_POST["submit"]) && $_POST["submit"] == "submit")
{

	echo "<script>location.href='donationList.php';</script>";
}


mysql_close($con);
?>
