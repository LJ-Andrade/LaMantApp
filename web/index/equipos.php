<!DOCTYPE html>
<html lang="es">
  <?php include(WEB_DIR . 'includes/head.php'); ?>
  <body>
    <?php include(WEB_DIR . 'includes/nav.php'); ?>
    <div class="container liga">
      <div class="row">
        <!-- //// Muestra los equipos //// -->
        <?php
        if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 1) {
          echo '<div class="container teams">
                <h5>Equipos Registrados</h5>
                <div class="col-md-12 listTitles">
                  <div class="col-md-3 col-sm-6">Nombre</div>
                  <div class="col-md-3 col-sm-6">D.T.</div>
                  <div class="col-md-3 col-sm-6">Selección</div>
                  <div class="col-md-3 col-sm-6">Club</div>
                </div>';
            $db = new Conexion();
            $resultConsulta = $db->query("SELECT * FROM equipos;");

            while ($mostrarDatos = $resultConsulta->fetch_array(MYSQLI_BOTH))
            {
            echo'<div class="col-md-12 listTeams">
                 <div class="col-md-3 col-sm-6">'.$mostrarDatos['nombreeq'].'</div>
                 <div class="col-md-3 col-sm-6">'.$mostrarDatos['dt'].'</div>
                 <div class="col-md-3 col-sm-6">'.$mostrarDatos['seleccion'].'</div>
                 <div class="col-md-3 col-sm-6">'.$mostrarDatos['club'].'</div>
                 </div>';
            }
          }
          ?>
        </table>
      </div>
    </div>
    <!-- //// Agregar nuevos equipos //// -->
    <div class="container">
      <div class="row">
        <div class="container showAddTeamBtnDiv">
          <button id="ShowAddTeams" type="button" name="button" class="btn btndefault showAddTeamBtn text-center"><i class="fa fa-futbol-o"></i> Agregar Equipo</button>
        </div>
        <div class="container teamsForm">
          <form id="TeamsForm" action="" method="post">
            <div class="row col-md-12 addTeams">
              <input required name="nombreeq[]" placeholder="Equipo"/>
              <input required name="dt[]" placeholder="T&eacute;cnico"/>
              <input required name="seleccion[]" placeholder="Selecci&oacute;n"/>
              <input required name="club[]" placeholder="1er Club"/>
            </div>
            <button type="submit" name="insertar" value="Ingresar" class="btn btn-info addTeamBtn"><i class="fa fa-hand-peace-o"></i> Anotar</button>
          </form>
        </div>
        <?php
         //////////////////////// AL SUBMITEAR //////////////////////////
         if(isset($_POST['insertar']))
         {

         $items1 = ($_POST['nombreeq']);
         $items2 = ($_POST['dt']);
         $items3 = ($_POST['seleccion']);
         $items4 = ($_POST['club']);

         ///////////// SEPARAR VALORES DE ARRAYS ////////////////////
         while(true) {

             //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
             $item1 = current($items1);
             $item2 = current($items2);
             $item3 = current($items3);
             $item4 = current($items4);

             ////// ASIGNARLOS A VARIABLES ///////////////////
             $eq=(( $item1 !== false) ? $item1 : ", &nbsp;");
             $dtc=(( $item2 !== false) ? $item2 : ", &nbsp;");
             $selec=(( $item3 !== false) ? $item3 : ", &nbsp;");
             $c=(( $item4 !== false) ? $item4 : ", &nbsp;");

             //// CONCATENAR LOS VALORES EN ORDEN PARA INSERT ////////
             $valores="('$eq','$dtc','$selec','$c'),";

             //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
             $valoresQ= substr($valores, 0, -1);

             // Probar
             // echo "INSERT INTO equipos ('equipo','dt','seleccion','club1','club2') VALUES $valoresQ";

             ///////// QUERY DE INSERCIÓN ////////////////////////////
             $insertion = "INSERT INTO equipos (nombreeq,dt,seleccion,club) VALUES $valoresQ";
             // mysqli_query($db,$insertion);

             if(!mysqli_query($db,$insertion))
             {
               die('Error: ' . mysqli_error($db));
             }
             else
             {
               echo '<script language="javascript">';
               echo 'alert("Equipo agregado"); location.href="?view=links&?link=equipos"';
               echo '</script>';
             };

             mysqli_close($db);

             // Up! Next Value
             $item1 = next( $items1 );
             $item2 = next( $items2 );
             $item3 = next( $items3 );
             $item4 = next( $items4 );

             // Check terminator
             if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
           //
         }
       };
       ?>
      </div>
    </div>





    <?php include(WEB_DIR . 'includes/footer.php'); ?>
    <?php include(WEB_DIR . 'includes/scripts.php'); ?>
    <script>
  $(function(){
    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
    $("#adicional").on('click', function(){
      $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
    });

     $("#tabla").on('click','.deleteRow',function(){
       $(this).closest('tr').remove();
     });
  });

  // Muestra formulario de inserción de equipos
  $('#TeamsForm').hide( 0 );
  $('#ShowAddTeams').click(function() {
    $('#TeamsForm').slideToggle( 500 );
  });
</script>
  </body>
</html>
