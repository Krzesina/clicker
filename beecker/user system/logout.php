<?php
session_start();


require 'header.php'; 

session_destroy();
$_SESSION = array ();
echo '<p class="success">Zostałeś wylogowany! Możesz przejść na <a href="index.php">stronę główną</a></p>';

require 'footer.php'; 
?>