<template>
  <auth-form header_title="LOGIN" submit_button_title="SIGN IN" @submit="sendLoginData">
  </auth-form>
</template>

<script>

import AuthForm from "@/components/AuthForm";

import Api from '@/api'
import router from '@/router/router';

export default {
  components: {
    AuthForm
  },
  methods: {
    async sendLoginData(login, password) {
      const response = await Api.auth.loginUser(login, password);
      if (response.data.status === 'ok') {
        localStorage.setItem('login', response.data.login);
        let next = router.currentRoute.value.query['next'];
        if (next) {
          router.push(next);
        }
        else {
          router.push('/');
        }
      }
      else {
        this.$notify({
          title: 'Cannot login',
          text: response.data.error,
          type: "error"
        });
      }
    }
  }
}
</script>
<style>
</style>