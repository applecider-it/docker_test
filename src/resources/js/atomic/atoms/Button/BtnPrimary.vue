<script setup lang="ts">
defineProps<{
  text: string;
}>();
</script>

<template>
  <button class="app-btn-primary">{{ text }}</button>
</template>
