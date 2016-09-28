<?php
if(isset($_POST["submit"]) && $_POST["submit"] == "login")
{
  $email=$_POST["email"];
  $password=$_POST["password"];
  if($email== ""||$password == "")
  {
    echo "<script>alert('Please enter your email or password!');</script>;";
  }
  else
  {
    $con=mysql_connect("localhost","root","root");
    mysql_select_db("Goodwill",$con);
    $result=mysql_query("SELECT * FROM User WHERE email='$email' AND password='$password'");
    $num=mysql_num_rows($result);
    if($num)
    {
      $row=mysql_fetch_array($result);
      session_start();
      $_SESSION['uid']=$row['uid'];

      echo "<script>alert('Welcome!');location.href='index.html';</script>";
    }
    else
    {
      echo "<script>alert('Your email or password might be wrong!');location.href='login.html';</script>";
    }
  }
}
?>
