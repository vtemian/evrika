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
	require_once 'Zend/Loader.php';
	require_once 'functii1.php';
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
<script type="text/javascript" src="datetimepicker.js"> </script>
	<script type="text/javascript" src="hint.js"></script>

	<script type="text/javascript">
	function popup(url) {
	popupWindow = window.open(url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
	}
	</script>
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
				if(isset($_POST[submit])){
					if(trim($_POST[data])!=''){
						if(trim($_POST[continut])!=''){		
							if($_POST[poz]=='0'){	
								$query="SELECT MAX(ord) as max_ord FROM program";
								$rez=mysql_query($query);
								if($rez){					
									$row=mysql_fetch_array($rez);
									$ord=$row[max_ord]+1;
									$query='INSERT INTO program (articol,data,ord) VALUES("'.$_POST[continut].'","'.$_POST[data].'","'.$ord.'")';
									$result=mysql_query($query);
									if($result){
										echo '<center><h2>Datele au fost introduse cu suucces<br /><a href="program.php">Inapoi</a></h2></center>';
										$file=fopen("Program.doc","a+");
										$string="Data :".$_POST[data]."\nContinut :".$_POST[continut]."\n";
										
										if(fwrite($file,$string)==TRUE){
											echo '<center><h2>Datele au fost scrise in fisier cu succes<br /></h2></center>';
										}
										else
											echo '<center><h2>Eroare la scrierea datelor in fisier<br /></h2></center>';
										Zend_Loader::loadClass('Zend_Gdata');
										Zend_Loader::loadClass('Zend_Gdata_AuthSub');
										Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
										Zend_Loader::loadClass('Zend_Gdata_HttpClient');
										Zend_Loader::loadClass('Zend_Gdata_Calendar');
										$s=$_POST[data];
										$s[strlen($s)-1]=$s[strlen($s)-1]-1;
										createEvent(Zend_Gdata_ClientLogin::getHttpClient('onc2011@gmail.com','onctm2011',Zend_Gdata_Calendar::AUTH_SERVICE_NAME), $_POST[continut],
							   			'ONC 2011',
							    		'Timisoara',
							    		$s, '22:00', $_POST[data], '03:00', '+02' );
									}else
										echo '<center><h2>Eroare la introducerea datelor in tabel<br /><a href="program.php">Inapoi</a></h2></center>';
								}else
									echo '<center><h2>Eroare la selectarea datelor in tabel<br /><a href="program.php">Inapoi</a></h2></center>';
							}else{
								$poz=$_POST[poz];
								$query="SELECT * FROM program WHERE ord >='".$poz."'";
								//echo $query;
								$result=mysql_query($query);
								while($row=mysql_fetch_array($result)){
									$ord=$row[ord]+1;
									$query="UPDATE program SET ord='".$ord."' WHERE id='".$row[id]."'";
									$res=mysql_query($query);
									if(!$res){
										echo '<center><h2>Eroare la introducerea datelor in tabel<br /><a href="program.php">Inapoi</a></h2></center>';
									}
								}							
								$query='INSERT INTO program (articol,data,ord) VALUES("'.$_POST[continut].'","'.$_POST[data].'","'.$poz.'")';
								$result=mysql_query($query);
								if($result){
									echo '<center><h2>Datele au fost introduse cu suucces<br /><a href="program.php">Inapoi</a></h2></center>';
								}else
									echo '<center><h2>Eroare la introducerea datelor in tabel<br /><a href="program.php">Inapoi</a></h2></center>';
								
							}
						}else
							echo '<center><h2>Trebuie sa aveti un continut<br /><a href="program.php">Inapoi</a></h2></center>';
					}else
						echo '<center><h2>Trebuie sa aveti o data<br /><a href="program.php">Inapoi</a></h2></center>';
					
				}else{
					$query="SELECT MAX(ord) as max_ord FROM program";
					$rez=mysql_query($query);
					if($rez){
					$r=mysql_fetch_array($rez);
					$query="SELECT * FROM program ORDER BY ord ASC ";
					$result=mysql_query($query);
					//echo $r[max_ord];
					if($result){
						echo '  <h2>Vizualizare</h2><hr /><br />
							<table>
								<tr><td></td><td></td><td><b>Data</td><td>Activitatea</td><td>Sus</td><td>Jos</td></tr>';
						$k=1;		
						while($row=mysql_fetch_array($result)){
							echo '<tr>  <td><a href="admin_prg_m.php?id='.$row[id].'&sterge=2"><img src="img/edit.png"></a></td>
										<td><a href="admin_prg_m.php?id='.$row[id].'&sterge=1"><img src="img/sterge.png"></a></td>
										<td>'.$row[data].'</td>
										<td style="padding-top: 13px;">'.$row[articol].'</td>';
										
										if($k!=1)echo '
											<td><a href="admin_prg_m.php?id='.$row[id].'&plus=1"><img src="img/up.jpg" width=22 height=22></a></td>';
										else
											echo '<td></td>';
										if($k!=$r[max_ord])echo'
											<td><a href="admin_prg_m.php?id='.$row[id].'&plus=2"><img src="img/down.jpg" width=22 height=22></a></td>';
										else
											echo '<td></td>';	
											$k++;
										echo '
									</tr>';
						}	
						echo'		
							</table><hr />
						';
					}
					}
					echo '<br /><h2>Ad&#259;ugare</h2><hr /><br /><div class="useri">
							<form action="program.php" method="POST">
								<label class="mij">Data</label>
								<input type="text" name="data" class="field"  onfocus="this.value="";this.style.color="#414141""/>
					<a href=javascript:NewCal("demo1","ddmmyyyy") >&nbsp;
							<img src="img/cal.gif" width="15" height="15" alt="alege o data" />&nbsp;</a><br /><br />
								<label class="mij">Pozi&#355;ia</label>
								<select name="poz" class="field">
									<option value="0"> -</option>
								';
									for($i=1;$i<=$r[max_ord];$i++)
										echo '<option value="'.$i.'">'.$i.'</option>';
								echo '	
								</select><br /><br />
								<textarea name="continut"></textarea><br />
								<input type="submit" name="submit" value="Inregistreaz&#259;" class="button">

							</form>
						</div>';
				}
			}else{
$query="SELECT * FROM program ORDER BY ord ASC ";
					$result=mysql_query($query);
					//echo $r[max_ord];
					if($result){
						echo '  <h2><a href="fisiere/Program.doc"><img src="img/jos.jpg" width="20" height="20" alt="" /></a>Program</h2><hr /><br />
							
							<table width="600px">
								<tr><td align="center"><h3>Data</h3></td><td style="background-color: #86c8dd;"><h3>Activitatea</h3></td></tr>';
						
						while($row=mysql_fetch_array($result)){
							echo '<tr>  
										<td>'.$row[data].'</td>
										<td style="padding-top: 12px; background-color: #86c8dd;">'.$row[articol].'</td>';
									
										echo '
									</tr>';
						}
						echo '</table><br />

<iframe src="http://www.google.com/calendar/embed?src=onc2011%40gmail.com&amp;ctz=Europe/Bucharest" style="border: 0" width="600" height="600" frameborder="0" scrolling="no"></iframe>';
					}else
						echo '<center><h2>Eroare la selectarea datelor<br /><a href="program.php">Inapoi</a></h2></center>';
}
			?>
		</div>
		<div class="clearer"><span></span></div>

	</div>

<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>

</div>

</body>
</html>