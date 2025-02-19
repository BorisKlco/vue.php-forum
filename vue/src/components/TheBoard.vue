<script setup>
import { onMounted, ref } from 'vue'
import BoardForum from './board/BoardForum.vue'
import BoardHead from './board/BoardHead.vue'

let board = ref()

onMounted(async() => {
  try {
    const res = await fetch("http://138.2.144.113:8000/");
    board.value = await res.json();
  } catch (error) {
    console.log(error);
  }
})

</script>

<template>
  <div class="pt-4 px-2 pb-1 flex gap-1 text-xs">
    <a href="#">Index</a>
    <span>/</span>
    <a href="#">Forum</a>
  </div>
  <div v-if="board" class="outline outline-gray-400 overflow-hidden rounded-md">
    <table class="border-collapse table-auto w-full">
      <template v-for="(category, categoryIndex) in board.categories" :key="category.name">
        <BoardHead :category="category.name" />
        <tbody>
          <template v-for="(forum, forumIndex) in category.forums" :key="forum.name">
            <BoardForum :name="forum.name" :desription="forum.description" 
            :last="categoryIndex === board.categories.length - 1 && forumIndex === category.forums.length - 1" />
          </template>
        </tbody>
      </template>
    </table>
  </div>
  <h1 v-else class="text-center text-lg text-gray-600 py-24">Loading...</h1>
</template>
