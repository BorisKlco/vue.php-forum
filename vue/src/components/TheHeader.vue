<script setup>
import { User, GitPullRequest, ExternalLink } from 'lucide-vue-next'
</script>

<template>
  <header class="pt-8 px-4 max-w-[95%] xl:max-w-[1440px] mx-auto">
    <div
      class="w-full bg-gray-200 rounded-md overflow-hidden outline outline-gray-400 text-sm sm:text-lg"
    >
      <RouterLink to="/">
        <img src="@/assets/nav.jpg" class="object-cover hidden sm:block outline outline-gray-400" />
      </RouterLink>
      <div class="px-4 flex items-center justify-between">
        <div class="flex items-center gap-1 cursor-pointer hover:text-blue-800 text-sm">
          <User size="16" />
          OneTwo
        </div>

        <div class="flex items-center justify-center py-2 gap-3 text-sm">
          <a
            href="https://tricksofthe.trade/"
            target="_blank"
            class="flex gap-1 items-center mr-2 hover:text-blue-800"
          >
            <ExternalLink size="16" />
            <span>Portfolio</span>
          </a>
          <a
            href="https://github.com/BorisKlco/vue.php-forum"
            target="_blank"
            class="flex gap-1 items-center hover:text-blue-800"
          >
            <GitPullRequest size="16" />
            <span>Github</span>
          </a>
        </div>
      </div>
    </div>
  </header>
</template>
