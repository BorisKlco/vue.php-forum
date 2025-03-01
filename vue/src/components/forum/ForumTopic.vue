<script setup>
import MailIcon from '@/components/objects/MailIcon.vue'

defineProps({
  topic: Object,
  visited: Boolean,
})
</script>
<template>
  <tr
    class="text-sm h-8 hover:bg-gray-200"
    :class="{ 'border-b border-gray-400': !topic.lastEntry }"
  >
    <th class="border-r border-gray-400 text-left px-2 py-2">
      <div class="flex items-center">
        <MailIcon />
        <RouterLink :to="topic.path">
          <div class="flex flex-col">
            <span class="text-gray-900">{{ topic.title }}</span>
            <span class="text-xs text-gray-800 font-medium line-clamp-1"
              >From: {{ topic.author }}</span
            >
          </div>
        </RouterLink>
      </div>
    </th>
    <th class="border-r border-gray-400 hidden sm:table-cell">{{ topic.replies }}</th>
    <th class="border-r border-gray-400 hidden sm:table-cell">42</th>
    <th class="">{{ topic.createdAt }}</th>
  </tr>
</template>
