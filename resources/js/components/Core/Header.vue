<script>
export default {
    name: "Header",
    methods: {
        changeLocale() {
            this.$i18n.locale = this.$i18n.locale === 'ukr'
                ? 'rus'
                : 'ukr';
        },
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
            <v-app-bar-title>{{$t(`projectName`)}}</v-app-bar-title>
            <v-spacer></v-spacer>
            <v-btn
                width="15%"
                @click="changeLocale()"
                class="ma-2 mt-6 mr-5"
                outlined
                color="white"
            >
                <span>
                    {{ $t('current_lang.fullLocale') }}
                </span>
            </v-btn>
        </v-app-bar>
        <v-sheet
            id="scrolling-techniques-3"
            class="overflow-y-auto"
        >
            <v-container style="min-height: 96pt;"></v-container>
        </v-sheet>
    </v-card>
</template>
<style>

</style>
