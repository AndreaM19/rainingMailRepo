<?php
@ require 'include/php_functions/db_functions.php';
@ require 'include/db_data/db_data.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<title>Dettaglio contatto</title>
</head>

<body>

<center>
<img src="IMG/Top_banner/Cloud_banner.png" class="banner" />
<div align="left" class="mainContainer">
	<h1>Dettaglio contatto</h1>
	
    <ul class="navigation">
    <a href="home.php"><li>Menu principale</li></a>
    <?php 
	$link="#";
	if(@$_GET['listType']!="blogger")$link="subscriberList.php";
	if(@$_GET['listType']=="blogger")$link="bloggerList.php";
	echo"<a href='".$link."'><li>Torna alla lista</li></a>";
	?>
    <a href="#"><li>Altre funzioni</li></a>
    <a href="#"><li>Altre funzioni</li></a>
    <a href="#"><li>Altre funzioni</li></a>
    </ul>
        
    <br />
<?php
$dbConn=connectToDB($HOST, $USER, $PASSWORD, $DB);
?>

	<form class="details">
        <table class="form">
		<?php
		$enableFlag="disabled='disabled'";
        if(@$_GET['details']=="showMoreDetails"){
        	$query = mysql_query("SELECT * FROM subscribers WHERE Email='".$_GET['mail']."'",$dbConn);
			$enableFlag="disabled='disabled'";
		}
		if(@$_GET['details']=="editDetails"){
        	$query = mysql_query("SELECT * FROM subscribers WHERE Email='".$_GET['mail']."'",$dbConn);
			$enableFlag='';
		}
		
        while ($row = mysql_fetch_array($query)){
			echo"
    		<tr>
                <td>Nome</td>
                <td><input type='text' value='".$row['Nome']."' ".$enableFlag."/></td>
                <td>Cognome</td>
                <td><input type='text' value='".$row['Cognome']."' ".$enableFlag."/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td colspan='3'><input type='text' value='".$row['Email']."' style='width:630px;' ".$enableFlag."/></td>
            </tr>
            <tr>
                <td>Città</td>
                <td><input type='text' value='".$row['Citta']."' ".$enableFlag."/></td>
                <td>Stato</td>
                <td><input type='text' value='".$row['Stato']."' ".$enableFlag."/></td>
            </tr>
            <tr>
                <td>Attivit&agrave;</td>
                <td><input type='text' value='".$row['Attivita']."' ".$enableFlag."/></td>
                <td>Sito Web</td>
                <td><input type='text' value='".$row['Sito_Web']."' ".$enableFlag."/></td>
            </tr>
            <tr>
                <td>Data di iscrizione</td>
                <td><input type='text' value='".$row['Data_iscrizione']."' ".$enableFlag."/></td>
                <td colspan='2'></td>
            </tr>"; 			
		}
		
		if(@$_GET['listType']=="blogger"){
			$query = mysql_query("SELECT Position FROM blogger WHERE Contact='".$_GET['mail']."'",$dbConn);
			while ($row = mysql_fetch_array($query)){
				echo"<tr>
					<td>Posizione</td>
					<td><input type='text' value='".$row['Position']."' ".$enableFlag."/></td>
					<td colspan='2'></td>
				</tr>"; 
				}
			}
        ?>
        </table>
    </form>


<?php
disconnectFromDB($dbConn);
?>
	
</div>
</center>

</body>
</html>