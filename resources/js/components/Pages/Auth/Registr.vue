<script>
import {mapActions, mapGetters} from "vuex";
import rules from "../../../constants/field-validation-rules";

export default {
    name: "Registr",
    data(){
        return {
            show: false,
            show1: false,
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
            rules: rules
        }
    },

    methods:{
        ...mapActions('authStore',{
            getCsrfTokenAsync:'getCsrfTokenAsync',
            registerAsync: 'registerAsync',
            getCurrentUserAsync: 'getCurrentUserAsync'
        }),
        ...mapActions({
            signIn:'auth/login'
        }),

        async register(){
            if (this.$refs.form.validate()) {
                this.form.password_confirmation = this.form.password
                await this.getCsrfTokenAsync();
                await this.registerAsync(this.form).then((response) => {
                    if (response.result) {
                        this.getCurrentUserAsync();
                        // this.$router.push({path: '/'});
                    } else {

                    }
                })
            }
        },
    }
}
</script>

<template>
    <v-card
        min-width="75%"
        :title="$t(`app.reg`)"
        class="m-1 p-1 my-1"
    >
        <v-form ref="form">
            <v-card-text>
                <v-text-field
                    :rules="[rules.required]"
                    maxlength="50"
                    counter
                    outlined
                    clearable
                    :label="$t(`app.name`)"
                    v-model="form.name"/>
                <v-text-field
                    :rules="[rules.required, rules.email]"
                    maxlength="50"
                    counter
                    outlined
                    clearable
                    type="email"
                    :label="$t(`app.email`)"
                    v-model="form.email"/>
                <v-text-field
                    :rules="[rules.required]"
                    outlined
                    :type="'password'"
                    counter
                    :label="$t(`app.password`)"
                    v-model="form.password"/>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="green" @click="register">
                    <v-icon>done</v-icon>
                </v-btn>
            </v-card-actions>
        </v-form>
    </v-card>
</template>
