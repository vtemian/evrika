<?php
	session_start();
?>
<html>

<head>
  <title></title>
</head>

<body>
  <h1><center>Administrator</h1><hr />
  <h2>Forum</h2>
<?php

 if($_SESSION['rang']=='3'){
        include_once "functii.php";
        connect();
 		 echo "
        <form action='adm.php' method='post'>
        	Nume : <input type='text' name='nume' /><br />
            <input type='radio' value='categ' name='radio' />Categorie
            <input type='radio' value='subcateg' name='radio' />
            <select name='list'>";
            	adm_SUB();
            echo "
            </select>SubCategorie
        <input type='submit' name='submit' value='Next' />
        </form>
        ";

        }
 if(isset($_POST['submit']))
 	if($_POST['radio']!=""){ 		if($_POST['radio']=="categ"){            $query="INSERT INTO categorii (nume) VALUES ('".$_POST['nume']."')";
            $result=mysql_query($query);
            if($result){            	$query="CREATE TABLE  IF NOT EXISTS ".$_POST['nume']." (id INT(4) AUTO_INCREMENT NULL PRIMARY KEY, nume VARCHAR(50) NULL, posts INT(4) NULL, topics INT(4) NULL)";
                $result1=mysql_query($query);
                if($result1)
                	echo "<h2><center>Datele au fost introduse cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
                else
                echo "<h2><center>Eroare la introducerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";            } 		}
 		else{
            $query="INSERT INTO  ".$_POST['list']." (nume) VALUES ('".$_POST['nume']."')";
            $result=mysql_query($query);
            if($result){
            	$query="CREATE TABLE  IF NOT EXISTS ".$_POST['nume']." (id INT(4) AUTO_INCREMENT NULL PRIMARY KEY, nume VARCHAR(50) NULL, posts INT(4) NULL, topics INT(4) NULL)";
                $result1=mysql_query($query);
                if($result1)
                	echo "<h2><center>Datele au fost introduse cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
                else
                echo "<h2><center>Eroare la introducerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
            }
 		} 	}
 	else
 		echo '<h3>Nu ati ales nici un element!!!</h3>';
  if(isset($_POST['up1'])){
 	$query="RENAME TABLE ".$_SESSION['categ']." TO ".$_POST['up'];
 	$result=mysql_query($query);
 	if($result){
 		$query="UPDATE categorii SET nume='".$_POST['up']."' WHERE nume = '".$_SESSION['categ']."'";
 		$result2=mysql_query($query);
 		if($result2)
 			echo "<h2><center>Datele au fost modificate cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
 		else
 			echo "<h2><center>Eroare la modificarea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 	}
 	else
 		echo "<h2><center>Eroare la modificarea datelor1!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 }
  if(isset($_POST['modificaa'])){
 	echo "<form action='adm.php' method='POST'>
 		  	Introdu numele nou : <input type='text' name='up' />
 		  	<input type='submit' name='up1' value='Modifica' />
 		  </form>";
 	$_SESSION['categ']=$_POST['sub'];
 }
 else
 if(isset($_POST['sterger'])){
 	$query="DELETE FROM categorii WHERE nume='".$_POST['sub']."'";
 	$result=mysql_query($query);
 	if($result){
 		$query="DROP TABLE ".$_POST['sub'];
 		$result2=mysql_query($query);
 		if($result2)
			 echo "<h2><center>Datele au fost sterse cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
		else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 	}
 	else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 }
 else{
 echo '
 <form action="adm.php" method="post">
 	<b>Categorii</b>
 	<select name="sub">
 		';adm_SUB();
 echo'
 	</select>
 	<input type="submit" name="sterger" value="Sterge" />
	<input type="submit" name="modificaa" value="Modifica" />
 </form>';}

 if(isset($_POST['stergesub'])){
 	$query="DELETE FROM ".$_SESSION[$_POST['radio']]." WHERE nume='".$_POST['radio']."'";
 	$result=mysql_query($query);
 	if($result){ 		$query="DROP TABLE ".$_POST['radio'];
 		$result2=mysql_query($query);
 		if($result2)
			 echo "<h2><center>Datele au fost sterse cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
		else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>"; 	}
 	else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>"; }
 if(isset($_POST['modificasub'])){ 	echo "<form action='adm.php' method='POST'>
 		  	Introdu numele nou : <input type='text' name='upgrade' />
 		  	<input type='submit' name='up2' value='Modifica' />
 		  </form>";
 	$_SESSION['modifica']=$_POST['radio'];
 	$_SESSION['tabel']=$_SESSION[$_POST['radio']]; }
 if(isset($_POST['up2'])){ 	$query="RENAME TABLE ".$_SESSION['modifica']." TO ".$_POST['upgrade'];
 	$result=mysql_query($query);
 	if($result){ 		$query="UPDATE ".$_SESSION['tabel']." SET nume='".$_POST['upgrade']."' WHERE nume = '".$_SESSION['modifica']."'";
 		$result2=mysql_query($query);
 		if($result2)
 			echo "<h2><center>Datele au fost modificate cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
 		else
 			echo "<h2><center>Eroare la modificarea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>"; 	}
 	else
 		echo "<h2><center>Eroare la modificarea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>"; }
?>
<form action="adm.php" method="POST">
<?php adm_GENCATEG(); ?>
<input type="submit" name="stergesub" value="Sterge" />
<input type="submit" name="modificasub" value="Modifica" />
</form><hr />
<h2>Utilizatori</h2>
<?php
if(isset($_POST['stergem'])||isset($_POST['stergeu'])){
				$queryn="DELETE FROM user WHERE id='".$_POST['id']."'";
				$resultn=mysql_query($queryn);
				if($resultn)echo 'Stergerea s-a realizat.<a href="adm.php">OK</a>';
				else
				echo 'Eroare la stergere';}

			if(isset($_POST['avanseazam'])){
				$queryn="UPDATE user SET rang='3' WHERE id='".$_POST['id']."'";
				$resultn=mysql_query($queryn);
				if($resultn)echo 'Avansarea s-a realizat.<a href="adm.php">OK</a>';
				else
				echo 'Eroare la avansare.<a href="adm.php">OK</a>';}


			if(isset($_POST['avanseazau'])){
				$queryn="UPDATE user SET rang='2' WHERE id='".$_POST['id']."'";
				$resultn=mysql_query($queryn);
				if($resultn){					$query="UPDATE user SET moderator='".$_POST['mod']."' WHERE id='".$_POST['id']."'";
					$result=mysql_query($query);
					if($result)echo 'Avansarea s-a realizat.<a href="adm.php">OK</a>';
					else
					echo 'Eroare la avansare.<a href="adm.php">OK</a>';				}
				else
				echo 'Eroare la avansare.<a href="adm.php">OK</a>';}

			if(isset($_POST['jos'])){
				$queryn="UPDATE user SET rang='1' WHERE id='".$_POST['id']."'";
				$resultn=mysql_query($queryn);
				if($resultn){
					echo 'Taierea s-a realizat.<a href="adm.php">OK</a>';
				}
				else
				echo 'Eroare la taiere.<a href="adm.php">OK</a>';}
			if(isset($_POST['baneaza'])){
				$queryn="UPDATE user SET BANAT='1' WHERE id='".$_POST['id']."'";
				$resultn=mysql_query($queryn);
				if($resultn){
					echo 'Banarea s-a realizat.<a href="adm.php">OK</a>';
				}
				else
				echo 'Eroare la banare.<a href="adm.php">OK</a>';}

			if(isset($_POST['debanare'])){				$query="SELECT * FROM user WHERE id='".$_POST['id']."'";
				$result=mysql_query($query);
				if($result){					while($row=mysql_fetch_array($result)){						 if($row['BANAT']=='1'){						 	$queryn="UPDATE user SET BANAT='0' WHERE id='".$_POST['id']."'";
							$resultn=mysql_query($queryn);
							if($resultn){
							echo 'Debanarea s-a realizat.<a href="adm.php">OK</a>';}
							else
								echo 'Eroare la debanare.<a href="adm.php">OK</a>';
							}
						else
						    echo 'User nebanat.<a href="adm.php">OK</a>';					}				}
				else
				   echo 'Eroare la debanare.<a href="adm.php">OK</a>';
			}

echo "
<form action='adm.php' method='POST'>
<h3><u>Moderatori</u></h3>
				<table spacing='2'>
				<tr><td></td><td><h2>ID</h2></td><td><h2>Numele</h2></td><td><h2>Prenume</h2></td><td><h2>Nickname</h2></td><td><h2>Moderator</h2></td></tr>";

			$query2="SELECT * FROM user";
			$result2=mysql_query($query2);
			$c=1;

			while($row=mysql_fetch_array($result2)){
					if($row['rang']=='2')
					echo '<tr><td><input type="radio" name="id" value="'.$row['id'].'"></td> <td>'.$c++.'</td><td><h4>'.$row['nume'].'</h4></td><td><h4>'.$row['prenume'].'</h4></td><td><h4>'.$row['user'].'</h4></td><td><h4>'.$row['moderator'].'</h4></td></tr>';
			}
			if($c>1)
			echo' 	</table><input type="submit" name="stergem" value="Sterge" />
			       <input type="submit" name="avanseazam" value="Avanseaza la administrator" />
			       <input type="submit" name="jos" value="Sterge rang" />';
			echo '</form>';

echo "<form action='adm.php' method='POST'>
</table><h3><u>Utilizatori</u></h3>
				<table spacing='2'>
				<tr><td></td><td><h2>ID</h2></td><td><h2>Numele</h2></td><td><h2>Prenume</h2></td><td><h2>Nickname</h2></td><td><h2>BANAT</h2></td></tr>";

			$query2="SELECT * FROM user";
			$result2=mysql_query($query2);
			$c=1;

			while($row=mysql_fetch_array($result2)){
					if($row['rang']=='1'){
					if($row['BANAT']=='1')$banat='DA';
					else
					$banat='NU';
					echo '<tr><td><input type="radio" name="id" value="'.$row['id'].'"></td> <td>'.$c++.'</td><td><h4>'.$row['nume'].'</h4></td><td><h4>'.$row['prenume'].'</h4></td><td><h4>'.$row['user'].'</h4></td><td><h4>'.$banat.'</h4></td></tr>';}
			}
			if($c>1){
			 echo' 	</table><input type="submit" name="stergeu" value="Sterge" />
			       <input type="submit" name="avanseazau" value="Avanseaza la moderator" />
			       <select name="mod">';
			       		adm_SUB();
			echo'
			       </selenct>
			       <input type="submit" name="baneaza" value="Baneaza" />
			       <input type="submit" name="debanare" value="Debaneaza" />';}echo'
				</form>';

?>
</body>

</html>