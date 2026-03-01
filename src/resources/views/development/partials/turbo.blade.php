@php
use function App\Helpers\route;
@endphp
<turbo-frame id="user_list">
  <a href="{{ route('development.javascript.turbo_api') }}" class="app-btn-primary">Load Users</a>
</turbo-frame>
