<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>LA TIENDA - CMS</title>

    



  </head>
  <body>
    <?php include "../inc/headerCMS.php" ?>
    
    
      <style>
      #fondoadmin {
  /* Asignamos una altura mínima */
  min-height: 910px;  
  background-image: url('fondoadmin.jpg');
  background-size: cover;
  background-position: center;
}




.centrado{
    position: absolute;
    top: 40%;
    left: 10%;
    transform: translate(-50%, -50%);
}
      </style>

    <div id="fondoadmin" class="col-xs-6 col-md-8 col-lg-12">
    </div>
    
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/browser.min.js"></script>
    <script src="../assets/js/breakpoints.min.js"></script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>

  <?php include('inc/footer.php');?>
  
</html>