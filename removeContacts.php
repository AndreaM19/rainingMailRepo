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

<!--My Javascript Scripts-->
<script type="text/javascript" language="javascript"
	src="js/js_scripts.js"></script>

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

			<?php	
			$queryText="SELECT * FROM subscribers";
			$query=mysqli_query($dbConn, $queryText);
			$numCheckbox=mysqli_num_rows($query);
			mysqli_free_result($query);/* This function is used to free memory space */
			?>
			<hr>
			<div class="col-md-6">
				<?php 
				if(!isset($_GET['remover'])){
					echo "<h4>Utenti iscritti:</h4>";
				}
				if(isset($_GET['remover'])){
					echo "<h4>Utenti da eliminare:</h4>";
					echo "<h6>Sei sicuro di voler eliminare i seguenti contatti?</h6>";
				}
				?>
			</div>
			<div class="col-md-6 alignRight">
				<h5 id="counter">
					<script>displayCounter('none')</script>
				</h5>
			</div>
			<?php 
			/*Standard form set*/
			if(!isset($_GET['remover'])){
				echo "<form class='form-signin' role='form' action='removeContacts.php?remover=1' method='post'>";
			}
			/*Remover proceed form set*/
			if(isset($_GET['remover'])){
				echo "<form class='form-signin' role='form' action='removeContacts.php?remover=1&proceed=true' method='post'>";
			}
			?>


			<table class="table subscriberList">
				<tr style="background-color: #428bca; color: #FFF;">
					<td class="sel"><input type="checkbox" id="globalChange"
						onChange=selectAll('<?php echo $numCheckbox ?>')></td>
					<td class="date">Data iscrizione</td>
					<td class="std">Nome</td>
					<td class="std">Cognome</td>
					<td class="mail">E-Mail</td>
					<td class="icon">Info</td>
				</tr>
				<?php
				if(!isset($_GET['remover'])){
					$count=0;
					$queryText="SELECT * FROM subscribers";
					$query = mysqli_query($dbConn, $queryText);
					while ($row = mysqli_fetch_array($query))
					{
						$checkboxID="sel".$count."";
						echo"<tr>";
						echo"<td class='sel'><input type='checkbox' id='sel".$count."' name='subID[]' value='".$row['ID']."' onChange=displayCounter('".$checkboxID."')></td>";
						echo"<td class='date'>".$row['Data_iscrizione']."</td>";
						echo"<td class='std'>".$row['Nome']."</td>";
						echo"<td class='std'>".$row['Cognome']."</td>";
						echo"<td class='mail'>".$row['Email']."</td>";
						echo"<td class='icon'><a href='contactDetails.php?id=".$row['ID']."&edit=show'><img src='img/icons/moreInfo.png' class='imageIcon'></a></td>";
						echo"</tr>";
						$count++;
					}
					if($count==0)echo"<tr><td>Nessun nuovo iscritto non ancora visualizzato</td></tr>";
					mysqli_free_result($query);/* This function is used to free memory space */
				}

				if(isset($_GET['remover'])){

					//Remove from removeContacts
					$queryClause="";
					if ($_GET['remover']==1){
						$name = $_POST['subID'];
						$arraySize=count($name);
						$arrayPoint=1;
						foreach ($name as $id){
							$queryClause=$queryClause." ID=".$id." ";
							$arrayPoint++;
							if($arrayPoint<=$arraySize) $queryClause=$queryClause."OR ";
						}
					$count=0;
					$queryText="SELECT * FROM subscribers WHERE ".$queryClause;
					//echo $queryText;
					
					$query = mysqli_query($dbConn, $queryText);
					while ($row = mysqli_fetch_array($query))
					{
						$checkboxID="sel".$count."";
						echo"<tr>";
						echo"<td class='sel'><input type='hidden' name='sel[]' value='".$row['ID']."'>";
						echo"<td class='date'>".$row['Data_iscrizione']."</td>";
						echo"<td class='std'>".$row['Nome']."</td>";
						echo"<td class='std'>".$row['Cognome']."</td>";
						echo"<td class='mail'>".$row['Email']."</td>";
						echo"<td class='icon'><a href='contactDetails.php?id=".$row['ID']."&edit=show'><img src='img/icons/moreInfo.png' class='imageIcon'></a></td>";
						echo"</tr>";
						$count++;
					}
					if($count==0)echo"<tr><td>Nessun nuovo iscritto non ancora visualizzato</td></tr>";
					mysqli_free_result($query);/* This function is used to free memory space */
					}

					//Remove from userHome
					else if ($_GET['remover']==2){

					}

					//Remove from subscribers
					else if ($_GET['remover']==3){

					}

					else {
						echo"<tr>";
						echo"<td class='sel'></td>";
						echo"<td class='date'>ERROR</td>";
						echo"<td class='std'>ERROR<td>";
						echo"<td class='std'>ERROR</td>";
						echo"<td class='mail'>ERROR</td>";
						echo"<td class='icon'></td>";
						echo"</tr>";
					}
				}
				?>
			</table>
			<br>

			<?php 
			if(!isset($_GET['remover'])){
				echo "<button type='submit' class='btn btn-warning'>Rimuovi contatto/i</button>";
			}
			if(isset($_GET['remover'])){
				echo "<button type='submit' class='btn btn-warning'>Procedi con la rimozione</button>";
			}
			?>

			</form>

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
