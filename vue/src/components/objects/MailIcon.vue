<script setup>
import { Mail, MailOpen } from 'lucide-vue-next'
defineProps({
  open: Boolean,
})
</script>
<template>
  <MailOpen v-if="open" size="32" stroke-width="1.25" class="mr-4" />
  <Mail v-else size="32" stroke-width="1.25" class="mr-4" />
</template>
