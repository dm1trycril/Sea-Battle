<template>
  <div class="field">
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