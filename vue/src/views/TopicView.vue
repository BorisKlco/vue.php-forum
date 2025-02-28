<script setup>
import { onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import BoardNavigation from '@/components/board/BoardNavigation.vue'

const route = useRoute()
const router = useRouter()
let api = import.meta.env.VITE_API
let topic = ref()

const fetchTopic = async () => {
  try {
    const params = new URLSearchParams({ id: route.params.tid })
    const url = `${api}/topic?${params.toString()}`

    const res = await fetch(url)
    topic.value = await res.json()
    if (topic.value.error) {
      router.push('/')
    }
  } catch (e) {
    console.log(e)
    router.push('/')
  }
}

onMounted(fetchTopic)
</script>

<template>
  <main class="py-4 px-4 max-w-[95%] xl:max-w-[1440px] mx-auto">
    <BoardNavigation v-if="topic" :forum="topic.navigation" />
    <div v-if="topic" class="outline outline-gray-400 overflow-hidden rounded-md">
      {{ topic }}
    </div>
    <h1 v-else class="text-center text-lg text-gray-600 py-24">Loading...</h1>
  </main>
</template>
