<?php


$cfg['db_server'] = 'localhost'; 
$cfg['db_user'] = 'root'; 
$cfg['db_pass'] = ''; 
$cfg['db_name'] = 'users'; 



$conn = @mysql_connect ($cfg['db_server'], $cfg['db_user'], $cfg['db_pass']);
$select = @mysql_select_db ($cfg['db_name'], $conn);

if (!$conn) {
    die ('<p class="error">Nie udało się połączyć z bazą danych.</p>');
}

if (!$select) {
    die ('<p class="error">Nie udało się wybrać bazy danych.</p>');
}
       
?>
