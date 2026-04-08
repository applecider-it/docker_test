<script setup lang="ts"></script>

<template>
  <div class="min-h-screen flex flex-col">
    <header class="p-4 border-b">
      <h1 class="text-lg font-semibold">アトミックデザイン用レイアウト</h1>
    </header>

    <main class="flex-1 max-w-3xl mx-auto p-6">
      <p class="text-gray-600">
        <slot />
      </p>
    </main>

    <footer class="p-4 border-t text-sm text-gray-500 text-center">
      © 2026
    </footer>
  </div>
</template>
