@php
use function App\Helpers\route;
@endphp
<button 
    hx-get="{{ route('development.javascript.htmx_api') }}"
    hx-target="#result"
    hx-swap="innerHTML"
    class="app-btn-primary"
>
    クリック
</button>

<div id="result"></div>