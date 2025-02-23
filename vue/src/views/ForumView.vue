<script setup>
import { onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import BoardNavigation from '@/components/board/BoardNavigation.vue'
import ForumHead from '@/components/forum/ForumHead.vue'
import ForumTopic from '@/components/forum/ForumTopic.vue'

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
    console.log(forum.value)
  } catch (e) {
    console.log(e)
    router.push('/')
  }
})
</script>

<template>
  <main class="py-4 px-4 max-w-[95%] xl:max-w-[1440px] mx-auto">
    <BoardNavigation v-if="forum" :forum="forum.navigation" />
    <div v-if="forum" class="outline outline-gray-400 overflow-hidden rounded-md">
      <table class="border-collapse table-auto w-full">
        <ForumHead />
        <tbody>
          <ForumTopic
            v-for="topic in forum.post"
            :key="topic.post_id"
            :name="topic.title"
            :link="topic.path"
            :last="topic.lastEntry"
          />
        </tbody>
      </table>
    </div>
    <h1 v-else class="text-center text-lg text-gray-600 py-24">Loading...</h1>
  </main>
</template>
