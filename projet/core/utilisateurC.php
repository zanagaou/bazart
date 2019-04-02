<?php

include "C:/wamp/www/projet/config.php";



class ClientC {
    
    
    function  IDClientExiste($id){
    
    $connection = @mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('bazart');
    $sql="select * from client where id_client='".$id."'";

 try{   
        $req=@mysql_query($sql);
       
     $count=0;
            while($row=@ mysql_fetch_array($req)){
             $count++;
             
            }
   
            if($count>=1) {return true ;}
            else {return false ;}
       }
         catch (Exception $e)
    { die('Erreur:'.$e->getMessage());}
}
    
    
     function ajouterClient($client)
   {$sql=" insert into client (id_client,nom_client,prenom_client,date_client,adress_client,email_client,tel_client,nom_c_client,mdp_client) values (:id , :nom,:prenom,:date_n,:adresse,:mail,:tel,:nom_c,:mdp)";
   
   $db = config::getConnexion();
    try {
        
        $req=$db->prepare($sql);
        
        
        $id=$client->getId();
        $nom=$client->getNom_client();
        $prenom=$client->getprenom_client();
        $date_n=$client->getdate_client();
        $adresse=$client->getadress_client();
        $mail=$client->getmail_client();
        $tel=$client->gettel_client();
        $nom_c=$client->getnom_compte();
        $mdp=$client->getmdp_compte();
        
        $req->bindValue(':id',$id);
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
   /*
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
  
function rechercherClient($mot)
   {
       $sql="SELECT * FROM client where id_client like'%".$mot."%'or nom_client like'%".$mot."%' or prenom like'%".$mot."%' or date_client like'%".$mot."%' or sexe_client like'%".$mot."%' or adress_client like'%".$mot."%' or sexe_client like'%".$mot."%'or adresse like'%".$mot."%' or mail like'%".$mot."%' or tel like'%".$mot."%' or nom_c like'%".$mot."%'";
       $db =config::getConnexion();
       try{
        $list=$db->query($sql);
        return $list;
       }
         catch (Exception $e)
    { die('Erreur:'.$e->getMessage());}
   } */   

}