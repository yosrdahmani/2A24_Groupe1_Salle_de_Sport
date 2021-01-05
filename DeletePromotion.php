<?PHP

include '../../entities/promation.php';
include '../../core/PromotionC.php';
include '../../core/ProduitC2.php';


if (isset($_POST["id"]) and isset($_POST["id_Produit"])){
	$PromotionC=new PromotionC();
	$PromotionC->Supprimerpromation($_POST["id"]);

	$ProduitC=new ProduitC();

		$prod = $ProduitC->deletepromoterproduit($_POST['id_Produit']);
header('Location: AfficherPromotion.php');
}

?>