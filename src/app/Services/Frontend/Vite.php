<?php

namespace App\Services\Frontend;

/**
 * Vite管理
 */
class Vite
{
    /** Viteアセットのパスをmanifestから返す。 */
    public static function vite_asset(string $entry): string
    {
        static $manifest = null;

        if ($manifest === null) {
            $path = __DIR__ . '/assets/.vite/manifest.json';
            $manifest = json_decode(file_get_contents($path), true);
        }

        return '/assets/' . $manifest[$entry]['file'];
    }
}
