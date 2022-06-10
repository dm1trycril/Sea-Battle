<template>
  <div class="cell"
    @click="changeCellState"
  > 
    {{ cell }} 
  </div>
</template>

<script>

import { mapGetters, mapMutations } from 'vuex'

const states_map = {
    preparing: {
        0: 1,
        1: 0,
    },
    game: {
        0: 2,
        1: 3,
    },
}

export default {
  name: 'cell-ui',
  props: {
    cell: {
      type: Number,
      required: true
    },
    index: {
      type: Number,
      required: true
    }
  },
  methods: {
    ...mapMutations({
      setGamestatus: 'room/setGamestatus'
    }),
    changeCellState() {
      const new_state = states_map[this.getGamestatus]?.[this.cell];
      if (new_state === undefined) {
        throw `invalid status mapping: gamestatus - ${this.getGamestatus}, cell state - ${this.cell}`;
      }
      this.$emit('changeCellState', new_state, this.index);
    }
  },

  computed: {
    ...mapGetters({
      getGamestatus: 'room/getGamestatus',
    })
  }
}
</script>

<style>
.cell {
  aspect-ratio: 1/1;
  border: 1px solid black;
  background-color: aqua;
}
</style>