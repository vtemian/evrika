<?php
	session_start();
	include_once "functii.php";
	include_once "doc2html/LiveDocx/MailMerge.php";
	connect(premius);
	if(isset($_POST["submit"])){
        		if(isset($_POST['submit']))
          			if($_POST['user']!="" && $_POST['pass']!=""){
          				login($_POST['user'],$_POST['pass']);
          			}
        	}
        	 if(isset($_POST['logout'])){
                $_SESSION=array();
                session_destroy;
            }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-2"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/> 
<meta name="author" content="author"/> 
<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
<script type="text/javascript">
		function populate(o)
		{
			d=document.getElementById('tipcls');
			if(!d){return;}			
			var mitems=new Array();
			mitems['Proba teoretica']=['Clasa a XII-a','Clasa a XI-a','Clasa a X-a','Clasa a IX-a','Clasa a VIII-a'];
			mitems['Proba practica']=['Clasa a XII-a','Clasa a XI-a','Clasa a X-a','Clasa a IX-a','Clasa a VIII-a'];
			mitems['Proba de baraj']=['Chimie Analitica','Chimie Anorganica','Chimie Organica I','Chimie Organica II','Electrochimie','Structura','Cinetica Chimija','Termodinamija Chimija'];
			
			d.options.length=0;
			cur=mitems[o.options[o.selectedIndex].value];
			if(!cur){return;}
			d.options.length=cur.length;
			for(var i=0;i<cur.length;i++)
			{
				d.options[i].text=cur[i];
				d.options[i].value=cur[i];
			}
		}
    </script>


<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage"

});
</script>
<title>Olimpiada Nationala de Chimie 2011</title>
</head>

<body>

<div class="top">
				
	<div class="header">
		<div class="left">
		</div>
	</div>	

</div>

<div class="container">	

	<div class="navigation">
	<ul>
		<li><a href="index.php">Home</a></li>
        <li><a href="#">Concurs</a>
            <ul>
                  <li><a href="regulament.php">Regulament</a></li>                  
                  <li><a href="program.php">Program</a></li>
                  <li><a href="participanti.php">Participan&#355;i</a></li>
				  <li><a href="subiecte.php">Subiecte</a></li>
				  <li><a href="rezultate.php">Rezultate</a></li>
            </ul>
         </li>
     
         <li><a href="#">Organizare</a>
               <ul>
				  <li><a href="org.php">Organizatori</a></li>	
				  <li><a href="comisie.php?comisie=3">Comisia de organizare</a></li>
				  <li><a href="sponsori.php">Sponsori</a></li>		
                  <li><a href="locati.php">Loca&#355;ii culturale</a></li>
                  <li><a href="centre.php?tip=1">Centre de cazare</a></li>
				  <li><a href="centre.php?tip=2">Centre de concurs</a></li>
                </ul>
          </li>
          
          <li><a href="#">Comisia</a>
                <ul>
				  <li><a href="comisie.php?comisie=1">Comisia central&#259;</a></li>
                  <li><a href="comisie.php?comisie=5">Comisie proba teoretică</a></li>
                  <li><a href="comisie.php?comisie=4">Comisie proba practică</a></li>
                  
                </ul>
           </li>
      
		   <?php 
		   		if($_SESSION[rang]>0)echo '<li><a href="forum.php">Forum</a></li>';
		   ?>
		   <li><a href="infoutile.php">Informa&#355;ii utile</a></li>
		   <li><a href="http://onc2011.jalbum.net/ONC-2011/">Galerie foto</a></li></ul>
			
	<div class="profil">
		<a href="http://www.facebook.com/profile.php?id=100001577365622&amp;ref=ts" title="Facebook" style="border-right: none; margin-right: -30px;"><img style="border: none; padding-top: 5px; margin-right: 0px;" src="img/facebook.png" width="35" height="35" alt="facebook" /></a>
		<a href="http://www.twitter.com/@onc2011" title="Twitter" style="border-right: none; margin-right: -30px;"><img style="border: none; padding-top: 5px;" src="img/twitter.png" width="35" height="35" alt="twitter" /></a>		
		<?php 	if($_SESSION[rang]==1)
					echo '<a href="profil.php" title="Profil" style="border-right: none; margin-right: -30px;"><img style="border: none; border-right: 0px; padding-top: 5px; margin-right: 0px;" src="img/elev.png" width="35" height="35" /></a><a href="profil.php" title="Profil" >Profil</a>';
				if($_SESSION[rang]==2)
					echo '<a href="profil.php" title="Profil" style="border-right: none;margin-right: -30px;"><img style="border: none; padding-top: 5px; margin-right: 0px;" src="img/prof.gif" width="35" height="35" /></a><a href="profil.php" title="Profil" >Profil</a>';
				if($_SESSION[rang]==3)
					echo '<a href="profil.php" title="Profil" style="border-right: none;margin-right: -30px;"><img style="border: none;  border-right: 0px;padding-top: 5px; margin-right: 0px;" src="img/admin copy.gif" width="35" height="35" /></a><a href="profil.php" title="Profil" >Profil</a>';
				
		?>
	</div>
		<div class="clearer"><span></span></div>
</div>

	<div class="main">		

		<div class="side">
		
				 
			<?php
			 if($_SESSION['rang']>0){
               echo '
               <div class="logout">
               <form action="index.php" method="post" class="form">
               			<filedset>
               			<label fclass="top"><h2>Bun venit , '.$_SESSION['nume'].' '.$_SESSION['prenume'].'!</h2></label>
               		 	<div style="padding-left: 25px;"><input type="submit" name="logout" value="Logout" class="button" /></div><br /><br />
               		 	</fieldser>
               		 </form>
               		 </div>';

           }
      if(!$_SESSION['rang']){
      	echo '
      	
         <table><tr> 
         		<td><img src="img/login.jpg" alt="login" /></td><td><h1>Login</h1></td></tr></table>
       <div class="useri">
   
          <form method="post" action="index.php">
              <h3>Utilizator:</h3>
                <div><input type="text" name="user" class="field" onkeypress="return webLoginEnter(document.loginfrm.password);" value="" /></div>
    	      <h3>Parola:</h3>
                <div><input type="password" name="pass" class="field" onkeypress="return webLoginEnter(document.loginfrm.cmdweblogin);" value="" /><br /><br /></div>
    	     	<div style="padding-left: 10px;"><input type="submit" name="submit" class="button" value="Login"  /> <br /><br /><br /></div>
          </form>
        </div> ';
             }
            echo'<table border="0"><tr><td><img src="img/megafon.gif" alt="megafon" /></td><td><h1>&#350;tiri</h1></td></tr></table><br />';
					$query="SELECT * FROM stiri order by id desc";
					$result=mysql_query($query);
						if($result){
							while($row=mysql_fetch_array($result)){
								if(strlen($row[articol])>77)
									$s=substr($row[articol],0,77);
								echo '<a href="stiri.php?id='.$row[id].'">'.$row[titlu].'</a>';
								echo '<div class="descr">'.$row[data].'</div><br />';
								if($s)
									echo '<div class="stiri">'.$s.'...<br/ >
									<a href="stiri.php?id='.$row[id].'">[cite&#537;te tot]</a></p></div><hr /><br />';
								else
									echo '<div class="stiri"><p>'.$row[articol].'</p></div><hr /><br />';
								$s='';	
							}
						}else
							echo '<h2>Momentan exista o eroare!Incercam sa o rezolvam!</h2>';
        ?>
        	
		</div>


		<div class="content" style="width: 650px; padding-left: 0px; border: none;">

		<?php
			if($_SESSION[rang]==3){
			if(isset($_POST[trimite])){
					if($_FILES['fisier']['error']==0){
							//echo  $_FILES['fisier']['type'];
							if($_FILES['fisier']['type']=='application/vnd.ms-excel'||$_FILES['fisier']['type']=='application/octet-stream'||$_FILES['fisier']['type']=='application/msword'){
								if($_FILES['fisier']['size']<700000){
										
										$uploaddir = getcwd().'/fisiere/';
										$c_dip=$_FILES['fisier']['name'];
										$c_dip1=$_FILES['fisier']['name'];
										if($_POST[tip]!="import")
											$uploadfile = $uploaddir.'participanti'.'.xls';
										else
											$uploadfile = $uploaddir.$c_dip1;
										if (move_uploaded_file($_FILES['fisier']['tmp_name'],$uploadfile) && is_writable($uploadfile)){
											
												echo "<h2><center>Incarcare reusita : ".$c_dip."<br /></h2></center>";
											    if($_POST[tip]=="import"){
												$fisier=fopen('fisiere/'.$c_dip,'r');
												$k=0;
												while(!feof($fisier)){
													$linie=fgets($fisier,40000);
													$query='INSERT INTO participanti(nume,prenume,cls,scoala,judet,oras,profcoord) VALUES('.$linie.')';
													//echo $query;
													if($k!=0){
													$result=mysql_query($query);
													//echo $query.'<br />';
													if(!$result){
														$k++;
													}else
													{
														$query="SELECT MAX(id_elev) AS max_id FROM rezultate";
														$r=mysql_query($query);
														$ro=mysql_fetch_array($r);
														$maxid=$ro[max_id]+1;
														$query="INSERT INTO rezultate (nrdip,s1,s2,s3,s4,of,teorie,practica,total,premiu,prspecial,id_elev) VALUES(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'".$maxid."')";
														//echo $query;
														$rez=mysql_query($query);
													}
													}else
														$k++;
												}	
												if($k==2)
													echo "<h2><center>Importarea datelor sa efectuat cu succes<br /><a href='participanti.php'>Ok</a></h2></center>";
												else
													echo "<h2><center>Eroare la importarea datelor<br /><a href='participanti.php'>Ok</a></h2></center>";
												}else
													echo "<h2><center><a href='participanti.php'>Ok</a></h2></center>";
										}else
											echo "<h2><center>Eroare la mutare<br /><a href='participanti.php'>Ok</a></h2></center>";
												
								}else
										echo "<h2><center>Fisierul este prea mare<br /><a href='subiecte.php'>Ok</a></h2></center>";
							}
						}
						
							
					}else
				if($_GET[sterge]==2){
					$query="SELECT * FROM participanti WHERE id='".mysql_escape_string($_GET[id])."'";
					$result=mysql_query($query);
					if($result){
						$row=mysql_fetch_array($result);
					echo '<h2>Modificare</h2><hr><br>
						<div class="useri">
							<form action="participanti.php?id='.$_GET[id].'" method="post">
								<label class="mij">Nume</label> 
								<input type="text" name="nume" value="'.$row[nume].'" class="field" />
								<label class="mij">Prenume</label> 
								<input type="text" name="prenume" value="'.$row[prenume].'" class="field" /><br/>
								<label class="mij">Clasa</label>
								<select name="cls" class="field">
									<option value="VIII" ';if($row[cls]=='VIII')echo 'SELECTED'; echo '>VIII</option>
									<option value="IX" ';if($row[cls]=='IX')echo 'SELECTED'; echo '>IX</option>
									<option value="X" ';if($row[cls]=='X')echo 'SELECTED'; echo '>X</option>
									<option value="XI" ';if($row[cls]=='XI')echo 'SELECTED'; echo '>XI</option>
									<option value="XII" ';if($row[cls]=='XII')echo 'SELECTED'; echo '>XII</option>
								</select><br />
								<label class="mij">Scoala</label> 
								<input type="text" name="scoala" value="'.$row[scoala].'" class="field" /><br />
								<label class="mij">Jude&#355;</label> 
								<input type="text" name="judet" value="'.$row[judet].'" class="field" /><br />
								<label class="mij">Oras</label> 
								<input type="text" name="oras" value="'.$row[oras].'" class="field" /><br />
								<label class="mij">Profesor coordonator</label> 
								<input type="text" name="profcoord" value="'.$row[profcoord].'" class="field" /><br />
								<input type="submit" name="modifica" value="Modific&#259;" class="button" />
							</form>
						</div>
					';}else
						echo "<h2><center>Eroare la selectarea datelor<br /><a href='participanti.php'>Ok</a></h2></center>";	
				}else
					if($_GET[sterge]==1){
						$query="DELETE FROM  participanti WHERE id='".mysql_escape_string($_GET[id])."'";
						$result=mysql_query($query);
						if($rezult){
							echo "<h2><center>Datele au fost sterse cu succes<br /><a href='participanti.php'>Ok</a></h2></center>";	
						}else
							echo "<h2><center>Eroare la stergerea datelor<br /><a href='participanti.php'>Ok</a></h2></center>";	
					}else
					if(isset($_POST[modifica])||isset($_POST[add])){
						if(trim($_POST[nume])!=''){
							if(trim($_POST[prenume])!=''){
								if(trim($_POST[scoala])!=''){
									if(trim($_POST[judet])!=''){
										if(trim($_POST[oras])!=''){
											if(trim($_POST[profcoord])!=''){
												if(isset($_POST[modifica])){
												$query="UPDATE participanti SET nume='".mysql_escape_string($_POST[nume])."',prenume='".mysql_escape_string($_POST[prenume])."',cls='".mysql_escape_string($_POST[cls])."',scoala='".mysql_escape_string($_POST[scoala])."',judet='".mysql_escape_string($_POST[judet])."',oras='".mysql_escape_string($_POST[oras])."',profcoord='".mysql_escape_string($_POST[profcoord])."' WHERE id='".$_GET[id]."'";
												$result=mysql_query($query);
												if($result){
													echo "<h2><center>Datele au fost modificate cu succes<br /><a href='participanti.php'>Ok</a></h2></center>";
												}else
													echo "<h2><center>Eroare la modificarea datelor<br /><a href='participanti.php'>Ok</a></h2></center>";
												}else{
													
													$query="INSERT INTO participanti(nume,prenume,cls,scoala,judet,oras,profcoord) VALUES('".mysql_escape_string($_POST[nume])."','".mysql_escape_string($_POST[prenume])."','".mysql_escape_string($_POST[cls])."','".mysql_escape_string($_POST[scoala])."','".mysql_escape_string($_POST[judet])."','".mysql_escape_string($_POST[oras])."','".mysql_escape_string($_POST[profcoord])."')";
													$result=mysql_query($query);
													if($result){
														$query="SELECT id FROM participanti WHERE nume='".mysql_escape_string($_POST[nume])."' AND prenume='".mysql_escape_string($_POST[prenume])."' AND cls='".mysql_escape_string($_POST[cls])."' AND scoala='".mysql_escape_string($_POST[scoala])."' AND judet='".mysql_escape_string($_POST[judet])."' AND oras='".mysql_escape_string($_POST[oras])."'AND profcoord='".mysql_escape_string($_POST[profcoord])."'";
														$rez=mysql_query($query);
														//echo $query;
														if($rez){
															$row=mysql_fetch_array($rez);
															$query="INSERT INTO participanti (nrdip,s1,s2,s3,s4,of,teorie,practica,total,premiu,prspecial,id_elev) VALUES (NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'".$row[id]."')";
															$re=mysql_query($query);
															if($re){
																echo "<h2><center>Datele au fost adugate cu succes<br /><a href='participanti.php'>Ok</a></h2></center>";
															}else
																echo "<h2><center>Eroare la adugarea datelor1<br /><a href='participanti.php'>Ok</a></h2></center>";
														}
														else
															echo "<h2><center>Eroare la adugarea datelo2r<br /><a href='participanti.php'>Ok</a></h2></center>";
													}else
														echo "<h2><center>Eroare la adugarea datelor3<br /><a href='participanti.php'>Ok</a></h2></center>";
												}		
											}else
												echo "<h2><center>Trebuie sa alegeti un profesor coordonator<br /><a href='participanti.php'>Ok</a></h2></center>";
										}else
											echo "<h2><center>Trebuie sa alegeti un oras<br /><a href='participanti.php'>Ok</a></h2></center>";
									}else
										echo "<h2><center>Trebuie sa alegeti un judet<br /><a href='participanti.php'>Ok</a></h2></center>";
								}else
									echo "<h2><center>Trebuie sa alegeti o scoala<br /><a href='participanti.php'>Ok</a></h2></center>";	
							}else
								echo "<h2><center>Trebuie sa alegeti un prenume<br /><a href='participanti.php'>Ok</a></h2></center>";	
						}else
							echo "<h2><center>Trebuie sa alegeti un nume<br /><a href='participanti.php'>Ok</a></h2></center>";	
						
					}else
					if(isset($_POST[export])){
						$query="SELECT * FROM participanti";
							$result=mysql_query($query);
							if($result){
								$fisier=fopen('fisiere/participanti.xls','w+');
								fwrite($fisier,"Nr.Crt\tNume\tPrenume\tClasa\tScoala\tJudet\tOras\tProfesor Coordonator\n\n");
								$c=1;
								while($row=mysql_fetch_array($result)){
									fwrite($fisier,$c++."\t".$row[nume]."\t".$row[prenume]."\t".$row[cls]."\t".$row[scoala]."\t".$row[judet]."\t".$row[oras]."\t".$row[profcoord]."\n");
								}
								if($c!=1)
									echo "<h2><center>Datele au fost exportate cu succes<br /><a href='participanti.php'>Ok</a></h2></center>";
							}else
								echo "<h2><center>Eroare la selectarea datelor<br /><a href='participanti.php'>Ok</a></h2></center>";
					}else{
				$query="SELECT * FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id";
				$result=mysql_query($query);
				if($result){
					echo '<h2>Vizualizare</h2><hr><br />
							<table style="width: 650px;">
								<tr><td></td><td></td><td>Nr crt.</td><td>Nume</td><td>Prenume</td><td>Clasa</td><td>Scoala</td><td>Jude&#355;</td><td>Oras</td><td>Prof. coord.</td><td>Total</td></tr>
							';$c=1;
							while($row=mysql_fetch_array($result)){
								echo '<tr>
										<td><a href="participanti.php?id='.$row[id_elev].'&sterge=2"><img src="img/edit.png"></a></td>
										<td><a href="participanti.php?id='.$row[id_elev].'&sterge=1"><img src="img/sterge.png"></a></td>
										<td>'.$c++.'</td>
										<td>'.$row[nume].'</td>
										<td>'.$row[prenume].'</td>
										<td>'.$row[cls].'</td>
										<td>'.$row[scoala].'</td>
										<td>'.$row[judet].'</td>
										<td>'.$row[oras].'</td>
										<td>'.$row[profcoord].'</td>
										<td>'.$row[total].'</td>
									</tr>';
							}echo '</table><br />';
				}else
					echo "<h2><center>Eroare la selectarea datelor<br /><a href='participanti.php'>Ok</a></h2></center>";	
					echo '<form action="participanti.php" enctype="multipart/form-data" method="post"><input type="submit" name="export" value="Export&#259;" class="button" /><h2>Ad&#259;ugare fisier</h2><hr><br /><div class="useri">
							<input type="radio" name="tip" value="import" checked />
							<label >Import&#259;</label><br />
							<input type="radio" name="tip" value="up"/>
							<label>Adaug&#259; fi&#351;ier cu participan&#355;i</label><br /><br />
							<input type="file" name="fisier" value="Import" /><br /><br />
							<input type="submit" name="trimite" value="Trimite" class="button" /><br />		
							<h2>Ad&#259;ugare participant</h2><hr><br />
							<table>
								<tr><td style="border: none;"><h3>Nume<h3></td><td style="border: none;"><input type="text" name="nume" class="field" /></td></tr>
								<tr><td style="border: none;"><h3>Prenume<h3></td><td style="border: none;"><input type="text" name="prenume" class="field" /></td></tr>
								<tr><td style="border: none;"><h3>Clasa<h3></td><td style="border: none;"><select name="cls" class="field">
									<option value="VIII" >VIII</option>
									<option value="IX" >IX</option>
									<option value="X">X</option>
									<option value="XI" >XI</option>
									<option value="XII">XII</option>
								</select></td></tr>
								<tr><td style="border: none;"><h3>&#350;coala<h3></td><td style="border: none;"><input type="text" name="scoala" class="field" /></td></tr>
								<tr><td style="border: none;"><h3>Jude&#355;<h3></td><td style="border: none;"><input type="text" name="judet" class="field" /></td></tr>
								<tr><td style="border: none;"><h3>Ora&#351;<h3></td><td style="border: none;"><input type="text" name="oras" class="field" /></td></tr>
								<tr><td style="border: none;"><h3>Prof. coordonator<h3></td><td style="border: none;"><input type="text" name="profcoord" class="field" /></td></tr></table>
								<input type="submit" name="add" value="Inregistreaz&#259;" class="button" /><br /><br />
								
								</form>
							</div>';
				}
			}else{
				if($_GET[jud]==''){
				echo '<div><table width="600px" >
					<tr><td><h2>Jude&#355;</h2></td><td><h2>Nr participan&#355;i</h2></td><td><h2>Centru de cazare</h2></td><td><h2>Profesor responsabil</h2></td><td><h2>Profesor &#238;nso&#355;itor</h2></td></tr>
				';
				$query="SELECT COUNT(nume) AS count_nume,judet FROM participanti GROUP BY judet";
			//	echo $query;
				$result=mysql_query($query);
				if($result){
					while($row=mysql_fetch_array($result)){
						$query="SELECT * FROM cazare WHERE judet='".$row[judet]."'";
						
						$rez=mysql_query($query);
						$r=mysql_fetch_array($rez);
						echo '<tr><td><a href="participanti.php?jud='.$row[judet].'">'.strtoupper($row[judet].'</a></td><td>'.$row[count_nume].'</td><td>'.$r[centru].'</td><td>'.$r[prof_inso].'</td><td>'.$r[prof_res].'</td></tr>');
					}
				}else{
					echo "<h2><center>Eroare la selectarea datelor<br /><a href='participanti.php'>Ok</a></h2></center>";
				}
				echo '</table></div>';
				}else{
					echo '<h2>'.$_GET[jud].'</h2><a href="participanti.php"><img src="img/goback.png" width="30" height="30"></a><table><div align="center">';
					$jud=mysql_escape_string($_GET['jud']);
					$query="SELECT * FROM participanti WHERE judet='".$jud."'";
					$result=mysql_query($query);
					if($result){
						echo '<tr><td>Nume si prenume</td><td>Clasa</td><td>Scoala</td><td>Profesor coordonator</td></tr>';
						while($row=mysql_fetch_array($result)){
							echo strtoupper('<tr><td>'.$row[nume]." ".$row[prenume].'</td><td>'.$row[cls].'</td><td>'.$row[scoala].'</td><td>'.$row[profcoord].'</td></tr>');
						}
						echo '</table></div>';
					}else
						echo "<h2><center>Eroare la selectarea datelor<br /><a href='participanti.php'>Ok</a></h2>";
				}
			}			
		?>


		</div>

		<div class="clearer"><span></span></div>
<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>

	</div>


</div>

</body>

</html>