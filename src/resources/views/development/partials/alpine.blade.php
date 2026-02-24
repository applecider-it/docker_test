<div x-data="{ open: false }">
  <button
   @click="open = !open"
   class="app-btn-primary"
   >
    Toggle
  </button>

  <p x-show="open">
    Hello Alpine
  </p>
</div>