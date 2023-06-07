<script>
import {RUS, UKR} from '../../constants/locale'

export default {
    name: "Header",
    data(){
        return {
            locale: UKR
        }
    },
    methods: {
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
    <v-card id="core-header" class="overflow-hidden">
        <v-app-bar
            color="#4F53B1"
            dark
            shrink-on-scroll
            prominent
            fade-img-on-scroll
            scroll-target="#scrolling-techniques-3"
        >
            <router-link
                class="text-white"
                :to="{ name: 'login'}">
                {{$t(`app.login`)}}
            </router-link>
            <router-link
                class="text-white"
                :to="{ name: 'registry'}">
                {{$t(`app.reg`)}}
            </router-link>
            <v-spacer></v-spacer>
            <v-app-bar-title>{{$t(`projectName`)}}</v-app-bar-title>

            <v-spacer></v-spacer>
            <v-select
                v-model="$i18n.locale"
                :items="getLocaleArray()"
                item-value="key"
                item-title="text"
            ></v-select>
        </v-app-bar>
    </v-card>
</template>
<style>

</style>
