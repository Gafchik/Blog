<script>
export default {
    name: "ViewBody",
}
</script>

<template>
    <v-main style="min-height: 100vh;">
        <v-container class="justify-center h-100">
            <v-row class="justify-center mt-1">
                <router-view />
            </v-row>
        </v-container>
    </v-main>
</template>
<style>

</style>
