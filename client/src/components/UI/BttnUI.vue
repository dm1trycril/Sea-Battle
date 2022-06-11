<template>
  <button :disabled="isDisabled">
      <slot></slot>
  </button>
</template>

<script>

export default {
  name: 'bttn-ui',
  props: {
    isDisabled: {
      type: Boolean,
      default: false
    }
  }
}
</script>

<style scoped>
button {
    align-self: flex-end;
    padding: 10px 15px;
    background: white;
    color: black;
    border: 1px solid black;
    border-radius: 5px;
    margin: 0px 5px;
}

button:disabled {
  opacity: 0.5;
}
</style>