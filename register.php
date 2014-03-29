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
		<div class="workingArea">
			<h4>Nuovo utente:</h4>
			<div class="newUser">
				<form>
					<fieldset>
						<div class="form-group">
							<label for="nome">Nome</label> <input type="text"
								class="form-control" id="nome"
								placeholder="Inserisci il nome...">
						</div>
						<div class="form-group">
							<label for="cognome">Cognome</label> <input type="text"
								class="form-control" id="cognome"
								placeholder="Inserisci il cognome...">
						</div>
						<div class="form-group">
							<label for="email">Email</label> <input type="text"
								class="form-control" id="email"
								placeholder="Inserisci l'indirizzo email...">
						</div>
						<div class="form-group">
							<label for="email">Ripeti Email</label> <input type="text"
								class="form-control" id="email"
								placeholder="Inserisci l'indirizzo email...">
						</div>
						<div class="form-group">
							<label for="password">Password</label> <input type="password"
					class="form-control" placeholder="Password" required
					name="password">
						</div>
						
						<button type="submit" class="btn btn-default">Registra</button>
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
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
