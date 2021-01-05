<?php 

include '../../entities/produit.php';
include '../../core/ProduitC.php';



if( isset($_POST['nom']) and isset($_POST['quantite']) and isset($_POST['prix']) and isset($_POST['nom_categorie']) and isset($_POST['image']))
{
	$produit = new produit(0,$_POST['image'],$_POST['nom'],$_POST['quantite'],$_POST['prix'],$_POST['nom_categorie'],0);


	

	$ProduitC=new ProduitC();
	$ProduitC->ajouterProduit($produit);
	header('Location: AfficherProduit.php');
}
else{
	echo "verifier les champs";
}

 ?>