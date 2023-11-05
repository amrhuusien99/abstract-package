<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfdb114acefcb14472e8e8aa020c6344d
{
    public static $prefixLengthsPsr4 = array (
        'd' => 
        array (
            'devx\\abstract\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'devx\\abstract\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfdb114acefcb14472e8e8aa020c6344d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfdb114acefcb14472e8e8aa020c6344d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfdb114acefcb14472e8e8aa020c6344d::$classMap;

        }, null, ClassLoader::class);
    }
}
