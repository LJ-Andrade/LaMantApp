$( document ).ready(function() {
  // Wow Image Loader On Scroll //
  new WOW().init();
});
/////// Tags /////////
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

  ///// SLOGAN /////
$('.SloganChamuy').hide();
  $('.foot').hover(function() {
    $(".SloganChamuy").toggle(300)
  });
