<script setup>
defineProps({
  category: String,
})
</script>
<template>
  <thead>
    <tr class="bg-gray-300 text-xs text-gray-700">
      <th class="w-[70%] sm:w-[70%] py-1 px-4 border-b border-r border-gray-400 text-center">
        {{ category }}
      </th>
      <th class="w-[5%] py-1 px-4 border-b border-r border-gray-400 hidden sm:table-cell">
        Topics
      </th>
      <th class="w-[5%] py-1 px-4 border-b border-r border-gray-400 hidden sm:table-cell">Posts</th>
      <th class="sm:w-[15%] py-1 px-2 border-b border-gray-400">Last post</th>
    </tr>
  </thead>
</template>
