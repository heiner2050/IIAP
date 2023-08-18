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
          <li class="limenu"><a onclick="pretamo()"><i class="fas fa-list"></i> Pendientes</a></li>
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
      <div class="divider"></div>
      <div class="welcome-text">
        <img class="avatar" src="../img/equipo.png" alt="Foto de Equipo">
        <p>Bienvenido al catálogo, selecciona una categoría de la lista para empezar. Si deseas buscar un equipo por nombre, marca o serial, haz clic en el icono <i class="fas fa-search"></i> que se encuentra en la barra superior.</p>
      </div>
      <div class="category">
        <h2>Categorías</h2>
        <ul class="category-list">
          <li><a onmouseover="cambiarColor(this, 'darkgreen')" onmouseout="cambiarColor(this, 'initial')" onclick="cargarEquiposPorCategoria(1)">Computadoras y portátiles</a></li>
          <li><a onmouseover="cambiarColor(this, 'darkgreen')" onmouseout="cambiarColor(this, 'initial')" onclick="cargarEquiposPorCategoria(2)">Impresoras y escáneres</a></li>
          <li><a onmouseover="cambiarColor(this, 'darkgreen')" onmouseout="cambiarColor(this, 'initial')" onclick="cargarEquiposPorCategoria(3)">Mobiliario de oficina</a></li>
          <li><a onmouseover="cambiarColor(this, 'darkgreen')" onmouseout="cambiarColor(this, 'initial')" onclick="cargarEquiposPorCategoria(4)">Equipo de comunicación</a></li>
        </ul>
      </div>



      <div class="selected-category">
        <div id="equipment-list" class="card-container my-5">
          <!-- Lista de equipos se mostrará aquí -->
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
  <script src="./js/bookings_ui.js"></script>
  <script src="./js/equipment-list.js"></script>
  <script src="./js/searchEquipment.js"></script>
  <script src="./js/reservationsByUser.js"></script>
  <script src="./js/pretamoByUser.js"></script>
</body>

</html>