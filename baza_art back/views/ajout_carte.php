<?php
include "../entities/carte.php";
include "../core/carteC.php";

 
    if (isset($_POST['id_client']) and isset($_POST['nb_point'])and  isset($_POST['date_creation'])) 
 {
     $carteC=new carteC();
     
        
    
     $carte=new Carte($_POST['id_client'],$_POST['nb_point'],$_POST['date_creation'] );
     
     $carteC->ajouterCarte($carte);
     header('location:../index.html');
     }
else { echo "verifier les champs";
}



?>