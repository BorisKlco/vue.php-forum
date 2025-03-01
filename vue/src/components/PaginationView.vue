<script setup>
import { ArrowLongLeftIcon, ArrowLongRightIcon } from '@heroicons/vue/20/solid'

defineProps({
  page: Object,
})
</script>

<template>
  <nav
    class="flex items-center justify-between border-t border-gray-400 px-4 pb-1 sm:px-0 bg-gray-300 text-gray-700"
  >
    <div class="flex w-0 flex-1 group">
      <RouterLink
        v-if="page.current > 1"
        :to="`?page=${page.current - 1}`"
        class="inline-flex items-center pr-1 pt-2 sm:pl-2 text-sm font-medium hover:border-gray-300 group-hover:text-gray-800"
      >
        <ArrowLongLeftIcon
          class="mr-1 h-4 w-4 text-gray-400 group-hover:text-gray-800"
          aria-hidden="true"
        />
        Previous
      </RouterLink>
    </div>
    <div class="hidden md:-mt-px md:flex">
      <template v-for="index in page.max" :key="index">
        <RouterLink
          v-if="index != page.current"
          :to="`?page=${index}`"
          class="inline-flex items-center px-2 pt-2 text-sm font-medium hover:text-gray-800 hover:underline"
        >
          {{ index }}
        </RouterLink>
        <span
          v-else
          href="#"
          class="inline-flex items-center px-2 pt-2 text-sm font-semibold text-gray-800 select-none"
          aria-current="page"
          >{{ index }}</span
        >
      </template>
    </div>
    <div class="flex w-0 flex-1 justify-end group">
      <RouterLink
        v-if="page.current < page.max"
        :to="`?page=${Number(page.current) + 1}`"
        class="inline-flex items-center pl-1 pt-2 sm:pr-2 text-sm font-medium hover:border-gray-300 group-hover:text-gray-800"
      >
        Next
        <ArrowLongRightIcon
          class="ml-1 h-4 w-4 text-gray-400 group-hover:text-gray-800"
          aria-hidden="true"
        />
      </RouterLink>
    </div>
  </nav>
</template>
