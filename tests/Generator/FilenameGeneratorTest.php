<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Generator;

use Orchestra\Testbench\TestCase;

/**
 * @method assertSame( int $expectedLength, int $strlen )
 */
class FilenameGeneratorTest extends TestCase
{
    /**
     * @return void
     */
    public function test_it_generates_a_random_string_by_given_length(): void
    {
        $generator = new FilenameGenerator();
        $generated = $generator->generate( $expectedLength = 10 );
        $this->assertSame( $expectedLength, strlen( $generated ) );
    }
}
