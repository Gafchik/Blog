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
</template>
