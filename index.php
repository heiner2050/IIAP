<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="./ui/css/login.css">
</head>
<body>
  <div class="container">
    <div class="logo">
      <a href="index.html">
        <img src="./ui/img/Logo-iiap.png" width="100" alt="IIAP Logo">
      </a>
    </div>
    <div class="content">
      <h1>Iniciar sesión</h1>
      <h4>¡Bienvenido a IIAP! 👋</h4>
      <p>Inicia sesión en tu cuenta y comienza la aventura</p>
      <form id="loginForm">
        <label for="gmail">Gmail:</label>
        <input type="email" id="gmail" name="gmail" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        
        <div class="remember-me">
          <input type="checkbox" id="remember-me" />
          <label for="remember-me">Recuérdame</label>
        </div>
        
        <input type="submit" value="Iniciar sesión">
      </form>
      
      <p>
        ¿Es nuevo en nuestra plataforma?
        <a href="./register_ui.php">Crear una cuenta</a>
      </p>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
  <script src="./ui/setting/login.js"></script>
<script>
 
</script>

</body>
</html>
