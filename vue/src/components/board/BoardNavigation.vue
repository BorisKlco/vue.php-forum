<script setup>
defineProps({
  forum: Array,
})
</script>

<template>
  <div class="pt-2 pl-2 pb-1 flex gap-1 text-sm items-center">
    <template v-for="(item, key) in forum" :key="item.path">
      <RouterLink :to="item.path" class="hover:underline line-clamp-1">{{ item.name }}</RouterLink>
      <span v-if="forum.length - 1 != key" class="px-1 text-xs">/</span>
    </template>
  </div>
</template>
