<!--codigo ordenado-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>BUFETE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
         <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <script src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="css/style.css">

        <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>
        <script src="js/jquery.datetimepicker.full.min.js"></script>

<script>

  function validarFormulario(listaCampos) {
    var error = '';
    for(var i = 0; i < listaCampos.length; i++) {
      var campo = listaCampos[i];
      var id = campo.id;
      var tipo = campo.tipo;
      var mensaje = campo.mensaje;
      var valor = $('#' + id).val();
      console.log(id, tipo, valor);
      if (tipo == 'number') {
        if (isNaN(valor) || Number(valor) <= 0) {
          error = mensaje;
          break;
        }
      } else if (tipo == 'text') {
        if (valor == '' || valor.length == 0) {
          error = mensaje;
          break;
        }
      } else if (tipo == 'date') {
        if (valor == '' || valor.length == 0) {
          error = mensaje;
          break;
        }
      }
    }
    if (error == '') {
      return true;
    } else {
      alert(error);
      return false;
    }
  }

  //calcula el digitor verificador de un rut
  function calcularRutDv(T){
		var M=0,S=1;
		for(;T;T=Math.floor(T/10))
			S=(S+T%10*(9-M++%6))%11;
		return S?S-1:'k';
	}

	// Valida el rut completo "XXXXXXXX-X"
	function validaRut(rutCompleto) {
		if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
			return false;
		var tmp = rutCompleto.split('-');
		var digv = tmp[1]; 
		var rut = tmp[0];
		if ( digv == 'K' ) digv = 'k' ;
		return (calcularRutDv(rut) == digv );
	}

</script>  
</head>
<body>
