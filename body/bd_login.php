<?php
  require_once('php_includers/db_connection.php');
  print_r('<div class="addBook tbo-cream w3-padding-large">');
  if(isset($_COOKIE['login'])){
    $cookieSplit = explode(",", $_COOKIE["login"]);
    print_r('Usuario '.$cookieSplit[0].' ya logueado. <a href="index">volver al inicio</a>');
  } else {
    if(isset($_POST["user"])){
      $checkUser = DB::validateUser($_POST["user"], $_POST["password"]);
      if ($checkUser) {
        setcookie("login", $_POST["user"].','.md5($_POST["password"]));
        print_r('Usuario ya logueado. <a href="index">volver al inicio</a>');
      } else {
        print_r("Login incorrecto.");
      }
    } else {
      print_r('<div class="addBook tbo-cream w3-padding-large">
      <form method="POST" action="login.php">
        username: <input type="text" name="user"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="login">
      </form>');
    }
  }
print_r('</div>');
?>
