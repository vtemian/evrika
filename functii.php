<?php

//conectare la bd
function connect($db1)
{	$db="onc";
 	$c = mysql_connect('localhost','vtemian','deschimbat');
	if(!$c){
		die('naspa'.mysql_error());}
	$baza = mysql_select_db("$db",$c);
	if(!$baza){
		die('nu mere : '.mysql_error());}
}
function mailcheck($field)
  {
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }
 //generari de formulare
 function orar($tabel,$id,$submit,$form){
 	if($id!=NULL){
 	$query="SELECT * FROM ".$tabel." WHERE id='".$id."'";
	$result=mysql_query($query);
	if($result){
		$row=mysql_fetch_array($result);				
		echo '	<div class="useri"><form action="'.$form.'" method="post"><fieldset>
				<label class="top">Materie</label>
				<input type="text" name="materie" value="'.$row[materie].'" class="field" /><br />	
				<label class="top">Profesor</label>
				<input type="text" name="profesor" value="'.$row[profesora].'" class="field" /><br />
				<label class="top">Inceput</label>
				<input type="text" name="inceput" value="'.$row[start_time].'" class="field" /><br />
				<input type="hidden" name="tabel" value="'.$tabel.'" />
					
					<input type="hidden" name="id" value="'.$id.'" />									
					<input type="submit" name="'.$submit.'" value="Modifica" class="button" />	
					</fieldset>	
				</form>	</div>
			';}
		else{
				echo '<h1 class=error><center>Eroare la selectarea datelor din tabel!</h1></center>';
 		}
 	}else
 		echo '<h1 class=error><center>Nu ati ales nici o optiune!</h1></center>';
 }
 function viz_orar($tabel,$clasa){
 	$query="SELECT * FROM ".$tabel." WHERE clasa='".$clasa."'";
 	//echo $query;
 	$result=mysql_query($query);
 	if($result){
 		echo '
 			<form action="orar_mod.php" method="get"><div class="useri">
	 	<table>
						 		<tr>
						 			<td></td><td></td><td>Materia</td><td>Ora de inceput</td><td>Profesoara</td>	
							 	</tr>
							 ';
							 $c=1;	
							 while($row=mysql_fetch_array($result)){
							 	echo '<tr><td><a href="orar_mod.php?id='.$row[id].'&sterge=0&tabel='.$tabel.'"><img src="img/edit.png"></a></td><td><a href="orar_mod.php?id='.$row[id].'&sterge=1&tabel='.$tabel.'"><img src="img/sterge.png"></a></td><td>'.$row[materie].'</td><td><center>'.$row[start_time].'</center></td><td>'.$row[profesora].'</td></tr>';
							 }	
							 echo '</table>        	
							 	</form>	<form action="orar.php" method="post"><input type="submit" name="submit_mod" value="Inapoi" class="button"/></form>
        </div>';
 	}else
 		echo '<h1 class=error><center>Eroare la selectarea datelor din tabel!</h1></center>';
 }
###############################--SESIUNI--######################################

//login
function login($user,$pass){
		 $pass=md5($pass);
		 $bla="user"."="."'"."$user"."'"." AND ".pass."="."'"."$pass"."'";
		 $query = "select * from users_web where $bla";
		 $result=mysql_query($query);
		 if (!$result)
				die('Eroare : ' . mysql_error());
		else
			 if(mysql_num_rows($result) == 1)
			 	while($row=mysql_fetch_array($result)){
			 		session_start();
			 		$_SESSION['nume']=$row['nume'];
			 		$_SESSION['prenume']=$row['prenume'];
			 		$_SESSION['rang']=$row['rang'];
			 		$_SESSION['id']=$row['id'];
					/*if($row[rang]==2){
						$query="SELECT clasa FROM diriginti WHERE id_users='".$row[id]."'";
						//echo $query;
						$result2=mysql_query($query);
						if($result2){
							$row2=mysql_fetch_array($result2);
							//echo $row2[clasa];
							$_SESSION['clasa']=$row2[clasa];			
						}else
							echo '<h1 class=error><center>Eroare la login!</h1></center>';							
							
					}*/
		 		}
}
############################# F O R U M ###########################################
function generare_CATEG(){
		$query="SELECT * FROM categorii ORDER BY id ASC";
		$result=mysql_query($query);
		if(!$result)echo '<h1>Eroare la query de categorii!!!!</h1>';
			else{
				$k=0;
				echo '<table>';
				while($row=mysql_fetch_array($result)){
					if($k==0)
						echo '<tr><td width="600" align="left"><h2>'.$row[nume].'</h2></td><td>Mesaje</td><td>Subiecte</td></tr>';
					else
						echo '<tr><td width="600" colspan="3"><h2>'.$row[nume].'</h2></td></tr>';
						
					//echo "<h1>".$row['nume']."</h1>";
					$k++;
					$query1="SELECT * FROM `".$row['nume']."`";
					$result2=mysql_query($query1);
					//echo $query1;
					if($result2)
					
						{$mes=0;
							while($row2=mysql_fetch_array($result2)){
								$query="SELECT * FROM `".$row2['nume']."`";
								//echo $query;
								$rez=mysql_query($query);
								if($rez){
									$t=mysql_num_rows($rez);
									
									while($r=mysql_fetch_array($rez)){
										$query="SELECT * FROM `".$r['nume']."`";
									//echo $query;
									$rez1=mysql_query($query);
									$t2=mysql_num_rows($rez1);
									//echo $query;
									$mes+=$t2;
									}
									echo "<tr><td heidth='50'><a href='topic.php?nume=".$row2['nume']."'><h3>".$row2['nume']."</h3></a><br>".$row2[descriere]."</td><td>".$mes."</td><td>".$t."</td></tr>";
								}else 
									echo "<h2>Eroare!!</h2>";
							}
						}else
							echo "<h2>Eroare la subcategori!!</h2>";
				}
				echo '</table>';
			}
	}

	function generare_TOPIC($nume){
		$query="SELECT * FROM `".$nume."`";
		$result=mysql_query($query);
		if(!$result)echo "<h3>Eroare la topics!!</h3>";
		else{
			echo '<table>
				<tr>';
				if($_SESSION['rang']>1){echo "<td></td>";}
				echo '<td width="400" align="center"><h4>Subiect</h4></td><td>Autor</td><td>Ultimul mesaj</td></tr>
			';
		while($row=mysql_fetch_array($result)){
		
		echo "<tr>";
		if($_SESSION['rang']>1){echo "<td><a href='topic.php?nume=".$nume."&sterge=1&n=".$row[nume]."'><img src='img/sterge.png'></a></td>";
		}echo "<td align='left'><a href='post.php?nume=".$row['nume']."&n=".$nume."'>";echo "<b>".$row['nume']."</b></a></td><td width='100' align='center'>".$row[autor]."</td><td width='100' align='center'>".$row[ultimul]."</td></tr>"; }
		echo '</table>';
		}

	}
    	function generare_POST($nume,$n){
		$query="SELECT * FROM `".$nume."`";
		$result=mysql_query($query);
		if(!$result)echo "<h3>Eroare la topics!!</h3>";
		else{
			echo '<table>
			<tr><td width="150" align="center">Autor</td><td width="450" align="center">Mesaj</td></tr>';
			while($row=mysql_fetch_array($result)){
				echo '<tr><td></td><td width="600" align="right">'.$row[date].'</td>';
				if($_SESSION[rang]==3){echo "<td><a href='post.php?nume=".$nume."&sterge=1&n=".$n."&id=".$row[id]."'><img src='img/sterge.png'></a></td>
						<td><a href='post.php?nume=".$nume."&sterge=2&n=".$n."&id=".$row[id]."'><img src='img/edit.png'></a></td>";}
				else{
					$nume=$_SESSION[nume].' '.$_SESSION[prenume];
					if($nume==$row[autor]){
						echo "<td><a href='post.php?nume=".$nume."&sterge=1&n=".$n."&id=".$row[id]."'><img src='img/sterge.png'></a></td>
						<td><a href='post.php?nume=".$nume."&sterge=2&n=".$n."&id=".$row[id]."'><img src='img/edit.png'></a></td>
						";}
				}
				echo '</tr><tr>';
				if($row[rang]==3){
					echo '<td align="center"><img src="img/admin.jpg" width="150" height="150">';
				}else
					if($row[rang]==2){
						echo '<td align="center"><img src="img/prof.jpg" width="150" height="150">';
					}else
						if($row[rang]==1){
							echo '<td align="center"><img src="img/elev.jpg" width="150" height="150">';
						}
				echo $row[autor].'</td><td>'.$row[continut].'</td></tr>';
				
				
				
			}
			echo '</table>';
		}

	}
	function adm_SUB(){
		$query="SELECT * FROM categorii";
		$result=mysql_query($query);
		if(!$result)echo "<h3>Eroare la topics!!</h3>";
		else
		while($row=mysql_fetch_array($result))
		echo "<option value='".$row['nume']."'>".$row['nume']."</option>";
	}
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
