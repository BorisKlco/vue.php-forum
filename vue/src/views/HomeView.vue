<script setup>
import TheBoard from '@/components/TheBoard.vue'
import TheWelcome from '../components/TheWelcome.vue'
import TheStats from '@/components/TheStats.vue'
</script>

<template>
  <main class="py-4 px-4 max-w-[95%] xl:max-w-[1440px] mx-auto">
    <TheWelcome />
    <TheBoard />
    <TheStats />
  </main>
</template>
