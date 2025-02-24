<script setup>
import { onMounted, ref } from 'vue'
import BoardForum from './board/BoardForum.vue'
import BoardHead from './board/BoardHead.vue'
import BoardNavigation from './board/BoardNavigation.vue'

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
  <BoardNavigation v-if="board" :forum="board.navigation" />
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
  <h1 v-else class="text-center text-lg text-gray-600 py-24">Loading...</h1>
</template>
