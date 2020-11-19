<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <form action="../controllers/Login.php" method="post">
                    <div class="form-group">
                        <label for="email">Dirección de Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingrese email">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    </div>
                    <span class="login-error mb-2 <?= $this->failed_login == true ? 'd-block' : 'd-none' ?>">Por favor, verifique su nombre de usuario y contraseña.</span>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-3">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    #login { 
        padding-top: 60px; 
        min-height: calc(100vh - 108.91px);
        width: 100%; 
    }
    #login .btn { 
        width: 200px; 
    }
    .login-error { 
        color: #FF0000; 
        font-size: 12px; 
        font-weight: 600; 
    }
</style>