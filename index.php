<?php
include 'header.php';
?>
<body>
<center>

<h1 style="color:green">GESTION DE STOCK</h1>

<?php
include 'config.inc.php';

include 'autoload.php';

$MaListe=new Gestion();

$tabsecteurs=$MaListe->liste_secteurs();

foreach ($tabsecteurs as $sigle => $nom){
echo '<p style="font-size:30px;"><h1><a href="listing.php?secteur='.$sigle.'">'.$nom.'</a></h1></p>';
}

echo '<p style="font-size:30px;"><h1><a href="recherche.php">Faire une recherche</a></h1></p>';

?>
</center>
</body>
</html>