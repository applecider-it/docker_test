<script setup lang="ts">
import AtomLayout from '@/atomic/templates/AtomLayout.vue';
import SampleCards from '@/atomic/organisms/Cards/SampleCards.vue';

const list = [
  'カード１',
  'カード２',
  'カード３',
];
</script>

<template>
  <AtomLayout>
      <SampleCards :list="list" />
  </AtomLayout>
</template>
