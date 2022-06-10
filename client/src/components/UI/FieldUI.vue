<template>
  <div class="field">
        <cell-ui
          v-for="(cell, index) in gamefield"
          :cell="cell"
          :index="index"
          :key="index"
          @changeCellState="changeCellState"
        >
        </cell-ui>
  </div>
</template>

<script>
export default {
    name: 'field-ui',
    props: {
      gamefield: {
        type: Array,
        required: true
      }
    },
    methods: {
      changeCellState(new_state, index) {
        this.$emit("changeCellState", new_state, index);
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