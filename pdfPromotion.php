<!DOCTYPE html>
<html lang="en">
<head>
  <title>PDF | LISTE DES PROMTIONS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</head>
<body>

<div class="jumbotron text-center">
  <h1>LISTE DES PROMOTIONS</h1>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <?php

        require_once('configpdf.php');
        require_once 'vendor/autoload.php';
        
        $query = "SELECT * FROM promation";

        $result = mysqli_query($con, $query); 

        $output = "";

      
 $output .="<center><h2>Liste Des Promotions</h2></center>
            <table class='table table-striped' >
              <thead>
                <tr>
                  <th>#</th>
                  <th>Valeur Promotion</th>
                  <th>Id Produit</th>
                </tr>
              </thead>";
        
      if (mysqli_num_rows($result) > 0) { 
              
      while ($row = mysqli_fetch_assoc($result)) {
      
      $output.='<tbody>
                  <tr>
                    <td> '.$row['id'].' </td>                      
                    <td> '.$row['val_promation'].' </td>
                    <td> '.$row['id_Produit'].' </td>
                  </tr>
                </tbody>';
            }
        }else{
            $output = "No record found";
        } 
      
        $output .="</table>";
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($output);
        $fileName = rand().'.pdf';
        $mpdf->Output($fileName, 'D');

      ?>
    </div>
  </div>
</div>

</body>
</html>