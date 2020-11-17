<?php

    session_start();

    if(count($_POST) > 0) {
        // Validaciones
        $email = $_POST['email'];
        $password = $_POST['password'];


        $res = getUser($email);

        if (mysqli_num_rows($res) == 1) {
            $_SESSION['loged'] = true;
            $fila = mysqli_fetch_assoc($res);
            $_SESSION['name'] = $fila['name'];
            header('Location: Home.php');
            exit;
        }
    }

?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Dirección de Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingrese email">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </form>
        </div>
    </div>
</div>