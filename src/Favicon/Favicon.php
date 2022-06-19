<?php
declare( strict_types = 1 );

namespace MakeIT\LaravelFaviconExtractor\Favicon;
class Favicon implements FaviconInterface
{
    /**
     * @var string
     */
    private string $content;

    /**
     * @param $content
     */
    public function __construct( $content )
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
