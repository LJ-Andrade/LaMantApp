<?php include(WEB_DIR . 'includes/head.php'); ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php include(WEB_DIR . 'includes/nav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">

  <?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>Completado!</strong> la categoría ha sido creada.
    </div>';
  }

  if(isset($_GET['error'])) {
    echo '<div class="alert alert-dismissible alert-danger">
      <strong>Error!</strong></strong> el nombre de la categoría no puede estar vacío.
    </div>';
  }
  ?>

<div class="row container">
   <div class="pull-right">
     <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
          <a class="mbr-buttons__btn btn btn-danger" href="?view=configforos">GESTIONAR FOROS</a>
      </li></ul></div>
       <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
           <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias">GESTIONAR CATEGORÍAS</a>
       </li></ul></div>
       <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
           <a class="mbr-buttons__btn btn btn-danger active" href="?view=categorias&mode=add">CREAR CATEGORÍA</a>
       </li></ul></div>
     </div>

    <ol class="breadcrumb">
      <li><a href="?view=index"><i class="fa fa-tags"></i> Categorías</a></li>
    </ol>
</div>

<div class="row categorias_con_foros">
  <div class="col-sm-12">
      <div class="row titulo_categoria">Gestión de Categorías</div>

      <div class="row cajas">
        <div class="col-md-12">
          <form class="form-horizontal" action="?view=categorias&mode=add" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Categoría</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="nombre" placeholder="Nombre para la categoría">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Resetear</button>
                  <button type="submit" class="btn btn-primary">Crear</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
  </div>
</div>

</div>
</section>

<?php include(WEB_DIR . 'includes/footer.php'); ?>

</body>
</html>
