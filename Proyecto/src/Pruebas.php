<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-q2P7zyhCbHp0He6Nj3A2hZ9JFsqJrNAXW3pIJ8zhm3Z2jmxukv9Umf4Vp0RY1z1J" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-xYxIRF7q4u+bRgN+0EuVWtTH+LVrqfhB3KrS15IHQ6mIRmHn+6a02v8HtMuN5Wj9" crossorigin="anonymous"></script>
    <link href="./css/Pruebas.css" rel="stylesheet" />
    <script src="script.js"></script>
    <title>inicio</title>
</head>
<body>

<nav class="navbar">
    <div class="logo">
      <img src="Proyecto\src\images\logo.png" alt="Logo">
    </div>
    <ul class="nav-links">
      <li><a href="#inicio" class="nav-link active">Inicio</a></li>
      <li><a href="#prevencion" class="nav-link">Prevención de embarazo</a></li>
      <li><a href="#cita" class="nav-link">Cita Médica</a></li>
      <li><a href="#login" class="nav-link">Iniciar sesión</a></li>
      <li><a href="#registro" class="nav-link">Regístrate</a></li>
    </ul>
  </nav>

  <div class="container">
        <div class="logo-container">
            <img src="ruta/a/tu/logo.png" alt="Logo" class="logo">
        </div>
        <div class="form-container">
            <h1>¡Bienvenido!</h1>
            <form action="#">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" placeholder="Ingresa tu Usuario" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" placeholder="Ingresa tu Contraseña" required>
                <button type="submit">Iniciar sesión</button>
            </form>
            <div class="links">
                <a href="#">¿Olvidaste tu contraseña?</a>
                <a href="#">Crear cuenta nueva</a>
            </div>
        </div>
    </div>

  <footer>
    <div class="footer-content">
        <div class="footer-item">
            <img src=".\images\gps.png" alt="Ubicación" class="footer-icon">
            <p>Arenas, 151, Fracc. Playa Ensenada, Ensenada BC, México</p>
        </div>
        <div class="footer-item">
            <img src=".\images\tel.png" alt="Teléfono" class="footer-icon">
            <p>(646) 173 - 4500</p>
        </div>
        <div class="footer-item">
            <img src=".\images\correo.png" alt="Correo" class="footer-icon">
            <p>contacto@hospitalvelmar.com</p>
        </div>
    </div>
  </footer>
  </body>
</html>