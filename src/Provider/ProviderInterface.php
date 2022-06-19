<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Provider;
interface ProviderInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function fetchFromUrl( string $url ): string;
}
