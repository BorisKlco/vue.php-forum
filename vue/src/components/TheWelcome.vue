<script setup>
import { onMounted, ref } from 'vue'

let api = import.meta.env.VITE_API
let quote = ref('')

onMounted(() => {
  fetch(api + '/quote')
    .then((res) => res.json())
    .then((q) => {
      quote.value = q
    })
})
</script>

<template>
  <div v-if="quote" class="outline outline-gray-400 rounded-md bg-gray-200">
    <div class="py-2 px-2 flex items-center justify-center">
      <p>"{{ quote.quote }}"</p>
    </div>
  </div>
  <div v-else class="py-2 px-2 flex items-center justify-center">
    <h1 class="text-gray-800">Loading...</h1>
  </div>
</template>
