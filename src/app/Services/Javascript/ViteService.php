<?php

namespace App\Services\Javascript;

use function App\Helpers\env;

/**
 * Vite管理
 */
class ViteService
{
    /** マニフェストのキャッシュ */
    private static $manifest = null;

    /** Viteを使用する準備 */
    public static function init(): string
    {
        $val = '';

        if (self::isDev()) {
            $val = '<script type="module" src="' . self::devUrl() . '/@vite/client"></script>' . self::reactRefresh();
        }

        return $val;
    }

    /** Viteアセットのパスをmanifestから返す。 */
    public static function asset(string $entry): string
    {
        if (self::isDev()) {
            return self::devUrl() . '/' . $entry;
        } else {
            self::initManifest();

            return '/assets/' . self::$manifest[$entry]['file'];
        }
    }

    /** Manifestを取得 */
    private static function initManifest()
    {
        if (self::$manifest === null) {
            $path = APP_ROOT . '/public/assets/.vite/manifest.json';
            self::$manifest = json_decode(file_get_contents($path), true);
        }
    }

    /** ViteのReactプラグインを使うときに必要なコード */
    private static function reactRefresh(): string
    {
        return '
            <script type="module">
                import RefreshRuntime from "' . self::devUrl() . '/@react-refresh"
                RefreshRuntime.injectIntoGlobalHook(window)
                window.$RefreshReg$ = () => {}
                window.$RefreshSig$ = () => (type) => type
                window.__vite_plugin_react_preamble_installed__ = true
            </script>
        ';
    }

    /** Viteが開発環境か返す */
    private static function isDev(): bool
    {
        return env('APP_ENV') === 'local';
    }

    /** 開発環境のURL */
    private static function devUrl(): string
    {
        return 'http://localhost:5173';
    }
}
