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
 ?>
