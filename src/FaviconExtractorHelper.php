<?php

namespace MakeIT\LaravelFaviconExtractor;

use Storage;

class FaviconExtractorHelper
{

    /**
     * check if url is valid (string)
     * @param string $url
     * @return bool
     */
    public static function is_url( string $url ): bool
    {
        return filter_var( $url, FILTER_VALIDATE_URL );
    }

    /**
     * @param string $url
     * @param string $host
     * @return string
     */
    public static function fetch_favicon( string $url, string $host ): string
    {
        /** relative to Laravel's Storage engine */
        $storePath   = '/favicons/' . $host;
        /** absolute path, where to save */
        $storagePath = storage_path( 'app/public' . $storePath );
        /** return uploaded favicon's relative to website path */
        return FaviconExtractor::fromUrl( $url )->fetchAndSaveTo( $storePath );
    }

    /**
     * Delete domain favicons
     * @param string $host
     * @return bool
     */
    public static function destroy_favicons( string $host ): bool
    {
        return Storage::delete( static::domain_favicons( $host ) );
    }

    /**
     * List of files uploaded for domain directory
     * @param string $host
     * @return array
     */
    public static function domain_favicons( string $host ): array
    {
        return Storage::allFiles( '/favicons/' . $host );
    }

}
