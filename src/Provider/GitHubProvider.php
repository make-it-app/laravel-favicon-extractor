<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Provider;

use GrahamCampbell\GuzzleFactory\GuzzleFactory;

class GitHubProvider implements ProviderInterface
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
        $domain = preg_replace( '/https?:\/\/(www\.)?([\w\-\.]+)\/?.*/i', '$2', $url );
        return 'https://favicons.githubusercontent.com/' . urlencode( $domain );
    }
}
