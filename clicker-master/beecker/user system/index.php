<?php
session_start();


require 'header.php';
require 'config.php';
require_once 'user.class.php';
?>


<?php
if (user::isLogged()) {
   
    
   
    $user = user::getData('', '');
    
    echo '<p>Jesteś zalogowany, witaj '.$user['login'].'!</p>';
    
}

else {
    
    echo '<p>Nie jesteś zalogowany.<br /><a href="login.php">Zaloguj</a> się lub <a href="register.php">zarejestruj</a> jeśli jeszcze nie masz konta.</p>';
}

?>
