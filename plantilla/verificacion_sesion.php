<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo "
            <script>
                alert('Por favor inicie sesión.');
                window.location='index.php';
            </script>
        ";
        //header('location: index.php');
        session_destroy();
        die();
    }
    session_destroy();
?>