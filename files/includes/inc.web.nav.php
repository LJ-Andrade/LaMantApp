<?php

// To echo class 'active' in links
$url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$parts = parse_url($url);
$str = $parts['scheme'].'://'.$parts['host'].$parts['path'];
$currentPage = basename($str);

?>
<div class="collapse" id="collapseIt">  <!-- class .collapse -->
  <div class="topColNav p-a">
    <h4>El sitio of the pibes</h4>
    <li class="nav-item"><a class="nav-link" href="styletest.php">Ah Reloco </a></li>
  </div>
</div>
<nav class="navbar navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseIt">
    ☰
  </button>
  <ul class="nav navbar-nav pull-right">
    <?php
    $user = $_SESSION['user'];
    ?>
    <li class="nav-item active"><a class="nav-link" href="index.php"><?php echo strtoupper($_SESSION['user']); ?> &nbsp;|</a></li>
    <li class="nav-item <?php echo $currentPage == 'index.php' ? 'active' : ''; ?>"><a class="nav-link" href="index.php">Inicio</a></li>

    <?php
      if(isset($_SESSION['user'])){

      ?>
        <li class="nav-item <?php echo $currentPage == 'liga.php' ? 'active' : ''; ?>"><a class="nav-link" href="liga.php">Liga</a></li>
        <li class="nav-item <?php echo $currentPage == 'ligas_anteriores.php' ? 'active' : ''; ?>"><a class="nav-link" href="ligas_anteriores.php">Ligas Anteriores</a></li>
        <li class="nav-item <?php echo $currentPage == 'equipos.php' ? 'active' : ''; ?>"><a class="nav-link" href="equipos.php">Equipos</a></li>';
      <?php
      }
      ?>
      <?php
      if($user == jav) { ?>
      <li class="nav-item <?php echo $currentPage == 'admin-panel.php' ? 'active' : ''; ?>"><a class="nav-link" href="admin-panel.php">Admin </a></li>
      <?php
      }
      if(isset($_SESSION['user'])){
      ?>
      <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i></a></li>
      <?php } ?>
  </ul>
</nav>
