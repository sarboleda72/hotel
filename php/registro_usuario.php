<?php
    include 'conexion_bd.php';
    $nombre_completo=$_POST['nombre_completo'];
    $correo=$_POST['correo'];
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['contrasena'];
    $query="INSERT INTO usuario(nombre_usuario,contrasena,tipo_usuario) values ('$nombre_completo','$correo','$usuario')";
    $ejecutar=mysqli_query($conexion,$query);
    if($ejecutar){
        echo "
            <script>
                alert('usuario almacenado correctamente');
                window.location='../index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('usuario no almacenado');
                window.location='../index.php'; 
            </script>
        ";
    }
    $conexion->close();     
?>