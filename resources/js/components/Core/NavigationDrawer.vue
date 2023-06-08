<script>
import {RUS, UKR} from "../../constants/locale";
import {mapActions, mapGetters} from "vuex";

export default {
    name: "NavigationDrawer",
    data(){
        return {
            locale: UKR
        }
    },
    computed:{
        ...mapGetters('coreStore',{
            drawer: 'navigationDrawer'
        }),
        ...mapGetters('authStore',{
            currentUser: 'currentUser'
        })
    },
    methods: {
        ...mapActions('authStore',{
            logoutAsync: 'logoutAsync',
            getCsrfTokenAsync: 'getCsrfTokenAsync',
        }),
        logout(){
            this.logoutAsync().then(() =>{
                this.$router.push({ name: 'home'});
                location.reload();
            });
        },
        getLocaleArray(){
            return [
                {
                    key: RUS,
                    text: this.$t('current_lang.rus')
                },
                {
                    key: UKR,
                    text: this.$t('current_lang.ukr')
                },
            ]
        }
    }
}
</script>

<template>
    <v-navigation-drawer v-model="drawer">
        <v-list nav>
            <v-list-item
                :to="{ name: 'home'}"
                :title="$t(`app.home`)"
                prepend-icon="home"
            />
            <v-list-item
                v-if="!currentUser.isLogin"
                :to="{ name: 'login'}"
                :title="$t(`app.login`)"
                prepend-icon="login"
            />
            <v-list-item
                v-if="!currentUser.isLogin"
                :to="{ name: 'registry'}"
                :title="$t(`app.reg`)"
                prepend-icon="person_add"
            />
            <v-list-item
                v-if="currentUser.isLogin"
                :to="{ name: 'profile'}"
                :title="$t(`app.profile`)"
                prepend-icon="account_circle"
            />
            <v-list-item
                v-if="currentUser.isLogin"
                @click="logout()"
                :title="$t(`app.logout`)"
                :to="{ name: 'home'}"
                prepend-icon="logout"
            />
            <v-select
                v-model="$i18n.locale"
                :items="getLocaleArray()"
                item-value="key"
                item-title="text"
            ></v-select>
        </v-list>
    </v-navigation-drawer>
</template>
