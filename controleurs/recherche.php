<?php
include '../templates/header.php';
?>

<body>
<center>

<br><br><br><br><br><br>

<h1 style="color:green">RECHERCHE</h1>

<p style="font-size:50px;"><a href="../index.php">Retour</a></p>

<?php
if(isset($_POST['recherche'])){
	$mot=$_POST['mot'];
	
include '../config/config.inc.php';

include '../classes/Gestion.php';

$config= realpath('../config/config.php');	

$MaListe=new Gestion($config);
	
	$tableau=$MaListe->recherche($mot);
	
	if(($tableau)!=null){
		foreach ($tableau as $id => $nom){
		echo '<p style="font-size:30px;"><h1><a href="article.php?id='.$id.'">'.$nom.'</a></h1></p>';
		}
	}
	else {
	echo '<p><h1>Aucun élément trouvé</h1></p>';
	}
	
}
?>	

<form method="post" action="recherche.php">
<input type="text" name="mot" size="10" style="font-size:30px">
<input type="submit" name="recherche" value="chercher" style="font-size:40px">
</form>

</center>
<?php
include '../templates/footer.php';
?>