<div x-data="{ open: false }" class="p-6">

    <button
        @click="open = !open"
        class="app-btn-primary"
    >
        Toggle
    </button>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
    >
        <div class="mt-4 p-4 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-lg">
            Hello Alpine 👋
        </div>
    </div>

</div>