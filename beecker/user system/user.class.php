<?php


class user {

    public static $user = array();
    
    
    public function getData ($login, $pass) {
        if ($login == '') $login = $_SESSION['login'];
        if ($pass == '') $pass = $_SESSION['pass'];

        self::$user = mysqli_fetch_array(mysqli_query("SELECT * FROM users WHERE login='$login' AND pass='$pass' LIMIT 1;"));
        return self::$user;
    }

    
  
    public function getDataById ($id) {
        $user = mysqli_fetch_array(mysqli_query("SELECT * FROM users WHERE id='$id' LIMIT 1;"));
        return $user;
    }

   
    public function isLogged () {
     if (empty($_SESSION['login']) || empty($_SESSION['pass'])) {
      return false;
     }

     else {
      return true;
     }
    }


    public function passSalter ($pass) {
        $pass = '$@@#$#@$'.$pass.'q2#$3$%##@';
        return md5($pass);
    }

}
