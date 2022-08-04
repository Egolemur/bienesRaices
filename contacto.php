<?php  
    require 'includes/app.php';
    incluirTemplate('header'); 
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="img/webp">
            <source srcset="build/img/destacada3.jpg" type="img/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario" action="">
            <fieldset>
                <legend>Información personal</legend>
                
                <label for="input-nombre">Nombre</label>
                <input type="text" placeholder="Tu numbre" id="input-nombre">
                
                <label for="input-email">E-mail</label>
                <input type="email" placeholder="Tu e-mail" id="input-email">
                
                <label for="input-telefono">Teléfono</label>
                <input type="tel" placeholder="Tu teléfono" id="input-telefono">

                <label for="input-mensaje">Mensaje</label>
                <textarea id="input-mensaje" cols="30" rows="10"></textarea>

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="input-opciones">Vende o compra:</label>
                <select name="" id="input-opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Tu precio/presupuesto" id="presupuesto">

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <p>¿Cómo desea ser contactado?</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>            
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>            
                    <input name="contacto" type="radio" value="email" id="contactar-email">                    
                </div>

                <p>Si eligió teléfono indique la hora y fecha para ser contactado.</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="enviar" class="boton-verde">

        </form>
    </main>

    <?php  
        incluirTemplate('footer'); 
    ?>