<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker y Javascript</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script type="text/javascript">
      
  // Versión funciones en JQuery   
      
  $( function() {
    $( "#datepicker" ).datepicker();
  } );    


    
  // Versión funciones en JavaScript  
  
  function validarFormatoFecha(campo) {
      
      var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
      if ((campo.match(RegExPattern)) && (campo!='')) {
            return true;
      } else {
            return false;
      }
  }
      
  // Comprueba que exista la fecha suministrada

  function existeFecha(fecha){
      
        var fechaf = fecha.split("/");
        var day = fechaf[0];
        var month = fechaf[1];
        var year = fechaf[2];
        var date = new Date(year,month,'0');
        if((day-0)>(date.getDate()-0)){
              return false;
        }
        return true;
  }
   
  function existeFecha2 (fecha) {
      
          var fechaf = fecha.split("/");
          var d = fechaf[0];
          var m = fechaf[1];
          var y = fechaf[2];
          return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
  }


  function validarFechaMenorActual(date){
      
        var x=new Date();
        var fecha = date.split("/");
        x.setFullYear(fecha[2],fecha[1]-1,fecha[0]);
        var today = new Date();
   
        if (x >= today)
          return false;
        else
          return true;
  }

  function comprobar() {
    
    var fecha = document.getElementById('fechaX').value;

    if(validarFormatoFecha(fecha)){
          if(existeFecha(fecha)){
                alert("La fecha introducida es correcta.");
          }else{
                alert("La fecha introducida no existe.");
          }
    }else{
          alert("El formato de la fecha es incorrecta, por favor vuelva a escribirla tal como se le indica.");
    }
  }

  </script>

  
</head>

    
    <body>

        <p>Seleccione la fecha: <input type="text" name="fecha" id="datepicker" value="<?php echo date("d/m/Y");?>" ></p>

        <p>Introduzca la fecha: <input type="text" name="fechaX" id="fechaX" value="<?php echo date("d/m/Y");?>" onblur="comprobar()"></p> 


    </body>
    
</html>

