<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite8b7d5668817169c73f2b2f637bd1e57
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite8b7d5668817169c73f2b2f637bd1e57::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite8b7d5668817169c73f2b2f637bd1e57::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite8b7d5668817169c73f2b2f637bd1e57::$classMap;

        }, null, ClassLoader::class);
    }
}
