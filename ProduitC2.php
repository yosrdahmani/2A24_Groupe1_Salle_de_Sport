<?php
class produit
{
  private $id;
  private $image;
  private $nom;
  private $quantite;
  private $prix;
  private $id_cat;
    private $promotion;
  

  public function __construct($id,$image,$nom,$quantite,$prix,$id_cat,$promotion)
  {
    $this->id=$id;
    $this->image=$image;
    $this->nom=$nom;
    $this->quantite=$quantite;
    $this->prix=$prix;
    $this->id_cat=$id_cat;
    $this->promotion=$promotion;

  }
  public function getpromotion()
  {
    return $this->promotion;
  }
  public function getid()
  {
    return $this->id;
  }
  public function getimage()
  {
    return $this->image;
  }
   public function getnom()
  {
    return $this->nom;
  }
  public function getquantite()
  {
    return $this->quantite;
  }
    public function getprix()
  {
    return $this->prix;
  }

  public function getid_cat()
  {
    return $this->id_cat;
  }

  
}
class  ProduitC {
	

function ajouterProduit($produit)
  {



  $sql="INSERT INTO `produit`( `image`, `nom`, `quantite`, `prix`, `id_Categorie`, `promotion`) VALUES (:image,:nom,:quantite,:prix,:id_Categorie,:promotion)";
  $db = config::getConnexion();
    try{



    $req=$db->prepare($sql);  
    $promotion=$produit->getpromotion();
    $image=$produit->getimage();
    $nom=$produit->getnom();
    $quantite=$produit->getquantite();
    $prix=$produit->getprix();
    $id_Categorie=$produit->getid_cat();

    $req->bindValue(':image',$image);
    $req->bindValue(':nom',$nom);
    $req->bindValue(':quantite',$quantite);
    $req->bindValue(':prix',$prix);
    $req->bindValue(':id_Categorie',$id_Categorie);
    $req->bindValue(':promotion',$promotion);
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
  }
        function afficherlist_produit(){

    $sql="SELECT pro.id, `image`, pro.nom as nomProduit , `quantite`, `prix`, `promotion` , c.nom FROM `produit` pro INNER JOIN categorie c WHERE pro.id_Categorie=c.id_categorie";
    $db = config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 
  }
      function recupererproduit($id){
    $sql="SELECT * FROM `produit` WHERE  id=:id ";
    $db = config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
      $req->execute();
    $event= $req->fetchALL(PDO::FETCH_OBJ);
    return $event;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
          function recupererproduit_with_cat($id){
    $sql="SELECT `id`, `image`, pro.nom as nomProduit , `quantite`, `prix`, `promotion` , c.nom FROM `produit` pro INNER JOIN categorie c WHERE pro.id_Categorie=c.id_categorie and pro.id=:id ";
    $db = config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
      $req->execute();
    $event= $req->fetchALL(PDO::FETCH_OBJ);
    return $event;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
function modifierproduit($produit,$id)
  {
  $db = config::getConnexion();
  $sql="UPDATE `produit` SET `image`=:image,`nom`=:nom,`quantite`=:quantite,`prix`=:prix,`id_Categorie`=:id_Categorie,`promotion`=:promotion WHERE `id`=:id";
    try{

        $req=$db->prepare($sql);    
     

    $promotion=$produit->getpromotion();
    $image=$produit->getimage();
    $nom=$produit->getnom();
    $quantite=$produit->getquantite();
    $prix=$produit->getprix();
    $id_Categorie=$produit->getid_cat();

    $req->bindValue(':image',$image);
    $req->bindValue(':nom',$nom);
    $req->bindValue(':quantite',$quantite);
    $req->bindValue(':prix',$prix);
    $req->bindValue(':id_Categorie',$id_Categorie);
    $req->bindValue(':promotion',$promotion);
    
        $req->bindValue(':id',$id);
      

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
  }




        function Supprimerproduit($id){
    $sql="DELETE  from produit where  id=:id ";
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

function promoterproduit($id){
    $sql="SELECT * FROM `produit` WHERE  id=:id ";
    $db = config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
      $req->execute();
    $produit= $req->fetchALL(PDO::FETCH_OBJ);


$pro=$produit[0];
$newproduit =new produit($pro->id,$pro->image,$pro->nom,$pro->quantite,$pro->prix,$pro->id_Categorie,1);

$this->modifierproduit($newproduit,$id);


    return $newproduit;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
  function deletepromoterproduit($id){
    $sql="SELECT * FROM `produit` WHERE  id=:id ";
    $db = config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
      $req->execute();
    $produit= $req->fetchALL(PDO::FETCH_OBJ);


$pro=$produit[0];
$newproduit =new produit($pro->id,$pro->image,$pro->nom,$pro->quantite,$pro->prix,$pro->id_Categorie,0);

$this->modifierproduit($newproduit,$id);


    return $newproduit;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		

		
	
}
}


?>