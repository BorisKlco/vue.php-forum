<script setup>
import { RouterView } from 'vue-router'
</script>

<template>
  <header class="pt-12 px-8 md:w-[90%] xl:w-[80%] mx-auto">
    <div class="w-full bg-gray-200 rounded-md overflow-hidden">
      <img src="@/assets/nav.jpg" class="object-cover hidden sm:block">
      <div class="h-6 px-4 text-sm md:h-8 flex items-center">
        <p>a</p>
      </div>
    </div>
  </header>

  <RouterView />
</template>
