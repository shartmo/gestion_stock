<?php
include 'header.php';
?>

<body>
<center>

<br><br><br><br><br><br>

<h1 style="color:green">ARTICLE A MODIFIER</h1>

<?php
include 'config.inc.php';

include 'autoload.php';

$MaListe=new Gestion();

if(isset($_GET['id'])){
$idtomodif=	$_GET['id'];
$MaListe->display_article($idtomodif);
}

if(isset($_POST['modification'])){
$idtomodif=	$_POST['idtomodif'];
$MaListe->display_article($idtomodif);
}

if(isset($_POST['modifplus'])){
$idtomodif=$_POST['idplus'];
$MaListe->modifplus($idtomodif);	
}

if(isset($_POST['modifmoins'])){
$idtomodif=$_POST['idmoins'];
$MaListe->modifmoins($idtomodif);	
}

?>

<p style="font-size:50px;"><a href="index.php">Retour</a></p>

<form method="post" action="delete.php" onsubmit="return confirm('Confirmer suppression de cet article ?');">
<input type="hidden" name="idtosupprim" value="<?php echo $idtomodif ; ?>">
<input type="submit" value="Supprimer cet article" style="font-size:40px">
</form>

</center>

</body>
</html>