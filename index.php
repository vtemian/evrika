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
		   <li><a href="http://onc2011.jalbum.net/ONC-2011/">Galerie foto</a></li>
			
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
	</ul>
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
					if(isset($_POST[submit1])){
					if(trim($_POST[titlu])!=''){
						if(trim($_POST[content])!=''){
							$titlu=mysql_escape_string($_POST[titlu]);
							$continut=mysql_escape_string($_POST[content]);
							$allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
							$allowedTags.='<li><ol><ul><span><div><br><ins><del>';
							$ontinut=strip_tags(stripslashes($continut),$allowedTags);

							$query="INSERT INTO stiri(articol,titlu,data) VALUES('".$continut."','".$titlu."','".date('Y-m-d')."')";
							$result=mysql_query($query);
							if($result){
								echo '<center><h2>Datele au fost introduse cu succes<br /><a href="index.php">Inapoi</a></h2></center>';
							}else
								echo '<center><h2>Eroare la introducerea datelor<br /><a href="index.php">Inapoi</a></h2></center>';
						}else
							echo '<center><h2>Trebuie sa adugati ceva in acea stire<br /><a href="index.php">Inapoi</a></h2></center>';
					}else
						echo '<center><h2>Trebuie sa alegeti un titlu<br /><a href="index.php">Inapoi</a></h2></center>';
					
				}else{
					$query="SELECT * FROM stiri";
					$result=mysql_query($query);
					if($result){
						echo '<div class="viz"><h2>Vizualizare</h2><br />
								<table width="300px">
								<tr>
									<td></td><td></td><td align="center"><h3>Titlul</h3></td><td align="center"><h3>Data</h3></td>
								</tr>
						';
						while($row=mysql_fetch_array($result)){
							echo '<tr>
										<td><a href="admin_stiri_m.php?id='.$row[id].'&sterge=2"><img src="img/edit.png" alt="" /></a></td>
										<td><a href="admin_stiri_m.php?id='.$row[id].'&sterge=1"><img src="img/sterge.png" alt="" /></a></td>
										<td><h4>'.$row[titlu].'</h4></td>
										<td><h4>'.$row[data].'</h4></td>
								</tr>';
						}
						echo '</table></div>';
					}else
						echo '<center><h2>Eroare la selectarea datelor<br /></h2></center>';
					echo '<h2>Ad&#259;ugare &#351;tire</h2><hr /><br />
							<div class="useri">
								<form action="index.php" method="post">
										<h3>Titlu: </h3><input type="text" name="titlu" class="field" /><br /><br />
										<textarea name="content"></textarea><br />
										<input type="submit" name="submit1" value="Posteaz&#259;" class="button" />
									
								</form>
							</div>';
				}
				}else{ echo'
				
								<h2 style="margin-left: 23px;">Bun venit!</h2><hr /><br />
								
				<img src="img/insp.jpg" />
			<h4 style=" font-size: small;"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bine a&#355i venit, &#238n frumosul nostru ora&#351 Timi&#351oara care are cinstea de a g&#259zdui Olimpiada Na&#355ional&#259 de Chimie 
			aflat&#259 la cea de-a 45-a edi&#355ie &#238n Anul Interna&#355ional al Chimiei.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Elevi str&#259luci&#355i, al&#259turi de c&#259l&#259uzitorii lor pe drumul cunoa&#351terii  au ocazia reconfirm&#259rii unei certe valori &#351tiin&#355ifice 
&#351i metodice. Fiecare dintre dumneavoastr&#259 s-a angajat &#238ntr-o competi&#355ie sever&#259, nu doar cu ceilal&#355i, ci mai ales cu sinele,
 dep&#259&#351indu-l, escalad&#226nd frontierele obi&#351nuite ale efortului, ale originalit&#259&#355ii &#351i ale creativit&#259&#355ii.</[>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inspectoratul &#350colar Jude&#355ean Timi&#351, unit&#259&#355ile &#351colare &#351i profesorii de chimie din jude&#355 implica&#355i &#238n desf&#259urarea
 olimpiadei, se str&#259duiesc ca acest eveniment de rezonan&#355&#259 pentru jude&#355ul nostru s� se desf&#259&#351oare la cote de exigen&#355&#259 
 maxim&#259.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V&#259 urez succes &#351i s&#259 profita&#355i din plin de oportunit&#259&#355ile oferite cu ocazia olimpiadei &#238n ora&#351ul de pe malurile r&#226ului
 Bega, s� nu renun&#355a&#355i niciodat&#259 la visele voastre, s&#259 men&#355ine&#355i ve&#351nic aprins&#259 &#238n suflete flac&#259ra olimpic&#259, s&#259 crede&#355i 
 &#351i s&#259 lupta&#355i pentru &#238mplinirea motto-ului olimpic: &#8220;Citius, altius, fortius!&#8221;, &#8220;Mai rapid, mai sus, 
 mai puternic!&#8221;</p></h4>
  <h3><p>Inspector &#351colar general, <br />
         Prof. Marin Popescu</p></h3>
';
					
				}		
			?>

		</div>
		<div class="clearer"><span></span></div>

	</div>

<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>
</div>

</body>

</html>