<script>

import {mapActions, mapGetters} from "vuex";

export default {
    name: "Header",
    computed:{
        ...mapGetters('coreStore',{
            drawer: 'navigationDrawer',
        })
    },
    methods: {
        ...mapActions('coreStore',{
            setNavigationDrawerAsync: 'setNavigationDrawerAsync',
        }),
        changeDrawer(){
            this.setNavigationDrawerAsync(!this.drawer);
        }
    }
}
</script>

<template>
    <v-app-bar
        color="teal-darken-4"
    >
        <template v-slot:prepend>
            <v-app-bar-nav-icon @click="changeDrawer()"></v-app-bar-nav-icon>
        </template>

        <v-app-bar-title>{{$t(`projectName`)}}</v-app-bar-title>

        <v-spacer></v-spacer>
    </v-app-bar>
</template>
<style>

</style>
