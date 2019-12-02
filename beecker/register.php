<?php


require 'user system/header.php'; 
require 'user system/config.php'; 
require_once 'user system/user.class.php';

if (isset($_POST['pass'])) {
    
    $login = mysqli_real_escape_string($conn, htmlspecialchars($_POST['login']));
    $pass = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pass']));
    $pass_v = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pass_v']));
   
  
    $existsLogin = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE login='$login' LIMIT 1"));

    $errors = ''; 


   
    if (!$login || !$pass || !$pass_v ) $errors .= '- Musisz wypełnić wszystkie pola<br />';
    if ($existsLogin[0] >= 1) $errors .= '- Ten login jest zajęty<br />';
    if ($pass != $pass_v)  $errors .= '- Hasła się nie zgadzają<br />';

   
    if ($errors != '') {
        echo '<p class="error">Rejestracja nie powiodła się, popraw następujące błędy:<br />'.$errors.'</p>';
    }

   
    else {

        $pass = user::passSalter($pass);

        mysqli_query($conn, "INSERT INTO users (login, pass) VALUES('$login','$pass');") or die ('<p class="error">Wystąpił błąd w zapytaniu i nie udało się zarejestrować użytkownika.</p>');

     
        
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Hubert Nosko, Kacper Krzesiński, Wojciech Cisek, Aleksander Pieles" name="author">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/hover/hoverex-all.css" rel="stylesheet">
  <link href="lib/jetmenu/jetmenu.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/colors/yellow.css">
</head>

<body>
  <div class="topbar clearfix">
    <div class="container">
      <div class="col-lg-12 text-center">
        <a href="index.html"><h1>Beecker</h1></a>
      </div>
    </div>
    <!-- end container -->
  </div>
  <!-- end topbar -->

  <header class="header">
    <div class="container">
      <div class="site-header clearfix">
        <div class="col-lg-9 col-md-12 col-sm-12">
          <div id="nav" class="right">
            <div class="container clearfix">
              <ul id="jetmenu" class="jetmenu blue">
                <li><a href="index.html">Game</a>
                </li>
                <li><a href="login.html">login</a>
                </li>
                <li class="active"><a href="register.html">register</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- nav -->
        </div>
        <!-- title area -->
      </div>
      <!-- site header -->
    </div>
    <!-- end container -->
  </header>
  <!-- end header -->

  <section class="section">
        <div class="container">
            <div class="col-lg-6 col-md-9 col-sm-12">
                <h4 class="title">
                    <span>Zarejestruj się</span>
                </h4>

                <form id="registerform" method="post" name="registerform" action="">
                    <div class="form-group">
                      <input type="text" class="form-control" name="login" placeholder="Nickname">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="pass" placeholder="Hasło">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="pass_v" placeholder="Powtórz Hasło">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="button" value="Rejestruj">
                    </div>
                </form>
                <p class="withpadding">Masz już konto? <a href="login.html">Zaloguj się</a></p>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end section -->

    <div class="clearfix"></div>

  <footer class="footer">
    <div class="copyrights">
      <div class="container">
        <div class="widget col-lg-9 col-md-9 col-sm-12 columns footer-left">
          <h4 class="title">Projekt i wykonanie</h4>
          <div class="credits">
            <p>
              Hubert Nosko, Kacper Krzesiński, Wojciech Cisek, Aleksander Pieles
            </p>
          </div>
        </div>
        <!-- end widget -->
        <div class="widget col-lg-3 col-md-3 col-sm-12">
          <h4 class="title">Informaje kontaktowe</h4>
          <ul class="contact_details">
            <li><a href="mailto:helpBeecker@gmail.com">helpBeecker@gmail.com</a></li>
          </ul>
          <!-- contact_details -->
        </div>
        <!-- end widget -->
      </div>
      <!-- end container -->
    </div>
    <!-- end copyrights -->
  </footer>
  <!-- end footer -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/hover/hoverdir.js"></script>
  <script src="lib/hover/hoverex.min.js"></script>
  <script src="lib/jetmenu/jetmenu.js"></script>
  <script src="lib/animate-enhanced/animate-enhanced.min.js"></script>
  <script src="lib/unveil-effects/unveil-effects.js"></script>
  <!-- Main Javascript File -->
  <script src="js/main.js"></script>

  
</body>
</html>

