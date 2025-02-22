<script setup>
defineProps({
  path: String,
  name: String,
})
</script>

<template>
  <div class="pt-4 px-2 pb-1 flex gap-1 text-sm">
    <RouterLink :to="path">{{ name }}</RouterLink>
  </div>
</template>
