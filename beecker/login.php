<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>Login</title>
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
                <li class="active"><a href="login.php">login</a>
                </li>
                <li><a href="register.php">register</a>
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
                    <span>Login</span>
                </h4>
                <form id="loginform" method="post" name="loginform" action="index.html">
                    <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" placeholder="Nickname">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          <input type="password" class="form-control" placeholder="Hasło">
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="button">Zaloguj</button>
                    </div>
                    <p class="withpadding">Nie masz konta? <a href="register.php">Zarejestruj się</a></p>
                </form>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end section -->

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
<?php



require 'user system/header.php'; 
require 'user system/config.php'; 


require_once 'user system/user.class.php'; 




if (isset($_POST['pass'] )) {
    
    $login = (htmlspecialchars(mysqli_real_escape_string($conn, $_POST['login'])));
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
   
    if (!$login or empty($login)) {
        die ('<p class="error">Wypełnij pole z loginem!</p>');
    }

    if (!$pass or empty($pass)) {
        die ('<p class="error">Wypełnij pole z hasłem!</p>');
    }

    $pass = user::passSalter($pass); 
    
   
    $userExists = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE login = '$login' AND pass = '$pass'"));

    if ($userExists[0] == 0) {
        
        echo '<p class="error">Użytkownik o podanym loginie i haśle nie istnieje.</p>';
    }

    else {
        
        $user = user::getData($login, $pass); 

        
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;

        echo '<p class="success">Zostałeś zalogowany. Możesz przejść na <a href="index.html">stronę główną</a></p>';
    }
}

else {
   
?>



<?php
}
?>
