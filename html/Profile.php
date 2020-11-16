<link rel="stylesheet" href="../assets/css/home.css">

<div class="container">
    <h1>Perfil de (username)</h1>
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
            <h3>Cambiar contraseña</h3>
        </div>
        <div class="card-body">
            <form action="/changepass" method="post">

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
                    placeholder="Confirmar contraseña" required>
                </div>

                <div class="form-group">
                    <input type="submit" value="Cambiar contraseña" class="btn float-right btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

  <div class="d-flex justify-content-center mt-3 mb-3">

    <form action="/deleteUser" method="POST">
      <input type="submit" value="Borrar cuenta" class="btn btn-danger">  
    </form>
    
  </div>

</div>