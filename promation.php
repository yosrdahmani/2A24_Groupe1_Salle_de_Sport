<?php 
/**
 * 
 */

class promation 
{

	private $id;
	private $val_promation;
	private $id_Produit;


	
	function __construct($id,$val_promation,$id_Produit)
	{
		$this->id=$id;
		$this->val_promation=$val_promation;
		$this->id_Produit=$id_Produit;
		
	}
	
	function getid(){return $this->id;}
	function getval_promation(){return $this->val_promation;}
	function getid_Produit(){return $this->id_Produit;}

	public function set_id($id)
		{
			$this->id = $id;
		}
	public function set_val_promation($val_promation)
		{
			$this->val_promation = $val_promation;
		}
    public function set_id_Produit($id_Produit)
		{
			$this->id_Produit = $id_Produit;
		}
		
}
 ?>
