<form method="POST" action="login.php">
  username: <input type="text" name="user"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="login">
</form>
<?php
  require_once('php_includers/db_connection.php');
  if(isset($_COOKIE['login'])){
  } else {
    $checkUser = DB::validateUser($_POST["user"], $_POST["password"]);
    if ($checkUser) {
      setcookie("login", $_POST["user"].','.md5($_POST["password"]));
    } else {
      print_r("Login incorrecto.");
    }
  }
?>