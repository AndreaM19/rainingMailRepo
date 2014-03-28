<?php
require_once 'Contact.php'; 
require_once 'Message.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prova</title>
</head>

<body>

<?php
$prova = new Contact("Andrea", "Marchetti", "19andrea.m@gmail.com", "Pesaro", date("d.m.y"));
echo "<h5>".$prova->getMail()."</h5>";
echo "<h5>".$prova->getName()."</h5>";
echo "<h5>".$prova->getSurname()."</h5>";
echo "<h5>".$prova->getCity()."</h5>";
echo "<h5>".$prova->getSubscriptionDate()."</h5>";
?>
</body>
</html>