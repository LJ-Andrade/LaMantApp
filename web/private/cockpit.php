<!DOCTYPE html>
<html lang="es">
  <?php include(WEB_DIR . 'includes/head.php'); ?>
  <body>
    <?php include(WEB_DIR . 'includes/nav.php'); ?>
    <div class="container mainContainer">
      <div class="row">
        <h4>Panel de Administración</h4>
        <h5>Administrador activo: <?php echo strtoupper($_users[$_SESSION['app_id']]['user']); ?></h5>
        <?php
        if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 2) {
          echo '<div class="container teams">
          <h5>Usuarios Registrados</h5>
            <div class="col-md-12 listTitles">
              <div class="col-md-1">Id</div>
              <div class="col-md-3">User</div>
              <div class="col-md-3">Email</div>
              <div class="col-md-1">Permisos</div>
              <div class="col-md-3">Registrado el</div>
            </div>';


            $db = new Conexion();
            $resultConsulta = $db->query("SELECT * FROM users;");

            while ($mostrarDatos = $resultConsulta->fetch_array(MYSQLI_BOTH))
            {
            echo'<div class="col-md-12 listTeams">
                 <div class="col-md-1">'.$mostrarDatos['id'].'</div>
                 <div class="col-md-3">'.$mostrarDatos['user'].'</div>
                 <div class="col-md-3">'.$mostrarDatos['email'].'</div>
                 <div class="col-md-1">'.$mostrarDatos['permisos'].'</div>
                 <div class="col-md-3">'.$mostrarDatos['fecha_reg'].'</div>
                 </div>';
            }
          }




          ?>
        </table>
      </div>
      </div>
    </div>








    <?php include(WEB_DIR . 'includes/footer.php'); ?>
    <?php include(WEB_DIR . 'includes/scripts.php'); ?>
  </body>
</html>
