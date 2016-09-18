<!DOCTYPE html>
<html>
<head>
	<title>Look at all these words!</title>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen">
</head>
<body>
	<div id="wrapper">
		<header>
			<h1>HCC: Hot Chocolate Chats</h1>
			<p class="tagline">Serving quotes, jokes and puns since yesterday!</p>


		<?php

		$host="localhost"; // Host name
		$user="USERNAME"; // Obvious username
		$password="PASSWORD"; // Super secure test password
		$db_name="quotes"; // Database name!

		$con = mysql_connect("$host", "$user", "$password") or die ('Oops, you were not able to connect to the database!');
		mysql_select_db("$db_name");

		print "<a href='/'>Aaah, get me out of here!</a>";
		print "</header>";

		$errorimg = 'Reyner';
		$errorname = 'Reyner';

		$countfetch = "SELECT ref FROM quotes ORDER BY ref DESC LIMIT 1";
		$dbcount = mysql_query($countfetch);
		$flavourfetch = mysql_fetch_array($dbcount);
		$flavourcount = $flavourfetch['0'];
		$flavournext = $flavourcount + 1;

		$p1 = mysql_real_escape_string($_POST['per1']);
		$p2 = mysql_real_escape_string($_POST['per2']);
		$p3 = mysql_real_escape_string($_POST['per3']);
		$p4 = mysql_real_escape_string($_POST['per4']);

		$m1 = mysql_real_escape_string($_POST['mess1']);
		$m2 = mysql_real_escape_string($_POST['mess2']);
		$m3 = mysql_real_escape_string($_POST['mess3']);
		$m4 = mysql_real_escape_string($_POST['mess4']);

		$sql = "INSERT INTO quotes (ref, quote1, message1, quote2, message2, quote3, message3, quote4, message4) VALUES ('$flavournext', '$p1', '$m1', '$p2', '$m2', '$p3', '$m3', '$p4', '$m4')";

		$send = mysql_query($sql, $con);

		print "<div id='quoteholder'>";
			print "<div id='quoteholder-middle'>";
				print "<div id='quoteholder-inner'>";

					print "<div id='theactualquoteforrealthistime' class='image'>";
							print "<img src='img/" . $errorimg . ".jpg'>";
							print "<p>$errorname</p>";
						print "</div>";
						print "<div id='theactualquoteforrealthistime' class='message1'>";
								if(! $send) {
									die('There was an error: ' . mysql_error());
								}
								else {
								echo "<p class='quote'>Alrighty! I've submitted your quote!<br />You can click <a href='index.php?ref=$flavournext'>here</a> to see it!</p>";
								mysql_close($con);
								}
							print "</div>";
						print "</div>";

				print "</div>";
			print "</div>";
		print "</div>";

		print "<footer>";
				print "<p>Once you're done, we'll be up to " . $flavournext . " different flavours!</p>";
		print "</footer>";
	?>
</body>
</html>
