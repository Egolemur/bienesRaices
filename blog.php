<?php  
    require 'includes/app.php';
    incluirTemplate('header'); 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro blog</h1>

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
                    <p>Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>
                    
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
                    <h4>Construye una alberca en tu hogar.</h4>
                    <p>Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>
                    
                    <p>Maximiza el espacio en tu hogar con esta guía. Aprende a ombinar muebles y colores para darle vida a tu espacio.</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">                    
                <picture>
                    <source srcset="build/img/blog3.webp" type="img/webp">
                    <source srcset="build/img/blog3.jpg" type="img/jpeg">
                    <img loading="lazy" src="build/img/blog3.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar.</h4>
                    <p>Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>
                    
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">                    
                <picture>
                    <source srcset="build/img/blog4.webp" type="img/webp">
                    <source srcset="build/img/blog4.jpg" type="img/jpeg">
                    <img loading="lazy" src="build/img/blog4.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu habitación.</h4>
                    <p>Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>
                    
                    <p>Maximiza el espacio en tu hogar con esta guía. Aprende a ombinar muebles y colores para darle vida a tu espacio.</p>
                </a>
            </div>
        </article>
    </main>

    <?php  
        incluirTemplate('footer'); 
    ?>