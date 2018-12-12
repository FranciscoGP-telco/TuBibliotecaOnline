<?php
  //Login page
  require_once('php_includers/db_connection.php');
  print_r('<div class="addBook tbo-cream w3-padding-large">');
  //Cheking if the user is logged
  if(isset($_COOKIE['login'])){
    $user = $_COOKIE['login'];
    print_r('Usuario '.$user.' ya logueado. <a href="index">volver al inicio</a>');
  } else {
    //cheking if the user info is correct
    if(isset($_POST["user"])){
      $checkUser = DB::validateUser($_POST["user"], $_POST["password"]);
      if ($checkUser) {
        setcookie("login", $_POST["user"]);
        setcookie("pass", md5($_POST["password"]));
        print_r('Usuario ya logueado. <a href="index.php">volver al inicio</a>');
      } else {
        print_r("Login incorrecto. Vuelve a intentarlo pulsando <a href='login.php'>aquí</a>");
      }
    } else {
      print_r('<div class="addBook tbo-cream w3-padding-large">
      <p>Si no estas registrado puedes hacerlo pulsando <a href="checkin.php">aquí</a></p>
      <form method="POST" action="login.php">
        <p><label for="user">Nombre de usuario:</label>
        <input type="text" name="user" id="user"></p>
        <p><label for="password">Contraseña de usuario:</label>
        <input type="password" name="password"></p>
        <input type="submit" value="login">
      </form>');
    }
  }
print_r('</div>');
?>
