<template>
  <div class="room">
    <div class="info-wrapper">
      <div class="login">
        PLAYER1
      </div>
      <score-ui>
      </score-ui>
      <div class="login">
        PLAYER2
      </div>
    </div>
    <div class="field-wrapper">
      <field-ui>
      </field-ui>
      <field-ui>
      </field-ui>
    </div>
    <div class="turn-wrapper">
      <div class="turn-indicator">YOU</div>
      <div class="turn-indicator">OPPONENT</div>
    </div>
  </div>
</template>

<script>
export default {

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
@media (max-width: 1024px) {
  .field-wrapper {
    grid-template-columns: 1fr;
  }
}
</style>