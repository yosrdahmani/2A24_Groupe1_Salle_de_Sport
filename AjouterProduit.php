<?php  
include "../../core/CategorieC.php";
 session_start(); 
 if (empty($_SESSION['id']))
 {
     echo "<script type='text/javascript'>";
echo "alert('Please Login First');
window.location.href='../login.html';";
echo "</script>";
    

 }
 $CategorieC=new CategorieC();

$listeCategories=$CategorieC->afficherlist_categorie(); 
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
                        <a class="active-menu" href="AfficherProduit.php"><i class="fa fa-dashboard"></i> Liste Produits</a>
                    </li>
                 
         <li>
                        <a href="AfficherPromotion.php"><i class="fa fa-dashboard"></i> Liste Promotions</a>
                    </li>
                       <li>
                        <a  href="AfficherCategorie.php"><i class="fa fa-dashboard"></i> Liste categories</a>
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
<h5>Afficher Produit </h5>
     <a class="btn btn-warning"  href="AfficherProduit.php">Retour</i></a>
            </div>
          </div>
        </div>

  <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">

 <form   name="myForm" onsubmit="return validateForm()" method="POST" action="AjouterProduitC.php" >
                  
                   <div class="form-group">
   
                                <input class="form-control"  id="nom" name="nom" type="text" placeholder="Nom Produit"   />
                  
  
                      </div>
                      <div class="form-group">
   
                                <input class="form-control"  id="quantite" name="quantite" type="number" placeholder="Quantite"   />
                  
  
                      </div>
                
                       
                              <div class="form-group">
                                
 <input class="form-control"  id="prix" name="prix" type="number" placeholder="Prix"   />
                            </div>
         <div class="form-group">
                                
 <select class="form-control" name="nom_categorie">
    <?PHP

foreach($listeCategories as $row){

  ?>
  <option value="<?php echo $row['id_categorie'] ?>"><?php echo $row['nom'] ?></option>
                  <?PHP
                  
}
?>
</select>
                            </div>



                                <div class="form-group">
                                
 <input class="form-control"  id="image" name="image" type="file" placeholder="image"   />
                            </div>
                          
                              </div>    
                            
                       
                     
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase"  type="submit">Ajouter</button>
                    </div>
                </form>
               
                <script>

function validateForm() {
      var nom = document.forms["myForm"]["nom"].value;
      var quantite = document.forms["myForm"]["quantite"].value;
      var prix = document.forms["myForm"]["prix"].value;
      var image = document.forms["myForm"]["image"].value;

  if (nom == "") {
    alert("nom vide");
    return false;
  }
  if (quantite == "") {
    alert("quantité vide");
    return false;
  }
  
      if (prix == "" ) {

    alert("prix vide");
    return false;
  }

    if ( prix <= 0) {

    alert("prix ne doit pas etre negative");
    return false;
  }
   
      if (image == "") {

    alert("image vide");
    return false;
  }

 
    
}
</script>

            </div>
          </div>
        </div>

      </div>

                        <!-- Earnings (Monthly) Card Example -->
                    
             
  
                <!-- /. ROW  -->

     
        
        
        
              
                <!-- /. ROW  -->
      
    
        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p>
        
        
        </footer>
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