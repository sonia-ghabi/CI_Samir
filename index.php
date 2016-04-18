<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Accueil</title>
</head>
<body>

<form method="POST" action="index.php">
	Identifiant :<br>
	<input type="text" name="adminId" value="sonia"><br>
	Mot de passe : <br>
	<input type="text" name="adminMdp" value="ok"><br>
	<input type="submit" name="submit" value="Connexion">
</form>


<?php

	$admin = "false";
	if(isset($_POST['submit']))
	{
		$adminId=$_POST['adminId'] ;
		$adminMdp=$_POST['adminMdp'] ;
		$fp = fopen("bdd/bdd_Admins.txt","r");
		$ligne=0 ;
		while(!feof($fp))
	    {
	        $donnees_ligne = fgets($fp,255);
	        list($id[], $mdp[]) = explode("|", trim($donnees_ligne)) ;
	        $ligne++;
	    }

	    fclose($fp);
	    for($p=0 ; $p<$ligne ; $p++)
		{
			if($id[$p] == $adminId) {
				if($mdp[$p] == $adminMdp) {
					echo("Vous êtes connecté");
					$admin = "true"; 
				}
				else {
					echo("Erreur mdp");
				}
				break;
			}

			if($p == $ligne-1) {
				echo("Identifiant incorrect");
			}
		}
	}


	
    $fp = fopen("bdd/bdd_Produits.txt","r");
    $ligne=0 ;
    while(!feof($fp))
    {
        $donnees_ligne = fgets($fp,255);
        list($produit[], $prix[], $description[], $nbVente[]) = explode("|", trim($donnees_ligne)) ;
        $ligne++;
    }
   fclose($fp);
   echo ("<ul>");
   for($p=0 ; $p<$ligne-1 ; $p++)
	{
		echo ("<li> $produit[$p] : $description[$p] <br> $prix[$p] euros");
		if($admin == "true") {
			echo ("<button> Modifier </button>");
		}
		echo("</li>" );
	}
	if($admin == "true") {
		echo("<a href='admin.php'> Ajoutez un nouvel article </a>");
	}
?>
</ul>
	
	
</body>
</html>