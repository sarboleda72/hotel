<?php
    session_start();
    include 'conexion_bd.php';
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];
    $validar_login=mysqli_query($conexion,"SELECT * FROM usuario WHERE nombre_usuario='$correo' AND contrasena='$contrasena'");
    if(mysqli_num_rows($validar_login)>0){
        $_SESSION['usuario']=$correo;
        header("location: ../menu.php");
        exit;
    }else{
        echo "
            <script>
                alert('usuario no existe, porfavor verifique los datos ingresados.');
                window.location='../index.php';
            </script>
        ";
        exit;
    }

    
?>