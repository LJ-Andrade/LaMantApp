
<div class="collapse" id="collapseIt">  <!-- class .collapse -->
  <div class="bg-inverse p-a">
    <h4>El sitio of the pibes</h4>
    <span class="text-muted">Ya vamo a poné más cosa, me enfalta aprendé algunas cosa má</span>
  </div>
</div>
<nav class="navbar navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseIt">
    ☰
  </button>
  <ul class="nav navbar-nav pull-right">
      <li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>
      <?php
      $user = $_SESSION['user'];
      if($user == jav) {
        echo '<li class="nav-item"><a class="nav-link" href="styletest.php">Test </a></li>';
      }
      if(isset($_SESSION['user'])){
        echo '<li class="nav-item"><a class="nav-link" href="liga.php">Liga</a></li>
        <li class="nav-item"><a class="nav-link" href="equipos.php">Equipos</a></li>
              <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i></a></li>';
      }
      ?>
    </ul>
</nav>
