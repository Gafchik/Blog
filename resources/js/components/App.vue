<script>
import _ from 'lodash';
window._ = _;
import {mapActions} from "vuex";
import Header from '../components/Core/Header.vue';
import ViewBody from '../components/Core/ViewBody.vue';
import NavigationDrawer from '../components/Core/NavigationDrawer.vue';

export default {
    name: 'App',
    components: {
        Header,
        ViewBody,
        NavigationDrawer,
    },
    mounted() {
        this.getCsrfTokenAsync()
        this.getCurrentUserAsync()
    },
    methods:{
        ...mapActions('authStore', {
            getCsrfTokenAsync:'getCsrfTokenAsync',
            getCurrentUserAsync: 'getCurrentUserAsync',
        }),
    }
}
</script>
<template>
    <v-app>
        <v-card>
            <v-layout>
                <Header/>
                <navigation-drawer/>
                <view-body/>
            </v-layout>
        </v-card>
    </v-app>
</template>
