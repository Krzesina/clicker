<?php
session_start();


require 'header.php'; 
require 'config.php'; 


require_once 'user.class.php'; 


$login = htmlspecialchars(mysql_real_escape_string($_POST['login']));
$pass = mysql_real_escape_string($_POST['pass']);

if ($_POST['send'] == 1) {
   
    if (!$login or empty($login)) {
        die ('<p class="error">Wypełnij pole z loginem!</p>');
    }

    if (!$pass or empty($pass)) {
        die ('<p class="error">Wypełnij pole z hasłem!</p>');
    }

    $pass = user::passSalter($pass); 
    
   
    $userExists = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE login = '$login' AND pass = '$pass'"));

    if ($userExists[0] == 0) {
        
        echo '<p class="error">Użytkownik o podanym loginie i haśle nie istnieje.</p>';
    }

    else {
        
        $user = user::getData($login, $pass); 

        
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;

        echo '<p class="success">Zostałeś zalogowany. Możesz przejść na <a href="index.php">stronę główną</a></p>';
    }
}

else {
   
?>

 <form method="post" action="">
  <label for="login">Login:</label>
  <input type="text" name="login" maxlength="32" id="login" />

  <label for="pass">Hasło:</label>
  <input type="password" name="pass" maxlength="32" id="pass" /><br />

  <input type="hidden" name="send" value="1" />
  <input type="submit" value="Zaloguj" />
 </form>

<?php
}

require 'footer.php'; 
?>
