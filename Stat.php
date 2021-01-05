<?php
include "../../core/DashboardC.php";
 session_start();
 if (empty($_SESSION['id']))
 {
     echo "<script type='text/javascript'>";
echo "alert('Please Login First');
window.location.href='../login.html';";
echo "</script>";
   

 }

 $DashC=new DashboardC();
 $nbrProduit=$DashC->nbrProduit()[0]->count;

?>

<!DOCTYPE html>


<h3><?php echo $nbrProduit ?> <span>produits</span> </h3>
                               <strong> Produits exposés </strong>
 
 

   <div class="panel-heading">
                                Nombre de produits par catégorie
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>
                            </div>
                       
                    </div>  

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
   

    <script>
    (function ($) {
    "use strict";
    var mainApp = {

        initFunction: function () {
            /*MENU
            ------------------------------------*/
            $('#main-menu').metisMenu();
           
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

            /* MORRIS BAR CHART
            -----------------------------------------*/
             Morris.Bar({
                element: 'morris-bar-chart',
                data: <?php echo $DashC->getNbrProduitParCategorie() ?>,
                xkey: 'categorie',
                ykeys: ['count'],
                labels: ['Nombre de produit par catégorie'],
                 barColors: ['#A8E9DC'   ],
                hideHover: 'auto',
                resize: true
            });
     
       
            $('.bar-chart').cssCharts({type:"bar"});
       
     
        },

        initialization: function () {
            mainApp.initFunction();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.initFunction();
        $("#sideNav").click(function(){
            if($(this).hasClass('closed')){
                $('.navbar-side').animate({left: '0px'});
                $(this).removeClass('closed');
                $('#page-wrapper').animate({'margin-left' : '260px'});
               
            }
            else{
                $(this).addClass('closed');
                $('.navbar-side').animate({left: '-260px'});
                $('#page-wrapper').animate({'margin-left' : '0px'});
            }
        });
    });

}(jQuery));

      </script>

</html>

