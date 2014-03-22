<?php
@ require 'include/php_functions/db_functions.php';
@ require 'include/db_data/db_data.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<title>Operazioni contatto</title>
</head>

<body>

<center>
<img src="IMG/Top_banner/Cloud_banner.png" class="banner" />
<div align="left" class="mainContainer">
	<h1>Dettaglio contatto</h1>
	
    <ul class="navigation">
    <a href="home.php"><li>Menu principale</li></a>
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
		
			echo"
    		<tr>
                <td>Nome</td>
                <td><input type='text' value=''/></td>
                <td>Cognome</td>
                <td><input type='text' value=''/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td colspan='3'><input type='text' value='' style='width:630px;'/></td>
            </tr>
            <tr>
                <td>Città</td>
                <td><input type='text' value=''/></td>
                <td>Stato</td>
                <td><input type='text' value=''/></td>
            </tr>
            <tr>
                <td>Attivit&agrave;</td>
                <td><input type='text' value=''/></td>
                <td>Sito Web</td>
                <td><input type='text' value=''/></td>
            </tr>
            <tr>
                <td>Data di iscrizione</td>
                <td><input type='text' value=''/></td>
                <td colspan='2'></td>
            </tr>"; 			
	
			$query = mysql_query("SELECT description FROM rules",$dbConn);
			echo"<tr>
				<td>Posizione</td>
				<td>
					<select>";
					while ($row = mysql_fetch_array($query)){
					echo"<option>".$row['description']."</option>";
					}
					echo"</select>
				</td>
				<td colspan='2'></td>
			</tr>"; 
        ?>
        </table>
    </form>
	<div align="right">
        <ul class="submit">
            <a href="#"><li>Inserisci</li></a>
        </ul>
    </div>

<?php
disconnectFromDB($dbConn);
?>
	
</div>
</center>

</body>
</html>