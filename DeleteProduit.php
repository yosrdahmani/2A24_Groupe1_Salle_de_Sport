<?PHP
include "../../core/ProduitC.php";
include ".../../entities/produit.php";



if (isset($_POST["id"])){
	$ProduitC=new ProduitC();
	$ProduitC->Supprimerproduit($_POST["id"]);


header('Location: AfficherProduit.php');
}

?>