<template>
  <div class="bttn_wrapper">
      <bttn-ui @click="$router.push(`/room:${id}`)">PLAY</bttn-ui>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: 10
    }
  }
}
</script>

<style>

</style>