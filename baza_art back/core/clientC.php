<?php

include "../config.php";



class ClientC {
    
    
   
    
    
     function ajouterClient($client)
   {$sql="insert into client (nom_client,prenom_client,date_client,adress_client,email_client,tel_client,nom_c_client,mdp_client) values ( :nom,:prenom,:date_n,:adresse,:mail,:tel,:nom_c,:mdp)";
   
   $db = config::getConnexion();
    try {
        
        $req=$db->prepare($sql);
        
        
        $nom=$client->getNom_client();
        $prenom=$client->getprenom_client();
        $date_n=$client->getdate_client();
        $adresse=$client->getadress_client();
        $mail=$client->getmail_client();
        $tel=$client->gettel_client();
        $nom_c=$client->getnom_compte();
        $mdp=$client->getmdp_compte();

        $req->bindValue(':nom',$nom);
        $req->bindValue(':prenom',$prenom);
        $req->bindValue(':date_n',$date_n);
        $req->bindValue(':adresse',$adresse);
        $req->bindValue(':mail',$mail);
        $req->bindValue(':tel',$tel);
        $req->bindValue(':nom_c',$nom_c);
        $req->bindValue(':mdp',$mdp);
        
        $req->execute();
    }
    catch (Exception $e)
    { echo 'erreur:'.$e->getMessage();}
   }
    
    
    public function Logedin($conn,$login,$pwd)
	{
		$req="select * from client   where nom_c_client='$login' && mdp_client='$pwd'";
		$rep=$conn->query($req);
		return $rep->fetchAll();
	}
    
    function afficherClient()
   {
       $sql="SELECT * FROM client";
       $db =config::getConnexion();
       try{
        $list=$db->query($sql);
        return $list;
       }
         catch (Exception $e)
    { die('Erreur:'.$e->getMessage());}
   }
 
	function supprimerClient($nom_c_client){
		$sql="DELETE FROM client where nom_c_client= :nom_c_client";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':nom_c_client',$nom_c_client);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
    
    
    function rechercherClient($mot)
   {
       $sql="SELECT * FROM client where  nom_client like'%".$mot."%' or prenom_client like'%".$mot."%' or date_client like'%".$mot."%' or  adress_client like'%".$mot."%' or email_client like'%".$mot."%' or tel_client like'%".$mot."%' or nom_c_client like'%".$mot."%'";
       $db =config::getConnexion();
       try{
        $list=$db->query($sql);
        return $list;
       }
         catch (Exception $e)
    { die('Erreur:'.$e->getMessage());}
   }    


    
     
	
}