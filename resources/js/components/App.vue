<script>
import {mapActions} from "vuex";
import Header from '../components/Core/Header.vue';
import ViewBody from '../components/Core/ViewBody.vue';

export default {
    name: 'App',
    components: {
        Header,
        ViewBody,
    },
}
</script>
<template>
    <v-app>
        <Header></Header>
        <view-body></view-body>
    </v-app>
</template>
