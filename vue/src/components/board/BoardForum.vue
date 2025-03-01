<script setup>
import MailIcon from '@/components/objects/MailIcon.vue'

defineProps({
  forum: Object,
})
</script>
<template>
  <tr
    class="text-sm h-8 hover:bg-gray-200"
    :class="{ 'border-b border-gray-400': !forum.lastEntry }"
  >
    <th class="border-r border-gray-400 text-left px-2 py-2">
      <div class="flex items-center">
        <MailIcon :open="forum.lastEntry" />
        <RouterLink :to="forum.link">
          <div class="flex flex-col">
            <span class="text-gray-900">{{ forum.name }}</span>
            <span class="text-xs text-gray-800 font-medium line-clamp-1">{{
              forum.description
            }}</span>
          </div>
        </RouterLink>
      </div>
    </th>
    <th class="border-r border-gray-400 hidden sm:table-cell">{{ forum.posts }}</th>
    <th class="border-r border-gray-400 hidden sm:table-cell">{{ forum.replies }}</th>
    <th class="">Header 1</th>
  </tr>
</template>
