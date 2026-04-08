<script setup lang="ts">
import SampleCard from "@/atomic/molecules/Card/SampleCard.vue";

defineProps<{
  list: string[];
}>();
</script>

<template>
  <section class="max-w-5xl mx-auto p-6 bg-white rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">カード一覧</h2>
    <div class="text-gray-600">
      <div class="grid grid-cols-3 gap-10">
        <div v-for="(value, index) in list" :key="index">
          <SampleCard :title="value" />
        </div>
      </div>
    </div>
  </section>
</template>
