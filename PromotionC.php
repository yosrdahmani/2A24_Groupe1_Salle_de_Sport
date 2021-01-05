<?php

 class config {
    private static $instance = NULL;

    public static function getConnexion() {
      if (!isset(self::$instance)) {
		try{
        self::$instance = new PDO('mysql:host=localhost;dbname=produit_db', 'root', '');
		self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
    }
  }

class  PromotionC{
	


	function ajouterpromotion($promotion)
	{


 	$sql="INSERT INTO `promation`(`val_promation`, `id_Produit`) VALUES (:val_promation,:id_Produit)";
 	$db = config::getConnexion();
 		try{
		$req=$db->prepare($sql);		
		$val_promation=$promotion->getval_promation();
		$id_Produit=$promotion->getid_Produit();

		$req->bindValue(':val_promation',$val_promation);
		$req->bindValue(':id_Produit',$id_Produit);
	
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}


	    function afficherlist_promation(){

		$sql="SELECT p.id,p.id_Produit , pro.nom as nomProduit , `image`, `prix`,val_promation, `promotion`, c.nom FROM `produit` pro INNER JOIN categorie c   INNER JOIN promation p WHERE (pro.id = p.id_Produit) and (c.id_categorie = pro.id_Categorie)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
function modifierpromotion($promotion,$id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE `promation` SET `val_promation`=:val_promation WHERE `id`=:id";
 		try{
		$req=$db->prepare($sql);		
		$val_promation=$promotion->getval_promation();
		echo $val_promation;

		$req->bindValue(':val_promation',$val_promation);
		$req->bindValue(':id',$id);		
        $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}

        function Supprimerpromation($id){
		$sql="DELETE  from promation where  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	        function Supprimerpromation_produit($id){
		$sql="DELETE  from promation where  id_Produit=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
		function recupererproduit_promotion($id_Produit){
		$sql="SELECT * FROM `promation` WHERE  id_Produit=:id_Produit ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id_Produit',$id_Produit);
 	    $req->execute();
 		$hotel= $req->fetchALL(PDO::FETCH_OBJ);
		return $hotel;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
		function recuperer_promotion($id){
		$sql="SELECT * FROM `promation` WHERE  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$hotel= $req->fetchALL(PDO::FETCH_OBJ);
		return $hotel;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
			
	
}


?>