<script setup>
import { onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import BoardNavigation from '@/components/board/BoardNavigation.vue'

const route = useRoute()
const router = useRouter()
let api = import.meta.env.VITE_API
let forum = ref()

onMounted(async () => {
  try {
    const res = await fetch(api + '/forum?id=' + route.params.fid)
    forum.value = await res.json()
    if (forum.value.error) {
      router.push('/')
    }
  } catch (e) {
    console.log(e)
    router.push('/')
  }
})
</script>

<template>
  <main class="py-4 px-4 max-w-[95%] xl:max-w-[1440px] mx-auto">
    <BoardNavigation v-if="forum" :forum="forum.navigation" />
    <p>hi</p>
  </main>
</template>
