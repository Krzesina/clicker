<?php


require 'header.php'; 
require 'config.php'; 
require_once 'user.class.php';

if (isset($_POST['send'])) {
    
    $login = mysqli_real_escape_string($conn, htmlspecialchars($_POST['login']));
    $pass = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pass']));
    $pass_v = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pass_v']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $email_v = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email_v']));

  
    $existsLogin = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE login='$login' LIMIT 1"));
    $existsEmail = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE email='$email' LIMIT 1"));

    $errors = ''; 


   
    if (!$login || !$email || !$pass || !$pass_v || !$email_v ) $errors .= '- Musisz wypełnić wszystkie pola<br />';
    if ($existsLogin[0] >= 1) $errors .= '- Ten login jest zajęty<br />';
    if ($existsEmail[0] >= 1) $errors .= '- Ten e-mail jest już używany<br />';
    if ($email != $email_v) $errors .= '- E-maile się nie zgadzają<br />';
    if ($pass != $pass_v)  $errors .= '- Hasła się nie zgadzają<br />';

   
    if ($errors != '') {
        echo '<p class="error">Rejestracja nie powiodła się, popraw następujące błędy:<br />'.$errors.'</p>';
    }

   
    else {

        $pass = user::passSalter($pass);

        mysqli_query($conn, "INSERT INTO users (login, email, pass) VALUES('$login','$email','$pass');") or die ('<p class="error">Wystąpił błąd w zapytaniu i nie udało się zarejestrować użytkownika.</p>');

        echo '<p class="success">'.$login.', zostałeś zarejestrowany.
        <br /><a href="login.php">Logowanie</a></p>';
    }
}
?>

<form method="post" action="">
 <label for="login">Login:</label>
 <input maxlength="32" type="text" name="login" id="login" />

 <label for="pass">Hasło:</label>
 <input maxlength="32" type="password" name="pass" id="pass" />

 <label for="pass_again">Hasło (ponownie):</label>
 <input maxlength="32" type="password" name="pass_v" id="pass_again" />

 <label for="email">Email:</label>
 <input type="text" name="email" maxlength="50" id="email" />

 <label for="email_again">Email (ponownie):</label>
 <input type="text" maxlength="255" name="email_v" id="email_again" /><br />


 <input type="hidden" name="send" value="1" />
 <input type="submit" value="Zarejestruj" />
</form>

<?php
?>
