<?php
include "./clases/db.clase.php";

$mensaje= '';

if(!empty($_POST['password']) || !empty($_POST['confirm_password'])){
  if($_POST['password'] != $_POST['confirm_password'])
  $mensaje="Las contraseñas deben coincidir";
  else{
    $mail = [$_POST['mail']];
    $verify = (new Db)->verifyMail($mail);
    if($verify)
      $mensaje= 'El correo ya existe';
    else if (!empty($_POST['mail']) && !empty($_POST['password'])) {
      $mensaje = (new Db)->create($_POST['name'],$_POST['last_name'],$_POST['mail'],$_POST['password']);
    }
  }
}

require './partials/header.php'?>
<div class="banner">
  <?php if(!empty($mensaje)):?> 
      <p> <?= $mensaje ?></p>
  <?php endif; ?>    
  <h2>Registrate</h2>
  <span>o <a href="index.php">Inicia sesión</a></span>
  <div class="container__signup">
  <?php require './partials/form_signup.php'?>
  </div>
  <?php require './partials/footer.php'?>
</div>
</body>
</html>