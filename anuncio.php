<?php  

require 'includes/app.php';

$db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');

$id = $_GET['id'];
$query = "SELECT * FROM propiedades";
$fetch = mysqli_query($db, $query);
$resultado = mysqli_fetch_all($fetch, MYSQLI_ASSOC);

incluirTemplate('header');     

?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $resultado[$id]['titulo']; ?></h1>

        <picture>
            <!-- <source srcset="build/img/destacada.webp" type="img/webp"> -->
            <source srcset="/imagenes/<?php echo $resultado[$id]['imagen']; ?>" type="img/jpeg">
            <img loading="lazy" src="/imagenes/<?php echo $resultado[$id]['imagen']; ?>" alt="Imagen de la propiedad">

            <div class="resumen-propiedad">
                <p class="precio"><?php echo $resultado[$id]['precio']; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $resultado[$id]['wc']; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $resultado[$id]['estacionamiento']; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $resultado[$id]['habitaciones']; ?></p>
                    </li>
                </ul>

                <p><?php echo $resultado[$id]['descripcion']; ?></p>
                
            </div>
        </picture>
    </main>

<?php  
    incluirTemplate('footer'); 
?>