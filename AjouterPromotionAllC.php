<?php 

include '../../entities/promation.php';
include '../../core/PromotionC.php';
include '../../core/ProduitC2.php';


if(isset($_POST['val_promation'])   )
{
 $ProduitC=new ProduitC();

$listeProduits=$ProduitC->afficherlist_produit(); 
foreach($listeProduits as $row){

	$PromotionC=new PromotionC();
if ($row['promotion'] == 1)
{
	$PromotionC->Supprimerpromation_produit($row['id']);
}


$promation = new promation(0,$_POST['val_promation'],$row['id']);
	

	$PromotionC->ajouterpromotion($promation);

		$produit = $ProduitC->promoterproduit($row['id']);
}
	

	header('Location: AfficherProduit.php');
}
else{
	echo "verifier les champs";
}

 ?>