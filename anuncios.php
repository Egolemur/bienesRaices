<?php  
    require 'includes/app.php';
    incluirTemplate('header'); 

    $db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');
    $query = 'SELECT * FROM propiedades';
    $fetch = mysqli_query($db, $query);
    $resultado = mysqli_fetch_all($fetch, MYSQLI_ASSOC);

?>

    <main class="contenedor seccion">
        <h2>Casas y depas en venta</h2>
        <div class="contenedor-anuncios">

            <?php for($i = 0; $i < count($resultado); $i++): ?>        
                <div class="anuncio">
                    <picture>
                        <!-- <source srcset="build/img/anuncio1.webp" type="image/webp"> -->
                        <source srcset="/imagenes/<?php echo $resultado[$i]['imagen']; ?>" type="image/jpeg">
                        <img loading="lazy" src="/imagenes/<?php $resultado[$i]['imagen'] ?>" alt="anuncio">                    
                    </picture>
                    
                    <div class="contenido-anuncio">
                        <h3><?php echo $resultado[$i]['titulo']; ?></h3>
                        <p><?php echo $resultado[$i]['descripcion']; ?></p>
                        <p class="precio"><?php echo $resultado[$i]['precio']; ?></p>
        
                        <ul class="iconos-caracteristicas">
                            <li>
                                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                                <p><?php echo $resultado[$i]['wc']; ?></p>
                            </li>
                            <li>
                                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                                <p><?php echo $resultado[$i]['estacionamiento']; ?></p>
                            </li>
                            <li>
                                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                                <p><?php echo $resultado[$i]['habitaciones']; ?></p>
                            </li>
                        </ul>
                        
                        <a href="anuncio.php?id=<?php echo $i; ?>" class="boton-amarillo-block">
                            Ver propiedad
                        </a>
        
                    </div> <!--Contenido del Anuncio -->
                </div> <!--Anuncio -->            
                
    <?php endfor; ?>    

        </div> <!--Contenedor de Anuncios -->
    </main>

    <?php  
        incluirTemplate('footer'); 
    ?>