<?php
    include 'conexion_bd.php';
    $cedula=$_POST['crear_pedido_foranea'];
    $habitacion_numero=$_POST['crear_pedido_habitacion_numero'];
    $descripcion=$_POST['crear_pedido_descripcion'];
    $costo=$_POST['crear_pedido_costo'];
    $estado_pedido=$_POST['crear_pedido_estado_pedido'];
    $query = "INSERT INTO pedidos (id_huesped, habitacion_numero, fecha_pedido, descripcion, costo, estado_pedido) 
    SELECT id_huesped, '$habitacion_numero', NOW(), '$descripcion', '$costo', '$estado_pedido'
    FROM huesped
    WHERE cedula = '$cedula'";
    $ejecutar=mysqli_query($conexion,$query);
    if($ejecutar){
        echo "
            <script>
                alert('Pedido creado correctamente');
                window.location='../crear_pedidos.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('usuario no almacenado');
                window.location='../crear_pedidos.php'; 
            </script>
        ";
    }   
    $conexion->close(); 
?>


