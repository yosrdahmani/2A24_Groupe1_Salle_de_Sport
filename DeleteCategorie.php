<?PHP
include "../../core/CategorieC.php";
include ".../../entities/categorie.php";



if (isset($_POST["id"])){
	$CategorieC=new CategorieC();
	$CategorieC->Supprimercategorie($_POST["id"]);


header('Location: AfficherCategorie.php');
}

?>