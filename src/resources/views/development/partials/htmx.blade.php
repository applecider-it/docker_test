<form 
  hx-get="/development/javascript_htmx"
  hx-trigger="load, change delay:300ms, keyup delay:500ms"
  hx-target="#result"
>
  <input name="keyword" placeholder="検索">

  <select name="category">
    <option value="">すべて</option>
    @foreach($categoryHash as $key => $val)
      <option value="{{ $key }}" @if($key === $category) selected @endif>{{ $val }}</option>
    @endforeach
  </select>
</form>

<div id="result"></div>