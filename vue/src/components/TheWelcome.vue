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
  <div class="outline outline-gray-400 rounded-md bg-gray-200">
    <div class="py-2 px-2 flex items-center justify-center">
      <p v-if="quote">"{{ quote.quote }}"</p>
      <p v-else>"Lorem, ipsum dolor sit amet consectetur"</p>
    </div>
  </div>
</template>
