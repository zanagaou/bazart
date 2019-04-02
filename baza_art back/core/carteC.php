<?php

include "../config.php";

class CarteC {
    
    
    function ajouterCarte($carte)
    {
        $sql="insert into carte_fidelite (id_client,nb_point,date_creation) values (:id_client,:nb_point,:date_creation)";
        
        $db=config::getConnexion();
        try {
             $req=$db->prepare($sql);
        
        
        $id_client=$carte->getIDclient();
        $nb_point=$carte->getNbpoint();
        $date_creation=$carte->getDate();
       

        $req->bindValue(':id_client',$id_client);
        $req->bindValue(':nb_point',$nb_point);
        $req->bindValue(':date_creation',$date_creation);
        
        
        $req->execute();
        }
         catch (Exception $e)
    { echo 'erreur:'.$e->getMessage();}
   }
    
    
    
    
    
    
    
    function afficherCarte()
   {
       $sql="SELECT * FROM carte_fidelite";
       $db =config::getConnexion();
       try{
        $list=$db->query($sql);
        return $list;
       }
         catch (Exception $e)
    { die('Erreur:'.$e->getMessage());}
   }
    
    function supprimerCarte($id_carte){
		$sql="DELETE FROM carte_fidelite where id_carte= :id_carte";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_carte',$id_carte);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
    
    
    
    
    
    
    
    
    
    
    
    }
?>