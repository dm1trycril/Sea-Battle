<template>
    <div class="auth-page">
    <div class="form">
      <h3 class="form-header">{{ header_title }}</h3>
        <div class="login-form">
          <input type="text" name="login" placeholder="login" :value="login" @input="setLogin">
          <input type="password" name="password" placeholder="password" :value="password" @input="setPassword">
        <button @click="$emit('submit', login, password)">{{ submit_button_title }}</button>
        </div>
    </div>
  </div>
</template>

<script>

export default {
    name: 'auth-form',
    data() {
      return {
        login: "",
        password: ""
      }
    },
    props: {
      header_title: {
        type: String,
        required: true
      },
      submit_button_title: {
        type: String,
        required: true
      } 
    },
    methods: {
      setLogin(event) {
        this.login = event.target.value;
      },
      setPassword(event) {
        this.password = event.target.value;
      },
    }
}
</script>

<style>

.auth-page {
  width: 560px;
  padding: 8% 0 0 ;
  margin: auto;
}
.form-header {
  margin: 0 0 15px;
}
.form {
  position: relative;
  max-width: 100%;
  text-align: center;
  padding: 45px;
  margin: 0 auto 100px;

  background: rgba(41, 134, 204, 0.9);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2),
              0 5px 5px rgba(0, 0, 0, 0.24);
  color: white;
}
.form input {
  width: 100%;
  padding: 10px;
  margin: 0 0 15px;

  font-size: 14px;
}
.form button {
  width: 40%;
  padding: 15px;
}
</style>