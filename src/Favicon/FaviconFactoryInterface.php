<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Favicon;
interface FaviconFactoryInterface
{
    /**
     * @param string $content
     * @return Favicon
     */
    public function create( string $content ): Favicon;
}
