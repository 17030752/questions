<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit733b749f8b6dd9974f356216e22e114a
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'D17030752\\Survey\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'D17030752\\Survey\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit733b749f8b6dd9974f356216e22e114a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit733b749f8b6dd9974f356216e22e114a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit733b749f8b6dd9974f356216e22e114a::$classMap;

        }, null, ClassLoader::class);
    }
}
