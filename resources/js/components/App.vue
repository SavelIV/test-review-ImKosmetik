<template>
    <div class="wrapper">
        <Header/>
        <router-view/>
    </div>
</template>

<script lang="ts">
import Header from "./header/Header.vue";
export default {
    name: 'App',
    components: {Header}
}
</script>

<style scoped>
.wrapper {
    display: flex;
    flex-direction: column;
    align-items: start;
    justify-content: center;
    width: 100%;
}
</style>
