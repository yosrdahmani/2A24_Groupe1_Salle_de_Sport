<?php 

include '../../entities/produit.php';
include '../../core/ProduitC.php';



if( isset($_POST['nom']) and isset($_POST['quantite']) and isset($_POST['prix'])  and isset($_POST['promotion']) and isset($_POST['nom_categorie']) and isset($_POST['image']) and isset($_POST['id']))
{

$produit = new produit($_POST['id'],$_POST['image'],$_POST['nom'],$_POST['quantite'],$_POST['prix'],$_POST['nom_categorie'],$_POST['promotion']);
	

	$ProduitC=new ProduitC();
	$ProduitC->modifierproduit($produit,$_POST['id']);
	header('Location: AfficherProduit.php');
}
else{
	echo "verifier les champs";
}

 ?>