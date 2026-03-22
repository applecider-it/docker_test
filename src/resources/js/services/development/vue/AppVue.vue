<script setup lang="ts">
import { ref } from "vue";

const val1 = ref(1);

const list = ["A", "B", "C"];

const test = () => {
  val1.value++;
  console.log(`test(): val1: ${val1.value}`);
};
</script>

<template>
  <div className="p-6 text-xl text-blue-600">Vue + Vite + Tailwind</div>
  <div className="space-y-3">
    <div>
      <button type="button" @click="test" className="app-btn-primary">
        Test
      </button>
      <div>val1: {{ val1 }}</div>
    </div>
    <div>
      <div v-if="true">IF1</div>
      <div v-if="false">IF2 x</div>
      <div v-else>IF2</div>
    </div>
    <div>
      <div v-for="(value, idx) in list" :key="value">
        idx: {{ idx }}. value: {{ value }}.
      </div>
    </div>
  </div>
</template>
