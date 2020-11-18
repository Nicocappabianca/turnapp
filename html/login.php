<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="../controllers/Login.php?email=<?=$email?>&password=<?=$password?>" method="post">
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