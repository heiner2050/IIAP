<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
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
                    <li class="limenu"><a  onclick="pretamo()"><i class="fas fa-list"></i> Pendientes</a></li>
                    <li class="limenu"><a onclick="reserva()"><i class="fas fa-calendar"></i> Reservaciones</a></li>
                    <li class="limenu"><a href="#" id="updatePassword"><i class="fas fa-key"></i> Configurar contraseña</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="top-bar">
            <i id="search" class="fas fa-search" onclick="mostrarAlerta()"></i>
            <div class="user-info">
                <img class="avatar" src="" alt="Foto de Usuario">
                <span class="span">Nombre del Usuario</span>
                <i class="fas fa-sign-out-alt" id="logoutBtn"></i>
            </div>
        </div>
        <div class="content">
            <div class="title">
                <h1>SISTEMA IIAP <span>Catálogo de equipos</span></h1>
            </div>
            <div class="my-5"> <!-- Espaciado hacia arriba y hacia abajo -->
                    <p>Bienvenido a la sección de reservaciones, puedes ver las reservaciones que no han sido aprobadas o pulsa el botón "Eliminar" para cancelar las reservaciones si lo deseas.</p>
                </div>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Nombre equipo</th>
                            <th>Fecha Solicitud</th>
                            <th>Fecha Devolución</th>
                            <th>Estado</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../../conexion.php';

                        // Obtén el usuario_id desde la consulta GET
                        $usuario_id = $_GET['usuario_id'];

                        // Consulta SQL para obtener los registros de reservaciones para un usuario específico
                        $sql = "SELECT r.id_reservacion, e.serial AS serial, u.nombre AS nombre_usuario, e.nombre AS nombre_equipo, r.fecha_solicitud, r.estado, r.observacion, r.Cantidad, r.fecha_devolucion 
            FROM reservaciones AS r
            INNER JOIN usuarios AS u ON r.usuario_id = u.id_usuario
            INNER JOIN equipos AS e ON r.equipo_id = e.id_equipo
            WHERE r.usuario_id = $usuario_id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["serial"] . "</td>";
                                echo "<td>" . $row["nombre_equipo"] . "</td>";
                                echo "<td>" . $row["fecha_solicitud"] . "</td>";
                                echo "<td>" . $row["fecha_devolucion"] . "</td>";
                                echo "<td>" . $row["estado"] . "</td>";
                                echo "<td>" . $row["Cantidad"] . "</td>";
                                echo "<td><a class='btn btn-danger' href='#' onclick='confirmarEliminacion(" . $row["id_reservacion"] . ")'>Eliminar</a></td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No hay reservaciones encontradas para este usuario.</td></tr>";
                        }

                        // Cierra la conexión
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="footer-text" class="mb-2 mb-md-0">
                ©️ <script>
                    document.write(new Date().getFullYear());
                </script>, Hecho con ❤️ por
                <a target="_blank" class="footer-link fw-bolder">Heiner</a>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script src="../setting/updatePassword.js"></script>
    <script src="../setting/logout.js"></script>
    <script src="./js/bookings_ui.js"></script>
    <script src="./js/equipment-list.js"></script>
    <script src="./js/searchEquipment.js"></script>
    <script src="./js/process_reservation.js"></script>
    <script src="./js/pretamoByUser.js"></script>
    <Script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción eliminará la reservación. ¡No podrás deshacerla!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'http://localhost/IIAP/api/bookings/reservationsDelete.php?eliminar_id=' + id;
                }
            });
        }
    </Script>
</body>

</html>