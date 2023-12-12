<?php
include 'header.php';
?>
<body>
<center>

<?php
include 'config.inc.php';

include 'autoload.php';

$MaListe=new Gestion();

$secteur=$_GET['secteur'];

echo '<h1 style="color:green">'.$MaListe->nomsecteur($secteur).'</h1>';

echo '<p style="font-size:30px;"><a href="index.php">Retour</a></p>';

echo '<p style="font-size:30px;"><a href="creation.php?secteur='.$secteur.'">Ajouter un article</a></p>';
	
$MaListe->display_liste($secteur);

?>

</center>
</body>
</html>