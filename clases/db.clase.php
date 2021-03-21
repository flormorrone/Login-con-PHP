<?php

class Db{
   private  $servername = "localhost";
   private  $username = "root";
   private  $password = "123456789";
    
   //CONEXION
   protected function conexion(){
    try {
        $conn = new PDO("mysql:host=$this->servername;dbname=php_loguin", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
   }

   //LOGUIN
   public function loguin($mail){
    $sql= "SELECT id, mail, password from user WHERE mail=:mail";
    $record = $this->conexion()->prepare($sql);
    $record->bindParam(':mail', $mail);
    $record->execute();
    $result = $record->fetch(PDO::FETCH_ASSOC);
    return $result;
   }

   //REGISTRO
   public function create($name,$lastName,$mail,$pass){
    $sql = "INSERT INTO user (name, last_name, mail, password) VALUES (:name, :last_name, :mail, :password)";
    $stmt = $this->conexion()->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':mail', $mail);
    $password = password_hash($pass, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
      $mensaje = 'Usuario creado exitosamente';
    } else {
      $mensaje = 'Oops! hubo un error al crear usuario';
    }
    return $mensaje;
   }

   //VERIFICA SI EL MAIL EXISTE
   public function verifyMail($inputMail){
    $sql = 'SELECT mail FROM user WHERE mail =?';
    $record = $this->conexion()->prepare($sql);
    $record->execute($inputMail);
    $foundMail= $record->fetch();
    if($foundMail) return true;
    else return false;
  }
}