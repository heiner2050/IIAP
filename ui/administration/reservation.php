<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservaciones</title>
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
        <li class="limenu"><a href="./administration_ui.php"><i class="fas fa-home"></i> Inicio</a></li>
        <li class="limenu"><a href="./devoluction.php"><i class="far fa-calendar"></i> Devoluciones</a></li>
        <li class="limenu"><a href="./reservation.php"><i class="far fa-calendar"></i> Reservaciones</a></li>
        <li class="limenu"><a href="./prestamation.php"><i class="far fa-calendar"></i> Prestamos</a></li>
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
                <h1>SISTEMA IIAP <span>préstamos y reservaciones</span></h1>
            </div>
            <div class="divider"></div>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="container-fluid">
                        <ul class="nav nav-tabs nav-justified" style="font-size: 17px;">
                            <li style="border-top-left-radius: 10px;">
                                <a href="./prestamation.php" style="text-decoration: none; color: #333; padding: 10px 20px; display: block; background-color: #f7f7f7; border: 1px solid #ddd; border-bottom: none;">Todos los préstamos</a>
                            </li>
                            <li style="border-top-right-radius: 10px;">
                                <a href="./devoluction.php" style="text-decoration: none; color: #333; padding: 10px 20px; display: block; background-color: #f7f7f7; border: 1px solid #ddd; border-bottom: none;">Devoluciones pendientes</a>
                            </li>
                            <li class="active" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                <a href="./reservation.php" style="text-decoration: none; color: #fff; padding: 10px 20px; display: block; background-color: #007bff; border: 1px solid #007bff;">Reservaciones</a>
                            </li>
                            <!-- Add more options here with similar <li> elements -->
                        </ul>
                    </div>
                    <div class="container-fluid" style="margin: 50px 0;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <img src="../../avatar/calendar.png" alt="clock" class="img-responsive center-box mCS_img_loaded" style="max-width: 110px;">
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                                Bienvenido a esta sección, aquí se muestran las reservaciones de equipos hechas por los contratista y personal administrativo, las cuales están pendientes para ser aprobadas por ti
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <h2 class="text-center all-tittles">Listado de reservaciones</h2>
                        <div class="table-container">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Responsable</th>
                                        <th>Documento</th>
                                        <th>Tipo</th>
                                        <th>Nombre Equipo</th>
                                        <th>F. Solicitud</th>
                                        <th>F. Entrega</th>
                                        <th>Estado</th>
                                        <th>Cantidad</th>
                                        <th>Aprobar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../../conexion.php';
                                    $sql = "SELECT r.id_reservacion, e.serial AS serial, ro.nombre AS rol, r.estado, r.observacion, r.Cantidad, r.fecha_solicitud, r.fecha_devolucion, u.numero_documento AS documento, u.nombre AS nombre_usuario, e.nombre AS nombre_equipo, r.fecha_solicitud, r.estado, r.observacion, r.Cantidad, r.fecha_devolucion
                                            FROM reservaciones AS r
                                            INNER JOIN equipos AS e ON r.equipo_id = e.id_equipo
                                            INNER JOIN usuarios AS u ON r.usuario_id = u.id_usuario
                                            JOIN usuarios_rol ur ON u.id_usuario = ur.id_usuario
                                            JOIN roles ro ON ur.id_roles = ro.id_roles";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["serial"] . "</td>";
                                            echo "<td>" . $row["nombre_usuario"] . "</td>";
                                            echo "<td>" . $row["documento"] . "</td>";
                                            echo "<td>" . $row["rol"] . "</td>";
                                            echo "<td>" . $row["nombre_equipo"] . "</td>";
                                            echo "<td>" . $row["fecha_solicitud"] . "</td>";
                                            echo "<td>" . $row["fecha_devolucion"] . "</td>";
                                            echo "<td>" . $row["estado"] . "</td>";
                                            echo "<td>" . $row["Cantidad"] . "</td>";
                                            echo "<td>
                                            <button onclick='approveReservation(" . $row["id_reservacion"] . ", \"" . $row["nombre_usuario"] . "\")' class='btn btn-success'>
                                                <i class='fas fa-check-circle'></i>
                                            </button>
                                          </td>";
                                            echo "<td>
                                                <button onclick='confirmarEliminacion(" . $row["id_reservacion"] . ")' class='btn btn-danger'>
                                                <i class='fas fa-times-circle'></i>
                                                </button>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='9'>No hay reservaciones encontradas para este usuario.</td></tr>";
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
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
            <script src="./js/administration_ui.js"></script>
            <Script>
                function confirmarEliminacion(id) {
                    Swal.fire({
                        title: '¿Quieres eliminar la reservación?',
                        text: "La reservación se eliminara de forma permanente",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'http://localhost/IIAP/api/administration/reservationsDelete.php?eliminar_id=' + id;
                        }
                    });
                }

                function approveReservation(id, responsable) {
                    Swal.fire({
                        title: '¿Quieres aprobar la reservación?',
                        text: `La reservación se aprobará a ${responsable} quien la solicita`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#308d30',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, aprobar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'http://localhost/IIAP/api/administration/reservationsApprove.php?id=' + id;
                        }
                    });
                }
            </Script>
</body>

</html>