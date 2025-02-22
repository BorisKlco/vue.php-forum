<script setup>
defineProps({
  name: String,
  desription: String,
  link: String,
  last: Boolean,
  visited: Boolean,
})
</script>
<template>
  <tr class="text-sm h-8 hover:bg-gray-200" :class="{ 'border-b border-gray-400': !last }">
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
            v-if="visited"
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z"
          />

          <path
            v-else
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"
          />
        </svg>
        <RouterLink :to="link">
          <div class="flex flex-col">
            <span class="">{{ name }}</span>
            <span class="text-xs">{{ desription }}</span>
          </div>
        </RouterLink>
      </div>
    </th>
    <th class="border-r border-gray-400 hidden sm:table-cell">16</th>
    <th class="border-r border-gray-400 hidden sm:table-cell">42</th>
    <th class="">Header 1</th>
  </tr>
</template>
