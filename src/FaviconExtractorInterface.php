<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor;

use MakeIT\LaravelFaviconExtractor\Favicon\FaviconInterface;

interface FaviconExtractorInterface
{
    /**
     * @param string $url
     * @return $this
     */
    public function fromUrl( string $url ): self;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return FaviconInterface
     */
    public function fetchOnly(): FaviconInterface;

    /**
     * @param string      $path
     * @param string|null $filename
     * @return string
     */
    public function fetchAndSaveTo( string $path, string $filename = null ): string;
}
