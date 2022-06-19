<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Provider;

use GrahamCampbell\GuzzleFactory\GuzzleFactory;

class GoogleProvider implements ProviderInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function fetchFromUrl( string $url ): string
    {
        $client   = GuzzleFactory::make();
        $response = $client->get( $this->getUrl( $url ) );
        return $response->getBody()->getContents();
    }

    /**
     * @param string $url
     * @return string
     */
    private function getUrl( string $url ): string
    {
        return 'https://www.google.com/s2/favicons?domain=' . urlencode( $url );
    }
}
