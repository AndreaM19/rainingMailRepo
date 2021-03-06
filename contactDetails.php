<?php
@ require 'include/DB/dbUtility.php';
@ require 'include/DB/dbData.php';
require_once 'include/Auth/LoginSessions.php';
require_once 'include/Modeled_Objects/Contact.php';
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
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown">Mail<b class="caret"></b>
						</a>
							<ul class="dropdown-menu">
								<li><a href="newMail.php">Nuova mail</a></li>
								<li><a href="mailArchive.php?view=draft">Bozze</a></li>
								<li><a href="mailArchive.php?view=sent">Inviate</a></li>
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
			<?php
			$userId=$_GET['id'];
			$editFlag="";
			if($_GET['edit']=="edit");
			else if($_GET['edit']=="show")$editFlag="disabled ";
			$contactData; /*Creation of a Contact object from the Contact.php Class*/

			$queryText="SELECT * FROM subscribers WHERE ID=".$userId."";
			$query = mysqli_query($dbConn, $queryText);
			while ($row = mysqli_fetch_array($query)){
				$contactData=new Contact($row['Nome'], $row['Cognome'], $row['Email'], $row['Citta'], $row['Stato'], $row['Attivita'], $row['Sito_Web'], $row['Data_iscrizione']);
			}
			?>


			<?php
			/*Page title generetion*/
			if($_GET['edit']=="edit") echo"<h4>Modifica contatto:</h4>";
			else echo"<h4>Dettagli contatto:</h4>";
			?>

			<div class="col-md-5">
				<form>
					<fieldset>
						<div class="form-group">
							<label for="nome">Nome</label> <input type="text"
								class="form-control" id="nome"
								placeholder="Inserisci il nome..."
								<?php echo $editFlag; echo "value='".$contactData->getName()."'"?>>
						</div>
						<div class="form-group">
							<label for="email">Email</label> <input type="text"
								class="form-control" id="email"
								placeholder="Inserisci l'indirizzo email..."
								<?php echo $editFlag; echo "value='".$contactData->getMail()."'"?>>
						</div>
						<div class="form-group">
							<label for="stato">Nazione</label> <select class="form-control"
								id="stato"
								<?php echo $editFlag; echo "value='".$contactData->getLocation()."'"?>>
								<option>Italia</option>
								<option>Francia</option>
								<option>Germania</option>
							</select>
						</div>
						<div class="form-group">
							<label for="stato">Attivit&agrave;</label> <select
								class="form-control" id="stato" <?php echo $editFlag; echo "value='".$contactData->getActivity()."'"?>>
								<option>DJ-Producer</option>
								<option>Computer Music Expert</option>
								<option>Musicista</option>
								<option>Studente</option>
								<option>Appassionato</option>
								<option>Altro</option>
							</select>
						</div>

						<?php if(!$editFlag) {
							echo "<table><tr>";
							echo "<td><button type='submit'' class='btn btn-default'>Salvale modifiche</button></td>";
							echo "<td><a href='subscribers.php' class='btn btn-danger'>Torna ai contatti senza salvare</a></td>";
							echo "</tr></table>";
						}
						?>
					</fieldset>
				</form>
			</div>

			<div class="col-md-5">
				<form>
					<fieldset>
						<div class="form-group">
							<label for="cognome">Cognome</label> <input type="text"
								class="form-control" id="cognome"
								placeholder="Inserisci il cognome..."
								<?php echo $editFlag; echo "value='".$contactData->getSurname()."'"?>>
						</div>
						<div class="form-group">
							<label for="citta">Citt&agrave;</label> <input type="text"
								class="form-control" id="city"
								placeholder="Inserisci la tua città"
								<?php echo $editFlag; echo "value='".$contactData->getCity()."'"?>>
						</div>
						<div class="form-group">
							<label for="sitoWeb">Sito Web</label> <input type="text"
								class="form-control" id="email"
								placeholder="Inserisci il tuo sito Web"
								<?php echo $editFlag; echo "value='".$contactData->getWebsite()."'"?>>
						</div>
					</fieldset>
				</form>
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
