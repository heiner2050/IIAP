<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles y prestamo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/bookings_ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="sidebar">
        <div>
            <h1>Sistema IIAP</h1>
            <hr style="border-top: 1px solid white;">
            <img src="../img/Logo-iiap.png" width="275" alt="Imagen del sistema">
            <hr style="border-top: 1px solid white;">
            <div class="menu">
                <ul class="ulmenu">
                    <li class="limenu"><a href="./bookings_ui.php"><i class="fas fa-th"></i> Catálogo</a></li>
                    <li class="limenu"><a onclick="pretamo()"><i class="fas fa-list"></i> Pendientes</a></li>
                    <li class="limenu"><a  onclick="reserva()" ><i class="fas fa-calendar"></i> Reservaciones</a></li>
                    <li class="limenu"><a href="#" id="updatePassword"><i class="fas fa-key"></i> Configurar contraseña</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="top-bar">
            <i style="color: black;" class="fas fa-search"></i>
            <div class="user-info">
                <img class="avatar" src="" alt="Foto de Usuario">
                <span class="span">Nombre del Usuario</span>
                <i class="fas fa-sign-out-alt" id="logoutBtn"></i>
            </div>
        </div>
        <div class="content">
            <div class="title">
                <h1>SISTEMA IIAP <span>Información de equipos</span></h1>
            </div>
            <div class="divider"></div>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <img id="equipoImagen" src="" width="300" alt="equipo" class="img-fluid mb-4">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color: #E5E8E8;">
                                    <th colspan="2" class="text-center">
                                        <h2>Datos del Equipo</h2>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 30%;">Nombre</th>
                                    <td id="nombreEquipo"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Marca</th>
                                    <td id="marcaEquipo"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Serial</th>
                                    <td id="serialEquipo"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Estado</th>
                                    <td id="estadoEquipo"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Fecha de Mantenimiento</th>
                                    <td id="fechaMantenimientoEquipo"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="page-header text-center">
                            <h1 class="display-4">Realizar <small>reservación</small></h1>
                        </div>
                        <p class="lead text-center">
                            Para realizar una reservación, complete el siguiente formulario.
                        </p>
                        <form id="reservacionForm" method="post">
                            <div class="form-group">
                                <label for="cantidad">Cantidad de equipos que desea reservar (Máximo 3)</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" max="3" required>
                            </div>
                            <input type="hidden" id="usuario_id" name="usuario_id" value="">
                            <input type="hidden" id="equipo_id" name="equipo_id" value="">

                            <div class="form-group">
                                <label for="fecha_solicitud">Fecha de Solicitud:</label>
                                <input type="date" class="form-control" id="fecha_solicitud" name="fecha_solicitud" required>
                            </div>

                            <input type="hidden" id="estado" name="estado" value="Pendiente">

                            <div class="form-group" style="display: none;">
                                <label for="observacion">Observación:</label>
                                <textarea class="form-control" id="observacion" name="observacion"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="fecha_devolucion">Fecha de Devolución:</label>
                                <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion" required>
                            </div>

                            <button type="button" id="reservarBtn" class="btn btn-primary btn-block my-5">Reservar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="footer-text" class="mb-2 mb-md-0">
                ©️
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , Hecho con ❤️ por
                <a target="_blank" class="footer-link fw-bolder">Heiner</a>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script src="../setting/updatePassword.js"></script>
    <script src="../setting/logout.js"></script>
    <script src="./js/bookings_ui.js"></script>
    <script src="./js/detailsAndLoan_ui.js"></script>
    <script src="./js/process_reservation.js"></script>
    <script src="./js/pretamoByUser.js"></script>
</body>

</html>