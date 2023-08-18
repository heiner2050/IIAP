<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soporte tecnico</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="../css/technical_support.css">
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
          <li class="limenu"><a href="#" id="updatePassword"><i class="fas fa-key"></i> Configurar contraseña</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="top-bar">
      <i id="search" style="color: black;" class="fas fa-search"></i>
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
      <div class="divider"></div>
      <h1>Equipos para Mantenimiento</h1>
      <p>Cantidad de equipos que necesitan mantenimiento: <span id="cantidadEquipos"></span></p>
      <div class="card-deck">
        <!-- Cards will be added here -->
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
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
  <script src="../setting/updatePassword.js"></script>
  <script src="../setting/logout.js"></script>
  <script src="./js/technical_ui.js"></script>
</body>

</html>