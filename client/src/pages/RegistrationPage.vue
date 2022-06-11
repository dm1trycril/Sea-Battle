<template>
  <auth-form header_title="REGISTRATION" submit_button_title="SIGN UP" @submit="sendRegisterData">
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
    async sendRegisterData(login, password) {
      const response = await Api.auth.registerUser(login, password);
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
          title: 'Error during registration',
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