<?php


$cfg['db_server'] = 'localhost'; 
$cfg['db_user'] = 'root'; 
$cfg['db_pass'] = ''; 
$cfg['db_name'] = 'users'; 



$conn = mysqli_connect ($cfg['db_server'], $cfg['db_user'], $cfg['db_pass'], $cfg['db_name']);

if (!$conn) {
    die ('<p class="error">Nie udało się połączyć z bazą danych.</p>');
}
       
?>
