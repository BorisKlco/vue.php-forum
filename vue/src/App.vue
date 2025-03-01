<script setup>
import { RouterView } from 'vue-router'
import TheHeader from '@/components/TheHeader.vue'
</script>

<template>
  <TheHeader />
  <main class="py-4 px-4 max-w-[95%] xl:max-w-[1440px] mx-auto">
    <RouterView />
  </main>
</template>
