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
			mitems['Proba de baraj']=['Chimie Analitica','Chimie Anorganica','Chimie Organica I','Chimie Organica II','Electrochimie','Structura','Cinetica Chimica','Termodinamica Chimica'];
			
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

		
		<div class="content">

		<?php
		if($_SESSION[rang]==3){
			if(isset($_POST[trimite])){
					if($_FILES['fisier']['error']==0){
						
							if($_FILES['fisier']['type']=='application/octet-stream'||$_FILES['fisier']['type']=='application/pdf'||$_FILES['fisier']['type']=='application/msword'){
								if($_FILES['fisier']['size']<700000){
										
										$uploaddir = getcwd().'/fisiere/';
										$c_dip=$_FILES['fisier']['name'];
										$c_dip1=$_FILES['fisier']['name'];
										$uploadfile = $uploaddir.$c_dip1;
										if (move_uploaded_file($_FILES['fisier']['tmp_name'],$uploadfile) && is_writable($uploadfile)){
											
												echo "<h2><center>Incarcare reusita : ".$c_dip."<br /></h2></center>";
												if($_FILES['fisier']['type']=='application/msword'){
													$mailMerge = new Zend_Service_LiveDocx_MailMerge();
 
													$mailMerge->setUsername('whitemonk')
																->setPassword('seleus00');
 
													$mailMerge->setLocalTemplate('fisiere/'.$c_dip);
 
													$mailMerge->assign(null);  // must be called as of phpLiveDocx 1.2
 
													$mailMerge->createDocument();
 
													$data = $mailMerge->retrieveDocument('html');
													$denum=rand().'.html';
												file_put_contents('./fisiere/'.$denum, $data);}
												if($denum)
													$query="INSERT INTO subiecte(tip,proba,tipcls,cale,calehtml) VALUES ('".$_POST[tip]."','".$_POST[proba]."','".$_POST[tipcls]."','fisiere/".$c_dip."','fisiere/".$denum."')";
												else
													$query="INSERT INTO subiecte(tip,proba,tipcls,cale) VALUES ('".$_POST[tip]."','".$_POST[proba]."','".$_POST[tipcls]."','fisiere/".$c_dip."')";
												$result=mysql_query($query);
												if($result){
													
													echo "<h2><center>Datele au fost introduse cu succes<br /><a href='subiecte.php'>Ok</a></h2></center>";
												}else
													echo "<h2><center>FEroare la introducerea datelore<br /><a href='subiecte.php'>Ok</a></h2></center>";
										}
										else{
											echo "<h2><center>Eroare la upload ".$c_dip."<br /><a href='subiecte.php'>Ok</a></h2></center>";
										}
								}else
										echo "<h2><center>Fisierul este prea mare<br /><a href='subiecte.php'>Ok</a></h2></center>";
							}else
									{echo "<h2><center>Nu puteti sa incarcati acest tip de fisier<br /><a href='subiecte.php'>Ok</a></h2></center>";
									
									}
						}
						else{
							echo "<h2><center>Eroare la fisier<br /><a href='subiecte.php'>Ok</a></h2></center>";
						}
			}else
					if($_GET[sterge]==2){
						$query="SELECT * FROM subiecte WHERE id='".mysql_escape_string($_GET[id])."'";
						$result=mysql_query($query);
						if($result){
							$row=mysql_fetch_array($result);
							echo '<form action="subiecte.php?id='.$_GET[id].'" enctype="multipart/form-data" method="post">
							<input type="radio" name="tip" value="subiect" ';if($row[tip]=='subiect') echo 'checked'; echo '/>
							<label class="mic">Subiect</label><br>
							<input type="radio" name="tip" value="barem" ';if($row[tip]=='barem') echo 'checked'; echo '/>
							<label class="mic">Barem</label><br>
							<label class="mic">Proba</label>
							<select name="proba"  onchange="populate(this)">
								<option value="Proba teoretica" ';if($row[proba]=='Proba teoretica') echo 'SELECTED'; echo '>Proba teoretica</option>
								<option value="Proba practica" ';if($row[proba]=='Proba practica') echo 'SELECTED'; echo '>Proba practica</option>
								<option value="Proba de baraj" ';if($row[proba]=='Proba de baraj') echo 'SELECTED'; echo '>Proba de baraj</option>
							</select><br />
							<label class="mic">Clasa/Tip</label>
							<select name="tipcls" id="tipcls"><option value="0">Selecteaza o proba</option></select><br />
							';
							if(trim($row[calehtml]!='')){
							 
								$fisier = $row[calehtml];
								$content = file_get_contents($fisier);

							echo '<textarea name="continut">'.$content.'</textarea><input type="hidden" name="calea" value="'.$row[calehtml].'">';}echo'
							<input type="submit" name="modifica" value="Trimite" class="button" />
						</form>';
						}else
							echo "<h2><center>Eroare la selectarea datelor<br /><a href='subiecte.php'>Ok</a></h2></center>";
					}else
						if($_GET[sterge]==1){
							$query="DELETE FROM subiecte WHERE id='".mysql_escape_string($_GET[id])."'";
							$result=mysql_query($query);
							if($result){
								echo "<h2><center>Datele au fost sterse cu succes<br /><a href='subiecte.php'>Ok</a></h2></center>";
							}else
								echo "<h2><center>Eroare la stergerea datelor<br /><a href='subiecte.php'>Ok</a></h2></center>";
						}else
						if(isset($_POST[modifica])){
							
								$query="UPDATE subiecte SET tip='".$_POST[tip]."', proba='".$_POST[proba]."',tipcls='".$_POST[tipcls]."' WHERE id='".$_GET[id]."'";
								$result=mysql_query($query);
								if($result){
									if($_POST[continut]!=''){
										$fisier=fopen($_POST[calea],"w+");
										fwrite($fisier,$_POST[continut]);
										echo "<h2><center>Datele au fost modificate cu succes<br /><a href='subiecte.php'>Ok</a></h2></center>";
									}
										
								}else
									
									echo "<h2><center>Eroare la modificarea datelor<br /><a href='subiecte.php'>Ok</a></h2></center>";
								
								
						}else{
				echo '<h2>Vizualizare</h2><br /><hr />';
				$query="SELECT * FROM subiecte WHERE tip='subiect'";
				$result=mysql_query($query);
				if($result){
					echo '<table><tr><td colspan="7">Clasa/Tip</td></tr>';
					while($row=mysql_fetch_array($result)){
						echo '<tr>
								<td>'.$row[tipcls].'</td>
								<td><a href="subiecte.php?id='.$row[id].'&sterge=2"><img src="img/edit.png"></a></td>
								<td><a href="subiecte.php?id='.$row[id].'&sterge=1"><img src="img/sterge.png"></a></td>';
								if($row[calehtml])echo'
								<td><a href="'.$row[calehtml].'"><img src="img/viz.png"></a></td>';
							 
						$query="SELECT * FROM subiecte WHERE tip='barem' AND tipcls='".$row[tipcls]."' AND proba='".$row[proba]."'";
						$resul=mysql_query($query);
						if($resul)
							$r=mysql_fetch_array($resul);
							if($r[id])
							echo '
							<td><a href="subiecte.php?id='.$r[id].'&sterge=2"><img src="img/edit.png"></a></td>
								<td><a href="subiecte.php?id='.$r[id].'&sterge=1"><img src="img/sterge.png"></a></td>
								<td><a href="'.$r[calehtml].'"><img src="img/viz.png"></a></td>';
						else
							echo '<td colspan="3">Nu exist&#259; barem pentru acest subiect</td>';
						echo ' </tr>';	
					}
					echo '</table>';
				}else
					echo '<center><h2>Eroare la selectarea datelor<br /><a href="admin_prg.php">Inapoi</a></h2></center>';
				echo '<h2>Adaug&#259;</h2><br /><hr />
						<form action="subiecte.php" enctype="multipart/form-data" method="post">
							<input type="radio" name="tip" value="subiect" checked/>
							<label class="mic">Subiect</label><br>
							<input type="radio" name="tip" value="barem"/>
							<label class="mic">Barem</label><br>
							<label class="mic">Proba</label>
							<select name="proba"  onchange="populate(this)">
								<option value="0">-</option>
								<option value="Proba teoretica">Proba teoretica</option>
								<option value="Proba practica">Proba practica</option>
								<option value="Proba de baraj">Proba de baraj</option>
							</select><br />
							<label class="mic">Clasa/Tip</label>
							<select name="tipcls" id="tipcls"><option value="0">Selecteaz&#259; o prob&#259;</option></select><br />
							<label class="mic">Fisierul</label>
							<input type="file" name="fisier" class="field" /><br /><br />
							<input type="submit" name="trimite" value="Trimite" class="button" />
						</form>';
				}
						
		}else{
		//echo "<center><h2>Bun venit!<br /> Subiectele nu au fost postate!</h2></center>";
			echo '
				<table width="600px">
				<tr><td align="center"><h2>Proba</h2></td><td align="center"><h2>Clasa</h2></td><td align="center"><h2>Subiect</h2></td><td align="center"><h2>Barem</h2></td></tr>
			';
			$k=0;
			$query="SELECT * FROM subiecte WHERE proba='Proba teoretica' AND tip='subiect'";
			$result=mysql_query($query);
			if($result){
				while($row=mysql_fetch_array($result)){
					$query="SELECT * FROM subiecte WHERE proba='Proba teoretica' AND tip='barem' AND tipcls='".$row[tipcls]."'";
					$rez=mysql_query($query);
					$ro=mysql_fetch_array($rez);
					if($k==0){
						echo '<tr align="center"><td rowspan="5" align="center"><h3>Proba teoretic&#259;</h3></td><td><h3>'.$row[tipcls].'</h3></td><td align="center"><a href="'.$row[cale].'"><img src="img/jos.jpg" width="15" height="16" alt="" /></a><a href="'.$row[calehtml].'"><img src="img/viz.png" alt="" /></a></td><td align="center"><a href="'.$ro[cale].'"><img src="img/jos.jpg" width="15" height="16" alt="" /></a><a href="'.$ro[calehtml].'"><img src="img/viz.png" alt="" /></a></td></tr>';
					}else
						echo '<tr align="center"><td><h3>'.$row[tipcls].'</h3></td><td align="center"><a href="'.$row[cale].'"><img src="img/jos.jpg" width="15" height="16" alt="" /></a><a href="'.$row[calehtml].'"><img src="img/viz.png" alt=""/></a></td><td align="center"><a href="'.$ro[cale].'"><img src="img/jos.jpg" width="15" height="16" alt="" /></a><a href="'.$ro[calehtml].'"><img src="img/viz.png" alt="" /></a></td></tr>';
					$k++;
				}
			}else
				echo "<h2><center>Eroare la selectarea datelor<br /><a href='subiecte.php'>Ok</a></h2></center>";
			$k=0;
			$query="SELECT * FROM subiecte WHERE proba='Proba practica' AND tip='subiect'";
			$result=mysql_query($query);
			if($result){
				while($row=mysql_fetch_array($result)){
					$query="SELECT * FROM subiecte WHERE proba='Proba practica' AND tip='barem' AND tipcls='".$row[tipcls]."'";
					$rez=mysql_query($query);
					$ro=mysql_fetch_array($rez);
					if($k==0){
						echo '<tr align="center"><td rowspan="5" align="center"><h3>Proba practic&#259;</h3></td><td><h3>'.$row[tipcls].'</td><td align="center"><a href="'.$row[cale].'"><img src="img/jos.jpg" width="15" height="16"></a><a href="'.$row[calehtml].'"><img src="img/viz.png"></a></td><td><a href="'.$ro[cale].'"><img src="img/jos.jpg" width="15" height="16"></a><a href="'.$ro[calehtml].'"><img src="img/viz.png"></a></td></tr>';
					}else
						echo '<tr align="center"><td><h3>'.$row[tipcls].'</h3></td><td align="center"><a href="'.$row[cale].'"><img src="img/jos.jpg" width="15" height="16"></a><a href="'.$row[calehtml].'"><img src="img/viz.png"></a></td><td><a href="'.$ro[cale].'"><img src="img/jos.jpg" width="15" height="16"></a><a href="'.$ro[calehtml].'"><img src="img/viz.png"></a></td></tr>';
					$k++;
				}
			}else
				echo "<h2><center>Eroare la selectarea datelor<br /><a href='subiecte.php'>Ok</a></h2></center>";	
			$k=0;
			$query="SELECT * FROM subiecte WHERE proba='Proba baraj' AND tip='subiect'";
			$result=mysql_query($query);
			if($result){
				while($row=mysql_fetch_array($result)){
					$query="SELECT * FROM subiecte WHERE proba='Proba baraj' AND tip='barem' AND tipcls='".$row[tipcls]."'";
					$rez=mysql_query($query);
					$ro=mysql_fetch_array($rez);
					if($k==0){
						echo '<tr align="center"><td rowspan="5" align="center"><h3>Proba baraj</h3></td><td><h3>'.$row[tipcls].'</h3></td><td><a href="'.$row[cale].'"><img src="img/jos.jpg" width="15" height="16"></a><a href="'.$row[calehtml].'"><img src="img/viz.png"></a></td><td><a href="'.$ro[cale].'"><img src="img/jos.jpg" width="15" height="16"></a><a href="'.$ro[calehtml].'"><img src="img/viz.png"></a></td></tr>';
					}else
						echo '<tr align="center"><td>'.$row[tipcls].'</td><td><a href="'.$row[cale].'"><img src="img/jos.jpg" width="15" height="16"></a><a href="'.$row[calehtml].'"><img src="img/viz.png"></a></td><td><a href="'.$ro[cale].'"><img src="img/jos.jpg" width="15" height="16"></a><a href="'.$ro[calehtml].'"><img src="img/viz.png"></a></td></tr>';
					$k++;
				}
			}else
				echo "<h2><center>Eroare la selectarea datelor<br /><a href='subiecte.php'>Ok</a></h2></center>";	
			echo '</table>';
		}				
			?>

		</div>

		<div class="clearer"><span></span></div>

	</div>
	
<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>

</div>

</body>

</html>