<?php
	session_start();
	include_once "functii.php";
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2"/>
	<meta name="description" content="description"/>
	<meta name="keywords" content="keywords"/> 
	<meta name="author" content="author"/> 
	<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
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
<title>Evrika</title>
</head>
<body>
<div class="top">			
	<div class="header">
		<div class="left"></div>
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
				  <li><a href="sponsori.php">Sponsori</a></li>		
                  <li><a href="locati.php">Loca&#355;ii culturale</a></li>
                  <li><a href="centre.php?tip=1">Centre de cazare</a></li>
				  <li><a href="centre.php?tip=2">Centre de concurs</a></li>
                </ul>
          </li>
          
          <li><a href="#">Comisia</a>
                <ul>
				  <li><a href="comisie.php?comisie=1">Comisia na&#355ional&#259;</a></li>
                  <li><a href="comisie.php?comisie=5">Comisie jude&#355ean&#259;</a></li>
                  
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
        		if(isset($_POST['submit'])){
        			if(isset($_POST['tip'])){
        				if($_POST['tip']=="parinte"){
        					echo'
        						<div class="useri">
          							<form action="admin_useri.php" method="post">
          								<fieldset>
              								<label class="top">Nume:</label>
                							<input type="text" name="nume" class="field" /><br />
    	     								<label class="top">Prenume:</label>
               								<input type="text" name="prenume" class="field" /><br /> 				
			  								<label class="top">Numele copilului:</label>
               								<input type="text" name="ncopil" class="field" /><br /> 
               								<label class="top">Prenumele copilului:</label>
               								<input type="text" name="pcopil" class="field" /><br /> 
               								<label class="top">Email:</label>
               								<input type="text" name="email" class="field" /><br /> 
               									
        									<table><tr><td>
	       									<input type="submit" name="submit_parinte" class="button" value="Trimite"  /></td>
	       								
      								</form>	
      								<form action="profil.php" method="post">
      									<td><input type="submit" name="submit_parinte" class="button" value="&#206;napoi"  /></td></tr></table></fieldset>
      								</form>	
        							
      							</div>			
        					';
        				
    					}else
    						if($_POST['tip']=="diriginte"){
    						echo'
        						<div class="useri">
          							<form action="admin_useri.php" method="post">
          								<fieldset>
              								<label class="top">Nume:</label>
                							<input type="text" name="nume" class="field" /><br />
    	     								<label class="top">Prenume:</label>
               								<input type="text" name="prenume" class="field" /><br /> 
               								<label class="top">Clasa:</label>
               								<select name="clasa" class="field">
  												<option value="IX A">IX A</option>
  												<option value="IX B">IX B</option>
  												<option value="IX C">IX C</option>	
    											<option value="IX D">IX D</option>
    											<option value="IX E">IX E</option>
    											<option value="X A">X A</option>
    											<option value="X B">X B</option>	
					    						<option value="X C">X C</option>
					    						<option value="X D">X D</option>
					    						<option value="X E">X E</option>	
    											<option value="XI A">XI A</option>
    											<option value="XI B">XI B</option>	
    											<option value="XI C">XI C</option>
    											<option value="XI D">XI D</option>
    											<option value="XI E">XI E</option>	
    											<option value="XII A">XII A</option>
    											<option value="XII B">XII B</option>
    											<option value="XII C">XII C</option>	
    											<option value="XII D">XII D</option>
    											<option value="XII E">XII E</option>	
  											</select><br />
			  								<label class="top">Utilizator:</label>
               								<input type="text" name="user" class="field" /><br /> 
               								<label class="top">Parola:</label>
               								<input type="password" name="pass" class="field" /><br /> 
               								
               									
        									<table><tr><td>
	       									<input type="submit" name="submit_diriginte" class="button" value="Trimite"  /></td>
	       								
      								</form>	
      								<form action="profil.php" method="post">
      									<td><input type="submit" name="submit_parinte" class="button" value="&#206;napoi"  /></td></tr></table></fieldset>
      								</form>	
        							
      							</div>			
        					';
    						
							}else
								if($_POST['tip']=="administrator"){
									echo'
        						<div class="useri">
          							<form action="admin_useri.php" method="post">
          								<fieldset>
              								<label class="top">Nume:</label>
                							<input type="text" name="nume" class="field" /><br />
    	     								<label class="top">Prenume:</label>
               								<input type="text" name="prenume" class="field" /><br /> 
			  								<label class="top">Utilizator:</label>
               								<input type="text" name="user" class="field" /><br /> 
               								<label class="top">Parola:</label>
               								<input type="password" name="pass" class="field" /><br /> 
               								
               									
        									<table><tr><td>
	       									<input type="submit" name="submit_admin" class="button" value="Trimite"  /></td>
	       								
      								</form>	
      								<form action="profil.php" method="post">
      									<td><input type="submit" name="submit_parinte" class="button" value="&#206;napoi"  /></td></tr></table></fieldset>
      								</form>	
        							
      							</div>			
        					';
								}
        			
    				}else
    					echo '<center><h1 class=error>Nu ati ales nici o optiune!</h1><h1 class=error>Intorceti-va la pagina de <a href="profil.php">administrare</a>!</h1></center>';
    			}else
    				if(isset($_POST['submit_parinte'])){
    					if($_POST['nume']!=""){
    						if($_POST['prenume']!=""){
    							if($_POST['email']!=""){
    								  if(mailcheck($_POST['email'])){
    									$ncopil=mysql_escape_string($_POST['ncopil']);
    									$pcopil=mysql_escape_string($_POST['pcopil']);
										$name=mysql_escape_string($_POST['nume']);
										$prenume=mysql_escape_string($_POST['prenume']);
    									$email=mysql_escape_string($_POST['email']);
    									$pass=mt_rand();
										$query="SELECT * FROM elevi WHERE nume='".$ncopil."' AND prenume='".$pcopil."'";
    									$resu=mysql_query($query);
    									$nr=mysql_num_rows($resu);
    									if($nr){
    										$row=mysql_fetch_array($resu);
    										$id_elev=$row['id'];
    										$nick="p_".$ncopil."_".$pcopil;
    										$query="SELECT * FROM users_web";
    										$result1=mysql_query($query);
    										$k=0;
											while($row=mysql_fetch_array($result1)){
												if($row['user']==$nick)$k=1;$id=$row['id'];
											}
											if($k==1)
												echo '<h1 class=error><center>Copilul are deja un parinte inregistrat!</h1></center>';
											else{
												$query="SELECT MAX(id) as idul FROM users_web";
												$res=mysql_query($query);
												$row=mysql_fetch_array($res);
												$id=$row[idul];$id++;
												$query="UPDATE elevi SET parinte='".$id."' WHERE nume='".$ncopil."' AND prenume='".$pcopil."'";
												$result1=mysql_query($query);	
												if($result1){
    												$query="INSERT INTO users_web (nume,prenume,user,pass,email,rang) VALUES ('".$name."','".$prenume."','".$nick."',MD5('$pass'),'".$email."','1')";
													$result=mysql_query($query);
													if($result){
														$query="INSERT INTO parinti (id_user,id_elev,mailuit) VALUES ('".$id."','".$id_elev."','1')";	
														$rez=mysql_query($query);
														if($rez){
															echo '<h1><center>User inregistrat cu succes!</h1><form method="post" action="profil.php"><input type="submit" name="submit" value="Ok" class="button" onClick="history.back()" ></form></center>';
															$mail = new PHPGMailer();
															$mail->Username = 'vtemian@gmail.com';
															$mail->Password = 'seleus00';
															$mail->From = 'vtemian@gamil.com';
															$mail->FromName = 'SmartSchoolSecurity';
															$mail->Subject = 'Date de login';
															$mail->AddAddress($email);
															$mail->Body   = '
																		Buna ziua,
																		Am aflat ca sunteti parintele elevului '.$ncopil.' '.$pcopil.'.Felicitari!
																		Acum puteti afla daca copilul dumneavaoastra este sau nu la scoala, cate absente are si multe alte statistici!
																		Datele de autntificare pentru sistemul SmartSchoolSecurity sunt:
																			Utilizator:'.$nick.'	
																			Parola:'.$pass.'		
																		O zi buna in continuare!
																			
																	';
															$mail->Send();
													
														}else
															echo '<h1 class=error><center>Eroare la inregistrarea datelor in tabelul parinti!<br /></h1></center>'; 
													}
													else
														echo '<h1 class=error><center>Eroare la inregistrarea datelor!<br /></h1></center>';
												}else{
													echo '<h1 class=error><center>Copilul nu a fost gasit in baza de date!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="parinte"></form></center>'; 
												}	
											}
										}else
											echo '<h1 class=error><center>Elevul nu a fost gasit in baza de date!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="parinte"></form></center>';
									}else
									  	echo '<h1 class=error><center>Nu incerca ca nu prea merge:P!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="parinte"></form></center>';
								}else
    								echo '<h1 class=error><center>Nu ati complectat campul email!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="parinte"></form></center>';
							}else
    							echo '<h1 class=error><center>Nu ati complectat campul prenume!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="parinte"></form></center>';
						}else
    						echo '<h1 class=error><center>Nu ati complectat campul nume!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="parinte"></form></center>';
    						
					}else
						if(isset($_POST['submit_p'])){
							$query="SELECT * FROM users_web WHERE rang=1";
							$result=mysql_query($query);$k=1;
							echo "  <form action='profil.php' method='post'>
      									<input type='submit' name='submit_parinte' class='button' value='&#206;napoi'  />
      								</form>	
									<form action='admin_useri.php' method='POST'>
									<table>
									<tr><td></td><td><h3> ID </h3></td><td><h3> Nume</h3></td><td><h3> Prenume </h3></td><td><h3><center> Utilizator </center></h3></td></tr>";
							if($result){
								while($row=mysql_fetch_array($result)){
									echo '<tr><td><a href="admin_useri.php?id='.$row[id].'&tip=p"><img src="img/sterge.png"></a></td> <td><h4>'.$k++.'</h4></td><td><h4>'.$row['nume'].'</h4></td><td><h4>'.$row['prenume'].'</h4></td><td><h4>'.$row['user'].'</h4></td></tr>';
								}
								echo '
									
									
									</form></table>
									<form action="profil.php" method="post">	
										<input type="submit" name="sterge_p" value="&#206;napoi" class="button" />
									<form>
										
								';
							}else
								echo '<h1 class=error><center>Eroare la selectarea datelor!</h1></center>';
						}else
							if($_GET[id]!=''){
								$queryn="DELETE FROM users_web WHERE id='".$_GET['id']."'";
								$resultn=mysql_query($queryn);
								if($resultn)echo '<h1><center>Stergere s-a realizat!<br /></h1></center>';
								else
									echo '<h1><center>Eroare la stergere!<br /></h1></center>';
									
								echo    '<form action="admin_useri.php" method="post">';
										if($_GET[tip]=='d')echo'
											<center><input type="submit" name="submit_d" value="Ok" class="button" /></center>';
										else	
										if($_GET[tip]=='p')echo'
											<center><input type="submit" name="submit_p	" value="Ok" class="button" /></center>';else
										echo'
											<center><input type="submit" name="submit_a" value="Ok" class="button" /></center>';	
								echo'</form>';	
									
								}else
									if(isset($_POST['submit_d'])){
										$query="SELECT * FROM users_web WHERE rang=2";
										$result=mysql_query($query);$k=1;
										echo " <form action='profil.php' method='post'>
      									<input type='submit' name='submit_parinte' class='button' value='&#206;napoi'  />
      								</form>	 
											<form action='admin_useri.php' method='POST'>
											<table>
												<tr><td></td><td><h3> ID </h3></td><td><h3> Nume</h3></td><td><h3> Prenume </h3></td><td><h3><center> Utilizator </center></h3></td></tr>";
										if($result){
											while($row=mysql_fetch_array($result)){
												echo '<tr><td><a href="admin_useri.php?id='.$row[id].'&tip=d"><img src="img/sterge.png"></a></td> <td><h4>'.$k++.'</h4></td><td><h4>'.$row['nume'].'</h4></td><td><h4>'.$row['prenume'].'</h4></td><td><h4>'.$row['user'].'</h4></td></tr>';
											}
										echo '
											</form></table>
											<form action="profil.php" method="post">	
											<input type="submit" name="sterge_d" value="&#206;napoi" class="button" />
											<form>	
										';
										}else
											echo '<h1 class=error><center>Eroare la selectarea datelor!</h1></center>';
									}else
										if(isset($_POST['submit_a'])){
											$query="SELECT * FROM users_web WHERE rang=3";
											$result=mysql_query($query);$k=1;
											echo "  <form action='profil.php' method='post'>
      									<input type='submit' name='submit_parinte' class='button' value='&#206;napoi'  />
      								</form>	
												<form action='admin_useri.php' method='POST'>
												<table>
													<tr><td></td><td><h3> ID </h3></td><td><h3> Nume</h3></td><td><h3> Prenume </h3></td><td><h3><center> Utilizator </center></h3></td></tr>";
											if($result){
												while($row=mysql_fetch_array($result)){
													echo '<tr><td><a href="admin_useri.php?id='.$row[id].'"><img src="img/sterge.png"></a></td> <td><h4>'.$k++.'</h4></td><td><h4>'.$row['nume'].'</h4></td><td><h4>'.$row['prenume'].'</h4></td><td><h4>'.$row['user'].'</h4></td></tr>';
												}
											echo '
												</form></table>
												<form action="profil.php" method="post">	
												<input type="submit" name="sterge_d" value="&#206;napoi" class="button" />
												<form>	
											';
											}else
												echo '<h1 class=error><center>Eroare la selectarea datelor!</h1></center>';
										}else
											if(isset($_POST['submit_diriginte'])){
    											if($_POST['user']!=""){
    												if($_POST['pass']!=""){
    													if($_POST['nume']!=""){
    													if($_POST['prenume']!=""){
														$name=mysql_escape_string($_POST['nume']);
														$prenume=mysql_escape_string($_POST['prenume']);
    													$pass=mysql_escape_string($_POST['pass']);
    													$nick=mysql_escape_string($_POST['user']);
    													$query="SELECT * FROM users_web";
    													$result1=mysql_query($query);
    													$k=0;
														while($row=mysql_fetch_array($result1)){
															if($row['user']==$nick)$k=1;
														}
														if($k==1)
															echo '<h1 class=error><center>Alegeti alt user!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="diriginte"></form></center>';
														else{	
    														$query="INSERT INTO users_web (nume,prenume,user,pass,rang) VALUES ('".$name."','".$prenume."','".$nick."',MD5('$pass'),'2')";
															$result=mysql_query($query);
															if($result){
																$query="SELECT id FROM users_web WHERE user='".$nick."'";
																$res=mysql_query($query);
																if($res){
																	$row=mysql_fetch_array($res);
																	$query="INSERT INTO diriginti(id_users,clasa) VALUES('".$row[id]."','".$_POST[clasa]."')";
																	$rez=mysql_query($query);
																	if($rez)	
																		echo '<h1><center>User inregistrat cu succes!</h1><form action="profil.php" method="post" ><input type="submit" name="submit" value="Ok" class="button" ></form></center>';
																	else	
																		echo '<h1><center>Eroare la inregistrarea dirigintelui!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="diriginte"></form></center>';
																		
																}else
																	
																echo '<h1><center>Eroare la inregistreare!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="diriginte"></form></center>';
															}
															else
																echo '<h1 class=error><center>Eroare la inregistrarea datelor!<form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="diriginte"></form></h1></center>';
														}
														}else
    														echo '<h1 class=error><center>Nu ati complectat campul prenume!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="diriginte"></form></center>';
														}else
    														echo '<h1 class=error><center>Nu ati complectat campul nume!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="diriginte"></form></center>';
													}else
    													echo '<h1 class=error><center>Nu ati complectat campul parola!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="diriginte"></form></center>';
												}else
    												echo '<h1 class=error><center>Nu ati complectat campul utilizator!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="diriginte"></form></center>';
    										}else	
    											if(isset($_POST['submit_admin'])){
    											if($_POST['user']!=""){
    												if($_POST['pass']!=""){
    													if($_POST['nume']!=""){
    													if($_POST['prenume']!=""){
														$name=mysql_escape_string($_POST['nume']);
														$prenume=mysql_escape_string($_POST['prenume']);
    													$pass=mysql_escape_string($_POST['pass']);
    													$nick=mysql_escape_string($_POST['user']);
    													$query="SELECT * FROM users_web";
    													$result1=mysql_query($query);
    													$k=0;
														while($row=mysql_fetch_array($result1)){
															if($row['user']==$nick)$k=1;
														}
														if($k==1)
															echo '<h1 class=error><center>Alegeti alt user!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="administrator"></form></center>';
														else{	
    														$query="INSERT INTO users_web (nume,prenume,user,pass,rang) VALUES ('".$name."','".$prenume."','".$nick."',MD5('$pass'),'3')";
															$result=mysql_query($query);
															if($result){
																echo '<h1><center>User inregistrat cu succes!</h1><form method="post" action="profil.php"><input type="submit" name="submit" value="&#206;napoi" class="button"  ></form></center>';
															}
															else
																echo '<h1 class=error><center>Eroare la inregistrarea datelor!<br /></h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="administrator"></form></center>';
														}
														}else
    														echo '<h1 class=error><center>Nu ati complectat campul prenume!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="administrator"></form></center>';
														}else
    														echo '<h1 class=error><center>Nu ati complectat campul nume!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="administrator"></form></center>';
													}else
    													echo '<h1 class=error><center>Nu ati complectat campul parola!</h1><form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="administrator"></form></center>';
												}else
    												echo '<h1 class=error><center>Nu ati complectat campul utilizator!</h1<form method="post" ><input type="submit" name="submit" value="&#206;napoi" class="button" onClick="history.back()" ><input type="hidden" name="tip" value="administrator"></form>></center>';
    										}
        		
        	?>


		</div>
		<div class="clearer"><span></span></div>

	</div>

<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>
</div>

</body>

</html>