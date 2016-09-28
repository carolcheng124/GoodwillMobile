<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>rewards</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <style>
    body{
      background:#EDC5C6;
    }
    .container{
      margin-top:170px;
      padding-left:0px;
      padding-right:0px;
      text-align: center;
    }

    .navbar-header{
      background-color: white;
      padding-top:20px;
    }

    #navbar{
      background-color:white;
    }


    .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
      background-color:lightgrey;
    }

    .rewards{
      text-align: center;
      margin: 20px;
    }

    #rewards{
      width: 100%;
      color: #0066B3;
    }
    </style>


  </head>



  <body>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
      </script>

      <!--AJAX-->
<!--    <script type="text/javascript">
      $(document).ready(function(){
      $('#menu').load('/navbar.html');
    });
      </script>
      <div id='menu'/>

-->
    <nav class="navbar navbar-default navbar-fixed-top"/>
        <div class="container-nav">

          <div class="navbar-header">
            <div class="row">
              <div class="col-xs-2 col-xs-offset-1">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div><!--col-xs-2-->
              <div class="col-xs-9">
                <img src="images/home/logo.jpg" alt="GoodWill" style="margin-top:5px;height:50px;">
              </div>
            </div><!--row-->
          </div><!--end of navbar-header-->

          <div id="navbar" class="navbar-collapse collapse" aria-expanded="true">
            <ul class="nav navbar-nav">
                <li>
                  <a href="index.html">Home</a>
                </li>
                <li>
                  <a href="login.html">Profile</a>
                </li>
                <li>
                  <a href="donationList.php">Donate</a>
                </li>
                <li>
                  <a href="http://www.goodwillswpa.org/goodwill-stores">Store</a>
                </li>
                <li class="active">
                  <a href="rewards.php">Rewards</a>
                </li>
                <li>
                  <a href="give.html">Give</a>
                </li>
                <li>
									<a href="logout.php">log out</a>
								</li>
            </ul>
          </div><!--navbar-->
        </div><!--container-header-->
      </nav>


      <div class="container">
        <img src="images/rewards/rewards2.jpg" alt="Rewards" style="width:100%;">

      <div class="rewards" >
        <h4 id="rewards">
      <?php
            session_start();
            if($_SESSION['uid']){
              $uid=$_SESSION['uid'];
              $con=mysql_connect("localhost","root","root");
              mysql_select_db("Goodwill",$con);
              $result=mysql_query("SELECT * FROM User_Donation as U,Donation as D WHERE U.did=D.did and
              U.uid='$uid'");
              $total=0;
              $subtotal=0;
              while($row=mysql_fetch_array($result)){
                $subtotal=($row['value']*$row['amount']);
                $total=$total+$subtotal;
              }
              if($total<100){
                $rest=100-$total;
                $print="You are $" . $rest . " far away from receiving a free $5 Goodwill gift card";
                echo $print;
              }
              else{
                echo "Congradulations you can get a $5 Goodwill gift card in our store";
              }
            }
      ?>
      </h4>
    </div>
  </div>



  </body>
</html>
