<?php
	session_start();
	include_once "functii.php";
	include_once "doc2html/LiveDocx/MailMerge.php";
	connect(premius);
	if(isset($_post["submit"])){
        		if(isset($_post['submit']))
          			if($_post['user']!="" && $_post['pass']!=""){
          				login($_post['user'],$_post['pass']);
          			}
        	}
        	 if(isset($_post['logout'])){
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

 if($_SESSION['rang']=='3'){
 		 echo "<br><br><br>
        <form action='adm.php' method='post'>
        	Titlu : <input type='text' name='nume' /><br /><br />
			<textarea name='descriere'></textarea><br /><br />
            <input type='radio' value='categ' name='radio' /><label class='field'>Categorie</label><br />
            <input type='radio' value='subcateg' name='radio' />
            <select name='list' class='field'>";
            	adm_SUB();
            echo "
            </select>Subcategorie
        <input type='submit' name='submit' value='Poseteaz&#259;' class='button'/>
        </form>
        ";

        }
 if(isset($_post['submit']))
 	if($_post['radio']!=""){
 		if($_post['radio']=="categ"){
            $query="INSERT INTO categorii (nume) VALUES ('".mysql_escape_string($_post['nume'])."')";
            $result=mysql_query($query);
            if($result){
            	$query="CREATE TABLE  IF NOT EXISTS ".$_post['nume']." (id INT(4) AUTO_INCREMENT NULL PRIMARY KEY, nume VARCHAR(50) NULL, posts INT(4) NULL, topics INT(4) NULL,descriere LONGTEXT NULL )";
                $result1=mysql_query($query);
                if($result1)
                	echo "<h2><center>Datele au fost introduse cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
                else
                echo "<h2><center>Eroare la introducerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
            }
 		}
 		else{
            $query="INSERT INTO  ".$_post['list']." (nume,descriere) VALUES ('".mysql_escape_string($_post['nume'])."','".$_post[descriere]."')";
            //echo $query;
			$result=mysql_query($query);
            if($result){
            	$query="CREATE TABLE  IF NOT EXISTS ".$_post['nume']." (id INT(4) AUTO_INCREMENT NULL PRIMARY KEY, nume VARCHAR(50) NULL, posts INT(4) NULL, autor VARCHAR(60) NULL,ultimul VARCHAR(60) NULL)";
                $result1=mysql_query($query);
                if($result1)
                	echo "<h2><center>Datele au fost introduse cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
                else
                echo "<h2><center>Eroare la introducerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
            }
 		}
 	}
 	else
 		echo '<h3>Nu ati ales nici un element!!!</h3>';
  if(isset($_post['up1'])){
 	$query="RENAME TABLE ".$_SESSION['categ']." TO ".$_post['up'];
 	$result=mysql_query($query);
 	if($result){
 		$query="UPDATE categorii SET nume='".$_post['up']."' WHERE nume = '".$_SESSION['categ']."'";
 		$result2=mysql_query($query);
 		if($result2)
 			echo "<h2><center>Datele au fost modificate cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
 		else
 			echo "<h2><center>Eroare la modificarea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 	}
 	else
 		echo "<h2><center>Eroare la modificarea datelor1!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 }
  if(isset($_post['modificaa'])){
 	echo "<form action='adm.php' method='post'>
 		  	Introdu numele nou : <input type='text' name='up' />
 		  	<input type='submit' name='up1' value='Modifica' />
 		  </form>";
 	$_SESSION['categ']=$_post['sub'];
 }
 else
 if(isset($_post['sterger'])){
 	$query="DELETE FROM categorii WHERE nume='".$_post['sub']."'";
 	$result=mysql_query($query);
 	if($result){
 		$query="DROP TABLE ".$_post['sub'];
 		$result2=mysql_query($query);
 		if($result2)
			 echo "<h2><center>Datele au fost sterse cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
		else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 	}
 	else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 }
 else{
 echo '<br />
 <div class="usseri"><form action="adm.php" method="post">
 	<h3>Categorii</h3>
 	<div><select name="sub">
 		';adm_SUB();
 echo'
 	</select></div>
 	<div><input type="submit" name="sterger" value="&#350;terge" class="button"/>
 	<input type="submit" name="modificaa" value="Modific&#259;" class="button"/></div>
 </form></div>';}

 if(isset($_post['stergesub'])){
 	$query="DELETE FROM ".$_SESSION[$_post['radio']]." WHERE nume='".$_post['radio']."'";
 	$result=mysql_query($query);
 	if($result){
 		$query="DROP TABLE ".$_post['radio'];
 		$result2=mysql_query($query);
 		if($result2)
			 echo "<h2><center>Datele au fost sterse cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
		else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 	}
 	else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 }
 if(isset($_post['modificasub'])){
 	echo "<form action='adm.php' method='post'>
 		  	Introdu numele nou : <input type='text' name='upgrade' />
 		  	<input type='submit' name='up2' value='Modifica' />
 		  </form>";
 	$_SESSION['modifica']=$_post['radio'];
 	$_SESSION['tabel']=$_SESSION[$_post['radio']];
 }
 if(isset($_post['up2'])){
 	$query="RENAME TABLE ".$_SESSION['modifica']." TO ".$_post['upgrade'];
 	$result=mysql_query($query);
 	if($result){
 		$query="UPDATE ".$_SESSION['tabel']." SET nume='".$_post['upgrade']."' WHERE nume = '".$_SESSION['modifica']."'";
 		$result2=mysql_query($query);
 		if($result2)
 			echo "<h2><center>Datele au fost modificate cu succes!!!</h2><h3><center><a href='adm.php'>OK</a></h3>";
 		else
 			echo "<h2><center>Eroare la modificarea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 	}
 	else
 		echo "<h2><center>Eroare la modificarea datelor!!!</h2><center><h3><a href='adm.php'>OK</a></h3>";
 }
?>
		<form action="adm.php" method="post">
		<?php adm_GENCATEG(); ?>
		<input type="submit" name="stergesub" value="Sterge" class="button" />
		<input type="submit" name="modificasub" value="Modifica" class="button" />
		</form>



		</div>
		<div class="clearer"><span></span></div>

	</div>

<div class="footer">&copy; 2011 Vlad T., Klaudia M., Raul B.</div>

</div>

</body>

</html>