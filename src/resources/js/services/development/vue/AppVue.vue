<script setup lang="ts">
import { ref } from "vue";
import Parts from "./app-vue/Parts.vue";

console.log("AppVue");

const title = ref<string>("");
const content = ref<string>("");

const val1 = ref<number>(1);

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
      <template v-if="true">
        <div>IF1</div>
      </template>
      <div v-if="false">IF2 x</div>
      <div v-else>IF2</div>
    </div>
    <div>
      <div v-for="(value, idx) in list" :key="value">
        idx: {{ idx }}. value: {{ value }}.
      </div>
    </div>
    <div>
      <p>title: {{ title }}</p>
      <p>content: {{ content }}</p>

      <Parts v-model:title="title" v-model:content="content" />
    </div>
  </div>
</template>
