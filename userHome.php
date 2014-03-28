<?php
@ require 'include/php_functions/db_functions.php';
@ require 'include/db_data/db_data.php';
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

<body>
	<?php
	$dbConn=connectToDB($HOST, $USER, $PASSWORD, $DB);
	?>
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
						<li><a href="#contact">Contact</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</header>


	<div class="container">
		<div class="workingArea">
			<div align="right">
				<table>
					<tr>
						<td><h5>
								<b>Logged as:</b>
								<?php 
								$mail=$_POST['username'];
								$password=$_POST['password'];
								$encriptedMail=md5($mail);
								$encriptedPassword=md5($password);
								$img;
								$nome="None";
								$queryText="SELECT username, password, name, surname, imgPath FROM users WHERE username='".$encriptedMail."' AND password='".$encriptedPassword."'";
								$query = mysql_query($queryText,$dbConn);
								while ($row = mysql_fetch_array($query))
								{
									$nome=$row['name']." ".$row['surname'];
									$img=$row['imgPath'];
								}
								echo $nome;

								echo"</h5>";
								echo"</td>";
								echo"<td><img src='_users/".$img."' class='img-circle' style='width:30px; margin-left:10px;'></td>";
								?>
					
					</tr>
				</table>
			</div>
			<table class="buttons">
				<tr>
					<td>Visualizzazioni</td>
					<td><a href="subscriberList.php" class="btn btn-primary">Lista
							iscritti</a></td>
					<td><a href="bloggerList.php" class="btn btn-primary">Lista
							sottoscrittori</a></td>
				</tr>
				<tr>
					<td>Operazioni sui contatti</td>
					<td><a href="contactsOperations.php" class="btn btn-primary">Nuovo
							contatto</a></td>
					<td><a href="deleteMultiple.php" class="btn btn-primary">Elimina
							contatti</a></td>
				</tr>
			</table>
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
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<?php
	disconnectFromDB($dbConn);
?>
</body>
</html>
