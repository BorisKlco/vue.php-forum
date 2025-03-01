<script setup>
import BoardHead from './BoardHead.vue'
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
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-8 mr-4"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
                  />
                </svg>
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
            <th class="">Placeholder</th>
          </tr>
        </template>
      </tbody>
    </template>
  </table>
</template>
