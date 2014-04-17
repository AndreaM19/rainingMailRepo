<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
<body>
	<p>This page uses frames. The current browser you are using does not
		support frames.</p>
	<form action="newfile.php?agg=1" method="post">
		Red<input type="checkbox" name="color[]" id="color" value="red"> Green<input
			type="checkbox" name="color[]" id="color" value="green"> Blue<input
			type="checkbox" name="color[]" id="color" value="blue"> Cyan<input
			type="checkbox" name="color[]" id="color" value="cyan"> Magenta<input
			type="checkbox" name="color[]" id="color" value="Magenta"> Yellow<input
			type="checkbox" name="color[]" id="color" value="yellow"> Black<input
			type="checkbox" name="color[]" id="color" value="black"> <input
			type="submit" value="submit">
	</form>
	<?php
	if(@$_GET['agg']==1){
		$name = $_POST['color'];

		// optional
		// echo "You chose the following color(s): <br>";

		foreach ($name as $color){
			echo $color."<br />";
		}
	}

	?>
</body>
</html>
