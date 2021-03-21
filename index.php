<?php
session_start();
include "./clases/db.clase.php";

if (!empty($_POST['mail']) && !empty($_POST['password'])) {
    $mail = [[$_POST['mail']]];
    
    $verify= (new Db)->verifyMail($mail[0]);
    if($verify){
        $result= (new Db)->loguin($_POST['mail']);
        if(count($result)>0 && password_verify($_POST['password'], $result['password'])){ 
            $_SESSION['id'] = $result['id'];
            header('Location: profile.php');
        }else{
            $mensaje='Contraseña incorrecta';
        }
    // $mensaje= '';
    }else
    $mensaje='Correo no existe';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>PHP Loguin</title>
</head>
<body>
<?php require './partials/header.php'?>

<?php if(!empty($mensaje)):?> 
        <p> <?= $mensaje ?></p>
    <?php endif; ?>
    <div class="banner">
        <h2>Inicia Sesión</h2>
        <span>o <a href="signup.php">Registrate</a></span>
        <div class="container__loguin">
        <?php require './partials/form_loguin.php'?>
        </div>
    </div>
    <?php require './partials/footer.php'?>
</body>
</html>