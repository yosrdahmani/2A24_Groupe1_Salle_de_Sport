<?php 

include '../../entities/categorie.php';
include '../../core/CategorieC.php';



if( isset($_POST['nom']) )
{

$categorie = new categorie(0,$_POST['nom']);
	

	$CategorieC=new CategorieC();
	$CategorieC->ajoutercategorie($categorie);
	header('Location: AfficherCategorie.php');
}
else{
	echo "verifier les champs";
}

 ?>