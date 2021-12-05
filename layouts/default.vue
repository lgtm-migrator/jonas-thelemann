<template>
  <nuxt />
</template>

<script lang="ts">
import { defineComponent } from '@nuxtjs/composition-api'

export default defineComponent({
  name: 'IndexPage',
  head() {
    return this.$nuxtI18nHead({ addSeoAttributes: true })
  },
  beforeCreate() {
    this.$moment.locale(this.$i18n.locale)
  },
})
</script>
