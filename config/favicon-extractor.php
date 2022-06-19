<?php

use MakeIT\LaravelFaviconExtractor\Generator\FilenameGenerator;
use MakeIT\LaravelFaviconExtractor\Provider\GoogleProvider;

return [
    /*
    |--------------------------------------------------------------------------
    | Favicon Provider
    |--------------------------------------------------------------------------
    |
    | This class is used for fetching favicons. You can swap it out easily if
    | you like as long as you implement the ProviderInterface.
    |
    | \MakeIT\LaravelFaviconExtractor\Provider\ProviderInterface
    |
    */
    'provider_class'            => GoogleProvider::class,

    /*
    |--------------------------------------------------------------------------
    | Filename Generator
    |--------------------------------------------------------------------------
    |
    | If you don't specify a custom filename on saving the downloaded favicon
    | to your storage, this package generates a random string for it. You
    | can override this behaviour at any time by using a custom
    | implementation which implements the following interface.
    |
    | \MakeIT\LaravelFaviconExtractor\Generator\FilenameGeneratorInterface
    |
    */
    'filename_generator_class'  => FilenameGenerator::class,

    /*
    |--------------------------------------------------------------------------
    | Filename Generator Length
    |--------------------------------------------------------------------------
    */
    'filename_generator_length' => 17,
];
