<script setup>
import ForumHead from '@/components/forum/ForumHead.vue'
import ForumTopic from '@/components/forum/ForumTopic.vue'

const placeholder = {
  title: 'Lorem, ipsum',
  author: 'PlaceholdeUser',
  path: '#',
  replies: '6',
  views: '34',
  createdAt: '2025-02-23 18:51:03',
}
</script>

<template>
  <table class="border-collapse table-auto w-full">
    <ForumHead />
    <tbody>
      <template v-for="i in 6" :key="i">
        <ForumTopic :topic="placeholder" />
      </template>
    </tbody>
  </table>
</template>
