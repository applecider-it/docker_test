<?php

namespace App\Services\Frontend;

/**
 * Vite管理
 */
class Vite
{
    /** マニフェストのキャッシュ */
    private static $manifest = null;

    /** Viteを使用する準備 */
    public static function init(): string
    {
        $val = '';

        if (self::isDev()) {
            $val = '
                <script type="module">
                    import RefreshRuntime from "http://localhost:5173/@react-refresh"
                    RefreshRuntime.injectIntoGlobalHook(window)
                    window.$RefreshReg$ = () => {}
                    window.$RefreshSig$ = () => (type) => type
                    window.__vite_plugin_react_preamble_installed__ = true
                </script>
                <script type="module" src="http://localhost:5173/@vite/client"></script>
            ';
        }

        return $val;
    }

    /** Viteアセットのパスをmanifestから返す。 */
    public static function asset(string $entry): string
    {
        if (self::isDev()) {
            return 'http://localhost:5173/' . $entry;
        } else {
            if (self::$manifest === null) {
                $path = APP_ROOT . '/public/assets/.vite/manifest.json';
                self::$manifest = json_decode(file_get_contents($path), true);
            }

            return '/assets/' . self::$manifest[$entry]['file'];
        }
    }

    /** Viteが開発環境か返す */
    private static function isDev(): bool
    {
        return $_ENV['APP_ENV'] === 'local';
    }
}
