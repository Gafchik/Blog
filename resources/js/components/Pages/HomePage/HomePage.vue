<script>
import {mapActions} from "vuex";

export default {
    name: "HomePage",
    methods:{
        ...mapActions('authStore',{
            getCsrfTokenAsync: 'getCsrfTokenAsync',
            getCurrentUserAsync: 'getCurrentUserAsync',
        })
    }
}
</script>

<style scoped>

</style>
<template>
    <h1>sfdfsfdf</h1>
    <v-btn @click="getCsrfTokenAsync()">test</v-btn>
    <span>{{$t(`projectName`)}}</span>
</template>
