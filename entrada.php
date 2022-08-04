<?php  
    require 'includes/app.php';
    incluirTemplate('header'); 
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar.</h1>      
                
        <picture>    
            <source srcset="build/img/destacada2/webp" type="img/webp">    
            <source srcset="build/img/destacada2.jpg" type="img/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>
        
        <p class="informacion-meta">Escrito el: <span>20/10/2021</span>por: <span>Admin</span></p>

        <div class="resumen-propiedad">            
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, sint? Vitae voluptatem harum est delectus molestias placeat rerum aperiam. Cum reiciendis magni voluptates impedit, excepturi maiores vel earum optio blanditiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis illo tempora aut provident ipsum iure illum consequatur repellendus obcaecati, sunt, eum pariatur at perferendis. Consequuntur est sapiente quisquam omnis quas.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae a in sit soluta velit accusamus perferendis, nemo doloremque pariatur harum consectetur. Rerum ipsa dolor laboriosam corporis perferendis quo quas ex!</p>
        </div>
    </main>

    <?php  
        incluirTemplate('footer'); 
    ?>