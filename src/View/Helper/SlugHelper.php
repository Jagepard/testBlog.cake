<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Slug helper
 */
class SlugHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];

    public static function getIdFromSlug(string $slug): string
    {
        $slug = strip_tags($slug);

        return (strpos($slug, '_') !== false) ? strstr($slug, '_', true) : $slug;
    }
}
