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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
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
		if($_GET[tip]==1||$_GET[tip]==2){
			if($_SESSION[rang]==3){
				if(isset($_POST[trimite])||isset($_POST[modifica])){
					if(trim($_POST[centru])!=''){
						if(isset($_POST[trimite]))
							$query="INSERT INTO centre (titlu,descriere,tip) VALUES('".mysql_escape_string($_POST[centru])."','".mysql_escape_string($_POST[descriere])."','".$_GET[tip]."')";
						else
							$query="UPDATE centre SET titlu='".mysql_escape_string($_POST[centru])."',descriere='".mysql_escape_string($_POST[descriere])."' WHERE id='".$_GET[id]."'";
							//echo $_GET[id];
							$result=mysql_query($query);
							//echo $query;
							if($result){
								echo "<h2><center>Inserarea datelor s-a realizat cu succes<br /><a href='centre.php?tip=".$_GET[tip]."'>Ok</a></h2></center>";
							}else
								echo "<h2><center>Eroare la inserare<br /><a href='centre.php?tip=".$_GET[tip].".php'>Ok</a></h2></center>";	
						}else
							echo "<h2><center>Trebuie sa alegeti un centru<br /><a href='centre.php?tip=".$_GET[tip].".php'>Ok</a></h2></center>";
						
					}else
						if($_GET[sterge]==1){
							$query="DELETE FROM centre WHERE id='".mysql_escape_string($_GET[id])."'";
							$result=mysql_query($query);
							if($result){
								echo "<h2><center>Datele au fost sterse cu succes<br /><a href='centre.php?tip=".$_GET[tip].".php'>Ok</a></h2></center>";
							}else
								echo "<h2><center>Eroare la stergerea datelor<br /><a href='centre.php?tip=".$_GET[tip].".php'>Ok</a></h2></center>";
						}else
							if($_GET[sterge]==2){
								$query="SELECT * FROM centre WHERE id='".mysql_escape_string($_GET[id])."'";
								$result=mysql_query($query);
								if($result){
									$row=mysql_fetch_array($result);
									echo '<h2>Modific&#259;</h2><br /><hr /><div class="useri">
												<form action="centre.php?tip='.$_GET[tip].'&id='.$_GET[id].'" method="post">
													<label class="mij">Titlu</label>
													<input type="text" name="centru" value="'.$row[titlu].'"><br />
													<label class="mij">Descriere</label><br /><br>
													<textarea name="descriere">'.$row[descriere].'</textarea><br />
													<input type="submit" name="modifica" value="Modific&#259;" class="button" />
												</form>
											</div>';
								}else
									echo "<h2><center>Eroare la selectarea datelor<br /><a href='centre.php?tip=".$_GET[tip].".php'>Ok</a></h2></center>";
							}else{
							
						$query="SELECT * FROM centre WHERE tip='".$_GET[tip]."'";
						$result=mysql_query($query);
						if($result){
							if($_GET[tip]==1)
								$s="Centre de cazare";
							else
								$s="Centre de concurs";	
							echo '<h2>'.$s.'</h2><br /><hr />
								<table>
									<tr><td></td><td></td><td>Centru </td></tr>
							';
							while($row=mysql_fetch_array($result)){
								echo '	<tr>
											<td><a href="centre.php?tip='.$_GET[tip].'&id='.$row[id].'&sterge=2"><img src="img/edit.png"></a></td>
											<td><a href="centre.php?tip='.$_GET[tip].'&id='.$row[id].'&sterge=1"><img src="img/sterge.png"></a></td>
											<td>'.$row[titlu].'</td>
										</tr>';
							}
							echo '</table>';
						}else
							echo "<h2><center>Eroare la selectarea datelor<br /><a href='centre.php?tip=".$_GET[tip].".php'>Ok</a></h2></center>";
						echo '<h2>Ad&#259;ugare</h2><hr /><br /><div class="useri">
						<form action="centre.php?tip='.$_GET[tip].'" enctype="multipart/form-data" method="post">
							<label class="mij">Centru</label>
							<input type="text" name="centru" class="field" /><br/><br />
							<textarea name="descriere"></textarea><br/>
							<input type="submit" name="trimite" value="Trimite" class="button" />
						</form></div>';
					}	
            }
			else{
				$query="SELECT * FROM centre WHERE tip='".$_GET[tip]."'";
				$result=mysql_query($query);
				if($result){
					echo '<table>';
					while($row=mysql_fetch_array($result)){
						echo '<tr>';
						if($row['fisier']!=''){
							echo '<td><a href="'.$row['fisier'].'"><img src="img/jos.jpg" width="20" height="20" alt="" /></a></td>';
						}
						echo '
									<td>
										<h1>'.strtoupper($row[titlu]).'</h1><br />
									
									
										'.$row[descriere].'
									</td>
								</tr>
						';
					}
					echo '</table>';
				}else{
					echo "<h2><center>Eroare la selectarea datelor<br /><a href='centre.php?tip=".$_GET[tip].".php'>Ok</a></h2></center>";
				}
			}
		}else
			echo "<h2><center>Nu umbla ca te arzi :P<br /><a href='centre.php?tip=1'>Ok</a></h2></center>";
        ?>
        	
		</div>

		<div class="clearer"><span></span></div>

	</div>

<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>

</div>

</body>

</html>