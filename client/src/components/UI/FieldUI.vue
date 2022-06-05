<template>
  <div class="field">
        <row-ui
            v-for="n in counter"
            :key="n"
        >
        </row-ui>
  </div>
</template>

<script>
export default {
    name: 'field-ui',
    data() {
      return {
        counter: 10
      }
    }
}
</script>

<style>
.field {
    height: 100%;
    width: 100%;
    border: 1px solid black;
}
</style>