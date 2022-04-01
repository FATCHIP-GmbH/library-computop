<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit9c0627b8c2a99a2a78dc19ccb8a90f81
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

        spl_autoload_register(array('ComposerAutoloaderInit9c0627b8c2a99a2a78dc19ccb8a90f81', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit9c0627b8c2a99a2a78dc19ccb8a90f81', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInit9c0627b8c2a99a2a78dc19ccb8a90f81::getInitializer($loader)();

        $loader->register(true);

        return $loader;
    }
}
