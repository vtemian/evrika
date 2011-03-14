<?php
	session_start();
	include_once "functii.php";
	include_once "phpgmailer/class.phpgmailer.php";
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
				if($_SESSION[rang]>0){
					if(isset($_POST[trimite])){
						if($_POST[pass_act]!=""){
							$pass=mysql_escape_string($_POST[pass_act]);
							$pass=md5($pass);
							$query="SELECT pass FROM users_web WHERE pass='".$pass."'";
							$result=mysql_query($query);
							if($result){
								$rez=mysql_num_rows($result);
								if($rez>0){
									if($_POST[pass_re]!=""){
										if($_POST[pass_re_re]!=""){
												
												$passn=mysql_escape_string($_POST[pass_re]);
												$passnn=mysql_escape_string($_POST[pass_re_re]);
												if($passn==$passnn){
													$query="UPDATE users_web set pass='".md5($passn)."' WHERE id='".$_SESSION['id']."'";
													$res1=mysql_query($query);
													if($res1){
														echo '<center><h2>Datele au fost modificate cu succes!<br /><a href="profil.php">Inapoi</a></h2></center>';
													}else{
														echo '<center><h2>Momentan exista o eroare.Acuma reparam!<br /><a href="profil.php">Inapoi</a></h2></center>';
													}
												}else{
													echo '<center><h2>Cele dou&#259; parole nu corespund!<br /><a href="profil.php">Inapoi</a></h2></center>';
												}
												
										}else
											echo '<center><h2>Trebuie sa reintroduceti parola aleas&#259;<br /><a href="profil.php">Inapoi</a></h2></center>';
									}else
										echo '<center><h2>Trebuie sa introduceti o noua parol&#259;<br /><a href="profil.php">Inapoi</a></h2></center>';
								}else{
									echo '<center><h2>Parol&#259; incorect&#259;<br /><a href="profil.php">Inapoi</a></h2></center>';
								}
								
							}else{
								echo '<center><h2>Momentan exista o eroare.Acuma reparam!<br /><a href="profil.php">Inapoi</a></h2></center>';
							}
							
						}else
							echo '<center><h2>Trebuie sa introduceti o parola<br /><a href="profil.php">Inapoi</a></h2></center>';
					
					}else{
						echo '	
							<h1>Modific&#259; parol&#259;</h1>
							<hr /><br />
						<div class="useri"><form action="profil.php" method="post">
									<label class="mij" >Parola actual&#259; :</label>
									<input type="password" name="pass_act" class="field" /><br />
									<label class="mij" >Parola nou&#259; :</label>
									<input type="password" name="pass_re" class="field" /><br />
									<label class="mij" >Parola nou&#259; :</label>
									<input type="password" name="pass_re_re" class="field" /><br />
									<input type="submit" name="trimite" value="Schimb&#259; parola" class="button" /> 
								</form></div><br /><br /><br /><br /><br /><br /><br />';
						if($_SESSION[rang]==2){
							if(isset($_POST[trimite])){
								if($_POST[pass_act]!=""){
									$pass=mysql_escape_string($_POST[pass_act]);
									//$pass=md5($pass);
									$query="SELECT email FROM users_web WHERE email='".$pass."'";
									$result=mysql_query($query);
									if($result){
										$rez=mysql_nume_rows($result);
										if($rez>0){
											if($_POST[pass_re]!=""){
												if($_POST[pass_re_re]!=""){
														
														$passn=mysql_escape_string($_POST[pass_re]);
														$passnn=mysql_escape_string($_POST[pass_re_re]);
														if($passn==$passnn){
															$query="UPDATE users_web set email='".$passn."' WHERE id='".$_SESSION['id']."'";
														}else{
															echo '<center><h2>Cele dou&#259; adrese nu corespund!<br /><a href="profil.php">Inapoi</a></h2></center>';
														}
													
													}else
														echo '<center><h2>Trebuie s&#259; reintroduceti adresa aleas&#259;<br /><a href="profil.php">Inapoi</a></h2></center>';
												}else
													echo '<center><h2>Trebuie sa introduceti o nou&#259; adres&#259;<br /><a href="profil.php">Inapoi</a></h2></center>';
											}else{
												echo '<center><h2>Adres&#259; incorect&#259;<br /><a href="profil.php">Inapoi</a></h2></center>';
											}
									}else{
										echo '<center><h2>Momentan exista o eroare.Acuma repar&#259;m!<br /><a href="profil.php">Inapoi</a></h2></center>';
									}
								}else
									echo '<center><h2>Trebuie sa introduceti o adres&#259;<br /><a href="profil.php">Inapoi</a></h2></center>';
						
							}else{
								echo '<h1>Modific&#259; e-mail</h1>
							<hr /><br />
								<div class="useri"><form action="profil.php" method="post">
									<label class="mij">Adresa actual&#259; :</label>
									<input type="text" name="pass_act" class="field" /><br />
									<label class="mij" >Adres&#259; nou&#259; :</label>
									<input type="text" name="pass_re" class="field" /><br />
									<label class="mij" >Adres&#259; nou&#259; :</label>
									<input type="text" name="pass_re_re" class="field" /><br />
									<input type="submit" name="trimite" value="Schimb&#259; adresa" class="button" /> 
								</form></div>';
							}
						}else{
							if($_SESSION[rang]==3){
								if(isset($_POST[baga])){
									$query="SELECT email FROM users_web WHERE rang='2'";
									$result=mysql_query($query);
									if($result){
										while($row=mysql_fetch_array($result)){
											$mail = new PHPGMailer();
											$mail->Username = 'vtemian@gmail.com';
											$mail->Password = 'seleus00';
											$mail->From = 'vtemian@gmail.com';
											$mail->FromName = 'ONC 2011';
											$mail->Subject = 'Publicarea rezultatelor';
											$mail->AddAddress($row[email]);
											$mail->Body   = '
											Buna ziua,
											Au fost publicate noi rezultate pe site-ul ONC 2011!
											Va invitam sa le vedeti la sectiunea rezultate!
											O zi buna in continuare!								
											';
											$mail->Send();
										}
									echo '<center><h2>Datele au fost transmise cu succes!<br /><a href="profil.php">Inapoi</a></h2></center>';
									}else
										echo '<center><h2>Momentan exista o eroare.Acuma repar&#259;m!<br /><a href="profil.php">Inapoi</a></h2></center>';
								}else{
									echo '
										<h1>Trimite email</h1><hr /><br />
										<div class="useri"><form action="profil.php" method="POST">
											<label class="mij">Trimite e-mail: </label>
											<input type="submit" name="baga" value="Trimite" class="button" /><br /><br />
											<hr/><br /><h1>Ad&#259;ugare utilizatori</h1><hr /><br />
											</form><form action="admin_useri" method="post">
											Elevi:
							                <input type="radio" name="tip" value="parinte" /><br />
							    	      	Profesor:
							               	<input type="radio" name="tip" value="diriginte"/> 
							               	<input type="submit" name="submit" class="button" value="Adaug&#259;"  /><br />
										 	Administrator:
							                <input type="radio" name="tip" value="administrator" />
							                <h1>Vizualizare</h1><hr /><br />
							              	<input type="submit" name="submit_p" class="button" value="Elevi"  /> 
							              	<input type="submit" name="submit_d" class="button" value="Profesori"  /> 
							              	<input type="submit" name="submit_a" class="button" value="Administratori"  />
												
										</form></div>
									';
								}
							}
						}
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
