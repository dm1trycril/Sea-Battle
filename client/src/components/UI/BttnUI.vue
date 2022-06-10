<template>
  <button class="bttn">
      <slot></slot>
  </button>
</template>

<script>
export default {
  name: 'bttn-ui',
  
}
</script>

<style scoped>
.bttn {
    align-self: flex-end;
    padding: 10px 15px;
    background: white;
    color: black;
    border: 1px solid black;
    border-radius: 5px;
    margin: 0px 5px;
}

</style>