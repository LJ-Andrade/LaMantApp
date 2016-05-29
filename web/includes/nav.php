<div class="collapse" id="collapseIt">  <!-- class .collapse -->
  <div class="bg-inverse p-a">
    <h4>El sitio of the pibes</h4>
    <span class="text-muted">Ya vamo a poné más cosa, me enfalta aprendé algunas cosa má</span>
  </div>
</div>
<nav class="navbar navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseIt">☰</button>
  <span class="brand"><?php echo APP_TITLE; ?></span>
  <ul class="nav navbar-nav pull-xs-right">
    <li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>
    <?php
    if (!isset($_SESSION['app_id'])) {
      echo '<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#Login">INICIAR SESIÓN</a></li>
      <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#Registro">REGISTRO</a></li>';
    }
    else {
      if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 2) {
          echo '<li class="nav-item"><a class="nav-link" href="?view=links&?link=administrar">ADMINISTRAR</a></li>';
      }
      echo '<li class="nav-item"><a class="nav-link" href="?view=perfil&id='.$_SESSION['app_id'].'">'. strtoupper($_users[$_SESSION['app_id']]['user']) .'</a></li>
      <li class="nav-item"><a class="nav-link" href="?view=logout"><i class="fa fa-power-off"></i>
</a></li>';
    }
    // <li class="nav-item"><a class="nav-link" href="?view=cuenta">CUENTA</a></li>
     ?>
  </ul>
</nav>

<?php include(WEB_DIR . 'public/login.html');
include(WEB_DIR . 'public/lostpass.html');
include(WEB_DIR . 'public/reg.html');
?>
