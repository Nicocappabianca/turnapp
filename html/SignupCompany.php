<section id="signup">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <form action="registrar-empresa" method="post">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" placeholder="Ingrese nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">Dirección de Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingrese email">
                    </div>
                    <span class="signup-error mb-2 <?= $this->mail_in_use == true ? 'd-block' : 'd-none' ?>">El email ya esta en uso.</span>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmar contraseña.</label>
                        <input type="password" class="form-control" name="confirm-password" placeholder="Contraseña">
                    </div>
                    <span class="signup-error mb-2 <?= $this->password_wrong == true ? 'd-block' : 'd-none' ?>">Las contraseñas no coinciden.</span>
                    <div class="form-group">
                        <label for="surname">Descripción</label>
                        <input type="text-area" class="form-control" name="description" placeholder="Ingrese descripción">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" name="address" placeholder="Ingrese dirección">
                    </div>
                    <div class="form-group">
                        <label for="url_image">URL de la imagen</label>
                        <input type="text" class="form-control" name="url_image" placeholder="Ingrese URL de la imagen">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-3">Registrarse</button>
                    </div>
                </form>
                <div class="d-flex justify-content-center mt-2">
                    <a class="link" href="iniciar-sesion">Volver</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    #signup { 
        padding-top: 60px; 
        padding-bottom: 40px; 
        min-height: calc(100vh - 108.91px);
        width: 100%; 
    }
    #signup .btn { 
        width: 200px; 
    }
    .signup-error { 
        color: #FF0000; 
        font-size: 12px; 
        font-weight: 600; 
    }
</style>