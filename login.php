<?php
	session_start();
?>
<html>


	<head>
 		<title></title>
	</head>

	<body>

		<?php

         if(isset($_POST['trimite'])){         	if($_POST['user']!="")
         		if($_POST['pass']!=""){         			include_once "functii.php";
         			connect();
         			login($_POST['user'],$_POST['pass']);
         			echo $_SESSION['rang'];         		}
         		else
         			echo '<h1>Nu ati completat Parola</h1>';
         	else
         		echo '<h1>Nu ati completat Username</h1>';         }
         else
         	echo '<h1>Nu aveti acces!!!</h1>';

		?>

	</body>

</html>