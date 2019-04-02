<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php
include "../entities/client.php";
include "../core/clientc.php";


     
     $c=new config();
     $conn=$c->getConnexion();
     $user=new ClientC();
     $u=$user->Logedin($conn,$_POST['nom'],$_POST['mdp']);
     
     $vide=false;
     if (!empty($_POST['nom']) && !empty($_POST['mdp'])){
	
	foreach($u as $t){
		$vide=true;
       
	
		session_start();
		$_SESSION['login']=$_POST['nom'];
		$_SESSION['pass']=$_POST['mdp'];
		$_SESSION['nom']=$t['nom_client'];
        $_SESSION['prenom']=$t['prenom_client'];
        $_SESSION['mail']=$t['email_client'];
        $_SESSION['tel']=$t['tel_client'];
        $_SESSION['adress']=$t['adress_client'];
        $_SESSION['id']=$t['id_client'];
        $_SESSION['code']=$t['code_confirm'];
        
      
        
		
	
} 
if ($vide==true) { 
         // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
         echo '<body onLoad="alert(\'compte  reconnu...\')">'; 
    
       //affichager des clients.
 header('Location: afficher_client.php');

      } 
}
    
    else{
    
        // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
        echo '<body onLoad="alert(\'compte non  reconnu...\')">'; 
         // puis on le redirige vers la page d'accueil
         echo '<meta http-equiv="refresh" content="0;URL=../index.html">'; 
      } 

    
     
  


?>
</body>
</html>