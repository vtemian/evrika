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
<title>Olimpiada Nationala de Chimie 2011</title>
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

			<table>
			<tr>
					<td colspan='2'><h2>Catedrala Mitropolitană a Banatului</h2></td>
				</tr>
				<tr>
					<td><img src="locatii/mitropolia.jpg" width="200" height="200" alt="" /></td>
					<td> 	
						 	
Fa&#539;ă în fa&#539;ă cu clădirea Operei, se înal&#539;ă edificiul Catedralei Mitropolitane a Banatului. Terenul pe care 
se înal&#539;ă acest edificiu a fost mlă&#537;tinos &#537;i în vederea realizării funda&#539;iei sale, placa de beton, în 
grosime de câ&#539;iva metri, a fost turnata având ca suport 1186 de piloni. Construc&#539;ia are o lungime de 63 de metri, 
o lă&#539;ime de 32 de metri, iar turnul principal se înal&#539;ă la 83,7 metri, arhitectura sa fiind o combinatie 
reu&#537;ită între stilul bizantin, elemente decorative asemănătoare cu cele ale moscheii Sfânta Sofia din 
Constantinopol (azi Istambul) &#537;i elemente caracteristice bisericilor moldovene&#537;ti(Sfântul Gheorghe din Hârlău), 
acoperi&#537;urile turnurilor fiind acoperite cu plăci ceramice colorate; treptele, soclul edificiului, coloanele, 
pilonii &#537;i elementele decorative de la u&#537;i &#537;i ferestre sunt cioplite din piatră naturală provenind 
de la Banpotoc.
					</td></tr>
				<tr>
			<tr>
					<td colspan='2'><h2>Opera Română &#537;i Teatrul Na&#539;ional</h2></td>
				</tr>
				<tr>
					<td><img src="locatii/opera.jpg" width="200" height="200" alt=""/></td>
					<td>Teatrul din Timi&#537;oara
 a fost atestat documentar în anul 1735. Între anii 1761-1874, reprezenta&#539;iile
					 se făceau în clădirea magistratului româno-sârb. Actuala clădire a teatrului a fost construită între
					  anii 1872-1875, în stil renascentist. Clădirea a fost distrusă în anul 1880, în urma unui incendiu
					   devastator. În anul 1920 un alt incendiu a distrus teatrul, acesta fiind refăcut în 1923. Din punct
					    de vedere arhitectonic, clădirea este concepută în stil bizantin cu influen&#539;e neoromâne&#537;ti. 
					    În anii 1891 &#537;i 1896 au fost montate operele lui Mozart: "Răpirea din Serai" respectiv "Flautul fermecat". În prezent
 clădirea găzduie&#537;te Opera Română, Teatrul Na&#539;ional &#537;i Teatrul German.</td>
					</tr> 
					<tr>
					<td colspan='2'><h2>Domul romano-catolic</h2></td>
				</tr>
				<tr>
					<td><img src="locatii/domul.jpg" width="200" height="200" alt=""/></td>
					<td>Se presupunea că domul a fost construit, având drept bază planurile renumitului arhitect vienez 
					Josef Emanuel Fischer von Erlach (1693-1742), fiul nu mai pu&#539;in renumitului, la acea vreme, Johan 
					Bernhard Fischer von Erlach. Într-un document din secolul al XVIII-lea, &#537;i anume "Wienerische Diarium" 
					se aminte&#537;te de a&#537;ezarea pietrei de temelie a Domului din Timi&#537;oara
 &#537;i totodată, se men&#539;ionează că planul de arhitectură &#537;i construc&#539;ie a fost întocmit de H. Joh. Jacob Schelblauer -
  Consilier al ora&#537;ului Viena - (Innere - Stadt - Rath in Wien). Sediul episcopului diocezei romano-catolice a fost 
  ini&#539;ial la Cenad, acesta fiind devastat de turci, s-a mutat la Szeghedin. În anul 1733, împaratul Carol al VI-lea, a 
  mutat sediul la Timi&#537;oara
 episcop fiind în acel timp, Adalbert baron de Falkenstein. Datorită acestui fapt s-a hotărât construirea unei catedrale, 
 a unui palat episcopal &#537;i a unor case pentru canonici, ceea ce a dus la punerea pietrei de temelie a Domului la data de 6 
 august 1736. În 1773, Domul a fost terminat sub conducerea inginerilor Carl Alexander Steinlein &#537;i Johann Theodor Kostka.
 </td>
				</tr>
				<tr>
			<td colspan='2'><h2>Muzeul Banatului</h2></td>
				</tr>
				<tr>
					<td><img src="locatii/muzeu.jpg" width="200" height="200" alt=""/></td>
					<td>Muzeul Banatului este un muzeu din Timi&#537;oara
 cu sediul central în Castelul Huniade. A fost înfiin&#539;at în 1872, sub numele de "Soietatea de Istorie &#537;i Arheologie". 
 Adăposte&#537;te cea mai importantă colec&#539;ie de obiecte arheologice din Banat. La parter, găzduie&#537;te Sanctuarul Neolitic de la 
 Par&#539;a, un monument unic în Europa. Muzeul cuprinde Sec&#539;ia de istorie, Sec&#539;ia de Arheologie, Sec&#539;ia de Etnografie &#537;i Sec&#539;ia
  de &#536;tiin&#539;ele Naturii. Muzeul are &#537;i un Laborator de restaurare &#537;i conservare a obiectelor din patrimoniul cultural &#537;i
   istoric. În 1 ianuarie 2006, Sec&#539;ia de Artă s-a transformat în Muzeul de Art în Timi&#537;oara.
					</td>
					</tr>
				</tr>
				<tr>
			<td colspan='2'><h2>Muzeul de Artă</h2></td>
				</tr>
				<tr>
					<td><img src="locatii/arta.jpg" width="200" height="200" alt=""/></td>
					<td>Muzeul de Artă Timi&#537;oara este un muzeu de artă aflat în Palatul Baroc din Timi&#537;oara. 
Muzeul a luat fiin&#539;ă dupa desprinderea sec&#539;iunii de artă a Muzeului Banatului, care a func&#539;ionat o perioadă într-o aripă 
din actuala clădire. Muzeul a devenit institu&#539;ie de sine stătătoare pe 1 ianuarie 2006, director fiind profesorul 
universitar Marcel Tolcea. Odată cu finalizarea unei bune par&#539;i din lucrările de restaurare a palatului &#537;i a spa&#539;iului 
expozi&#539;ional, muzeul extins a putut fi inaugurat la 21 decembrie.
Muzeul include o colec&#539;ie unică de lucrări &#537;i obiecte personale ale pictorului Corneliu Baba, cu 90 de piese.
 Alte 3 sec&#539;iuni includ colec&#539;iile de artă contemporană, decorativă &#537;i europeană. În patrimoniul muzeului se mai găsesc 
 colec&#539;ii de pictură romănească, bănă&#539;eană &#537;i pictura religioasă, acestea momentan nu sunt expuse din lipsa de spa&#539;iu. 
 Parterul este dedicat expozi&#539;iilor temporare.</td>
					</tr>
				
			</table>


		</div>
		<div class="clearer"><span></span></div>

	</div>

<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>

</div>

</body>

</html>