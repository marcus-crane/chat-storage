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

		$fcmembers = array(
			'',
			Alayne,
			Alex,
			Anngelle,
			Ataru,
			Braith,
			Ebony,
			Elle,
			Eri,
			Erin,
			Felicia,
			Flo,
			Ganon,
			Jing,
			Jorah,
			Junyara,
			Kikyo,
			Knox,
			Lalah,
			Leek,
			Lolz,
			Lorelai,
			Lyra,
			Nyahn,
			Noon,
			Pan,
			Reyner,
			Rolgo,
			Sagi,
			Serena,
			Sky,
			Sleepy,
			Sor,
			Swishy,
			Thalele,
			Toesies,
			Tristus,
		);

		$fcmembercount = count($fcmembers); // How many FC members do we have minus 1?
		$fcmembercountadj = $fcmembercount - 1;

		$p1 = $_POST['p1'];
		$p2 = $_POST['p2'];
		$p3 = $_POST['p3'];
		$p4 = $_POST['p4'];

		$m1 = $_POST['m1'];
		$m2 = $_POST['m2'];
		$m3 = $_POST['m3'];
		$m4 = $_POST['m4'];

		print "<div id='quoteholder'>";
			print "<div id='quoteholder-middle'>";
				print "<div id='quoteholder-inner'>";

						print "<form action='confirm.php' method='POST'>";
							print "<div id='theactualquoteforrealthistime' class='drop1'>";
									print "<select name='p1'>";
										for ($i = 0; $i < $fcmembercount; $i++) {
										    print "<option value='$fcmembers[$i]'>$fcmembers[$i]</option>";
										}
									print "</select>";
							print "</div>";
							print "<div id='theactualquoteforrealthistime' class='message1'>";
								print "<textarea name='m1' placeholder='Why did Sor cross the road?'></textarea>";
							print "</div>";

							print "<br />";

							print "<div id='theactualquoteforrealthistime' class='drop2'>";
									print "<select name='p2'>";
										for ($i = 0; $i < $fcmembercount; $i++) {
										    print "<option value='$fcmembers[$i]'>$fcmembers[$i]</option>";
										}
									print "</select>";
							print "</div>";
							print "<div id='theactualquoteforrealthistime' class='message2'>";
								print "<textarea name='m2' placeholder='I don&#39;t know! Why did Sor cross the road?'></textarea>";
							print "</div>";

							print "<br />";

							print "<div id='theactualquoteforrealthistime' class='drop3'>";
									print "<select name='p3'>";
										for ($i = 0; $i < $fcmembercount; $i++) {
										    print "<option value='$fcmembers[$i]'>$fcmembers[$i]</option>";
										}
									print "</select>";
							print "</div>";
							print "<div id='theactualquoteforrealthistime' class='message3'>";
								print "<textarea name='m3' placeholder='To beat you for trying to make a chicken joke.'></textarea>";
							print "</div>";

							print "<br />";

							print "<div id='theactualquoteforrealthistime' class='drop4'>";
									print "<select name='p4'>";
										for ($i = 0; $i < $fcmembercount; $i++) {
										    print "<option value='$fcmembers[$i]'>$fcmembers[$i]</option>";
										}
									print "</select>";
							print "</div>";
							print "<div id='theactualquoteforrealthistime' class='message4'>";
								print "<textarea name='m4' placeholder='What do you mea- OUCH! THAT HURT!'></textarea>";
							print "</div>";

							print "<br />";
							print "<br />";

							print "<input type='submit' value='Submit my quote!'>";
							print "<input type='reset' value='I wanna start over from scratch!'>";
						print "</form>";

				print "</div>";
			print "</div>";
		print "</div>";

		print "<footer>";
				print "<p>Once you're done, we'll be up to " . ($flavourcount + 1) . " different flavours!</p>";
		print "</footer>";
	?>
</body>
</html>
