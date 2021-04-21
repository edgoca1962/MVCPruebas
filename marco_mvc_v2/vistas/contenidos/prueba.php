<?php  ?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7a591c4a95.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="vistas/js/Ajax.js"></script>

    <title>Prueba Ajax</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="row justify-content-md-center align-items-center">
            <div class="card text-white bg-dark mb-3" style="width: 18rem;">
                <div class="card-header">
                    Registro
                </div>
                <div class="card-body" id="f_ingreso">
                    <form class="form-signin" id="form_ingreso">
                        <div class="text-center mb-4">
                            <div class="form-label-group">
                                <input type="email" id="correo" name="correo" class="form-control" placeholder="correo@email.com" required="" autofocus="">
                                <label for="inputEmail">Correo</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required="">
                                <label for="inputPassword">Contraseña</label>
                            </div>

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Recordarme
                                </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
                            <!-- <i class="fa fa-refresh fa-spin"></i> -->
                    </form>
                    <span></span>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>