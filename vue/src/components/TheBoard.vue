<script setup>
import BoardForum from './board/BoardForum.vue'
import BoardHead from './board/BoardHead.vue'
</script>

<template>
  <div class="pt-4 px-2 pb-1 flex gap-1 text-xs">
    <a href="#">Index</a>
    <span>/</span>
    <a href="#">Forum</a>
  </div>
  <div class="outline outline-gray-400 overflow-hidden rounded-md">
    <table class="border-collapse table-auto w-full">
      <BoardHead category="Main Forum" />
      <tbody>
        <BoardForum name="Component Name" desription="Random forum description" />
        <BoardForum name="Component Name" desription="Random forum description" visited />
      </tbody>
      <BoardHead category="Another Forum" />
      <tbody>
        <BoardForum name="Component Name" desription="Random forum description" />
        <BoardForum name="Component Name" desription="Random forum description" visited last />
      </tbody>
    </table>
  </div>
</template>
