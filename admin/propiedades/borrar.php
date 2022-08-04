<?php
    require '../../includes/app.php';

    $auth = estaAutenticado();
    
    debuguear($_SESSION);

    incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Borrar</h1>
    </main>

<?php  
    incluirTemplate('footer'); 
?>