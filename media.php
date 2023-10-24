<?php include "config/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
?>
<?php
session_start();
if(empty($_SESSION['username'])){
        $_SESSION["alert"] = "
    <div class = 'alert alert-success' role='alert'>
    Password tidak sesuai.
    </div>
    ";
        //redirect ke halaman awal
        header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>CodePen - Side menu responsive Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  </head>

  <body>
    <!-- partial:index.partial.html -->
    <div class="dashboard">
        <!-- navabar -->
        <?php include "template/navbar.php" ?>
   <!-- END -->
      <div class="dashboard-app">
        <header class="dashboard-toolbar">
          <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
        </header>
        <div class="dashboard-content">
          <div class="container">
            <!-- CONTENT -->
           <?php include "content.php" ?>
            <!-- END CONTENT -->
          </div>
        </div>
      </div>
    </div>
    <!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/script.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
  </body>
</html>
