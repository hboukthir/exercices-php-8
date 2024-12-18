<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf71fbb2ca5b91b29c27d6ce6c816d55d
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf71fbb2ca5b91b29c27d6ce6c816d55d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf71fbb2ca5b91b29c27d6ce6c816d55d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf71fbb2ca5b91b29c27d6ce6c816d55d::$classMap;

        }, null, ClassLoader::class);
    }
}
