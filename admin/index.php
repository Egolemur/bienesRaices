<?php
    require '../includes/app.php';
    
    estaAutenticado();

    use App\Propiedad;

    // Implementar un metodo para leer todas las propiedades.
    $propiedades = Propiedad::all();
    
    // debuguear($propiedades);

    $resultado = $_GET['resultado'] ?? null;
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $carpetaImagenes = '../imagenes/';
     
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
                
        if($id) {
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);
            
            unlink('../imagenes/' . $propiedad['imagen']);                            
            
            
            $query = "DELETE FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            
            if($resultado) {
                header('location: /admin?resultado=3');
            } 
        }
        
    }
    
    incluirTemplate('header');    
    
    ?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raíces</h1>

    <?php if(intval($resultado) === 1):?>
        <p class="alerta exito">Registro Creado Exitosamente</p>
    <?php elseif(intval($resultado) === 2):?> 
        <p class="alerta exito">Registro Actualizado Exitosamente</p>
    <?php elseif(intval($resultado) === 3):?> 
        <p class="alerta exito">Registro Eliminado Exitosamente</p>
    <?php endif; ?>    

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título de la propiedad</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($propiedades as $propiedad):?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="Imagen-tabla"></td>
                <td>$ <?php echo $propiedad->precio;?></td>
                <td>
                    <a class="boton-amarillo-block" href="../admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                    <form method="POST" class="w-100">                        
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <input type="submit" class="boton-rojo-block w-100" value="Eliminar">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

<?php  
    incluirTemplate('footer'); 
?> 