<?php
    include 'conexion_bd.php';
    $foranea_usuario=$_POST['crear_huesped_foranea'];
    $nombre_huesped=$_POST['crear_huesped_nombre_huesped'];
    $apellidos_huesped=$_POST['crear_huesped_apellidos_huesped'];
    $cedula_huesped=$_POST['crear_huesped_cedula_huesped'];
    $pais_huesped=$_POST['crear_huesped_pais_huesped'];
    $departamento_huesped=$_POST['crear_huesped_departamento_huesped'];
    $ciudad_huesped=$_POST['crear_huesped_ciudad_huesped'];

    $query="INSERT INTO huesped(id_usuario,nombre,apellidos,cedula,pais,departamento,ciudad) values ('$foranea_usuario','$nombre_huesped','$apellidos_huesped','$cedula_huesped','$pais_huesped','$departamento_huesped','$ciudad_huesped')";
    $ejecutar=mysqli_query($conexion,$query);
    if($ejecutar){
        echo "
            <script>
                alert('usuario almacenado correctamente');
                window.location='../menu.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Informacion erronea, huesped no guardo');                
            </script>
        ";
    }
    $conexion->close();    
?>

<!--input type="text" name="crear_huesped_nombre_huesped" placeholder="Nombre Completo">
    	<input type="email" name="crear_huesped_apellidos_huesped" placeholder="Email">
    	<input type="text" name="crear_huesped_cedula_huesped" placeholder="Cedula">
		<input type="text" name="crear_huesped_pais_huesped" placeholder="Pais">
		<input type="text" name="crear_huesped_departamento_huesped" placeholder="Departamento">
		<input type="text" name="crear_huesped_ciudad_huesped" placeholder="Ciudad">
        <input type="submit" name="crear_huesped_register_huesped" value="Crear">-->