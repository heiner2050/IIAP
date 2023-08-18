<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="./ui/css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">

        <form id="registration-form" enctype="multipart/form-data">
            <img style="margin: auto;" src="./ui/img/Logo-iiap.png" width="100" alt="IIAP Logo">
            <h1>Formulario de Registro</h1>
            <h4>¡Bienvenido a IIAP! 👋</h4>
            <p>Crea tu cuenta y comienza la aventura</p>
            <div class="form-group">
                <label for="numero_documento">Número de Documento:</label>
                <input type="text" class="form-control" name="numero_documento" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>

            <div class="form-group">
                <label>Sexo:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" value="Masculino" required>
                    <label class="form-check-label">Masculino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexo" value="Femenino" required>
                    <label class="form-check-label">Femenino</label>
                </div>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" name="telefono" required>
            </div>

            <div class="form-group">
                <label for="tipo_vinculacion">Tipo de Vinculación:</label>
                <select class="form-control" name="tipo_vinculacion" required>
                    <option value="Admin">Admin</option>
                    <option value="Jefe_Almacen">Jefe_Almacen</option>
                    <option value="Contratista">Contratista</option>
                    <option value="Soporte_tecnico">Soporte_tecnico</option>
                    <option value="Personal_administra">Personal_administra</option>
                </select>
            </div>

            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" class="form-control" name="correo" required>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" name="contrasena" required>
            </div>

            <div class="form-group">
                <label for="avatar">Avatar:</label>
                <input type="file" class="form-control-file" name="avatar" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-success" style="background-color: green; color: white;">Enviar</button>


        </form>
        <p>
            ¿Ya tienes una cuenta en nuestra plataforma?
            <a class="btn" href="./index.php">Regresar</a>
        </p>

    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <script>
        document.getElementById('registration-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(event.target);

            fetch('./register.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    Swal.fire({
                        icon: data.includes('Envío exitoso') ? 'success' : 'error',
                        title: data.includes('Envío exitoso') ? 'Envío exitoso' : 'Error en el envío',
                        text: data,
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error en el envío',
                        text: 'Hubo un error al enviar el formulario.',
                    });
                });
        });
    </script>
</body>

</html>