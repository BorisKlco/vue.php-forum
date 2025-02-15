<script setup>
import BoardForum from './board/BoardForum.vue'
import BoardHead from './board/BoardHead.vue'
</script>

<template>
  <div class="my-4 outline outline-gray-400 rounded-md">
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
