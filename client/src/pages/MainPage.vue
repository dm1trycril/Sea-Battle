<template>
  <div class="bttn_wrapper">
      <bttn-ui @click="createRoom">PLAY</bttn-ui>
  </div>
</template>

<script>
import Api from "@/api";
import router from '@/router/router';

export default {
  data() {
    return {
      id: 10
    }
  },
  methods: {
    async createRoom() {
      const response = await Api.rooms.createRoom(localStorage.getItem('login'));
      router.push(`/room/${response.data.room_id}`);
    }
  }
}
</script>

<style>

</style>