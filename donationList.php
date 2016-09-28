<!DOCTYPE html>

 <?php
 session_start();
 if(isset($_SESSION['uid'])){
	$uid=$_SESSION['uid'];
	$con=mysql_connect("localhost","root","root");
	mysql_select_db("Goodwill",$con);
	$result=mysql_query("SELECT * FROM User_Donation as U,Donation as D
											 WHERE U.uid='$uid' AND U.did=D.did");

}
else{
	echo "<script>alert('You should log in first');location.href='login.html';</script>";
}
?>

<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>donationList</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<style>
		body{
			background-color:#BFE6D3;
		}

		#navbar{
			background-color:white;
		}

		.navbar-header{
			background-color: white;
			padding-top:20px;
		}

		.container{
			margin-top: 90px;
			text-align: center;
		}
		.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
			background-color:lightgrey;
		}

		</style>
	</head>

	<body>
		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
    	</script>

    	<nav class="navbar navbar-default navbar-fixed-top">
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
    						<li class="active">
    							<a href="donationList.php">Donate</a>
    						</li>
    						<li>
    							<a href="http://www.goodwillswpa.org/goodwill-stores">Store</a>
    						</li>
    						<li>
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
	    	</div><!--container-->
	    </nav><!--navigation bar---->

	    <div class="container">
	    	<div class="col-xs-10 col-xs-offset-1">
		    	<button onclick="window.location.href='addDonation.html'" class="btn btn-lg btn-success btn-block" type="submit" style="margin:auto; width:105%">Add your new donation record</button>
		    	</br>
		    	<h4 class="form-signin-heading">Below is your donation history</h4>
					<?php
					if(!$result){
						echo "You have no donations before.";
					}
					else{
						?>
					<table class="table table-striped">
								<tr>
									<th>Name</th>
									<th>Price</th>
									<th>Date</th>
								</tr>
						<?php
						while($row=mysql_fetch_array($result)){
							?>
							<tr>
								<td>
									<?php
									echo $row['dname'];
									?>
								</td>
								<td>
									<?php
									echo $row['value'];
									?>
								</td>
								<td>
									<?php
									echo  $row['month'] . "/" . $row['day'] . "/" . $row['year'];
							?>
								</td>
							</tr>

							<?php
						}

					}
					 ?>
				 </table>

		    </div><!--col-xs-10-->

	    </div><!--container-->


	</body>
</html>
