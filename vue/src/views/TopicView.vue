<script setup>
import { useRoute } from 'vue-router'

const route = useRoute()

console.log(route.params)
</script>

<template>
  <main class="py-4 px-4 max-w-[95%] xl:max-w-[1440px] mx-auto">
    <p>This is Topic</p>
  </main>
</template>
