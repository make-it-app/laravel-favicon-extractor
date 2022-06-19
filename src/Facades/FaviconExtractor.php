<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Facades;

use Illuminate\Support\Facades\Facade;

class FaviconExtractor extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'favicon.extractor';
    }
}
