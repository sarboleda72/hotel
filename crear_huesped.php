<!DOCTYPE html>
<html>
<head>
    <title>Registrar Huesped</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estilo_formulario.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/main.js"></script>
    
</head>
<?php include 'plantilla/menu.php'; ?>
<body>
    <script type="text/javascript">
        $(document).ready(function(){
            cargar_paises();
            $("#pais").change(function(){ dependencia_estado();dependencia_ciudad(); });
            $("#estado").change(function(){ dependencia_ciudad(); });
            $("#estado").prop("disabled", true);
            $("#ciudad").prop("disabled", true);
        });

        function cargar_paises() {
            $.get("scripts/cargar-paises.php", function(resultado){
                if(resultado == false) {
                    alert("Error");
                } else {
                    $('#pais').append(resultado);
                }
            });    
        }

        function dependencia_estado() {
            var code = $("#pais").val();
            $.get("scripts/dependencia-estado.php", { code: code },
                function(resultado) {
                    if(resultado == false) {
                        alert("Error");
                    } else {
                        $("#estado").attr("disabled",false);
				        document.getElementById("estado").options.length=1;
				        $('#estado').append(resultado);	
                    }
                }
            );
        }

        function dependencia_ciudad() {
            var code = $("#estado").val();
            $.get("scripts/dependencia-ciudades.php?", { code: code }, function(resultado){
                if(resultado == false) {
                    alert("Error");
                } else {
                    $("#ciudad").attr("disabled",false);
			        document.getElementById("ciudad").options.length=1;
			        $('#ciudad').append(resultado);		
                }
            });    
        }
    </script>
    <style type="text/css">
        dt{font-size:200%;}
        dd{font-size:150%;}
    </style>
    <form action="php/registro_huesped.php" method="POST">
        <h1>Datos del huesped</h1>
        <input type="number" name="crear_huesped_foranea" placeholder="id usuario">
        <input type="text" name="crear_huesped_nombre_huesped" placeholder="Nombre">
        <input type="text" name="crear_huesped_apellidos_huesped" placeholder="apellidos">
        <input type="text" name="crear_huesped_cedula_huesped" placeholder="Cedula">
        
        <select id="pais" name="crear_huesped_pais_huesped">
            <option value="0">Selecciona Uno...</option>
        </select>
        
        <select id="estado" name="crear_huesped_departamento_huesped">
            <option value="0">Selecciona Uno...</option>
        </select>
        
        <select id="ciudad" name="crear_huesped_ciudad_huesped">
            <option value="0">Selecciona Uno...</option>
        </select>
        
        <input type="submit" value="Crear">
    </form>
    

</body>

</html>
