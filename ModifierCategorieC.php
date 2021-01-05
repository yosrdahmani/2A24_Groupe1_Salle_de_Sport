<?php 

include '../../entities/categorie.php';
include '../../core/CategorieC.php';



if(isset($_POST['id'])  and isset($_POST['nom']) )
{
session_start();
    
$categorie = new categorie($_POST['id'],$_POST['nom']);
    

    $CategorieC=new CategorieC();
    $CategorieC->modifiercategorie($categorie,$_POST['id'] );
    header('Location: AfficherCategorie.php');
}
else{
    echo "verifier les champs";
}

 ?>