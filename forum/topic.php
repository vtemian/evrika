<?php
	session_start();?>
<html>

<head>
  <title></title>
</head>

<body>
<?php
include_once "functii.php";
connect();
if($_SESSION['rang']>1){
echo "<form action='topic.php?nume=".$_GET['nume']."' method='POST'> ";generare_TOPIC($_GET['nume']);echo "
<br /><input type='submit' name='sterge' value='Sterge' />
<input type='hidden' name='topich' value='" .$_GET['nume']. "' />
</form>";}
else
generare_TOPIC($_GET['nume']);
echo "
<form action='posts.php' method='POST'>
	<input type='submit' name='topic' value='Deschide topic' />
	<input type='hidden' name='topich' value='" .$_GET['nume']. "' /></form>";
if(isset($_POST['sterge'])){	$query="DELETE FROM ".$_POST['topich']." WHERE nume='".$_POST['nume']."'";
 	$result=mysql_query($query);
 	if($result){
 		$query="DROP TABLE ".$_POST['nume'];
 		$result2=mysql_query($query);
 		if($result2)
			 echo "<h2><center>Datele au fost sterse cu succes!!!</h2><h3><center><a href='topic.php?nume=".$_POST['topich']."'>OK</a></h3>";
		else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='topic.php?nume=".$_POST['topich']."'>OK</a></h3>";
 	}
 	else
			 echo "<h2><center>Eroare la stergerea datelor!!!</h2><center><h3><a href='topic.php?nume=".$_POST['topich']."'>OK</a></h3>";}

?>

</body>

</html>