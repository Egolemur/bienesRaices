<?php  
    require 'includes/funciones.php';
    incluirTemplate('header'); 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="img/webp">
            <source srcset="build/img/destacada.jpg" type="img/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad">

            <div class="resumen-propiedad">
                <p class="precio">$3,000,000</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p>3</p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p>4</p>
                    </li>
                </ul>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, sint? Vitae voluptatem harum est delectus molestias placeat rerum aperiam. Cum reiciendis magni voluptates impedit, excepturi maiores vel earum optio blanditiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis illo tempora aut provident ipsum iure illum consequatur repellendus obcaecati, sunt, eum pariatur at perferendis. Consequuntur est sapiente quisquam omnis quas.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae a in sit soluta velit accusamus perferendis, nemo doloremque pariatur harum consectetur. Rerum ipsa dolor laboriosam corporis perferendis quo quas ex!</p>
            </div>
        </picture>
    </main>

<?php  
    incluirTemplate('footer'); 
?>

    <script src="build/js/bundle.min.js"></script>    
</body>
</html>