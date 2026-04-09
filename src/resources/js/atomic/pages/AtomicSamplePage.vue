<script setup lang="ts">
import AtomLayout from '@/atomic/templates/AtomLayout.vue';
import SampleCards from '@/atomic/organisms/Cards/SampleCards.vue';

defineProps<{
  list: string[];
}>();
</script>

<template>
  <AtomLayout>
      <SampleCards :list="list" />
  </AtomLayout>
</template>
