<script setup>
import { onMounted, ref } from 'vue'
import BoardForum from '@/components/board/BoardForum.vue'
import BoardHead from '@/components/board/BoardHead.vue'
import BoardPlaceholder from '@/components/placeholder/BoardPlaceholder.vue'

let api = import.meta.env.VITE_API
let board = ref()

onMounted(async () => {
  try {
    const res = await fetch(api)
    board.value = await res.json()
  } catch (error) {
    console.log(error)
  }
})
</script>

<template>
  <div v-if="board" class="outline outline-gray-400 overflow-hidden rounded-md">
    <table class="border-collapse table-auto w-full">
      <template v-for="category in board.categories" :key="category.name">
        <BoardHead :category="category.name" />
        <tbody>
          <template v-for="forum in category.forums" :key="forum.id">
            <BoardForum :forum="forum" />
          </template>
        </tbody>
      </template>
    </table>
  </div>
  <div v-else class="outline outline-gray-400 overflow-hidden rounded-md">
    <BoardPlaceholder />
  </div>
</template>
