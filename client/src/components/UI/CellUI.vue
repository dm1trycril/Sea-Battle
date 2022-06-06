<template>
  <div class="cell"> {{ cell }} </div>
</template>

<script>
export default {
    name: 'cell-ui',
    props: {
      cell: {
        type: Number,
        required: true
    }
  }
}
</script>

<style>
.cell {
    aspect-ratio: 1/1;
    border: 1px solid black;
    background-color: aqua;
}
</style>