<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Favicon;

use Orchestra\Testbench\TestCase;

/**
 * @method assertSame( string $expectedContent, $getContent )
 */
class FaviconTest extends TestCase
{
    /**
     * @return void
     */
    public function test_it_has_content(): void
    {
        $favicon = new Favicon( $expectedContent = 'content' );
        $this->assertSame( $expectedContent, $favicon->getContent() );
    }
}
