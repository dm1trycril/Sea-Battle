<template>
  <div class="room">
    <div class="info-wrapper" v-show="!isPreparing">
      <div class="login">
        {{ this.getLogin }}
      </div>
      <score-ui>
      </score-ui>
      <div class="login">
        {{ this.getOpponentLogin }}
      </div>
    </div>
    <div class="info-wrapper" v-show="isPreparing">Place your ships</div>
    <div class="field-wrapper">
      <field-ui :gamefield="getGamefield" @changeCellState="shipsPlacement">
      </field-ui>
      <field-ui :gamefield="getOpponentGamefield" @changeCellState="shipsHitting" v-show="!isPreparing">
      </field-ui>
    </div>
    <div class="turn-wrapper" v-show="!isPreparing">
      <div class="turn-indicator">YOU</div>
      <div class="turn-indicator">OPPONENT</div>
    </div>
    <div class="bttn-play-wrapper" v-show="isPreparing">
      <bttn-ui @click="handleUserReady" :isDisabled="playButtonDisabled">PLAY</bttn-ui>
    </div>
  </div>
</template>

<script>

import { mapState, mapGetters, mapMutations, mapActions } from "vuex";
import Api from "@/api";

export default {
  data() {
    return {
      playButtonDisabled: false
    }
  },
  methods: {
    ...mapMutations({
      loadLogin: 'room/loadLogin',
      setGamefield: 'room/setGamefield',
      setOwnCell: 'room/setOwnCell',
      hitOpponentCell: 'room/hitOpponentCell'
    }),
    ...mapActions({

    }),
    shipsPlacement(new_state, index) {
      this.setOwnCell({ new_state, index });
    },
    shipsHitting(new_state, index) {
      this.hitOpponentCell({ new_state, index })
    },
    async handleUserReady() {
      const response = await Api.rooms.userReady(this.$route.params.id, this.getLogin, this.getGamefield);
      const message = response.data.message;
      if (message === "should_wait") {
        this.playButtonDisabled = true;
        this.$notify({
          title: 'Waiting for opponent'
        });
      }
      else if (message === "start_game") {
        this.$notify({
          title: 'Starting game'
        });
      }
    }
  },

  async mounted() {
    this.loadLogin();
  },

  computed: {
    ...mapState({
      gamefield: state => state.room.gamefield,
    }),
    ...mapGetters({
      getLogin: 'room/getLogin',
      getOpponentLogin: 'room/getOpponentLogin',
      getGamefield: 'room/getGamefield',
      getOpponentGamefield: 'room/getOpponentGamefield',

      isPreparing: 'room/isPreparing'
    })
  }
}
</script>

<style>
.room {
  width: 100%;
  max-width: 1240px;
  margin: 0 auto;
  padding: 0 20px;
}

.info-wrapper {
  margin-top: 25px;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}

.login {
  font-size: 2em;
}

.field-wrapper {
  margin-top: 25px;
  max-width: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 50px;
}

.turn-wrapper {
  margin-top: 25px;
  width: 100%;
  height: 40px;

  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 50px;
}

.turn-indicator {
  border: 1px solid black;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* .bttnl-play-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
} */

@media (max-width: 1024px) {
  .field-wrapper {
    grid-template-columns: 1fr;
  }
}
</style>