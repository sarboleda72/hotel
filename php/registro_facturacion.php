<?php
    include 'conexion_bd.php';
    
    $huesped=$_POST['crear_facturacion_id_huesped'];
    $habitacion=$_POST['crear_facturacion_habitacion'];
    $fecha=$_POST['crear_facturacion_Fecha_de_facturacion'];
    $totalServicios=$_POST['crear_facturacion_Total_de_servicios'];
    $estadoDePago=$_POST['crear_facturacion_Estado_de_pago'];
    $query="INSERT INTO facturacion(id_huesped,habitacion_numero,fecha_factura,total_servicios,estado_pago) values ('$huesped','$habitacion','$fecha','$totalServicios','$estadoDePago')";
    $ejecutar=mysqli_query($conexion,$query);
    if($ejecutar){
        echo "
            <script>
                alert('usuario almacenado correctamente');
                
            </script>
        ";
    }else{
        echo "
            <script>
                alert('usuario no almacenado');
                
            </script>
        ";
    }
    $conexion->close();    
?>