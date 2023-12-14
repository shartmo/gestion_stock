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

$secteur=$_GET['secteur'];

echo '<h1 style="color:green">'.$MaListe->nomsecteur($secteur).'</h1>';

echo '<p style="font-size:30px;"><a href="../index.php">Retour</a></p>';

echo '<p style="font-size:30px;"><a href="creation.php?secteur='.$secteur.'">Ajouter un article</a></p>';
	
$MaListe->display_liste($secteur);

?>

</center>
<?php
include '../templates/footer.php';
?>