<script setup>
import BoardHead from '@/components/board/BoardHead.vue'
import MailIcon from '@/components/objects/MailIcon.vue'
</script>

<template>
  <table class="border-collapse table-auto w-full">
    <template v-for="i in 3" :key="i">
      <BoardHead category="Lorem, ipsum" />
      <tbody>
        <template v-for="i in 3" :key="i">
          <tr class="text-sm h-8 hover:bg-gray-200 border-b border-gray-400">
            <th class="border-r border-gray-400 text-left px-2 py-2">
              <div class="flex items-center">
                <MailIcon />
                <div class="flex flex-col">
                  <span class="text-gray-900">Lorem, ipsum </span>
                  <span class="text-xs text-gray-800 font-medium line-clamp-1"
                    >Lorem, ipsum dolor sit amet consectetur</span
                  >
                </div>
              </div>
            </th>
            <th class="border-r border-gray-400 hidden sm:table-cell">16</th>
            <th class="border-r border-gray-400 hidden sm:table-cell">32</th>
            <th class="">2025-02-23 18:51:03</th>
          </tr>
        </template>
      </tbody>
    </template>
  </table>
</template>
