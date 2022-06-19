# Laravel Favicon Extractor

### FORKED FROM
https://github.com/stefanbauer/laravel-favicon-extractor

### Diff with original

- Removed Laravel 5.5-7 legacy. Laravel 8+ only
- Adapted to PHP 8+
- There is an undercut, but it's not critical

# Installation

```bash
composer require make-it-app/laravel-favicon-extractor
php artisan vendor:publish --provider="MakeIT\LaravelFaviconExtractor\FaviconExtractorServiceProvider" --tag="config"
```

# Usage

See `/src/FaviconExtractorHelper.php` class.

# LICENSE MIT
