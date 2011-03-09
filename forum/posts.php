<?php session_start(); ?>
<html>
  <head>
    <title></title>
  </head>
<body>
  <form action="posts.php" method="POST">
  	  Titlu : <input type="text" name="titlu" /><br />
  	  Continut : <textarea name="textarea" rows="10" cols="50"/>
  	  	Posteaza ce vrei!!!!
  	  </textarea><br />

  	  <input type="submit" name="posteaza" value="Poteaza" />
  	  <input type="hidden" name="tabel" value=<?php echo $_POST['topich']; ?> />
  </form>
<?php
	include_once "functii.php";
	connect();

	if(isset($_POST['posteaza'])){			if($_POST['texarea']=="Posteaza ce vrei!!!!" || $_POST['titlu']=="")
				echo "<h2><center>Nu ati completat toate datele!!!</h2><center><h3><a href='posts.php'>OK</a></h3>";
			else{		 	$query="INSERT INTO  ".$_POST['tabel']." (nume) VALUES ('".$_POST['titlu']."')";
            $result=mysql_query($query);
            if($result){
            	$query="CREATE TABLE  IF NOT EXISTS ".$_POST['titlu']." (id INT(4) AUTO_INCREMENT NULL PRIMARY KEY, continut VARCHAR(200) NULL, date DATE NULL ,autor VARCHAR(50) NULL)";
                $result1=mysql_query($query);
                if($result1){
                	$query1="INSERT INTO  ".$_POST['titlu']." (continut) VALUES ('".$_POST['textarea']."')";
                	echo  $_POST['textarea'];
           			$result2=mysql_query($query1);
           			if($result2)
                	echo "<h2><center>Datele au fost introduse cu succes!!!</h2><h3><center><a href='topic.php?nume=".$_POST['tabel']."'>OK</a></h3>";
                	else
                	 echo "<h2><center>Eroare la introducerea datelor2!!!</h2><center><h3><a href='topic.php?nume=".$_POST['tabel']."'>OK</a></h3>";}
                else
                echo "<h2><center>Eroare la introducerea datelor1!!!</h2><center><h3><a href='topic.php?nume=".$_POST['tabel']."'>OK</a></h3>";			}}
	}
?>
</body>
</html>