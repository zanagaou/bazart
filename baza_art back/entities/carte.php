<?php

class Carte {
    
    private $id_carte;
    private $id_client;
    private $nb_point;
    private $date_creation;
    
    function __construct ($id_client,$nb_point,$date_creation)
    {
     $this->id_client=$id_client;
     $this->nb_point=$nb_point;
     $this->date_creation=$date_creation;

    }
    function getIDcarte() {return $this->id_carte;}
    function getIDclient() {return $this->id_client;}
    function getNbpoint() {return $this->nb_point;}
    function getDate() {return $this->date_creation;}
    
    
    
    function setIDcarte ($id_carte) {$this->id_carte=$id_carte;}
    
    function setIDclient ($id_client){$this->id_client=$id_client;}
    
    function setNbpoint ($nb_point){$this->nb_point=$nb_point;}
    
    function setDate ($date_creation){$this->date_creation=$date_creation;}
    


}
?>