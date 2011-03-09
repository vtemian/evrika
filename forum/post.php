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
echo "<form action=''><>";
generare_POST($_GET['nume']);

?>


</body>

</html>