<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor;

use Illuminate\Support\ServiceProvider;
use MakeIT\LaravelFaviconExtractor\Favicon\FaviconFactory;
use MakeIT\LaravelFaviconExtractor\Favicon\FaviconFactoryInterface;
use MakeIT\LaravelFaviconExtractor\Generator\FilenameGeneratorInterface;
use MakeIT\LaravelFaviconExtractor\Provider\ProviderInterface;

class FaviconExtractorServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes( [
            __DIR__ . '/../config/favicon-extractor.php' => config_path( 'favicon-extractor.php' ),
        ], 'config' );
        $this->app->bind(
            FaviconFactoryInterface::class,
            FaviconFactory::class
        );
        $this->app->bind(
            ProviderInterface::class,
            config( 'favicon-extractor.provider_class' )
        );
        $this->app->bind(
            FilenameGeneratorInterface::class,
            config( 'favicon-extractor.filename_generator_class' )
        );
        $this->app->bind(
            FaviconExtractorInterface::class,
            FaviconExtractor::class
        );
        $this->app->alias( FaviconExtractorInterface::class, 'favicon.extractor' );
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom( __DIR__ . '/../config/favicon-extractor.php', 'favicon-extractor' );
    }
}
