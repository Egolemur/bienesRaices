<?php

namespace App;

class Propiedad {

    // Base de datos
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    // Errores 
    protected static $errores = [];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    // Definir conexion a BD
    public static function setDB($database) {
        self::$db = $database;
    }
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function guardar() {
        if(isset($this->id)){
            // actualizar
            $this->actualizar();
        } else {
            // crear
            $this->crear();
        }
    }

    public function crear() {
        // Sanitizar datos
        $atributos = $this->sanitizarDatos();        
        
        // Insertar entrada en la base de datos
        $query = " INSERT INTO propiedades ( ";
        $query .= join(", ", array_keys($atributos)); 
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos)); 
        $query .= " ') ";

        // debuguear($query);

        $resultado = self::$db->query($query);
        
        return $resultado;
    }   
    
    public function actualizar() {
        // Sanitizar datos
        $atributos = $this->sanitizarDatos();   
        
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "${key}='${value}'";            
        }

        $query = "UPDATE propiedades SET "; 
        $query .= implode(", ", $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";    

        $resultado = self::$db->query($query);

        if($resultado) {
            header("Location: /admin?resultado=2");
        }
    }

    // Identificar y unir los atributos de las columnas de la BD
    public function atributos() {
        $atributos = [];
        foreach(self::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna; 
        }

        return $atributos;
    }

    public function sanitizarDatos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        
        foreach($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }                

        return $sanitizado;        
    }

    // Subir archivos
    public function setImagen($imagen) {
        // Comprobar si existe un archivo anterior
        if(isset($this->id)) {
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if($existeArchivo) {
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }

        // asignar al atributo de imagen la imagen que se ha subido
        if($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Validacion
    public static function getErrores() {
        return self::$errores;
    }

    public function validar() {
        if(!$this->titulo) {
            self::$errores[] = "El título es obligatorio";
        }

        if(!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }

        if(!$this->imagen) {
            self::$errores[] = "Añade una imagen";
        }

        // // Validar por medida
        // $medida = 1000*1000;

        // if($this->imagen['size'] > $medida) {
        //     self::$errores[] = "El archivo no puede ser mayor a 200kb";
        // }

        if(!$this->descripcion || strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres.";
        }

        if(!$this->habitaciones) {
            self::$errores[] = "El número de habitaciones es obligatorio.";
        }

        if(!$this->wc) {
            self::$errores[] = "El número de baños es obligatorio.";
        }

        if(!$this->estacionamiento) {
            self::$errores[] = "El número de estacionamientos es obligatorio.";
        }

        if(!$this->vendedorId) {
            self::$errores[] = "Selecciona un vendedor.";
        }        

        return self::$errores;
    }

    // Busca todos los registros
    public static function all() {
        $query = "SELECT * FROM propiedades";

        $resultado = self::consultarSQL($query);    

        return $resultado;
    }

    // Busca un registro por su Id
    public static function find($id) {
        $query = "SELECT * FROM propiedades WHERE id = ${id}";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);       
    }

    public static function consultarSQL($query) {   
        // Consultar la BD
        $resultado = self::$db->query($query);        

        // Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);            
        }        

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;

    }

    protected static function crearObjeto($registro) {
        $objeto = new self;

        foreach($registro as $key => $value) {
            if(property_exists($objeto, $key)) {            
                $objeto->$key = $value;
            }
        }

        return $objeto; 
    }

    // Sincroniza el obbjeto en memoria con los cambios realizados por el usuario
    public function sincronizar( $args = [] ) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}