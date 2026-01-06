<?php

function vite_asset(string $entry): string
{
    return App\Services\Frontend\Vite::vite_asset($entry);
}

