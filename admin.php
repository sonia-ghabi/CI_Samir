<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<form method="POST" action="admin.php">
		Nom du nouvel article :<br>
		<input type="text" name="nom" value="banane"><br>
		Description : <br>
		<textarea type="text" name="description">Calibre 4, provenance cote d'ivoire</textarea><br>
		Prix en euros :
		<input type="text" name="prix" value="1"><br>
		<input type="submit" name="submit" value="Ajouter">
	</form>

<?php

if(isset($_POST['submit']))
{
	$nom = $_POST['nom'] ;
	$description = $_POST['description'] ;
	$prix = $_POST['prix'] ;
	$fp = fopen("bdd/bdd_Produits.txt","a+");
	if(!feof($fp))
    {
    	if(fwrite($fp, "$nom|$prix|$description|0\n")) {
    		echo("Le produit a été rajouté avec succès <br> <a href=index.php>Retour à la page d'accueil</a>");

    		fclose($fp);
    	}

    	
    }
    
}
?>

</body>
</html>

