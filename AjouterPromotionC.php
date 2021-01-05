<?php 

include '../../entities/promation.php';
include '../../core/PromotionC.php';
include '../../core/ProduitC2.php';


if(isset($_POST['val_promation'])  and isset($_POST['id_Produit']) )
{

	
$promation = new promation(0,$_POST['val_promation'],$_POST['id_Produit']);
	

	$PromotionC=new PromotionC();
	$PromotionC->ajouterpromotion($promation);
		$ProduitC=new ProduitC();

		$Mpro = $ProduitC->promoterproduit($_POST['id_Produit']);
	header('Location: AfficherProduit.php');
}
else{
	echo "verifier les champs";
}

 ?>