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

<script type="text/javascript">E
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


		
		<div class="content" style="width:600px;">
	
		<?php
			if($_SESSION[rang]==3){
				if(isset($_POST[trimite])){
					if($_FILES['fisier']['error']==0){
							if($_FILES['fisier']['type']=='application/vnd.ms-excel'||$_FILES['fisier']['type']=='application/pdf'||$_FILES['fisier']['type']=='application/msword'){
								if($_FILES['fisier']['size']<700000){
										
										$uploaddir = getcwd().'/fisiere/';
										$c_dip=$_FILES['fisier']['name'];
										$c_dip1=$_FILES['fisier']['name'];
										if($_POST[tip]!="import")
											$uploadfile = $uploaddir.$_POST[cls].'.xls';
										else
											$uploadfile = $uploaddir.$c_dip1;
										if (move_uploaded_file($_FILES['fisier']['tmp_name'],$uploadfile) && is_writable($uploadfile)){
											
												echo "<h2><center>Incarcare reusita : ".$c_dip."<br /></h2></center>";
											    if($_POST[tip]=="import"){
												$fisier=fopen('fisiere/'.$c_dip,'r');
												$k=0;
												while(!feof($fisier)){
													$linie=fgets($fisier,40000);
													$query='INSERT INTO rezultate(nrdip,s1,s2,s3,s4,of,teorie,practica,total,premiu,prspecial) VALUES('.$linie.')';
													if($k!=0){
													$result=mysql_query($query);
													//echo $query.'<br />';
													if(!$result){
														$k++;
													}}else
														$k++;
												}	
												if($k==2)
													echo "<h2><center>Importarea datelor sa efectuat cu succes<br /><a href='rezultate.php'>Ok</a></h2></center>";
												else
													echo "<h2><center>Eroare la importarea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";
												}else
													echo "<h2><center><a href='rezultate.php'>Ok</a></h2></center>";
										}else
											echo "<h2><center>Eroare la mutare<br /><a href='rezultate.php'>Ok</a></h2></center>";
												
								}else
										echo "<h2><center>Fisierul este prea mare<br /><a href='subiecte.php'>Ok</a></h2></center>";
							}
						}
						
							
					}	
				
				else
					if($_GET[sterge]==2){
						if(isset($_POST[modifica])){
							$query="UPDATE rezultate SET nrdip='".mysql_escape_string($_POST[nrdip])."',s1='".mysql_escape_string($_POST[s1])."',s2='".mysql_escape_string($_POST[s2])."',s3='".mysql_escape_string($_POST[s3])."',s4='".mysql_escape_string($_POST[s4])."',of='".mysql_escape_string($_POST[of])."',teorie='".mysql_escape_string($_POST[teorie])."',practica='".mysql_escape_string($_POST[practica])."',total='".mysql_escape_string($_POST[total])."',premiu='".mysql_escape_string($_POST[premiu])."',prspecial='".mysql_escape_string($_POST[prspecial])."' WHERE id='".mysql_escape_string($_GET[id])."'";
							$result=mysql_query($query);
							if($result){
								echo "<h2><center>Datele au fost modificate cu succes<br /><a href='rezultate.php'>Ok</a></h2></center>";
							}else	
								echo "<h2><center>Eroare la modificarea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";
						}else{																																																																																																																						
						$query="SELECT * FROM participanti,rezultate WHERE rezultate.id='".mysql_escape_string($_GET[id])."'";
						$result=mysql_query($query);
						if($result){
							$row=mysql_fetch_array($result);
							echo '<h2>Modifica</h2><br /><hr />
									<div class="useri"><form action="rezultate.php?id='.$_GET[id].'&sterge=2" method="post">
										<label class="mij">Nr diploma</label>
										<input type="text" name="nrdip" value="'.$row[nrdip].'" class="field"/><br />
										<label class="mij">Subiectul 1</label>
										<input type="text" name="s1" value="'.$row[s1].'" class="field"/><br />
										<label class="mij">Subiectul 2</label>
										<input type="text" name="s2" value="'.$row[s2].'" class="field"/><br />
										<label class="mij">Subiectul 3</label>
										<input type="text" name="s3" value="'.$row[s3].'" class="field"/><br />
										<label class="mij">Subiectul 4</label>
										<input type="text" name="s4" value="'.$row[s4].'" class="field"/><br />
										<label class="mij">Oficiu</label>
										<input type="text" name="of" value="'.$row[of].'" class="field"/><br />
										<label class="mij">Teorie</label>
										<input type="text" name="teorie" value="'.$row[teorie].'" class="field"/><br />
										<label class="mij">Practica</label>
										<input type="text" name="practica" value="'.$row[practica].'" class="field"/><br />
										<label class="mij">Total</label>
										<input type="text" name="total" value="'.$row[total].'" class="field"/><br />
										<label class="mij">Premiu</label>
										<select name="premiu" class="field">
											<option value="I"';if($row[premiu]=='I')echo 'SELECTED' ;echo '>I</option>
											<option value="II"';if($row[premiu]=='II')echo 'SELECTED' ;echo '>II</option>
											<option value="III"';if($row[premiu]=='III')echo 'SELECTED' ;echo '>III</option>
											<option value="M"';if($row[premiu]=='M')echo 'SELECTED' ;echo '>M</option>
										</select><br />
										<label class="mij">Premiu special</label>
										<input type="text" name="prspecial" value="'.$row[prspecial].'" class="field"/>
										<br />
										<input type="submit" name="modifica" value="Modifica" class="button"/>
										</div>';
						}
						}
					}else
						if($_GET[sterge]==1){
							$query="UPDATE rezultate SET nrdip=NULL,s1=NULL,s2=NULL,s3=NULL,s4=NULL,of=NULL,teorie=NULL,practica=NULL,total=NULL,premiu=NULL,prspecial=NULL WHERE id='".mysql_escape_string($_GET[id])."'";
							$result=mysql_query($query);
							if($result){
								echo "<h2><center>Datele au fost sterse cu succes<br /><a href='rezultate.php'>Ok</a></h2></center>";
							}else	
								echo "<h2><center>Eroare la stergerea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";
						}else
						if(isset($_POST[exporta])){
							$query="SELECT * FROM rezultate,participanti WHERE participanti.id=rezultate.id_elev AND participanti.cls='XII'";
							$result=mysql_query($query);
							if($result){
								$fisier=fopen('fisiere/cls12.xls','w+');
								fwrite($fisier,"Nr.Crt\tNume\tPrenume\tClasa\tScoala\tJudet\tOras\tNr.dip\tS1\tS2\tS3\tS4\tOf\tTeorie\tPractica\tTotal\tPremiu\tProfesor coordonator\n\n");
								$c=1;
								while($row=mysql_fetch_array($result)){
									fwrite($fisier,$c++."\t".$row[nume]."\t".$row[prenume]."\t".$row[cls]."\t".$row[scoala]."\t".$row[judet]."\t".$row[oras]."\t".$row[nrdip]."\t".$row[s1]."\t".$row[s2]."\t".$row[s3]."\t".$row[s4]."\t".$row[of]."\t".$row[teorie]."\t".$row[practica]."\t".$row[premiu]."\t".$row[prspecial]."\t".$row[profcoord]."\n");
								}
							}else
								echo "<h2><center>Eroare la selectarea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";
							$query="SELECT * FROM rezultate,participanti WHERE participanti.id=rezultate.id_elev AND participanti.cls='XI'";
							$result=mysql_query($query);
							if($result){
								$fisier=fopen('fisiere/cls11.xls','w+');
								fwrite($fisier,"Nr.Crt\tNume\tPrenume\tClasa\tScoala\tJudet\tOras\tNr.dip\tS1\tS2\tS3\tS4\tOf\tTeorie\tPractica\tTotal\tPremiu\tProfesor coordonator\n\n");
								$c=1;
								while($row=mysql_fetch_array($result)){
									fwrite($fisier,$c++."\t".$row[nume]."\t".$row[prenume]."\t".$row[cls]."\t".$row[scoala]."\t".$row[judet]."\t".$row[oras]."\t".$row[nrdip]."\t".$row[s1]."\t".$row[s2]."\t".$row[s3]."\t".$row[s4]."\t".$row[of]."\t".$row[teorie]."\t".$row[practica]."\t".$row[premiu]."\t".$row[prspecial]."\t".$row[profcoord]."\n");
								}
							}else
								echo "<h2><center>Eroare la selectarea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";
							$query="SELECT * FROM rezultate,participanti WHERE participanti.id=rezultate.id_elev AND participanti.cls='X'";
							$result=mysql_query($query);
							if($result){
								$fisier=fopen('fisiere/cls8.xls','w+');
								fwrite($fisier,"Nr.Crt\tNume\tPrenume\tClasa\tScoala\tJudet\tOras\tNr.dip\tS1\tS2\tS3\tS4\tOf\tTeorie\tPractica\tTotal\tPremiu\tProfesor coordonator\n\n");
								$c=1;
								while($row=mysql_fetch_array($result)){
									fwrite($fisier,$c++."\t".$row[nume]."\t".$row[prenume]."\t".$row[cls]."\t".$row[scoala]."\t".$row[judet]."\t".$row[oras]."\t".$row[nrdip]."\t".$row[s1]."\t".$row[s2]."\t".$row[s3]."\t".$row[s4]."\t".$row[of]."\t".$row[teorie]."\t".$row[practica]."\t".$row[premiu]."\t".$row[prspecial]."\t".$row[profcoord]."\n");
								}
							}else
								echo "<h2><center>Eroare la selectarea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";
							$query="SELECT * FROM rezultate,participanti WHERE participanti.id=rezultate.id_elev AND participanti.cls='IX'";
							$result=mysql_query($query);
							if($result){
								$fisier=fopen('fisiere/cls9.xls','w+');
								fwrite($fisier,"Nr.Crt\tNume\tPrenume\tClasa\tScoala\tJudet\tOras\tNr.dip\tS1\tS2\tS3\tS4\tOf\tTeorie\tPractica\tTotal\tPremiu\tProfesor coordonator\n\n");
								$c=1;
								while($row=mysql_fetch_array($result)){
									fwrite($fisier,$c++."\t".$row[nume]."\t".$row[prenume]."\t".$row[cls]."\t".$row[scoala]."\t".$row[judet]."\t".$row[oras]."\t".$row[nrdip]."\t".$row[s1]."\t".$row[s2]."\t".$row[s3]."\t".$row[s4]."\t".$row[of]."\t".$row[teorie]."\t".$row[practica]."\t".$row[premiu]."\t".$row[prspecial]."\t".$row[profcoord]."\n");
								}
							}else
								echo "<h2><center>Eroare la selectarea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";
							$query="SELECT * FROM rezultate,participanti WHERE participanti.id=rezultate.id_elev AND participanti.cls='XVIII'";
							$result=mysql_query($query);
							if($result){
								$fisier=fopen('fisiere/cls10.xls','w+');
								fwrite($fisier,"Nr.Crt\tNume\tPrenume\tClasa\tScoala\tJudet\tOras\tNr.dip\tS1\tS2\tS3\tS4\tOf\tTeorie\tPractica\tTotal\tPremiu\tProfesor coordonator\n\n");
								$c=1;
								while($row=mysql_fetch_array($result)){
									fwrite($fisier,$c++."\t".$row[nume]."\t".$row[prenume]."\t".$row[cls]."\t".$row[scoala]."\t".$row[judet]."\t".$row[oras]."\t".$row[nrdip]."\t".$row[s1]."\t".$row[s2]."\t".$row[s3]."\t".$row[s4]."\t".$row[of]."\t".$row[teorie]."\t".$row[practica]."\t".$row[premiu]."\t".$row[prspecial]."\t".$row[profcoord]."\n");
								}
								echo "<h2><center>Datele au fost exportate<br /><a href='rezultate.php'>Ok</a></h2></center>";
							}else
								echo "<h2><center>Eroare la selectarea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";		
						}else{
						$query="SELECT * FROM participanti,rezultate WHERE participanti.id=rezultate.id_elev";
						$result=mysql_query($query);
						if($result){
							echo '  <h2>Vizualizare</h2><br /><hr />
							<table>
								<tr>
									<td></td><td></td><td>Nume</td><td>Prenume</td><td>Clasa</td><td>Nr.dip</td><td>S1</td><td>S2</td><td>S3</td><td>S4</td><td>Of</td><td>Teorie</td><td>Practica</td><td>Total</td><td>Premiu</td><td>Premiu special</td>
								</tr>';
								while($row=mysql_fetch_array($result)){
									echo '<tr>
											<td><a href="rezultate.php?id='.$row[id].'&sterge=2"><img src="img/edit.png"></a></td>
											<td><a href="rezultate.php?id='.$row[id].'&sterge=1"><img src="img/sterge.png"></a></td>
											<td>'.$row[nume].'</td>
											<td>'.$row[prenume].'</td>
											<td>'.$row[cls].'</td>
											<td>'.$row[nrdip].'</td>
											<td>'.$row[s1].'</td>
											<td>'.$row[s2].'</td>
											<td>'.$row[s3].'</td>
											<td>'.$row[s4].'</td>
											<td>'.$row[of].'</td>
											<td>'.$row[teorie].'</td>
											<td>'.$row[practica].'</td>
											<td>'.$row[total].'</td>
											<td>'.$row[premiu].'</td>
											<td>'.$row[prspecial].'</td>
										</tr>';
								}
								echo '</table><br />
											<form action="rezultate.php" method="post">
												<input type="submit" name="exporta" value="Export&#259;" class="button" />
											</form>';
						}else
							echo "<h2><center>Eroare la selectarea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";
						echo '<h2>Adaug&#259;</h2><br /><hr />
						<form action="rezultate.php" enctype="multipart/form-data" method="post">
							<input type="radio" name="tip" value="import" checked />
							<label class="mij">Import&#259;</label><br />
							<input type="radio" name="tip" value="up"/>
							<label class="mij">Adaug&#259; fi&#351;ier cu rezultate</label><br />
							<input type="file" name="fisier" value="Import" /><br />
							<label class="mij">Clasa</label>
							<select name="cls" class="field">
								<option value="cls8">VIII</option>
								<option value="cls9">IX</option>
								<option value="cls10">X</option>
								<option value="cls11">XI</option>
								<option value="cls12">XII</option>
							</select><br />
							<input type="submit" name="trimite" value="Trimite" class="button" />
						</form>';
				}
			}else{
				//echo "<center><h2>Bun venit!<br /> Rezultatele nu au fost postate!</h2></center>";
				if($_GET[cls]==''){
				//echo '<a href="rezultate.php?cls=VIII">clasa VIII&nbsp;</a>&nbsp;<a href="rezultate.php?cls=IX">clasa IX&nbsp;</a>&nbsp;<a href="rezultate.php?cls=X">clasa X&nbsp;</a>&nbsp;<a href="rezultate.php?cls=XI">clasa XI&nbsp;</a>&nbsp;<a href="rezultate.php?cls=XII">clasa XII</a><br />';
				echo '<table>';
				echo '<tr><td><a href="fisiere/rezfinale.xls"><img src="img/jos.jpg" width="20" height="20" alt="" /></a></td><td><h2>Rezultatele finale</h2></td></tr>';
				echo '<tr><td><a href="fisiere/LOT.doc"><img src="img/jos.jpg" width="20" height="20" alt="" /></a></td><td><h2>Lotul largit</h2></td></tr>';
				
				echo '</table>';
				//$query="SELECT * FROM participanti,rezultate WHERE rezultate.id_elev=participanti.id GROUP BY participanti.judet";
				$query="";
				$result=mysql_query($query);
				if($result){
					/**echo '<br /><table width="600px">
						<tr><td><h2>Jude&#355;</h2></td><td><h2>Nr. premii</h2></td><td><h2>Media punctaj</h2></td></tr>
					';*/
					while($row=mysql_fetch_array($result)){
						$query="SELECT rezultate.premiu FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id AND participanti.judet='".$row[judet]."' AND rezultate.premiu='I'";
						$re=mysql_query($query);
						$unu=mysql_num_rows($re);
						$query="SELECT rezultate.premiu FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id AND participanti.judet='".$row[judet]."' AND rezultate.premiu='II'";
						$re=mysql_query($query);
						$doi=mysql_num_rows($re);
						$query="SELECT rezultate.premiu FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id AND participanti.judet='".$row[judet]."' AND rezultate.premiu='III'";
						$re=mysql_query($query);
						$trei=mysql_num_rows($re);
						$query="SELECT rezultate.premiu FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id AND participanti.judet='".$row[judet]."' AND rezultate.premiu='M'";
						$re=mysql_query($query);
						$men=mysql_num_rows($re);
						echo '<tr><td><h3>'.$row[judet].'</h3></td><td><h5>Premii I:'.$unu.'<br />Premii II:'.$doi.'<br />Premii III:'.$trei.'<br />Mentiuni:'.$men.'</h5></td>';
						//alta versiune alta viziune
						//media punctajelor la proba practica+teoretica pe judete
						$query="SELECT * FROM rezultate,participanti WHERE rezultate.id_elev=participanti.id AND participanti.judet='".$row[judet]."'";
						$re=mysql_query($query);
						$tot=mysql_num_rows($re);
						$teorie=$practica=0;
						
						while($row2=mysql_fetch_array($re)){
							$teorie+=$row2[teorie];
							$practica+=$row2[practica];
						}
						
						echo '<td><h5>Proba teoretica :'.$teorie/$tot.'<br />Proba practica :'.$practica/$tot.'</h5></td></tr>';
					}
					echo '</table>';
				}
				
				//	echo "<h2><center>Eroare la selectarea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";	
				}else{
					//$query="SELECT * FROM participanti,rezultate WHERE rezultate.id_elev=participanti.id AND participanti.cls='".$_GET[cls]."'";
					//echo $
					
				$result=mysql_query($query);
				if($result){
					echo '<h2>'.$_GET[cls].'</h2><a href="rezultate.php"><img src="img/goback.gif" width="30" height="20"></a><table>
						<tr><td>Nume & prenume</td><td>Nr diplom&#259;</td><td>S1</td><td>S2</td><td>S3</td><td>S4</td><td>Of</td><td>Teorie</td><td>Practic&#259;</td><td>Total</td><td>Premiu</td><td>PrSpecial</td></tr>
					';
					while($row=mysql_fetch_array($result)){
						echo '<tr><td>'.$row[nume]." ".$row[prenume].'</td><td>'.$row[nrdip].'</td><td>'.$row[s1].'</td><td>'.$row[s2].'</td><td>'.$row[s3].'</td><td>'.$row[s4].'</td><td>'.$row[of].'</td><td>'.$row[teorie].'</td><td>'.$row[practica].'</td><td>'.$row[total].'</td><td>'.$row[premiu].'</td><td>'.$row[prspecial].'</td></tr>';	
					}
					echo '</table>';
				}else
					echo "<h2><center>Eroare la selectarea datelor<br /><a href='rezultate.php'>Ok</a></h2></center>";	
				}	
			}				
		?>



		</div>

		<div class="clearer"><span></span></div>

	</div>

<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>

</div>

</body>

</html>