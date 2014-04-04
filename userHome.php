<?php
@ require 'include/DB/dbUtility.php';
@ require 'include/DB/dbData.php';
require_once 'include/Auth/LoginSessions.php';
?>

<?php
$dbConn=dbUtility::connectToDB($HOST, $USER, $PASSWORD, $DB);
?>

<?php
LoginSessions::startSession();
?>

<?php if(@$_SESSION['level']!=1)header("location:index.php?msg=denied");?>

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
						<li><a href="userHome.php">Home</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown">Contacts<b class="caret"></b>
						</a>
							<ul class="dropdown-menu">
								<li><a href="subscribers.php">Mostra contatti</a></li>
								<li><a href="newContact.php">Nuovo contatto</a></li>
								<li><a href="removeContacts.php">Rimuovi contatti</a></li>
							</ul>
						</li>

						<?php if(@$_SESSION['level']==1)echo "<li><a href='index.php?login=false'>Logout</a></li>";?>
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
								echo $_SESSION['user'];
								echo"</h5>";
								echo"</td>";
								echo"<td><img src='_users/".$_SESSION['userImg']."' class='img-circle' style='width:30px; margin-left:10px;'></td>";
								?>
					
					</tr>
				</table>
			</div>
			<!-- 
			<table class="buttons">
				<tr>
					<td><a href="userHome.php" class="btn btn-warning">Admin Home</a></td>
					<td><a href="subscribers.php" class="btn btn-danger">Lista iscritti</a>
					</td>
					<td><a href="bloggerList.php" class="btn btn-danger">Redattori</a>
					</td>

					<td><a href="newContact.php" class="btn btn-danger">Nuovo contatto</a>
					</td>
					<td><a href="deleteMultiple.php" class="btn btn-danger">Elimina
							contatti</a></td>
				</tr>
			</table>
			 -->
			<hr>
			<div class="row">
				<!-- Main column  -->
				<div class="col-md-8">
					<h4>Ultime iscrizioni:</h4>
					<table class="table lastSubscription">
						<tr style="background-color: #428bca; color: #FFF;">
							<td class="date">Data iscrizione</td>
							<td>Nome</td>
							<td>Cognome</td>
							<td class="mail">E-Mail</td>
							<td class="icon">OK</td>
							<td class="icon">Info</td>
						</tr>
						<?php
						$count=0;
						$queryText="SELECT ID, Email, Cognome, Nome, Data_iscrizione FROM subscribers INNER JOIN last_subscription ON ID=userID";
						$query = mysql_query($queryText,$dbConn);
						while ($row = mysql_fetch_array($query))
						{
							echo"<tr>";
							echo"<td class='date'>".$row['Data_iscrizione']."</td>";
							echo"<td>".$row['Nome']."</td>";
							echo"<td>".$row['Cognome']."</td>";
							echo"<td class='mail'>".$row['Email']."</td>";
							echo"<td class='icon'><a href='#' onClick='alert()'><img src='img/icons/spunta.png' class='imageIcon'></a></td>";
							echo"<td class='icon'><a href='#' onClick='alert()'><img src='img/icons/moreInfo.png' class='imageIcon'></a></td>";
							echo"</tr>";
							$count++;
						}
						if($count=0)echo"<tr><td>Nessun nuovo iscritto non ancora visualizzato</td></tr>"
						?>
					</table>

					<hr>
					<h4>Bozze Newsletter:</h4>
					<table class="table lastSubscription">
						<tr style="background-color: #5cb85c; color: #FFF;">
							<td class="date">Data</td>
							<td>Autore</td>
							<td class="mail">Titolo</td>
							<td class="icon">Edit</td>
							<td class="icon">Del</td>
						</tr>
						<?php
						$count=0;
						$queryText="SELECT Email, Cognome, Nome, Data_iscrizione FROM subscribers INNER JOIN last_subscription ON ID=userID";
						$query = mysql_query($queryText,$dbConn);
						while ($row = mysql_fetch_array($query))
						{
							echo"<tr>";
							echo"<td class='date'>".$row['Data_iscrizione']."</td>";
							echo"<td>".$row['Nome']."</td>";

							echo"<td class='mail'>".$row['Email']."</td>";
							echo"<td class='icon'><a href='#' onClick='alert()'><img src='img/icons/edit.png' class='imageIcon'></a></td>";
							echo"<td class='icon'><a href='#' onClick='confirm()'><img src='img/icons/delete.png' class='imageIcon'></a></td>";
							echo"</tr>";
							$count++;
						}
						if($count=0)echo"<tr><td>Nessun nuovo iscritto non ancora visualizzato</td></tr>"
						?>
					</table>

				</div>

				<!-- Side column  -->
				<div class="col-md-4">
				<h1>This is a side column for other modules</h1></div>
			</div>



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