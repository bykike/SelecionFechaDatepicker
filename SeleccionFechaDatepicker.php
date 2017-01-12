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
      
  // Para validar si la fecha introducida es real, es decir, que corresponde al calendario. 

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
   

  // Validar si la fecha introducida es anterior o menor a la actual.
      
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

  // Utilizo las dos funciones anteriores para comprobar que la fecha introducida es correcta.
      
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
      
      
  // Nueva función de validación de fecha DD/MM/AAAA
      
    function validaFechaDDMMAAAA(){
        
        var fecha = document.getElementById('fechaY').value;
        var dtCh= "/";
        var minYear=1900;
        var maxYear=2100;
        function isInteger(s){
            var i;
            for (i = 0; i < s.length; i++){
                var c = s.charAt(i);
                if (((c < "0") || (c > "9"))) return false;
            }
            return true;
        }
        function stripCharsInBag(s, bag){
            var i;
            var returnString = "";
            for (i = 0; i < s.length; i++){
                var c = s.charAt(i);
                if (bag.indexOf(c) == -1) returnString += c;
            }
            return returnString;
        }
        function daysInFebruary (year){
            return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
        }
        function DaysArray(n) {
            for (var i = 1; i <= n; i++) {
                this[i] = 31
                if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
                if (i==2) {this[i] = 29}
            }
            return this
        }
        function isDate(dtStr){
            var daysInMonth = DaysArray(12)
            var pos1=dtStr.indexOf(dtCh)
            var pos2=dtStr.indexOf(dtCh,pos1+1)
            var strDay=dtStr.substring(0,pos1)
            var strMonth=dtStr.substring(pos1+1,pos2)
            var strYear=dtStr.substring(pos2+1)
            strYr=strYear
            if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
            if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
            for (var i = 1; i <= 3; i++) {
                if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
            }
            month=parseInt(strMonth)
            day=parseInt(strDay)
            year=parseInt(strYr)
            if (pos1==-1 || pos2==-1){
                return false
            }
            if (strMonth.length<1 || month<1 || month>12){
                return false
            }
            if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
                return false
            }
            if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
                return false
            }
            if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
                return false
            }
            return true
        }
        if(isDate(fecha)){
            alert("La fecha introducida es correcta.");
            return true;
        }else{
            alert("La fecha introducida no es correcta. Por favor escríbala como se le pide dd/mm/aaaa");
            return false;
        }
    }

  </script>

  
</head>

    
    <body>
        
        <p>Seleccione la fecha ( Uso de función datepicker() ): <input type="text" name="fecha" id="datepicker" value="<?php echo date("d/m/Y");?>" ></p>

        <p>Introduzca la fecha ( Uso de función comprobar() ): <input type="text" name="fechaX" id="fechaX" value="<?php echo date("d/m/Y");?>" onblur="comprobar()"></p> 

        <p>Introduzca la fecha ( Uso de función validaFechaDDMMAAAA() ): <input type="text" name="fechaY" id="fechaY" value="<?php echo date("d/m/Y");?>" onblur="return validaFechaDDMMAAAA()"></p>
    </body>
    
</html>

