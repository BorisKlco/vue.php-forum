<script setup>
import { onMounted, ref, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import BoardNavigation from '@/components/board/BoardNavigation.vue'
import ForumHead from '@/components/forum/ForumHead.vue'
import ForumTopic from '@/components/forum/ForumTopic.vue'
import Pagination from '@/components/PaginationView.vue'
import ForumPlaceholder from '@/components/placeholder/ForumPlaceholder.vue'

const route = useRoute()
const router = useRouter()
let api = import.meta.env.VITE_API
let forum = ref()
let page = ref()

const fetchForum = async () => {
  try {
    page.value = route.query.page ?? 1
    const params = new URLSearchParams({ id: route.params.fid, page: page.value })
    const url = `${api}/forum?${params.toString()}`

    const res = await fetch(url)
    forum.value = await res.json()
    if (forum.value.error) {
      router.push('/')
    }
  } catch (e) {
    console.log(e)
    router.push('/')
  }
}

onMounted(fetchForum)

watch(() => router.currentRoute.value.query.page, fetchForum)
</script>

<template>
  <BoardNavigation v-if="forum" :forum="forum.navigation" />
  <div v-if="forum" class="outline outline-gray-400 overflow-hidden rounded-md">
    <table class="border-collapse table-auto w-full">
      <ForumHead />
      <tbody>
        <template v-for="topic in forum.post" :key="topic.post_id">
          <ForumTopic :topic="topic" />
        </template>
      </tbody>
    </table>
    <Pagination v-show="forum.page.max > 1" :page="forum.page" />
  </div>
  <div v-else class="outline outline-gray-400 overflow-hidden rounded-md mt-8">
    <ForumPlaceholder />
  </div>
</template>
