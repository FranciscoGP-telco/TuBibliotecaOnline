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
        setcookie("login", $_POST["user"]);
        setcookie("pass", md5($_POST["password"]));
        print_r('Usuario ya logueado. <a href="index.php">volver al inicio</a>');
      } else {
        print_r("Login incorrecto.");
      }
    } else {
      print_r('<div class="addBook tbo-cream w3-padding-large">
      <p>Si no estas registrado puedes hacerlo pulsando <a href="checkin.php">aquí</a></p>
      <form method="POST" action="login.php">
        <p><label for="user">Nombre de u  suario:</label>
        <input type="text" name="user" id="user"></p>
        <p><label for="password">Contraseña de usuario:</label>
        <input type="password" name="password"></p>
        <input type="submit" value="login">
      </form>');
    }
  }
print_r('</div>');
?>
