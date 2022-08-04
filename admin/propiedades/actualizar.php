<?php

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';

$auth = estaAutenticado();

$id  = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

// echo '<pre>';
// var_dump($imagen['name']);
// echo '</pre>';

if(!$id) {
    header('location: /admin');
}

$db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud'); 

// Obtener los datos de la propiedad
$propiedad = Propiedad::find($id);

// Consulta para obtener los vendedores
$consultaVendedores = "SELECT * FROM vendedores;";
$resultado = mysqli_query($db, $consultaVendedores);

$errores = Propiedad::getErrores();

$titulo = $propiedad->titulo;
$precio = $propiedad->precio;
$imagen = $propiedad->imagen;
$descripcion = $propiedad->descripcion;
$habitaciones = $propiedad->habitaciones;
$wc = $propiedad->wc;
$estacionamiento = $propiedad->estacionamiento;
$vendedorId = $propiedad->vendedorId;

// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
    

if($_SERVER["REQUEST_METHOD"] === 'POST') {

    $args = $_POST['propiedad'];   

    // Asignar los atributos 
    $propiedad->sincronizar($args);

    // Validacion
    $errores = $propiedad->validar();

    // Subida de archivos
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    if($_FILES['propiedad']['tmp_name']['imagen'] ) {
        // Realiza un resize a la imagen con Intervention Image
        $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
        
        // Settear la imagen
        $propiedad->setImagen($nombreImagen);        
    }

    if(empty($errores)) {       
        // Almacenar la imagen en SSD
        $imagen->save(CARPETA_IMAGENES . $nombreImagen);
        $propiedad->guardar();                           
    }
}

// require '../../includes/funciones.php';
incluirTemplate('header'); 

?>

<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario"  method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" class="boton boton-verde" value="Actualizar propiedad">
    </form>
</main>

<?php  
    incluirTemplate('footer'); 
?>