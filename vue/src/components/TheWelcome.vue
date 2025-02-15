<script setup>
import { onMounted, ref } from 'vue'

let quote = ref('')

onMounted(() => {
  fetch('https://dummyjson.com/quotes/random')
    .then((res) => res.json())
    .then((q) => {
      quote.value = q
    })
})
</script>

<template>
  <div class="outline outline-gray-400 rounded-md bg-gray-200 shadow-sm">
    <div v-if="quote" class="py-2 px-2 flex items-center justify-center">
      <p>
        "{{ quote.quote }}" - <span>{{ quote.author }}</span>
      </p>
    </div>
    <div v-else class="py-2 px-2 flex items-center justify-center">
      <h1 class="text-gray-800">Loading daily quote...</h1>
    </div>
  </div>
</template>
