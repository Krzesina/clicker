<?php
session_start();


require 'header.php'; 
require 'config.php'; 
require_once 'user.class.php';


if (!user::isLogged()) {
    echo '<p class="error">Przykro nam, ale ta strona jest dostępna tylko dla zalogowanych użytkowników.</p>';
}

else {
    $id = $_GET['id'];

  
    $userExist = mysqli_fetch_array(mysqli_query("SELECT COUNT(*) FROM users WHERE id = '$id'"));

  
    if ($userExist[0] == 0) {
        die ('<p>Przykro nam, ale użytkownik o podanym identyfikatorze nie istnieje.</p>');
    }

  
    
   
    $profile = user::getDataById ($id);
    
    echo '<h1>Profil użytkownika '.$profile['login'].'</h1>';

    echo '<b>Nickname:</b> '.$profile['login'].'<br />';
 
}

?>
