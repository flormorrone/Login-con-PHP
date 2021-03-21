<?php
session_start();
require 'database.php';

if(isset($_SESSION['id'])){
    $records = $conn->prepare('SELECT * FROM user WHERE id=:id');
    $records->bindParam(':id', $_SESSION['id']);
    $records->execute();
    $result= $records->fetch(PDO::FETCH_ASSOC);
    $user=null;
    if($result>0){
        $user = $result;
    }
}

require './partials/header.php'?>
<div class="banner">
    <?php if(!empty($user)): ?>
        <div class="pro">
            <h1>Bienvenid@!</h1>
            <h3><?= $user['name']. ' '. $user['last_name'] ?></h3>
            <h4>Esta es tu pagina de loguin</h4>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    <?php endif?>
</div>
<?php require './partials/footer.php'?>
</body>
</html>

