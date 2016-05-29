function goReg() {
  var connect, form, response, result, user, pass, email, tyc, pass_dos;
  user = __('user_reg').value;
  pass = __('pass_reg').value;
  email = __('email_reg').value;
  pass_dos = __('pass_reg_dos').value;
  tyc = __('tyc_reg').checked ? true : false;

  if(true == tyc) {
    if(user != '' && pass != '' && pass_dos != '' && email != '') {
      if(pass == pass_dos) {
        form = 'user=' + user + '&pass=' + pass + '&email=' + email;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function() {
          if(connect.readyState == 4 && connect.status == 200) {
            if(connect.responseText == 1) {
              result = '<div class="alert alert-dismissible alert-success">';
              result += '<h4>Registro completado!</h4>';
              result += '<p><strong>Confirmá desde tu mail !</strong></p>';
              result += '</div>';
              __('_AJAX_REG_').innerHTML = result;
              location.reload();
            } else {
              __('_AJAX_REG_').innerHTML = connect.responseText;
            }
          } else if(connect.readyState != 4) {
            result = '<div class="alert alert-dismissible alert-warning">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>Procesando registro, guachín...</h4>';
            result += '</div>';
            __('_AJAX_REG_').innerHTML = result;
          }
        }
        connect.open('POST','ajax.php?mode=reg',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
      } else {
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Tenés un sochori en los dedos?</h4>';
        result += '<p>Las contraseñas no coinciden, Master</p>';
        result += '</div>';
        __('_AJAX_REG_').innerHTML = result;
      }
    } else {
      result = '<div class="alert alert-dismissible alert-danger">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Que te copiá, Cubilla.</h4>';
      result += '<p>Ese usuario ya exíste</p>';
      result += '</div>';
      __('_AJAX_REG_').innerHTML = result;
    }
  } else {
    result = '<div class="alert alert-dismissible alert-danger">';
    result += '<button type="button" class="close" data-dismiss="alert">x</button>';
    result += '<p>Debes entregar tu ALMA y tu ANO a La MantApp.</p>';
    result += '<p>Checkeá la cosita de abajo, dale <i class="fa fa-chevron-down"></p>';
    result += '</div>';
    __('_AJAX_REG_').innerHTML = result;
  }

}

function runScriptReg(e) {
  if(e.keyCode == 13) {
    goReg();
  }
}
