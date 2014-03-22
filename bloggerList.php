<?php
@ require 'include/php_functions/db_functions.php';
@ require 'include/db_data/db_data.php';
@ require 'include/String_messages/messages.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<script type="text/javascript" src="JS/js_scripts.js"></script>
<title>Gestione Newsletter</title>
</head>

<body>
<center>
<img src="IMG/Top_banner/Cloud_banner.png" class="banner" />
<div align="left" class="mainContainer">
<h1>Lista sottoscrittori Newsletter</h1>

<ul class="navigation">
<a href="home.php"><li>Menu principale</li></a>
<a href="#"><li>Altre funzioni</li></a>
<a href="#"><li>Altre funzioni</li></a>
<a href="#"><li>Altre funzioni</li></a>
<a href="#"><li>Altre funzioni</li></a>
</ul>
<?php
$dbConn=connectToDB($HOST, $USER, $PASSWORD, $DB);
?>

<div class="info">
<?php
$countQuery = mysql_query("SELECT COUNT(*) FROM  blogger",$dbConn);
while ($countRow = mysql_fetch_array($countQuery))echo"<p>TOT Sottoscrittori: ".$countRow['COUNT(*)']."</p>";
?>
<ul class="order">
<a href="bloggerList.php?order=name"><li>Ordina per Nome</li></a>
<a href="bloggerList.php?order=surname"><li>Ordina per Cognome</li></a>
<a href="bloggerList.php?order=email"><li>Ordina per Email</li></a>
</ul>
</div><br />

<table class="subscribersList" cellspacing="0">
	
	<tbody>
	<?php
	$count=1;
	$listOrder="";
	if(@$_GET['order']=="name")$listOrder=" ORDER BY Nome ASC";
	if(@$_GET['order']=="surname")$listOrder=" ORDER BY Cognome ASC";
	//if(@$_GET['order']=="email")$listOrder=" ORDER BY Cognome ASC";
	else $listOrder=" ORDER BY Email ASC";
	$queryText="SELECT Nome, Cognome, Email, Position FROM blogger INNER JOIN subscribers ON Email=Contact".$listOrder."";
    $query = mysql_query($queryText,$dbConn);
    while ($row = mysql_fetch_array($query))	
        {
        echo"<tr>
		<td>".$count."</td>
		<td>".$row['Nome']."</td>
		<td>".$row['Cognome']."</td>
		<td>".$row['Email']."</td>
		<td>".$row['Position']."</td>
		<td class='icons'><a href='details.php?details=editDetails&mail=".$row['Email']."'><img src='IMG/Icons/edit.png' /></a></td>
		<td class='icons'><a href='bloggerList.php?reload=delete&name=".$row['Nome']."&surname=".$row['Cognome']."' onClick='return confirmScreenMessage(\"".$CONFIRM_DELETE_MESSAGE_INIT." ".$row['Nome']." ".$row['Cognome']." ".$CONFIRM_DELETE_MESSAGE_END."\");'><img src='IMG/Icons/delete.png' /></a></td>
		<td class='icons'><a href='details.php?details=showMoreDetails&mail=".$row['Email']."'><img src='IMG/Icons/moreInfo.png' /></a></td>
		</tr>";
		$count++;
        }
    ?>
    </tbody>
</table>
<?php
disconnectFromDB($dbConn);
?>

<?php
if(@$_GET['reload']=="delete"){
	echo"
	<script>
		screenMessage(\"Utente ".$_GET['name']." ".$_GET['surname']." rimosso con successo\");
	</script>
	";
}
?>
</div>
</center>

</body>
</html>