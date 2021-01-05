<?php 
include "../../core/PromotionC.php";
include "../../core/ProduitC2.php";
 session_start(); 
 if (empty($_SESSION['id']))
 {
     echo "<script type='text/javascript'>";
echo "alert('Please Login First');
window.location.href='../login.html';";
echo "</script>";
    

 }
 $ProduitC=new ProduitC();

$listeProduits=$ProduitC->afficherlist_produit(); 



?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Produit</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->

    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="AfficherProduit.php"><center><strong>GOLD FITNESS</strong></center></a>
        
    <div id="sideNav" href=""></div>
            </div>

                <ul class="nav navbar-top-links navbar-right">
         
                <!-- /.dropdown -->
             
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <center><img src="assets/img/logo.png" height="150" width="200"></center>

                    <li>
                        <a  class="active-menu"   href="AfficherProduit.php"><i class="fa fa-dashboard"></i> Liste Produits</a>
                    </li>
                 
         <li>
                        <a href="AfficherPromotion.php"><i class="fa fa-dashboard"></i> Liste Promotions</a>
                    </li>
                       <li>
                        <a href="AfficherCategorie.php"><i class="fa fa-dashboard"></i> Liste categories</a>
                    </li>


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
    <div id="page-wrapper">
      
            <div id="page-inner">

                <!-- /. ROW  -->

      
     <div class="row">
  <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
     <div class="form-group input-group">
                                            <input id="myInput" type="text" class="form-control">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
          <h5>Convertir en PDF</h5>
          <a class="btn btn-primary"  href="pdfProduit.php">PDF</i></a>
            </div>
          </div>
        </div>

  <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
          <h5>Nouveau Produit </h5>
     <a class="btn btn-primary"  href="AjouterProduit.php">Ajouter</i></a>
            </div>
          </div>
        </div>
  <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
                                        <div class="col mr-2">
                                           
                                                     <p>Promouvoir tous</p>
                                        </div>
                     <form onsubmit=" return validateForm()"  name="myForm" method="POST"  action="AjouterPromotionAllC.php">

            <input class="form-control"  id="val_promation" name="val_promation" type="number" placeholder="valeur promation"   />
            <br>                      
  <button class="btn btn-primary" type="submit"><i class="fa fa-bullhorn"></i> </button>
     


  </form> 

                <script>
                                      
function validateForm() {

 var val_promation = document.forms["myForm"]["val_promation"].value;

    if ( val_promation <= 0) {

    alert("valeur promotion ne doit pas etre negative");
    return false;
  }
      if (val_promation == "" ) {

    alert("valeur promotion vide");
    return false;
  }
 if (val_promation >=100 ) {

    alert("valeur promotion ne doit pas etre superieur a 100%");
    return false;
  }


}
</script>
            </div>
          </div>
        </div>


      </div>

                        <!-- Earnings (Monthly) Card Example -->
                    
  
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>

      <th scope="col" >Categorie</th>
      <th scope="col"> Image </th>
      <th scope="col" >Nom </th>
      <th scope="col" >Quantite </th>
      <th scope="col"> Prix </th>
      <th scope="col"> Promotion </th>
      <th scope="col"> Supprimer </th>
      <th scope="col"> Modifier </th>
         <th scope="col">Promouvoir </th>
     
    </tr>
  </thead>
  <tbody  id="myTable">
    <?PHP

foreach($listeProduits as $row){

  ?>
    <tr>
    <th scope="row"><?php echo$row['id'] ?></th>
    <td><?php echo$row['nom'] ?></td>
    <td><img style=" width: 60px; " src="../img/<?php echo $row['image'] ?>"></td>
    <td><?php echo$row['nomProduit'] ?></td>
    <td><?php echo$row['quantite'] ?></td>

              <td><?php 
         if ($row['promotion'] == 0)
         {

      echo $row['prix'] ;

         }
         else
         {
           $PromotionC=new PromotionC();

$promotion=$PromotionC->recupererproduit_promotion($row['id']); 

$prix = (int)$row['prix'];

    foreach($promotion as $roww){

         $val_promation=$roww->val_promation;

    }

  

    $newprix= ((100-(int)$val_promation)/100)*($prix);

      echo $newprix;
          
         }


     ?></td>

               <td><?php 
         if ($row['promotion'] == 0)
         {
     echo "NON";
         }
         else
         {
               echo "OUI";
         }


     ?></td>
   <td>     
<form method="POST" action="DeleteProduit.php">



                                  
  <button class="btn btn-danger" type="submit">Supprimer</i> </button>
    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">       


  </form>

      </td>
    <td> <a class="btn btn-warning"  href="ModifierProduit.php?id=<?PHP echo $row['id']; ?>">Modifier</i></a>
         </td>
                   <td> 
<?php 
 if ($row['promotion'] == 0)
         { ?>
    <a class="btn btn-warning"  href="AjouterPromotion.php?id=<?PHP echo $row['id']; ?>"><i class="fa fa-bullhorn "></i></a>

 <?php
         }
         else
         {
          ?>
            <a class="btn btn-warning"  href="AfficherPromotion.php"><i class="fa fa-bars "></i></a>

           
               <?php
         }
?>

          

            <?php ?>
         </td>
    
    </tr>
                  <?PHP
                  
}
?>
  
  </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> 

                
                <!-- /. ROW  -->

     
        
        
        
              
                <!-- /. ROW  -->
      
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
   
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
  
  
  <script src="assets/js/easypiechart.js"></script>
  <script src="assets/js/easypiechart-data.js"></script>
  
   <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
  
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

      <script>
    
      </script>

</body>

</html>