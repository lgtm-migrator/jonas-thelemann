<template>
  <div class="border text-center">
    <a class="px-4" :href="to">
      <slot />
    </a>
  </div>
</template>

<script lang="ts">
import { defineComponent } from '#app'

export default defineComponent({
  name: 'JonasThelemannLink',
  props: {
    to: {
      required: true,
      type: String,
    },
  },
})
</script>
