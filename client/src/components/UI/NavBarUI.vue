<template>
  <div class="navbar">
      <div>SEABATTLE</div>
      <div class="navbar-bttns">
          <bttn-ui @click="$router.push('/')">Main</bttn-ui>
          <bttn-ui @click="$router.push('/auth')">LOGIN</bttn-ui>
      </div>
  </div>
</template>

<script>
export default {
    name: 'nav-bar-ui'
}
</script>

<style scoped>
.navbar {
    height: 50px;
    background-color: blue;
    box-shadow: 2px 2px 4px gray;
    display: flex;
    align-items: center;
    padding: 0 15px;
}
.navbar-bttns {
    margin-left: auto;
}
</style>