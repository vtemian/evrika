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
                  <li><a href="comisie.php?comisie=5">Comisie proba teoretic�</a></li>
                  <li><a href="comisie.php?comisie=4">Comisie proba practic�</a></li>
                  
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
			if($_GET[comisie]=='1'||$_GET[comisie]=='2'||$_GET[comisie]=='3'){
				if(isset($_POST[submit])){
					if(trim($_POST[nume])!=''){
						if(trim($_POST[prenume])!=''){
							if(trim($_POST[inst])!=''){
								if(trim($_POST[loc])!=''){
									$nume=mysql_escape_string($_POST[nume]);
									$prenume=mysql_escape_string($_POST[prenume]);
									$inst=mysql_escape_string($_POST[inst]);
									$loc=mysql_escape_string($_POST[loc]);
									$query="INSERT INTO comisie (nume,prenume,localitate,institutie,responsabilitate,tip) VALUES ('".$nume."','".$prenume."','".$loc."','".$inst."','".$_POST[res]."','".$_GET[comisie]."')";
									$result=mysql_query($query);
									//echo $query;
									if($result){
										echo '<center><h2>Datele au fost introduse cu succes<br /><a href="admin_comisie.php?comisie='.$_GET[comisie].'">Ok</a></h2></center>';
									}else
										echo '<center><h2>Eroare la introducerea datelor<br /><a href="admin_comisie.php?comisie='.$_GET[comisie].'">Ok</a></h2></center>';
								}else
									echo '<center><h2>Trebuie sa introduceti un o localitate<br /><a href="admin_comisie.php?comisie='.$_GET[comisie].'">Ok</a></h2></center>';
							}else
								echo '<center><h2>Trebuie sa introduceti un o institutie<br /><a href="admin_comisie.php?comisie='.$_GET[comisie].'">Ok</a></h2></center>';
						}else
							echo '<center><h2>Trebuie sa introduceti un prenume<br /><a href="admin_comisie.php?comisie='.$_GET[comisie].'">Ok</a></h2></center>';
					}else
						echo '<center><h2>Trebuie sa introduceti un nume<br /><a href="admin_comisie.php?comisie='.$_GET[comisie].'">Ok</a></h2></center>';
					
				}else
					if(isset($_POST[exporta])){
						$fisier=fopen('fisiere/comisie'.$_GET[comisie].'.xls','w+');
						$query="SELECT * FROM comisie WHERE tip='".$_GET[comisie]."'";
						$result=mysql_query($query);
						fwrite($fisier,"Nr.Crt\tNume\tPrenume\tLocalitate\tInstitutie\tResponsabilitate\n\n");
						$c=1;
						if($result){
							while($row=mysql_fetch_array($result)){
								fwrite($fisier,$c++."\t".$row[nume]."\t".$row[prenume]."\t".$row[localitate]."\t".$row[institutie]."\t".$row[responsabilitate]."\n");
							}
							echo '<center><h2>Datele au fost exportate<br /><a href="admin_comisie.php?comisie='.$_GET[comisie].'">Ok</a></h2></center>'; 
						}else
							echo '<center><h2>Eroare la selectarea datelor<br /><a href="admin_comisie.php?comisie='.$_GET[comisie].'">Ok</a></h2></center>';
					}else
					if(isset($_POST[importa])){
						
					}else{
					$query="SELECT * FROM comisie WHERE tip='".$_GET[comisie]."'";
					$result=mysql_query($query);
					if($result){
						echo '<h2>Vizualizare</h2></ hr><br />
							<table>
						<tr><td></td><td></td><td>Nume</td><td>Prenume</td><td>Institutia de invatamant</td><td>Localitatea</td><td>Responsabilitati</td></tr>';
						while($row=mysql_fetch_array($result)){
							echo'	<tr>
										<td><a href="admin_comisie_m.php?id='.$row[id].'&sterge=2&comisie='.$_GET[comisie].'"><img src="img/edit.png"></a></td>
										<td><a href="admin_comisie_m.php?id='.$row[id].'&sterge=1&comisie='.$_GET[comisie].'"><img src="img/sterge.png"></a></td>
										<td>'.$row[nume].'</td>
										<td>'.$row[prenume].'</td>
										<td>'.$row[institutie].'</td>
										<td>'.$row[localitate].'</td>
										<td>'.$row[responsabilitate].'</td>
									</tr>';
						}
						echo'		
							</table>';
					}
						else
							echo '<center><h2>Eroare la selectarea datelor<br /><a href="admin_comisie.php?comisie='.$_GET[comisie].'">Ok</a></h2></center>';
				
				echo '<form action="admin_comisie.php?comisie='.$_GET[comisie].'" method="POST"><br /><input type="submit" name="exporta" value="Export" class="button"/><br /><h2>Adugare</h2></ hr><br /><div class="useri">
								<label class="mij">Nume</label>
								<input type="text" name="nume" class="field" /><br />
								<label class="mij">Prenume</label>
								<input type="text" name="prenume" class="field" /><br />
								<label class="mij">Institutia de inavtamant</label>
								<input type="text" name="inst" class="field" /><br />
								<label class="mij">Localitate</label>
								<input type="text" name="loc" class="field" /><br />
								<label class="mij">Responsabilitati</label>
								<select name="res">
									<option value="Presedinte">Presedinte</option>
									<option value="Vicepresedinte">Vicepresedinte</option>
									<option value="Vicepresedinte subcomisie/elaborare subiecte baraj">Vicepresedinte subcomisie/elaborare subiecte baraj</option>
									<option value="Membru / elaborare subiecte baraj">Membru/elaborare subiecte baraj</option>
									<option value="Secretar">Secretar</option>
									<option value="Membru">Membru</option>
									
								</select>
								<input type="submit" name="submit" value="Inregistreaza" class="button">

							</form>
						</div>';
					}	
			}else
				echo '<center><h2>Nu umbla ca poate te arzi<br /><a href="admin_comisie.php?comisie='.$_GET[comisie].'">Ok</a></h2></center>';
			?>			
		</div>
		<div class="clearer"><span></span></div>

	</div>

	<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>

</div>

</body>

</html>