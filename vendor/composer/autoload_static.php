<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd9ec41fa5a1916257402f0fa69dc5638
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '3109cb1a231dcd04bee1f9f620d46975' => __DIR__ . '/..' . '/paragonie/sodium_compat/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Contracts\\' => 18,
            'Symfony\\Component\\Yaml\\' => 23,
            'Symfony\\Component\\VarExporter\\' => 30,
            'Symfony\\Component\\Validator\\' => 28,
            'Symfony\\Component\\Routing\\' => 26,
            'Symfony\\Component\\HttpKernel\\' => 29,
            'Symfony\\Component\\HttpFoundation\\' => 33,
            'Symfony\\Component\\Finder\\' => 25,
            'Symfony\\Component\\Filesystem\\' => 29,
            'Symfony\\Component\\EventDispatcher\\' => 34,
            'Symfony\\Component\\DependencyInjection\\' => 38,
            'Symfony\\Component\\Debug\\' => 24,
            'Symfony\\Component\\Console\\' => 26,
            'Symfony\\Component\\Config\\' => 25,
            'Symfony\\Component\\Cache\\' => 24,
            'Symfony\\Bundle\\FrameworkBundle\\' => 31,
        ),
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Log\\' => 8,
            'Psr\\Container\\' => 14,
            'Psr\\Cache\\' => 10,
        ),
        'J' => 
        array (
            'Jose\\Tests\\' => 11,
            'Jose\\Component\\Signature\\Algorithm\\' => 35,
            'Jose\\Component\\Encryption\\Algorithm\\KeyEncryption\\' => 50,
            'Jose\\Component\\Encryption\\Algorithm\\ContentEncryption\\' => 54,
            'Jose\\Component\\Encryption\\Algorithm\\' => 36,
            'Jose\\Component\\Core\\Util\\Ecc\\' => 29,
            'Jose\\' => 5,
        ),
        'F' => 
        array (
            'FG\\' => 3,
        ),
        'B' => 
        array (
            'Base64Url\\' => 10,
        ),
        'A' => 
        array (
            'AESKW\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/contracts',
        ),
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'Symfony\\Component\\VarExporter\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/var-exporter',
        ),
        'Symfony\\Component\\Validator\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/validator',
        ),
        'Symfony\\Component\\Routing\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/routing',
        ),
        'Symfony\\Component\\HttpKernel\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-kernel',
        ),
        'Symfony\\Component\\HttpFoundation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-foundation',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Symfony\\Component\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/filesystem',
        ),
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'Symfony\\Component\\DependencyInjection\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/dependency-injection',
        ),
        'Symfony\\Component\\Debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/debug',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Symfony\\Component\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/config',
        ),
        'Symfony\\Component\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/cache',
        ),
        'Symfony\\Bundle\\FrameworkBundle\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/framework-bundle',
        ),
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
        'Jose\\Tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/web-token/jwt-framework/test',
        ),
        'Jose\\Component\\Signature\\Algorithm\\' => 
        array (
            0 => __DIR__ . '/..' . '/web-token/jwt-framework/src/SignatureAlgorithm/ECDSA',
            1 => __DIR__ . '/..' . '/web-token/jwt-framework/src/SignatureAlgorithm/EdDSA',
            2 => __DIR__ . '/..' . '/web-token/jwt-framework/src/SignatureAlgorithm/HMAC',
            3 => __DIR__ . '/..' . '/web-token/jwt-framework/src/SignatureAlgorithm/None',
            4 => __DIR__ . '/..' . '/web-token/jwt-framework/src/SignatureAlgorithm/RSA',
            5 => __DIR__ . '/..' . '/web-token/jwt-framework/src/SignatureAlgorithm/Experimental',
        ),
        'Jose\\Component\\Encryption\\Algorithm\\KeyEncryption\\' => 
        array (
            0 => __DIR__ . '/..' . '/web-token/jwt-framework/src/EncryptionAlgorithm/KeyEncryption/AESGCMKW',
            1 => __DIR__ . '/..' . '/web-token/jwt-framework/src/EncryptionAlgorithm/KeyEncryption/AESKW',
            2 => __DIR__ . '/..' . '/web-token/jwt-framework/src/EncryptionAlgorithm/KeyEncryption/Direct',
            3 => __DIR__ . '/..' . '/web-token/jwt-framework/src/EncryptionAlgorithm/KeyEncryption/ECDHES',
            4 => __DIR__ . '/..' . '/web-token/jwt-framework/src/EncryptionAlgorithm/KeyEncryption/PBES2',
            5 => __DIR__ . '/..' . '/web-token/jwt-framework/src/EncryptionAlgorithm/KeyEncryption/RSA',
        ),
        'Jose\\Component\\Encryption\\Algorithm\\ContentEncryption\\' => 
        array (
            0 => __DIR__ . '/..' . '/web-token/jwt-framework/src/EncryptionAlgorithm/ContentEncryption/AESGCM',
            1 => __DIR__ . '/..' . '/web-token/jwt-framework/src/EncryptionAlgorithm/ContentEncryption/AESCBC',
        ),
        'Jose\\Component\\Encryption\\Algorithm\\' => 
        array (
            0 => __DIR__ . '/..' . '/web-token/jwt-framework/src/EncryptionAlgorithm/Experimental',
        ),
        'Jose\\Component\\Core\\Util\\Ecc\\' => 
        array (
            0 => __DIR__ . '/..' . '/web-token/jwt-framework/src/Ecc',
        ),
        'Jose\\' => 
        array (
            0 => __DIR__ . '/..' . '/web-token/jwt-framework/src',
        ),
        'FG\\' => 
        array (
            0 => __DIR__ . '/..' . '/fgrosse/phpasn1/lib',
        ),
        'Base64Url\\' => 
        array (
            0 => __DIR__ . '/..' . '/spomky-labs/base64url/src',
        ),
        'AESKW\\' => 
        array (
            0 => __DIR__ . '/..' . '/spomky-labs/aes-key-wrap/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Propel' => 
            array (
                0 => __DIR__ . '/..' . '/propel/propel/src',
            ),
        ),
    );

    public static $classMap = array (
        'Base\\Company' => __DIR__ . '/../..' . '/database/generated-classes/Base/Company.php',
        'Base\\CompanyQuery' => __DIR__ . '/../..' . '/database/generated-classes/Base/CompanyQuery.php',
        'Base\\Drink' => __DIR__ . '/../..' . '/database/generated-classes/Base/Drink.php',
        'Base\\DrinkQuery' => __DIR__ . '/../..' . '/database/generated-classes/Base/DrinkQuery.php',
        'Base\\Friend' => __DIR__ . '/../..' . '/database/generated-classes/Base/Friend.php',
        'Base\\FriendQuery' => __DIR__ . '/../..' . '/database/generated-classes/Base/FriendQuery.php',
        'Base\\Post' => __DIR__ . '/../..' . '/database/generated-classes/Base/Post.php',
        'Base\\PostQuery' => __DIR__ . '/../..' . '/database/generated-classes/Base/PostQuery.php',
        'Base\\Review' => __DIR__ . '/../..' . '/database/generated-classes/Base/Review.php',
        'Base\\ReviewQuery' => __DIR__ . '/../..' . '/database/generated-classes/Base/ReviewQuery.php',
        'Base\\Style' => __DIR__ . '/../..' . '/database/generated-classes/Base/Style.php',
        'Base\\StyleQuery' => __DIR__ . '/../..' . '/database/generated-classes/Base/StyleQuery.php',
        'Base\\User' => __DIR__ . '/../..' . '/database/generated-classes/Base/User.php',
        'Base\\UserQuery' => __DIR__ . '/../..' . '/database/generated-classes/Base/UserQuery.php',
        'Base\\Wishlist' => __DIR__ . '/../..' . '/database/generated-classes/Base/Wishlist.php',
        'Base\\WishlistQuery' => __DIR__ . '/../..' . '/database/generated-classes/Base/WishlistQuery.php',
        'Company' => __DIR__ . '/../..' . '/database/generated-classes/Company.php',
        'CompanyQuery' => __DIR__ . '/../..' . '/database/generated-classes/CompanyQuery.php',
        'Drink' => __DIR__ . '/../..' . '/database/generated-classes/Drink.php',
        'DrinkQuery' => __DIR__ . '/../..' . '/database/generated-classes/DrinkQuery.php',
        'Friend' => __DIR__ . '/../..' . '/database/generated-classes/Friend.php',
        'FriendQuery' => __DIR__ . '/../..' . '/database/generated-classes/FriendQuery.php',
        'Map\\CompanyTableMap' => __DIR__ . '/../..' . '/database/generated-classes/Map/CompanyTableMap.php',
        'Map\\DrinkTableMap' => __DIR__ . '/../..' . '/database/generated-classes/Map/DrinkTableMap.php',
        'Map\\FriendTableMap' => __DIR__ . '/../..' . '/database/generated-classes/Map/FriendTableMap.php',
        'Map\\PostTableMap' => __DIR__ . '/../..' . '/database/generated-classes/Map/PostTableMap.php',
        'Map\\ReviewTableMap' => __DIR__ . '/../..' . '/database/generated-classes/Map/ReviewTableMap.php',
        'Map\\StyleTableMap' => __DIR__ . '/../..' . '/database/generated-classes/Map/StyleTableMap.php',
        'Map\\UserTableMap' => __DIR__ . '/../..' . '/database/generated-classes/Map/UserTableMap.php',
        'Map\\WishlistTableMap' => __DIR__ . '/../..' . '/database/generated-classes/Map/WishlistTableMap.php',
        'Post' => __DIR__ . '/../..' . '/database/generated-classes/Post.php',
        'PostQuery' => __DIR__ . '/../..' . '/database/generated-classes/PostQuery.php',
        'Review' => __DIR__ . '/../..' . '/database/generated-classes/Review.php',
        'ReviewQuery' => __DIR__ . '/../..' . '/database/generated-classes/ReviewQuery.php',
        'Style' => __DIR__ . '/../..' . '/database/generated-classes/Style.php',
        'StyleQuery' => __DIR__ . '/../..' . '/database/generated-classes/StyleQuery.php',
        'User' => __DIR__ . '/../..' . '/database/generated-classes/User.php',
        'UserQuery' => __DIR__ . '/../..' . '/database/generated-classes/UserQuery.php',
        'Wishlist' => __DIR__ . '/../..' . '/database/generated-classes/Wishlist.php',
        'WishlistQuery' => __DIR__ . '/../..' . '/database/generated-classes/WishlistQuery.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd9ec41fa5a1916257402f0fa69dc5638::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd9ec41fa5a1916257402f0fa69dc5638::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd9ec41fa5a1916257402f0fa69dc5638::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd9ec41fa5a1916257402f0fa69dc5638::$classMap;

        }, null, ClassLoader::class);
    }
}
