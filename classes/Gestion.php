<?php

class Gestion  {

      public $connexion;

   function __construct($config){

		
			include $config ;
		
            try
            {
                    $this->connexion = new PDO('mysql:host='.$host.';dbname='.$database, $login, $password);
            }
             
            catch(Exception $e)
            {
                    echo "<center><h3>Echec : " . $e->getMessage().'</h3></center>';
                    die();
            }
   }

   function __destruct () {
   $this->connexion=null;
   }
   
   public function recherche($mot){
	   
	   $tabnom=array();
	   if (strlen(trim($mot)) > 1){
	   $sql=$this->connexion->query("SELECT id,articles FROM articles WHERE articles LIKE '%$mot%'");
		   while($ligne = $sql->fetch(PDO::FETCH_ASSOC)){
					$tabnom[$ligne['id']] = $ligne['articles'];
					
		   }
		return $tabnom ;
	   } 
   }
   
   
   
   public function nomsecteur($secteur){
	   
	   $sql=$this->connexion->query("SELECT * FROM secteurs");
	   while($ligne = $sql->fetch(PDO::FETCH_ASSOC)){
				$tabnom[$ligne['sigle']] = $ligne['nom'];
				
	   }
		return $tabnom[$secteur] ;
   }
   
   public function liste_secteurs(){
	   
	   	   $sql=$this->connexion->query("SELECT * FROM secteurs");
	   while($ligne = $sql->fetch(PDO::FETCH_ASSOC)){
				$tabnom[$ligne['sigle']] = $ligne['nom'];
				
	   }
		return $tabnom ;
   }
   
   public function enregnewarticle($nomarticle,$secteur){
	   $quantite=0;
       $interdits=array("\"","'");
       $nomarticle=str_replace($interdits," ",$nomarticle);
	   if(strlen(trim($nomarticle)) > 0 ){
	   $this->connexion->exec("INSERT INTO articles (articles,quantite,secteur)VALUES('$nomarticle','$quantite','$secteur')");
	   echo '<p><h1>Enregistrement effectué</h1/p>'; 	
	   }
	   else{
	   echo '<p><h1>Aucun article à enregistrer</h1/p>';	;   
	   }
   }
   
   public function deletearticle($id){
	 $this->connexion->exec("DELETE FROM articles WHERE id='$id'");  
	
   }
    
   public function modifplus($idtomodif){
			$sql=$this->connexion->query("SELECT quantite FROM articles WHERE id='$idtomodif'");
			if($ligne = $sql->fetch(PDO::FETCH_ASSOC)){
				$nombre=$ligne['quantite'];
				
					$nombre++;	

					$this->connexion->exec("UPDATE articles SET quantite='$nombre' WHERE id='$idtomodif'");
			}
		$this->display_article($idtomodif);	
   }		
   
   public function modifmoins($idtomodif){
			$sql=$this->connexion->query("SELECT quantite FROM articles WHERE id='$idtomodif'");
			if($ligne = $sql->fetch(PDO::FETCH_ASSOC)){
				$nombre=$ligne['quantite'];
				
					$nombre--;
						if($nombre <0) $nombre=0;
					$this->connexion->exec("UPDATE articles SET quantite='$nombre' WHERE id='$idtomodif'");
			}
			$this->display_article($idtomodif);	
   }	


	public function display_article($idtomodif){
		 $sql=$this->connexion->query("SELECT articles, quantite FROM articles WHERE id='$idtomodif'");
		 $ligne = $sql->fetch(PDO::FETCH_ASSOC);
		 $nomarticle=$ligne['articles'];
		 $nombre=$ligne['quantite'];
		 ?>
		 <table style="border: 1px solid black;font-size:50px;width:100%">
		<tr><td style="border: 1px solid black;width:40%"><?php echo $nomarticle ; ?></td><td style="border: 1px solid black;width:20%;text-align:center"><?php echo $nombre ; ?></td>
		<td style="border: 1px solid black;width:20%">
		<form method="post" action="article.php">
		<input type="hidden" name="idplus" value="<?php echo $idtomodif ; ?>">
		<input type="submit" style="font-size:50px;width:100%" name="modifplus" value="+">
		</form>
		</td>

		<td style="border: 1px solid black;width:20%">
		<form method="post" action="article.php">
		<input type="hidden" name="idmoins" value="<?php echo $idtomodif ; ?>">
		<input type="submit" style="font-size:50px;width:100%" name="modifmoins" value="-">
		</form>
		</td></td>
		</table>
		
		<?php		
		
	}
   
   public function display_liste($secteur){
	   
	   $nombre_articles=0; // par nom
	   
	   $nombre_unites=0;  // stock réel
	   
	   echo '<table style="border: 1px solid black;font-size:50px;width:100%">';
	
		$sql=$this->connexion->query("SELECT id,articles,quantite FROM articles WHERE secteur='$secteur' ORDER BY articles ASC");   
	   
      while($ligne = $sql->fetch(PDO::FETCH_ASSOC)){
	  $idarticle=$ligne['id'];
      $article=$ligne['articles'];
	  $quantite=$ligne['quantite'];
	  
	  $nombre_articles ++ ;
	  $nombre_unites+=$quantite;
	  
	  	  echo '<tr><td style="border: 1px solid black;width:40%">'.$article.'</td>';
	  
	  $couleur="black";
	  
	  if($ligne['quantite']<1) {
		  $couleur="red";
	  }
	  
	  echo '<td style="border: 1px solid black;text-align:center;width:20%"><span style="color:'.$couleur.'">'.$quantite.'</span></td>';
	  
	  ?>
	
	  <td style="border: 1px solid black;width:20%"><form method="post" action="article.php">
	  <input type="hidden" name="idtomodif" value="<?php echo $idarticle ?>">
	  <input type="submit" style="font-size:50px;width:100%" name="modification" value="Modifier">
	  </form></td></tr>
	  
	  <?php
   
     }	   
      echo '</table>';
	  echo '<h1>Total articles : '.$nombre_articles.'('.$nombre_unites.' éléments)</h1>';
   }
}

?>