<form action="signup.php" method="POST">
    <label for="name">Nombre</label> 
    <input class="form__input" type="text" name="name" placeholder="Ingrese su nombre" required>
    <label for="last_name">Apellido</label> 
    <input class="form__input" type="last_name" name="last_name" placeholder="Ingrese su apellido" required>
    <label for="mail">Mail</label> 
    <input class="form__input" type="mail" name="mail" placeholder="nombre@mail.com" required>
    <label for="password">Contraseña </label>
    <input class="form__input" type="password" name ="password" placeholder="ingrese su contraseña" required>
    <label for="confirm_password">Confirma tu contraseña </label>
    <input class="form__input" type="password" name ="confirm_password" placeholder="ingrese su contraseña" required>
    <input type="submit" value="Ingresar" class="btn">
</form>