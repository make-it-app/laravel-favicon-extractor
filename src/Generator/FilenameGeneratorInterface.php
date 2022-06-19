<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Generator;
interface FilenameGeneratorInterface
{
    /**
     * @param int $length
     * @return string
     */
    public function generate( int $length ): string;
}
