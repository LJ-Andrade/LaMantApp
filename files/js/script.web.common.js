$( document ).ready(function() {
  // Wow Image Loader On Scroll //
  new WOW().init();

/////// TAGS  /////////
  function onAddTag(tag) {
    alert("Added a tag: " + tag);
  }
  function onRemoveTag(tag) {
    alert("Removed a tag: " + tag);
  }

  function onChangeTag(input,tag) {
    alert("Changed a tag: " + tag);
  }

  $(function() {
    // Crear un tag por cada vez que se usa.
    $('#tags_1').tagsInput({
      'width':'auto',
      'height':'auto',
      'width':'auto',
      'defaultText':'Anotar',
      'removeWithBackspace' : true,
      'placeholderColor' : '#000',
      'delimiter': [','],   // Or a string with a single delimiter. Ex: ';'
  });
      $('#tags_2').tagsInput({
      'width':'auto',
      'height':'auto',
      'width':'auto',
      'defaultText':'Anotar',
      'removeWithBackspace' : true,
      'placeholderColor' : '#000',
      'delimiter': [','],   // Or a string with a single delimiter. Ex: ';'
    });

    // Posible Options
    // $('#tags_2').tagsInput({
    //    'autocomplete': { option: value, option: value},
    //    'height':'40px',
    //    'width':'300px',
    //    'interactive':true,
    //    'defaultText':'Nombre',
    //    'onAddTag':callback_function,
    //    'onRemoveTag':callback_function,
    //    'onChange' : callback_function,
    //    'delimiter': [','],   // Or a string with a single delimiter. Ex: ';'
    //    'removeWithBackspace' : true,
    //    'minChars' : 0,
    //    'maxChars' : 0, // if not provided there is no limit
    //    'placeholderColor' : '#666666'
    // });
  });



}); // Document Ready


function alertMe(url, message, icon ) {

    var urlRoot = window.location.href;
    if(urlRoot.indexOf(url) != -1) {
      $.notify({
        // options
        icon: icon,
        title: message,

      },{
        // settings
        type: "danger",
        allow_dismiss: true,
        placement: {
          from: "bottom",
          align: "center"
        },
        offset: 100,
        spacing: 10,
        z_index: 1031,
        delay: 2000,
        timer: 1000,
        animate: {
          enter: 'animated fadeInUp',
          exit: 'animated fadeOutDown'
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
}




//////////////// LEAGUE //////////////////
$('#createLeagueBtn').click(function(){
  $(this).addClass("Hidden");
  $('#continueLeagueBtn').addClass('Hidden');
  $('#createLeagueForm').removeClass('Hidden');
})

$('#continueLeagueBtn').click(function(){
    $(this).addClass("Hidden");
    $('#createLeagueBtn').addClass('Hidden');
    $('#continueLeagueForm').removeClass('Hidden');
})

$('.closeForm').click(function(){
  $(this).parent('form').addClass('Hidden');
  $('#createLeagueBtn').removeClass('Hidden');
  $('#continueLeagueBtn').removeClass('Hidden');
})
