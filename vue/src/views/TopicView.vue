<script setup>
import { onMounted, ref, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import BoardNavigation from '@/components/board/BoardNavigation.vue'
import PostReply from '@/components/post/PostReply.vue'
import PostPlaceholder from '@/components/placeholder/PostPlaceholder.vue'
import Pagination from '@/components/PaginationView.vue'

const route = useRoute()
const router = useRouter()
let api = import.meta.env.VITE_API
let topic = ref()
let page = ref()

const fetchTopic = async () => {
  try {
    page.value = route.query.page ?? 1
    const params = new URLSearchParams({ id: route.params.tid, page: page.value })
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

watch(() => router.currentRoute.value.query.page, fetchTopic)
</script>

<template>
  <BoardNavigation v-if="topic" :forum="topic.navigation" />
  <div v-if="topic" class="outline outline-gray-400 overflow-hidden rounded-md">
    <PostReply v-for="comment in topic.comments" :key="comment.comment_id" :comment="comment" />
    <Pagination v-show="topic.page.max > 1" :page="topic.page" />
  </div>
  <div v-else class="outline outline-gray-400 overflow-hidden rounded-md mt-8">
    <PostPlaceholder />
  </div>
</template>
