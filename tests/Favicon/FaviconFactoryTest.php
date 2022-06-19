<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Favicon;

use Orchestra\Testbench\TestCase;

/**
 * @method assertSame( string $expectedContent, $getContent )
 * @method assertInstanceOf( string $class, $favicon )
 */
class FaviconFactoryTest extends TestCase
{
    /**
     * @return void
     */
    public function test_it_creates_a_favicon(): void
    {
        $factory = new FaviconFactory();
        $favicon = $factory->create( $expectedContent = 'content' );
        $this->assertInstanceOf( Favicon::class, $favicon );
        $this->assertSame( $expectedContent, $favicon->getContent() );
    }
}
