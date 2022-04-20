<?php  
    require 'includes/funciones.php';
    incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="img/webp">
                    <source srcset="build/img/nosotros.jpg" type="img/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto nobis dolore delectus error, provident temporibus molestias, commodi deserunt suscipit distinctio ullam quis ad dolor repellendus facilis quaerat accusantium libero ipsa!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto nobis dolore delectus error, provident temporibus molestias, commodi deserunt suscipit distinctio ullam quis ad dolor repellendus facilis quaerat accusantium libero ipsa!
                </p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto nobis dolore delectus error, provident temporibus molestias, commodi deserunt suscipit distinctio ullam quis ad dolor repellendus facilis quaerat accusantium libero ipsa!
                </p>

            </div>

        </div>
    </main>

    <section class="contenedor seccion">
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
    </section>

    <?php       
        incluirTemplate('footer'); 
    ?>

    <script src="build/js/bundle.min.js"></script>    
</body>
</html>