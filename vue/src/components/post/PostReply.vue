<script setup>
import { computed } from 'vue'
const props = defineProps(['comment'])

const formattedLines = computed(() => {
  return props.comment.reply.split(/\r\n|\r|\n/)
})
</script>

<template>
  <div
    class="flex min-h-[8rem] sm:min-h-[12rem]"
    :class="{ 'border-b border-gray-400': !comment.lastEntry }"
  >
    <div
      class="hidden sm:flex flex-col sm:basis-[10rem] items-center justify-center bg-gray-100 border-r border-gray-400"
    >
      <p
        class="mb-2 font-semibold tracking-wider text-gray-700 underline decoration-wavy decoration-from-font"
      >
        {{ comment.author }}
      </p>
      <img
        :src="`https://api.dicebear.com/9.x/notionists/svg?seed=${comment.author}&scale=120&beard[]`"
        alt="avatar"
        class="max-w-26 m-1 rounded-full bg-gray-200 border border-gray-400 shadow-xs"
      />
    </div>
    <div class="flex flex-col basis-full sm:justify-between">
      <div class="flex sm:hidden text-xs px-1 py-0.5 justify-between">
        <p>{{ comment.author }}</p>
        <p>{{ comment.createdAt }}</p>
      </div>
      <div class="m-2 max-w-screen">
        <p v-for="(line, index) in formattedLines" :key="index">
          {{ line }}
        </p>
      </div>
      <div class="hidden sm:flex text-xs pr-2 py-0.5 self-end">{{ comment.createdAt }}</div>
    </div>
  </div>
</template>
