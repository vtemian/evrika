<?php
	session_start();

	function connect(){		$c=mysql_connect("localhost","root","");
		if($c){			$link=mysql_select_db("onc");
			if(!$link)echo 'Eroare la selectarea bazei de date!';		}
		else
			echo 'Eroare la conectare!';
	}

	function login($user,$pass){
		 $pass=sha1($pass);
		 $bla="user"."="."'"."$user"."'"." AND ".pass."="."'"."$pass"."'";
		 $query = "select * from user where $bla";
		 $result=mysql_query($query);
		 if (!$result)
				die('Eroare : ' . mysql_error());
		else
			 if(mysql_num_rows($result) == 1){
			 	while($row=mysql_fetch_array($result)){
			 		$_SESSION['nume']=$row['nume'];
			 		$_SESSION['prenume']=$row['prenume'];
			 		$_SESSION['rang']=$row['rang'];}

			 		}
			else
				echo '<h1>Date invalide!</h1>';
}
	function generare_CATEG(){		$query="SELECT * FROM categorii";
		$result=mysql_query($query);
		if(!$result)echo '<h1>Eroare la query de categorii!!!!</h1>';
			else{
				$k=0;
				echo '<table>'				while($row=mysql_fetch_array($result)){
					if($k==0)
						echo '<tr><td>'.$row[nume].'</td><td>Mesaje</td><td>Subiecte</td></tr>';
					else
						echo '<tr><td>'.$row[nume].'</td></tr>';
											//echo "<h1>".$row['nume']."</h1>";
					$k++;
					$query1="SELECT * FROM `".$row['nume']."`";
					$result2=mysql_query($query1);
					if(!$result2)echo "<h2>Eroare la subcategori!!</h2>";
					else
						{							while($row2=mysql_fetch_array($result2)){
																echo "<a href='topic.php?nume=".$row2['nume']."'><h2>".$row2['nume']."</h2></a>";							}						}				}			}	}

	function generare_TOPIC($nume){		$query="SELECT * FROM `".$nume."`";
		$result=mysql_query($query);
		if(!$result)echo "<h3>Eroare la topics!!</h3>";
		else
		while($row=mysql_fetch_array($result)){
		if($_SESSION['rang']>1){echo "<br /><input type='radio' name='nume' value='".$row['nume']."' />";}
		echo "<a href='post.php?nume=".$row['nume']."'><b><font size='6'>".$row['nume']."</font></b></a>"; }
	}
    	function generare_POST($nume){
		$query="SELECT * FROM `".$nume."`";
		$result=mysql_query($query);
		if(!$result)echo "<h3>Eroare la topics!!</h3>";
		else
		while($row=mysql_fetch_array($result))
		echo "<h4>".$row['continut']."</h4>";

	}
	function adm_SUB(){		$query="SELECT * FROM categorii";
		$result=mysql_query($query);
		if(!$result)echo "<h3>Eroare la topics!!</h3>";
		else
		while($row=mysql_fetch_array($result))
		echo "<option value='".$row['nume']."'>".$row['nume']."</option>";	}
		function adm_GENCATEG(){
		$query="SELECT * FROM categorii";
		$result=mysql_query($query);
		if(!$result)echo '<h1>Eroare la query de categorii!!!!</h1>';
			else{

				while($row=mysql_fetch_array($result)){
					echo "<h1>".$row['nume']."</h1>";
					$query1="SELECT * FROM `".$row['nume']."`";
					$result2=mysql_query($query1);
					if(!$result2)echo "<h2>Eroare la subcategori!!</h2>";
					else{
							while($row2=mysql_fetch_array($result2)){
								echo "<input type='radio' name='radio' value='".$row2['nume']."' />".$row2['nume']."<br />";
								$_SESSION[$row2['nume']]=$row['nume'];
							}
						}
				}
			}
	}
?>