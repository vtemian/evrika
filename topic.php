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
         <table><tr><td><img src="img/login.jpg" alt="login" /></td><td><h1>Login</h1></td></tr></table>
       <div class="useri">
          <form method="post" action="index.php">
              <h3>Utilizator:</h3>
                <input type="text" name="user" class="field" onkeypress="return webLoginEnter(document.loginfrm.password);" value="" />
    	      <h3>Parola:</h3>
                <input type="password" name="pass" class="field" onkeypress="return webLoginEnter(document.loginfrm.cmdweblogin);" value="" /><br /><br />
    	     	<div style="padding-left: 10px;"><input type="submit" name="submit" class="button" value="Login"  /> <br /><br /><br /></div
          </form>
        </div> ';
             }
            echo'<table border="0"><tr><td><img src="img/megafon.gif" alt="megafon" /></td><td><h1>Stiri</h1></td></tr></table>';
					$query="SELECT * FROM stiri";
					$result=mysql_query($query);
						if($result){
							while($row=mysql_fetch_array($result)){
								if(strlen($row[articol])>80)
									$s=substr($row[articol],0,80);
								echo '<h2><a href="stiri.php?id='.$row[id].'">'.$row[titlu].'</a></h2>';
								echo '<div class="descr">'.$row[data].'</div><br />';
								if($s)
									echo '<div class="stiri">'.$s.'</div><hr /><br />';
								else
									echo '<div class="stiri">'.$row[articol].'</div><hr /><br />';
								$s='';	
							}
						}else
							echo '<h2>Momentan exista o eroare!Incercam sa o rezolvam!</h2>';
        ?>
        	
		</div>

		
		<div class="content">

		<?php

echo '<a href="forum.php"><img src="img/goback.png" width="30" height="30"></a>';
echo '<a href="posts.php?nume='.$_GET[nume].'" style="margin-left: 50px;"><img src="img/subiect_nou.gif"></a>';

if($_GET[sterge]==1){
	$query="DELETE FROM ".$_GET[nume]." WHERE nume='".$_GET['n']."'";
 	$result=mysql_query($query);
 	if($result){
 		$query="DROP TABLE ".$_GET['n'];
 		$result2=mysql_query($query);
 		if($result2)
			 echo "<h2><center>Datele au fost sterse cu succes!!!</h2><h3><center><a href='topic.php?nume=".$_GET[nume]."'>OK</a></h3>";
		else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='topic.php?nume=".$_GET[nume]."'>OK</a></h3>";
 	}
 	else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='topic.php?nume=".$_GET[nume]."'>OK</a></h3>";
}
generare_TOPIC($_GET['nume']);
?>


		</div>
		<div class="clearer"><span></span></div>

	</div>

<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>

</div>

</body>

</html>