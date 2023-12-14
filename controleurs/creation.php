<?php
include '../templates/header.php';
?>
<body>
<center>
<h1 style="color:green">Ajouter un article</h1>

<?php
include '../config/config.inc.php';

include '../classes/Gestion.php';

$config= realpath('../config/config.php');	

$MaListe=new Gestion($config);

if(isset($_GET['secteur'])){
$secteur=$_GET['secteur'];
echo '<h1 style="color:green">('.$MaListe->nomsecteur($secteur).')</h1>';
}

if(isset($_POST['nouveau'])){

	$nom=$_POST['newarticle'];
	
	$secteur=$_POST['secteur'];
	
	$MaListe->enregnewarticle($nom,$secteur);
	
	echo '<p><h1><a href="listing.php?secteur='.$secteur.'">Retour</a></h1></p>';
	
	echo '</center></body></html>';
	
	exit;
	
}

?>

<form method="post" action="creation.php">
<input type="text" name="newarticle" size="50" style="font-size:30px">
<input type="hidden" name="secteur" value="<?php echo $secteur ;?>">
<input type="submit" name="nouveau" value="Enregistrer" style="font-size:40px">
</form>

<p style="font-size:50px;"><a href="../index.php">Retour</a></p

</center>
<?php
include '../templates/footer.php';
?>