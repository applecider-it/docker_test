<div class="space-y-5">
  <div>ある程度まではできるけど、複雑なものや、詳細までカスタマイズが必須の場合はvueにするしかない。</div>

  <form 
    hx-get="/development/javascript_htmx"
    hx-trigger="load, input changed delay:400ms"
    hx-target="#result"
    onsubmit="return false;"
    class="space-x-5"
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
</div>
