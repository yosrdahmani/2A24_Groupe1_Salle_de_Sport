<?php 

include '../../entities/promation.php';
include '../../core/PromotionC.php';



if( isset($_POST['val_promation']) and isset($_POST['id']) )
{
session_start();
	
$promation = new promation(0,$_POST['val_promation'],0);
	

	$PromotionC=new PromotionC();
	$PromotionC->modifierpromotion($promation,$_POST['id'] );
	header('Location: AfficherPromotion.php');
}
else{
	echo "verifier les champs";
}

 ?>