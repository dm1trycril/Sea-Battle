<template>
  <div class="field">
        <!-- <row-ui
            v-for="n in counter"
            :key="n"
        >
        </row-ui> -->
        <cell-ui
          v-for="cell in gamefield"
          :cell="cell"
          :key="cell"
        >
        </cell-ui>
  </div>
</template>

<script>
export default {
    name: 'field-ui',
    data() {
      return {
        counter: 100
      }
    },
    props: {
      gamefield: {
        type: Array,
        required: true
      }
    }
}
</script>

<style>
.field {
    height: 100%;
    width: 100%;
    border: 1px solid black;
    display: grid;
    grid-template-columns: repeat(10, 1fr);
}
</style>