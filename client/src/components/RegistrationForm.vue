<template>
    <div class="auth-page">
    <div class="form">
      <h3 class="form-header">REGISTRATION</h3>
      <!-- <form action="/api/register" method="post" class="login-form">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password" placeholder="password">
        <button type="submit">SIGN UP</button>
      </form> -->
      <!-- <div class="login-form">
        <input type="text" name="login" placeholder="login" value="login">
        <input type="password" name="password" placeholder="password" value="password">
        <button @click="sendRegisterData">SIGN UP</button>
      </div> -->
    </div>
  </div>
</template>

<script>
// import Api from '@/api'
// import router from '@/router/router';

export default {
    name: 'registration-form',
    // data() {
    //   return {
    //     login: "",
    //     password: ""
    //   }
    // },
    // methods: {
    //   async sendRegisterData() {
    //     const response = await Api.auth.registerUser(this.login, this.password);
    //     if(response.status === 'ok')
    //     {
    //       localStorage.setItem('login', response.login);
    //       router.push('/');
    //     }
    //   }
    // }
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