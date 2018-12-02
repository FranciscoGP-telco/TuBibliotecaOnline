<?php
  setcookie("login", "", time() - 3600);
  print_r('<div class="addBook tbo-cream w3-padding-large">
  <p>¡Sesión cerrada! ¡Vuelve pronto!</p>
  </div>');
?>