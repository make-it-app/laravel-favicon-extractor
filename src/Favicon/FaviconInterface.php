<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Favicon;
interface FaviconInterface
{
    /**
     * @return string
     */
    public function getContent(): string;
}
