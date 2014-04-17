<?php
@ require 'include/DB/dbUtility.php';
@ require 'include/DB/dbData.php';
require_once 'include/Auth/LoginSessions.php';
?>

<?php
$dbConn=dbUtility::connectToDB($HOST, $USER, $PASSWORD, $DB);
?>

<?php
@$correctLogin="notSet";
LoginSessions::startSession();
if(@$_SESSION['level']=="1")header("location:userHome.php");

if(@$_GET['login']=="true"){
	$queryText = mysqli_query($dbConn, "SELECT username, password, name, imgPath, Level FROM users");
	while ($row = mysqli_fetch_array($queryText))
	{
		if($row['password']==md5($_POST['password']) && $row['username']==md5($_POST['username']))
		{			
			$_SESSION['level']=$row['Level'];
			$_SESSION['user']=$row['name'];
			$_SESSION['userImg']=$row['imgPath'];
			header("location:userHome.php");
			$correctLogin=true;
		}
		else $correctLogin=false;

	}
}
else if(@$_GET['login']=="false"){
	LoginSessions::stopSession("index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Raining Mail - Your Newsletter Everywhere</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!--My CSS-->
<link href="css/style.css" rel="stylesheet">

</head>
<body class="intro">
	<header>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand navBarTitle" href="index.php">Raning Mail</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="#about">About YME</a></li>
						<li><a href="register.php">Register</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</header>


	<div class="container">
		<div class="login">
			<div class="starter-template">
				<h1 class="welcomeTitle">Raining Mail</h1>
				<h3>Your Mail Everywhere</h3>
			</div>

			<form class="form-signin" style="margin-top:-40px;" role="form" action="index.php?login=true"
				method="post">
				<h4 class="form-signin-heading">Please sign in</h4>
				<input type="email" class="form-control" placeholder="Email address"
					required autofocus name="username"> <input type="password"
					class="form-control" placeholder="Password" required
					name="password"> <label class="checkbox"> <input type="checkbox"
					value="remember-me"> Remember me
				</label>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign
					in</button>
			</form><br>
			<?php
			if(@$_GET['msg']=="denied"){
				echo "<div class='alert alert-danger' style='width:200px;margin: 0 auto'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				Accesso negato
				</div>";
			}
			
			if(!$correctLogin){
				echo "<div class='alert alert-danger' style='width:200px;margin: 0 auto'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				Username e/o password errati
				</div>";
			}
			?>
		</div>

	</div>
	<!-- /.container -->

	<footer>
		<!--
    <div id="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </div>-->
	</footer>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
dbUtility::disconnectFromDB($dbConn);
?>