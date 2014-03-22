<?php
@ require 'include/php_functions/db_functions.php';
@ require 'include/db_data/db_data.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<title>Newsletter</title>
</head>

<body>
<center>
<img src="IMG/Top_banner/Cloud_banner.png" class="banner" />
<div align="left" class="mainContainer">

	<h1>Newsletter</h1>

	<div class="indexButtons">
    <h5>Visualizzazioni</h5>
    <ul class="navigation">
		<a href="subscriberList.php"><li>Lista iscritti</li></a>
		<a href="bloggerList.php"><li>Lista sottoscrittori</li></a>
    </ul>
    <h5>Operazioni sui contatti</h5>
    <ul class="navigation">
        <a href="contactsOperations.php"><li>Nuovo contatto</li></a>
		<a href="deleteMultiple.php"><li>Elimina contatti</li></a>
    </ul>
	</div>
</div>
</center>

</body>
</html>