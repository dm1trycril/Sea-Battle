<template>
  <div>
      <strong>Main Page</strong>
      <bttn-ui @click="Ping">Ping</bttn-ui>
  </div>
</template>

<script>
export default {
  methods: {
    Ping() {
      fetch('/api/ping')
    }
  }
}
</script>

<style>

</style>