<template>
  <div class="row">
      <cell-ui
        v-for="n in counter"
        :key="n"
      >
      </cell-ui>
  </div>
</template>

<script>
export default {
    name: 'row-ui',
    data() {
        return {
            counter: 10
        }
    }
}
</script>

<style>
.row {
    height: 10%;
    width: 100%;
    display: flex;
}
</style>