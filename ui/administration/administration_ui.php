<?php

require_once '../../conexion.php';

$query = "SELECT
    (SELECT COUNT(*) FROM roles WHERE nombre = 'Admin') AS cantidad_admin,
    (SELECT COUNT(*) FROM roles WHERE nombre = 'Jefe_Almacen') AS cantidad_jefe_almacen,
    (SELECT COUNT(*) FROM roles WHERE nombre = 'Contratista') AS cantidad_contratista,
    (SELECT COUNT(*) FROM roles WHERE nombre = 'Soporte_tecnico') AS cantidad_soporte_tecnico,
    (SELECT COUNT(*) FROM roles WHERE nombre = 'Personal_administrativo') AS cantidad_personal_administrativo,
    (SELECT COUNT(*) FROM equipos) AS cantidad_equipos,
    (SELECT COUNT(*) FROM reservaciones) AS cantidad_reservaciones,
    (SELECT COUNT(*) FROM prestamos) AS cantidad_prestamos,
    (SELECT COUNT(*) FROM devoluciones) AS cantidad_devoluciones,
    (SELECT COUNT(*) FROM categoria) AS cantidad_categorias,
    (SELECT COUNT(*) FROM sesiones) AS cantidad_sesiones";

$result = $conn->query($query);

if (!$result) {
  die("Error en la consulta: " . $conn->error);
}

// Extrae los resultados en un arreglo asociativo
$row = $result->fetch_assoc();

// Cierra la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administración</title>
  <link rel="stylesheet" href="../css/administration.ui.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
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
      <i id="search" class="fas fa-search" onclick="mostrarAlerta()"></i>
      <div class="user-info">
        <img class="avatar" src="" alt="Foto de Usuario">
        <span class="span">Nombre del Usuario</span>
        <i class="fas fa-sign-out-alt" id="logoutBtn"></i>
      </div>
    </div>

    <div class="title">
      <h1>SISTEMA IIAP <span>Inicio</span></h1>
    </div>
    <div class="divider"></div>
    <div class="init-card">
      <div class="card-deck">
        <div class="card">
          <div class="card-body">
            <i class="fas fa-user-cog"></i>
            <div>
              <h5 class="card-title">Administradores</h5>
              <p class="card-text"><?php echo $row['cantidad_admin']; ?></p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <i class="fas fa-store"></i>
            <div>
              <h5 class="card-title">Jefe de Almacén</h5>
              <p class="card-text"><?php echo $row['cantidad_jefe_almacen']; ?></p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <i class="fas fa-user-tie"></i>
            <div>
              <h5 class="card-title">Contratista</h5>
              <p class="card-text"><?php echo $row['cantidad_contratista']; ?></p>
            </div>
          </div>
        </div>

        <!-- Repite el bloque para cada tarjeta -->
      </div>

      <div class="card-deck">
        <div class="card">
          <div class="card-body">
            <i class="fas fa-tools"></i>
            <div>
              <h5 class="card-title">Soporte Técnico</h5>
              <p class="card-text"><?php echo $row['cantidad_soporte_tecnico']; ?></p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <i class="fas fa-users"></i>
            <div>
              <h5 class="card-title">Personal Administrativo</h5>
              <p class="card-text"><?php echo $row['cantidad_personal_administrativo']; ?></p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <i class="fas fa-server"></i>
            <div>
              <h5 class="card-title">Equipos</h5>
              <p class="card-text"><?php echo $row['cantidad_equipos']; ?></p>
            </div>
          </div>
        </div>


        <!-- Repite el bloque para cada tarjeta -->
      </div>

      <div class="card-deck">
        <div class="card">
          <div class="card-body">
            <a href="./reservation.php">
              <i class="fas fa-calendar-check"></i>
              <div>
                <h5 class="card-title">Reservaciones</h5>
                <p class="card-text"><?php echo $row['cantidad_reservaciones']; ?></p>
              </div>
            </a>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
          <a href="./prestamation.php">
            <i class="fas fa-money-bill icon-zoom"></i>
            <div>
              <h5 class="card-title">Préstamos</h5>
              <p class="card-text"><?php echo $row['cantidad_prestamos']; ?></p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
          <a href="./devoluction.php">
            <i class="fas fa-undo"></i>
            <div>
              <h5 class="card-title">Devoluciones</h5>
              <p class="card-text"><?php echo $row['cantidad_devoluciones']; ?></p>
            </div>
          </div>
        </div>

        <!-- Repite el bloque para cada tarjeta -->
      </div>
      <div class="card-deck">
        <div class="card">
          <div class="card-body">
            <i class="fas fa-briefcase"></i>
            <div>
              <h5 class="card-title">Categorías</h5>
              <p class="card-text"><?php echo $row['cantidad_categorias']; ?></p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <i class="fas fa-clock"></i>
            <div>
              <h5 class="card-title">Sesiones</h5>
              <p class="card-text"><?php echo $row['cantidad_sesiones']; ?></p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <i class="fas fa-chart-bar"></i>
            <div>
              <h5 class="card-title">Reportes y Estadísticas</h5>
            </div>
          </div>
        </div>

        <!-- Repite el bloque para cada tarjeta -->
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
    <div>

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
      <script src="../setting/updatePassword.js"></script>
      <script src="../setting/logout.js"></script>
      <script src="./js/administration_ui.js"></script>
      <script>
        window.onload = function() {
          Swal.fire({
            icon: 'info',
            title: '¡Importante!',
            html: 'Bienvenido <span class="bold-text">SuperAdministrador</span>. Hay devoluciones pendientes o reservaciones por aprobar.',
          });
        };
      </script>

</body>

</html>