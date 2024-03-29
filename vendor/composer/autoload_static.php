<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c0627b8c2a99a2a78dc19ccb8a90f81
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'VIISON\\AddressSplitter\\' => 23,
        ),
        'T' => 
        array (
            'TheIconic\\NameParser\\' => 21,
        ),
        'F' => 
        array (
            'Fatchip\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'VIISON\\AddressSplitter\\' => 
        array (
            0 => __DIR__ . '/..' . '/viison/address-splitter/src',
        ),
        'TheIconic\\NameParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/theiconic/name-parser/src',
            1 => __DIR__ . '/..' . '/theiconic/name-parser/tests',
        ),
        'Fatchip\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c0627b8c2a99a2a78dc19ccb8a90f81::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c0627b8c2a99a2a78dc19ccb8a90f81::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c0627b8c2a99a2a78dc19ccb8a90f81::$classMap;

        }, null, ClassLoader::class);
    }
}
