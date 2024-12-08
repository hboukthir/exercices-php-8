<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3d78c58c3c6b0c2a1151c12fd3880e37
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3d78c58c3c6b0c2a1151c12fd3880e37::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3d78c58c3c6b0c2a1151c12fd3880e37::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3d78c58c3c6b0c2a1151c12fd3880e37::$classMap;

        }, null, ClassLoader::class);
    }
}