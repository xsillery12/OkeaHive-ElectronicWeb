<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9ac7f30f340dc0df9da49dd9fa6b3ec1
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9ac7f30f340dc0df9da49dd9fa6b3ec1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9ac7f30f340dc0df9da49dd9fa6b3ec1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9ac7f30f340dc0df9da49dd9fa6b3ec1::$classMap;

        }, null, ClassLoader::class);
    }
}