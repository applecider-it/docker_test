<script setup lang="ts">
import BtnPrimary from "@/atomic/atoms/Button/BtnPrimary.vue";

defineProps<{
  title: string;
}>();
</script>

<template>
  <div class="max-w-sm rounded-2xl shadow-md overflow-hidden bg-white">
    <img src="/favicon.svg" alt="card image" class="w-full h-48 object-cover" />

    <div class="p-4">
      <h2 class="text-lg font-semibold mb-2">
        {{ title }}
      </h2>

      <p class="text-gray-600 text-sm mb-4">
        ここに説明文が入ります。簡単な概要テキストなど。
      </p>

      <BtnPrimary text="詳しく見る" />
    </div>
  </div>
</template>
