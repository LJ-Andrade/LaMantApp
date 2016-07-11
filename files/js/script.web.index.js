$(document).ready(function(){
  var url = window.location.href;
  if(url.indexOf('?msg=logOk') != -1) {
    $.notify({
      // options
      icon: 'fa fa-futbol-o',
      title: 'Bienvenido <?php  echo strtoupper($_SESSION['user']); ?> a La Manta App!!',

    },{
      // settings
      type: "danger",
      allow_dismiss: true,
      placement: {
        from: "bottom",
        align: "center"
      },
      offset: 200,
      spacing: 10,
      z_index: 1031,
      delay: 5000,
      timer: 1000,
      animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
      },
      icon_type:'class',
      template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0} alertMWelcome" role="alert">' +
      '<span class="closeX" data-notify="dismiss"><i class="fa fa-times"></i></span>' +
      '<span data-notify="icon"></span> ' +
      '<span data-notify="title">{1}</span> ' +
      '<div class="progress" data-notify="progressbar">' +
      '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
      '</div>' +
      '<a href="{3}" target="{4}" data-notify="url"></a>' +
      '</div>'
    });
  }

////////////////////////////////
function hoverMenu() {
  $('.menu1').mouseover(function() {
    $('#menuImg').attr('src','../../../skin/images/body/menu/ligadiaria.jpg');
  });
  $('.menu2').mouseover(function() {
    $('#menuImg').attr('src','../../../skin/images/body/menu/mantis.jpg');
  });
  $('.menu3').mouseover(function() {
    $('#menuImg').attr('src','../../../skin/images/body/menu/premios.jpg');
  });
  $('.menu4').mouseover(function() {
    $('#menuImg').attr('src','../../../skin/images/body/menu/estadist.jpg');
  });
  $('.menu1, .menu2, .menu3, .menu4').mouseout(function(){
    $('#menuImg').attr('src','../../../skin/images/body/menu/main.jpg');
  });
}
hoverMenu();

function test(){
  alert('test');
};
test();

)};
