<?php
include 'templates/header.php';
?>
<body>
<center>

<h1 style="color:green">GESTION DE STOCK</h1>

<?php

include 'config/config.inc.php';

include 'classes/Gestion.php';

$config= realpath('config/config.php');

$MaListe=new Gestion($config);

$tabsecteurs=$MaListe->liste_secteurs();

foreach ($tabsecteurs as $sigle => $nom){
echo '<p style="font-size:30px;"><h1><a href="controleurs/listing.php?secteur='.$sigle.'">'.$nom.'</a></h1></p>';
}

echo '<p style="font-size:30px;"><h1><a href="controleurs/recherche.php">Faire une recherche</a></h1></p>';

?>
</center>
<?php
include 'templates/footer.php';
?>