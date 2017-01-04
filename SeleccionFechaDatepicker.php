<!DOCTYPE html>

<!--
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PRIMEROS PASOS CON BRACKETS</title>
        <meta name="description" content="Una guía interactiva de primeros pasos para Brackets.">
        <link type="text/css" href="css/ui-darkness/jquery-ui-1.8.23.custom.css" rel="Stylesheet" />
        <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.ui.datepicker-es.js"></script>
        
        <script type="text/javascript">
        $(function() {    
            $('#demo9').datepicker({
                onSelect: function(selectedDate) {
                    var dataString = 'date='+selectedDate;
                    $.ajax({
                        type: "POST",
                        url: "save.php",
                        data: dataString,
                        success: function(data) {
                            $('#result').empty();
                            $('#result').html(data);
                        }
                    });
                }

            });
        });
        </script>
        
    </head>
    <body>
        <label>Selecciona fecha:</label><input id="demo9" type="text" name="fecha2"><div id="result"></div>
<input type="date" name="cumpleanios" step="1" min="1900-01-01" max="2040-12-31" value="<?php echo date("Y-m-d");?>" onclick="verfecha()">


</body>
</html>
-->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>
<body>
 
<p>Date: <input type="text" id="datepicker" value="<?php echo date("Y-m-d");?>"></p>
 
 
</body>
</html>
