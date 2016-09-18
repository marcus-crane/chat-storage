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
			<p><a href="submit.php">Submit your own HCC snippet!</a></p>


		<?php

		$host="localhost"; // Host name
		$user="USERNAME"; // Obvious username
		$password="PASSWORD"; // Super secure test password
		$db_name="quotes"; // Database name!

		$con = mysql_connect("$host", "$user", "$password") or die ('Oops, you were not able to connect to the database!');
		mysql_select_db("$db_name");

		$countfetch = "SELECT ref FROM quotes ORDER BY ref DESC LIMIT 1";
		$dbcount = mysql_query($countfetch);
		$flavourfetch = mysql_fetch_array($dbcount);
		$flavourcount = $flavourfetch['0'];
		$truecount = $flavourfetch['0'];

		$reference = $_GET['ref'];

		if (!$reference) {
			$sql = "SELECT * FROM quotes WHERE ref = '$flavourcount'";
			$reference = $flavourcount;
		}
		else {
			$sql = "SELECT * FROM quotes WHERE ref = '$reference'";
		}

		$next = $reference + 1;
		$previous = $reference - 1;
		$previousword = 'Previous';

		print "<br />";

		settype($reference, 'integer');
		settype($flavourcount, 'integer');

		if ($reference > 1 && $reference < $truecount) {
			print "<a href='?ref=$previous'>Previous</a>";
			print " | ";
			print "<a href='?ref=$next'>Next</a>";
		}
		elseif ($reference = $truecount && $next != 2) {
			print "<a href='?ref=$previous'>$previousword</a>";
		}
		else {
			print "<a href='?ref=$next'>Next</a>";
		}

		print "</header>";

		$conversation = mysql_query($sql);

		$errorimg = 'Reyner';
		$errorname = 'Reyner';

		while ($sorting = mysql_fetch_array($conversation)) {
				$quote1 = $sorting['quote1'];
				$message1 = $sorting['message1'];
				$image1 = $sorting['quote1'];

				$quote2 = $sorting['quote2'];
				$message2 = $sorting['message2'];
				$image2 = $sorting['quote2'];

				$quote3 = $sorting['quote3'];
				$message3 = $sorting['message3'];
				$image3 = $sorting['quote3'];

				$quote4 = $sorting['quote4'];
				$message4 = $sorting['message4'];
				$image4 = $sorting['quote4'];
		}

		print "<div id='quoteholder'>";
			print "<div id='quoteholder-middle'>";
				print "<div id='quoteholder-inner'>";

				if ($quote1 != '') {
					print "<div id='theactualquoteforrealthistime' class='image'>";
						print "<img src='img/" . $image1 . ".jpg'>";
						print "<p>$quote1</p>";
					print "</div>";
					print "<div id='theactualquoteforrealthistime' class='message1'>";
						print "<p class='quote'>$message1</p>";
					print "</div>";
				print "</div>";
				}
				else {
					print "<div id='theactualquoteforrealthistime' class='image'>";
						print "<img src='img/" . $errorimg . ".jpg'>";
						print "<p>$errorname</p>";
					print "</div>";
					print "<div id='theactualquoteforrealthistime' class='message1' style='margin-top: 10px;'>";
						print "<p class='quote'>Ugh, wow. How rude of you to break the site!<br />Either I did something wrong or we don't have that many entries in the database!</br>You can let me know at [email address] or in game.</p>";
					print "</div>";
				print "</div>";
				}

				if ($quote2 != '') {
					print "<div id='quoteholder-inner'>";
						print "<div id='theactualquoteforrealthistime' class='image'>";
							print "<img src='img/" . $image2 . ".jpg'>";
							print "<p>$quote2</p>";
						print "</div>";
						print "<div id='theactualquoteforrealthistime' class='message2'>";
							print "<p class='quote'>$message2</p>";
						print "</div>";
					print "</div>";
				}

				if ($quote3 != '') {
					print "<div id='quoteholder-inner'>";
						print "<div id='theactualquoteforrealthistime' class='image'>";
							print "<img src='img/" . $image3 . ".jpg'>";
							print "<p>$quote3</p>";
						print "</div>";
						print "<div id='theactualquoteforrealthistime' class='message3'>";
							print "<p class='quote'>$message3</p>";
						print "</div>";
					print "</div>";
				}

				if ($quote4 != '') {
					print "<div id='quoteholder-inner'>";
						print "<div id='theactualquoteforrealthistime' class='image'>";
							print "<img src='img/" . $image4 . ".jpg'>";
							print "<p>$quote4</p>";
						print "</div>";
						print "<div id='theactualquoteforrealthistime' class='message4'>";
							print "<p class='quote'>$message4</p>";
						print "</div>";
					print "</div>";
				}

			print "</div>";
		print "</div>";
	print "</div>";

	print "<footer>";
		#print "<a href='submit.php'>Want to submit your own HCC snippet?</a>";

		if ($message1 != '') {
			print "<p>Available in " . $flavourcount . " different flavours!</p>";
		}
		else {
			print "<p>You ruined all the flavours by breaking the site. They've all melted!</p>";
		}
	print "</footer>";

	?>
</body>
</html>
