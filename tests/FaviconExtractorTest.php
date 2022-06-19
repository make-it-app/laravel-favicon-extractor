<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor;

use Illuminate\Support\Facades\Storage;
use MakeIT\LaravelFaviconExtractor\Exception\FaviconCouldNotBeSavedException;
use MakeIT\LaravelFaviconExtractor\Exception\InvalidUrlException;
use MakeIT\LaravelFaviconExtractor\Favicon\Favicon;
use MakeIT\LaravelFaviconExtractor\Favicon\FaviconFactoryInterface;
use MakeIT\LaravelFaviconExtractor\Generator\FilenameGeneratorInterface;
use MakeIT\LaravelFaviconExtractor\Provider\ProviderInterface;
use Mockery;
use Mockery\MockInterface;
use Orchestra\Testbench\TestCase;

/**
 * @method expectException( string $class )
 */
class FaviconExtractorTest extends TestCase
{
    /**
     * @var FaviconFactoryInterface|MockInterface
     */
    private FaviconFactoryInterface|MockInterface $faviconFactory;

    /**
     * @var ProviderInterface|MockInterface
     */
    private MockInterface|ProviderInterface $provider;

    /**
     * @var FilenameGeneratorInterface|MockInterface
     */
    private FilenameGeneratorInterface|MockInterface $filenameGenerator;

    /**
     * @var FaviconExtractor
     */
    private FaviconExtractor $extractor;

    /**
     * @return void
     */
    public function test_it_fetches_the_favicon(): void
    {
        $expectedUrl     = 'http://example.com';
        $expectedContent = 'example-content';
        $this->provider
            ->shouldReceive( 'fetchFromUrl' )
            ->once()
            ->with( $expectedUrl )
            ->andReturn( $expectedContent );
        $this->faviconFactory
            ->shouldReceive( 'create' )
            ->once()
            ->with( $expectedContent );
        $this->extractor->fromUrl( $expectedUrl )->fetchOnly();
    }

    /**
     * @return void
     */
    public function test_it_generates_a_filename_if_none_given(): void
    {
        $this->provider->shouldIgnoreMissing();
        $expectedFavicon = new Favicon( 'content' );
        $this->faviconFactory
            ->shouldReceive( 'create' )
            ->withAnyArgs()
            ->andReturn( $expectedFavicon );
        $this->filenameGenerator
            ->shouldReceive( 'generate' )
            ->once()
            ->with( 16 )
            ->andReturn( 'random-filename' );
        $this->extractor
            ->fromUrl( 'http://example.com' )
            ->fetchAndSaveTo( 'some-path' );
    }

    /**
     * @return void
     */
    public function test_it_saves_it_properly(): void
    {
        $this->provider->shouldIgnoreMissing();
        $expectedFavicon = new Favicon( 'content' );
        $this->faviconFactory
            ->shouldReceive( 'create' )
            ->withAnyArgs()
            ->andReturn( $expectedFavicon );
        Storage::fake();
        Storage::
        shouldReceive( 'put' )
               ->once()
               ->with( 'some-path/a-filename.png', 'content' )
               ->andReturn( true );
        $this->extractor
            ->fromUrl( 'http://example.com' )
            ->fetchAndSaveTo( 'some-path', 'a-filename' );
    }

    /**
     * @return void
     */
    public function test_it_throws_an_exception_when_saving_was_not_successful(): void
    {
        $this->provider->shouldIgnoreMissing();
        $expectedFavicon = new Favicon( 'content' );
        $this->faviconFactory->shouldReceive( 'create' )->withAnyArgs()->andReturn( $expectedFavicon );
        Storage::fake();
        Storage::
        shouldReceive( 'put' )->once()->andReturn( false );
        $this->expectException( FaviconCouldNotBeSavedException::class );
        $this->extractor->fromUrl( 'http://example.com' )->fetchAndSaveTo( 'some-path', 'a-filename' );
    }

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->faviconFactory    = Mockery::mock( FaviconFactoryInterface::class );
        $this->provider          = Mockery::mock( ProviderInterface::class );
        $this->filenameGenerator = Mockery::mock( FilenameGeneratorInterface::class );
        $this->extractor         = new FaviconExtractor( $this->faviconFactory, $this->provider, $this->filenameGenerator );
        parent::setUp();
    }
}
