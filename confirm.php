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

		$p1 = mysql_real_escape_string($_POST['p1']);
		$p2 = mysql_real_escape_string($_POST['p2']);
		$p3 = mysql_real_escape_string($_POST['p3']);
		$p4 = mysql_real_escape_string($_POST['p4']);

		$m1 = mysql_real_escape_string($_POST['m1']);
		$m2 = mysql_real_escape_string($_POST['m2']);
		$m3 = mysql_real_escape_string($_POST['m3']);
		$m4 = mysql_real_escape_string($_POST['m4']);

		print "<div id='quoteholder'>";
			print "<div id='quoteholder-middle'>";
				print "<div id='quoteholder-inner'>";

					print "<form action='youdidit.php' method='POST'>";

							print "<input type='hidden' name='per1' value='$p1'>";
							print "<input type='hidden' name='per2' value='$p2'>";
							print "<input type='hidden' name='per3' value='$p3'>";
							print "<input type='hidden' name='per4' value='$p4'>";
							print "<input type='hidden' name='mess1' value='$m1'>";
							print "<input type='hidden' name='mess2' value='$m2'>";
							print "<input type='hidden' name='mess3' value='$m3'>";
							print "<input type='hidden' name='mess4' value='$m4'>";

							if ($p1 != '') {
								print "<div id='theactualquoteforrealthistime' class='image'>";
									print "<img src='img/" . $p1 . ".jpg'>";
									print "<p>$p1</p>";
								print "</div>";
								print "<div id='theactualquoteforrealthistime' class='message1'>";
									print "<p class='quote'>$m1</p>";
								print "</div>";
							print "</div>";
							}

							else {
								print "<div id='theactualquoteforrealthistime' class='image'>";
									print "<img src='img/" . $errorimg . ".jpg'>";
									print "<p>$errorname</p>";
								print "</div>";
								print "<div id='theactualquoteforrealthistime' class='message1' style='margin-top: 10px;'>";
									print "<p class='quote'>Sorry, it looks like you didn't submit anything?<br />Click <a href='submit.php'>here</a> to head back to the submission form<br />or <a href='index.php'>here</a> to head back to where the quotes are at.</p>";
								print "</div>";
							print "</div>";
							}

							if ($p2 != '') {
								print "<div id='quoteholder-inner'>";
									print "<div id='theactualquoteforrealthistime' class='image'>";
										print "<img src='img/" . $p2 . ".jpg'>";
										print "<p>$p2</p>";
									print "</div>";
									print "<div id='theactualquoteforrealthistime' class='message2'>";
										print "<p class='quote'>$m2</p>";
									print "</div>";
								print "</div>";
							}

							if ($p3 != '') {
								print "<div id='quoteholder-inner'>";
									print "<div id='theactualquoteforrealthistime' class='image'>";
										print "<img src='img/" . $p3 . ".jpg'>";
										print "<p>$p3</p>";
									print "</div>";
									print "<div id='theactualquoteforrealthistime' class='message3'>";
										print "<p class='quote'>$m3</p>";
									print "</div>";
								print "</div>";
							}

							if ($p4 != '') {
								print "<div id='quoteholder-inner'>";
									print "<div id='theactualquoteforrealthistime' class='image'>";
										print "<img src='img/" . $p4 . ".jpg'>";
										print "<p>$p4</p>";
									print "</div>";
									print "<div id='theactualquoteforrealthistime' class='message4'>";
										print "<p class='quote'>$m4</p>";
									print "</div>";
								print "</div>";
							}

							print "<input type='submit' value='Yup, that is correct!'>";
						print "</form>";
						print "<form action='submit.php' method='POST'>";

							print "<input type='hidden' name='$p1' value='$p1'>";
							print "<input type='hidden' name='$p2' value='$p2'>";
							print "<input type='hidden' name='$p3' value='$p3'>";
							print "<input type='hidden' name='$p4' value='$p4'>";
							print "<input type='hidden' name='$m1' value='$m1'>";
							print "<input type='hidden' name='$m2' value='$m2'>";
							print "<input type='hidden' name='$m3' value='$m3'>";
							print "<input type='hidden' name='$p4' value='$m4'>";

							print "<input type='submit' value='Oops, just a sec while I change something!'>";

						print "</form>";

				print "</div>";
			print "</div>";
		print "</div>";

		print "<footer>";
				print "<p>Once you're done, we'll be up to " . $flavournext . " different flavours!</p>";
		print "</footer>";
	?>
</body>
</html>
