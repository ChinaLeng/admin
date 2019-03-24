<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit421876a178eab2a6e159d7d406d57ee9
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Whoops\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Whoops\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/whoops/src/Whoops',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit421876a178eab2a6e159d7d406d57ee9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit421876a178eab2a6e159d7d406d57ee9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}