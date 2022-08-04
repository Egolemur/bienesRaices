<?php
    use App\Propiedad;
?>

<fieldset>
                <legend>Información general</legend>
                <label for="titulo">Título:</label>
                <input name="propiedad[titulo]" type="text" placeholder="titulo de la propiedad" id="titulo" value="<?php echo s($propiedad->titulo);?>">                

                <?php if(in_array('El título es obligatorio', $errores)) {
                    echo '<div class="alerta error">';
                        echo 'El título es obligatorio';
                    echo '</div>';
                }?>                                

                <label for="precio">Precio:</label>
                <input name="propiedad[precio]" type="number" placeholder="precio propiedad" id="precio" value="<?php echo s($propiedad->precio); ?>">
                <?php if(in_array('El precio es obligatorio', $errores)) {
                    echo '<div class="alerta error">';
                        echo 'El precio es obligatorio';
                    echo '</div>';
                }?>
                
                <label for="imagen">Imagen:</label>
                <input name="propiedad[imagen]" type="file" id="imagen" accept="image/jpeg, image/png" value="<?php echo $propiedad->imagen; ?>"> 
                <?php if(in_array('Añade una imagen', $errores)) {
                    echo '<div class="alerta error">';
                        echo 'Añade una imagen';
                    echo '</div>';
                }?>
                <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad" class="imagen-small">      

                <label for="descripcion">Descripción</label>
                <textarea name="propiedad[descripcion]" id="descripcion"><?php echo s($propiedad->descripcion); ?></textarea>
                <?php if(in_array('La descripción es obligatoria y debe tener al menos 50 caracteres.', $errores)) {
                    echo '<div class="alerta error">';
                        echo 'La descripción es obligatoria y debe tener al menos 50 caracteres.';
                    echo '</div>';                
                }?>
            </fieldset>

            <fieldset>
                <legend>Información de la propiedad</legend>

                <label for="habitaciones">habitaciones:</label>
                <input name="propiedad[habitaciones]" type="number" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones);?>">
                <?php if(in_array('El número de habitaciones es obligatorio.', $errores)) {
                    echo '<div class="alerta error">';
                        echo 'El número de habitaciones es obligatorio.';
                    echo '</div>';
                }?>
                
                <label for="wc">baños:</label>
                <input name="propiedad[wc]" type="number" id="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">
                <?php if(in_array('El número de baños es obligatorio.', $errores)) {
                    echo '<div class="alerta error">';
                        echo 'El número de baños es obligatorio.';
                    echo '</div>';
                }?>

                <label for="estacionamiento">Estacionamientos:</label>
                <input name="propiedad[estacionamiento]" type="number" id="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>">
                <?php if(in_array('El número de estacionamientos es obligatorio.', $errores)) {
                    echo '<div class="alerta error">';
                        echo 'El número de estacionamientos es obligatorio.';
                    echo '</div>';
                }?>
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="propiedad[vendedorId]">
                    <option value="">-- Seleccione un vendedor --</option>
                    <?php while($row = mysqli_fetch_assoc($resultado) ) : ?>                
                        <option <?php echo $propiedad->vendedorId === $row['id'] ? 'selected' : '' ; ?>  value="<?php echo s($propiedad->vendedorId); ?>"> <?php echo $row['nombre'] . " " . $row['apellido']; ?> </option>

                    <?php endwhile; ?> 
                </select>
                <?php if(in_array('Selecciona un vendedor.', $errores)) {
                    echo '<div class="alerta error">';
                        echo 'Selecciona un vendedor.';
                    echo '</div>';
                }?>

            </fieldset>