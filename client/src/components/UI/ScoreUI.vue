<template>
    <div class="score">
        <strong>0 : 0</strong>
    </div>
</template>

<script>
export default {
    name: 'score-ui'
}
</script>

<style>
.score {
    height: 60px;
    width: 200px;
    border: 1px solid black;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 3em;
}
</style>