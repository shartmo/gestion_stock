<?php
include '../templates/header.php';
?>

<body>
<center>

<?php

include '../config/config.inc.php';

include '../classes/Gestion.php';

$config= realpath('../config/config.php');	

$MaListe=new Gestion($config);


if(isset($_POST['idtosupprim'])){
	$idtodelete=$_POST['idtosupprim'];
	$MaListe->deletearticle($idtodelete);
	
	echo '<p><h1>Article supprimé !</h1>';

}	
	
?>

<p style="font-size:50px;"><a href="../index.php">Retour</a></p>


</center>
<?php
include '../templates/footer.php';
?>



