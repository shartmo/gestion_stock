<?php
include 'header.php';
?>

<body>
<center>

<?php

include 'config.inc.php';

include 'autoload.php';

$MaListe=new Gestion();



if(isset($_POST['idtosupprim'])){
	$idtodelete=$_POST['idtosupprim'];
	$MaListe->deletearticle($idtodelete);
	
	echo '<p><h1>Article supprimé !</h1>';

}	
	
?>

<p style="font-size:50px;"><a href="index.php">Retour</a></p>


</center>
</body>
</html>



