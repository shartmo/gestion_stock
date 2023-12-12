<?php


include 'config.php';




            try
            {
                    $connexion = new PDO('mysql:host='.$host.';dbname='.$database, $login, $password);

            }
             
            catch(Exception $e)
            {
                    echo "<center><h3>Echec : " . $e->getMessage().'</h3></center>';
                    die();
            }


?>