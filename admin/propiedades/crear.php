<?php
    
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    $auth = estaAutenticado();

    $db = conectarDB();
    $propiedad = new Propiedad;

    $consultaVendedores = "SELECT * FROM vendedores;";
    $resultado = mysqli_query($db, $consultaVendedores);

    $errores = Propiedad::getErrores();

    if($_SERVER["REQUEST_METHOD"] === 'POST') {                 

        $propiedad = new Propiedad($_POST['propiedad']);        
     
        // Generar un nombre único
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        if($_FILES['propiedad']['tmp_name']['imagen'] ) {

            // Realiza un resize a la imagen con Intervention Image
            $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            
            // Settear la imagen
            $propiedad->setImagen($nombreImagen);
            
        }
        
        // Validar
        $errores = $propiedad->validar();

        if(!$errores) {        
            
            // creando la carpeta Imagenes
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }
            
            // Guardar la imagen en el servidor       
            $imagen->save(CARPETA_IMAGENES . $nombreImagen);
            
            // Guardando en la DB
            $resultado = $propiedad->guardar();  
            
            if($resultado) {
                header("Location: /admin?resultado=1");
            }
        }
    }

    // if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     debuguear($_FILES['imagen']);

    // }

    incluirTemplate('header'); 

?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <form class="formulario"  method="POST" action="/admin//propiedades/crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" class="boton boton-verde" value="Crear Propiedad">
        </form>
    </main>

<?php  
    incluirTemplate('footer'); 
?>