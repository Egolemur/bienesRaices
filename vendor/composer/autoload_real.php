<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9a1bb2835f3f4bdfeea2a098aa3fcce3
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit9a1bb2835f3f4bdfeea2a098aa3fcce3', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9a1bb2835f3f4bdfeea2a098aa3fcce3', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit9a1bb2835f3f4bdfeea2a098aa3fcce3::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInit9a1bb2835f3f4bdfeea2a098aa3fcce3::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire9a1bb2835f3f4bdfeea2a098aa3fcce3($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire9a1bb2835f3f4bdfeea2a098aa3fcce3($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
