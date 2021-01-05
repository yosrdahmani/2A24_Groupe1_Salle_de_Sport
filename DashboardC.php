 <?php
 
 function nbrProduit(){
        $sql="SELECT COUNT(*) as count FROM `produit` ";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        $req->execute();
        $event= $req->fetchALL(PDO::FETCH_OBJ);
        return $event;
        }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
    }


 function getNbrProduitParCategorie(){
        $sql="SELECT Count(pro.id) as count, cat.nom as nom  FROM `produit` pro  INNER join `categorie` cat where pro.id_categorie
        = cat.id_categorie group by pro.id_categorie";
                $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        $req->execute();
        $event= $req->fetchALL(PDO::FETCH_OBJ);
           
       // $chart_data = '';
       $chart_data=array();
        foreach($event as $row)
        {
            $chart_data[]=array(
                'categorie'  =>  $row->nom,
                'count'  =>  $row->count
            );
           
        }
        return  json_encode( $chart_data );
        /* foreach($event as $row)
        {
         $chart_data .= "{ categorie:'".$row->nom."', count:".$row->count."}, ";
        }
        $chart_data = substr($chart_data, 0, -2);

        return $chart_data; */
        }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }

    }
?>