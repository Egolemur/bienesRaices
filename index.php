<?php  
    require 'includes/app.php';
    incluirTemplate('header', $inicio = true); 
    
    $db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');

    // $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
    // $resultado = mysqli_query($db, $query);
    // $propiedad = mysqli_fetch_assoc($resultado);
    // $imagen = $propiedad['imagen'];

    $query = 'SELECT * FROM propiedades';
    $fetch = mysqli_query($db, $query);
    $resultado = mysqli_fetch_all($fetch, MYSQLI_ASSOC);

    // var_dump($resultado[0]);

?>

    <main class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono"> 
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy";>
                <h3>Seguridad</h3>    
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore fugit aliquam maxime neque officiis necessitatibus animi beatae quidem velit?</p>
            </div>
            <div class="icono"> 
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy";>
                <h3>Precio</h3>    
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore fugit aliquam maxime neque officiis necessitatibus animi beatae quidem velit?</p>
            </div>
            <div class="icono"> 
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy";>
                <h3>A Tiempo</h3>    
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore fugit aliquam maxime neque officiis necessitatibus animi beatae quidem velit?</p>
            </div>
        </div>
    </main>    
    
    <div class="seccion contenedor">
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
        
            <div class="alinear-derecha">
                <a href="anuncios.php" class="boton-verde">Ver Todas</a>
            </div>
        </div>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formualario de contacto y un asesor se pondrá en contacto contigo a la brevedad.</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">                    
                    <picture>
                        <source srcset="build/img/blog1.webp" type="img/webp">
                        <source srcset="build/img/blog1.jpg" type="img/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa.</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>
                        
                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">                    
                    <picture>
                        <source srcset="build/img/blog2.webp" type="img/webp">
                        <source srcset="build/img/blog2.jpg" type="img/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar.</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>
                        
                        <p>Maximiza el espacio en tu hogar con esta guía. Aprende a ombinar muebles y colores para darle vida a tu espacio.</p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            
            <div class="testimonial">                    
                 <blockquote>
                     El personal se comportó de una excelente forma. Muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                 </blockquote>
                 <p>- Leonardo Murillo</p>
            </div>
        </section>
    </div>

    <?php  
        incluirTemplate('footer'); 
    ?>
