<template>
  <div class="bttn_wrapper">
    <bttn-ui @click="createRoom">PLAY</bttn-ui>
  </div>
</template>

<script>
import Api from "@/api";
import router from '@/router/router';

export default {
  methods: {
    async createRoom() {
      if (localStorage.getItem('login') === null) {
        this.$notify({
          title: 'You should be logged in',
          type: 'warning'
        });
        router.push('/login');
        return;
      }
      const response = await Api.rooms.createRoom(localStorage.getItem('login'));
      localStorage.setItem("joined", true);
      router.push(`/room/${response.data.room_id}`);
      
    }
  }
}
</script>

<style>
</style>