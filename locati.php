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

			<table>
			<tr>
					<td colspan='2'><h2>Catedrala Mitropolitan� a Banatului</h2></td>
				</tr>
				<tr>
					<td><img src="locatii/mitropolia.jpg" width="200" height="200" alt="" /></td>
					<td> 	
						 	
Fa&#539;� �n fa&#539;� cu cl�direa Operei, se �nal&#539;� edificiul Catedralei Mitropolitane a Banatului. Terenul pe care 
se �nal&#539;� acest edificiu a fost ml�&#537;tinos &#537;i �n vederea realiz�rii funda&#539;iei sale, placa de beton, �n 
grosime de c�&#539;iva metri, a fost turnata av�nd ca suport 1186 de piloni. Construc&#539;ia are o lungime de 63 de metri, 
o l�&#539;ime de 32 de metri, iar turnul principal se �nal&#539;� la 83,7 metri, arhitectura sa fiind o combinatie 
reu&#537;it� �ntre stilul bizantin, elemente decorative asem�n�toare cu cele ale moscheii Sf�nta Sofia din 
Constantinopol (azi Istambul) &#537;i elemente caracteristice bisericilor moldovene&#537;ti(Sf�ntul Gheorghe din H�rl�u), 
acoperi&#537;urile turnurilor fiind acoperite cu pl�ci ceramice colorate; treptele, soclul edificiului, coloanele, 
pilonii &#537;i elementele decorative de la u&#537;i &#537;i ferestre sunt cioplite din piatr� natural� provenind 
de la Banpotoc.
					</td></tr>
				<tr>
			<tr>
					<td colspan='2'><h2>Opera Rom�n� &#537;i Teatrul Na&#539;ional</h2></td>
				</tr>
				<tr>
					<td><img src="locatii/opera.jpg" width="200" height="200" alt=""/></td>
					<td>Teatrul din Timi&#537;oara
 a fost atestat documentar �n anul 1735. �ntre anii 1761-1874, reprezenta&#539;iile
					 se f�ceau �n cl�direa magistratului rom�no-s�rb. Actuala cl�dire a teatrului a fost construit� �ntre
					  anii 1872-1875, �n stil renascentist. Cl�direa a fost distrus� �n anul 1880, �n urma unui incendiu
					   devastator. �n anul 1920 un alt incendiu a distrus teatrul, acesta fiind ref�cut �n 1923. Din punct
					    de vedere arhitectonic, cl�direa este conceput� �n stil bizantin cu influen&#539;e neorom�ne&#537;ti. 
					    �n anii 1891 &#537;i 1896 au fost montate operele lui Mozart: "R�pirea din Serai" respectiv "Flautul fermecat". �n prezent
 cl�direa g�zduie&#537;te Opera Rom�n�, Teatrul Na&#539;ional &#537;i Teatrul German.</td>
					</tr> 
					<tr>
					<td colspan='2'><h2>Domul romano-catolic</h2></td>
				</tr>
				<tr>
					<td><img src="locatii/domul.jpg" width="200" height="200" alt=""/></td>
					<td>Se presupunea c� domul a fost construit, av�nd drept baz� planurile renumitului arhitect vienez 
					Josef Emanuel Fischer von Erlach (1693-1742), fiul nu mai pu&#539;in renumitului, la acea vreme, Johan 
					Bernhard Fischer von Erlach. �ntr-un document din secolul al XVIII-lea, &#537;i anume "Wienerische Diarium" 
					se aminte&#537;te de a&#537;ezarea pietrei de temelie a Domului din Timi&#537;oara
 &#537;i totodat�, se men&#539;ioneaz� c� planul de arhitectur� &#537;i construc&#539;ie a fost �ntocmit de H. Joh. Jacob Schelblauer -
  Consilier al ora&#537;ului Viena - (Innere - Stadt - Rath in Wien). Sediul episcopului diocezei romano-catolice a fost 
  ini&#539;ial la Cenad, acesta fiind devastat de turci, s-a mutat la Szeghedin. �n anul 1733, �mparatul Carol al VI-lea, a 
  mutat sediul la Timi&#537;oara
 episcop fiind �n acel timp, Adalbert baron de Falkenstein. Datorit� acestui fapt s-a hot�r�t construirea unei catedrale, 
 a unui palat episcopal &#537;i a unor case pentru canonici, ceea ce a dus la punerea pietrei de temelie a Domului la data de 6 
 august 1736. �n 1773, Domul a fost terminat sub conducerea inginerilor Carl Alexander Steinlein &#537;i Johann Theodor Kostka.
 </td>
				</tr>
				<tr>
			<td colspan='2'><h2>Muzeul Banatului</h2></td>
				</tr>
				<tr>
					<td><img src="locatii/muzeu.jpg" width="200" height="200" alt=""/></td>
					<td>Muzeul Banatului este un muzeu din Timi&#537;oara
 cu sediul central �n Castelul Huniade. A fost �nfiin&#539;at �n 1872, sub numele de "Soietatea de Istorie &#537;i Arheologie". 
 Ad�poste&#537;te cea mai important� colec&#539;ie de obiecte arheologice din Banat. La parter, g�zduie&#537;te Sanctuarul Neolitic de la 
 Par&#539;a, un monument unic �n Europa. Muzeul cuprinde Sec&#539;ia de istorie, Sec&#539;ia de Arheologie, Sec&#539;ia de Etnografie &#537;i Sec&#539;ia
  de &#536;tiin&#539;ele Naturii. Muzeul are &#537;i un Laborator de restaurare &#537;i conservare a obiectelor din patrimoniul cultural &#537;i
   istoric. �n 1 ianuarie 2006, Sec&#539;ia de Art� s-a transformat �n Muzeul de Art �n Timi&#537;oara.
					</td>
					</tr>
				</tr>
				<tr>
			<td colspan='2'><h2>Muzeul de Art�</h2></td>
				</tr>
				<tr>
					<td><img src="locatii/arta.jpg" width="200" height="200" alt=""/></td>
					<td>Muzeul de Art� Timi&#537;oara este un muzeu de art� aflat �n Palatul Baroc din Timi&#537;oara. 
Muzeul a luat fiin&#539;� dupa desprinderea sec&#539;iunii de art� a Muzeului Banatului, care a func&#539;ionat o perioad� �ntr-o arip� 
din actuala cl�dire. Muzeul a devenit institu&#539;ie de sine st�t�toare pe 1 ianuarie 2006, director fiind profesorul 
universitar Marcel Tolcea. Odat� cu finalizarea unei bune par&#539;i din lucr�rile de restaurare a palatului &#537;i a spa&#539;iului 
expozi&#539;ional, muzeul extins a putut fi inaugurat la 21 decembrie.
Muzeul include o colec&#539;ie unic� de lucr�ri &#537;i obiecte personale ale pictorului Corneliu Baba, cu 90 de piese.
 Alte 3 sec&#539;iuni includ colec&#539;iile de art� contemporan�, decorativ� &#537;i european�. �n patrimoniul muzeului se mai g�sesc 
 colec&#539;ii de pictur� rom�neasc�, b�n�&#539;ean� &#537;i pictura religioas�, acestea momentan nu sunt expuse din lipsa de spa&#539;iu. 
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