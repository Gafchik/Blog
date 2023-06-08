<script>
import {mapActions, mapGetters} from "vuex";
import rules from "../../../constants/field-validation-rules";

export default {
    name: "Login",
    data(){
        return {
            form: {
                email: '',
                password: ''
            },
            rules
        }
    },
    computed:{
      ...mapGetters('authStore',['currentUser']),
    },
    methods:{
        ...mapActions('authStore',{
            loginAsync: 'loginAsync',
            getCsrfTokenAsync: 'getCsrfTokenAsync',
            getCurrentUserAsync: 'getCurrentUserAsync',
        }),
        login() {
            if (this.$refs.form.validate()) {
                this.loginAsync(this.form).then((response) => {
                    if (response.result) {
                    this.$router.push({ name: 'home'});
                        this.getCurrentUserAsync().then(() =>{
                            location.reload();
                        });
                    } else {
                    }

                })
            }
        }
    }
}
</script>

<template>
    <v-card
        min-width="75%"
        :title="$t(`app.login`)"
        class="m-1 p-1 my-1"
    >
        <v-form ref="form">
            <v-card-text>
                <v-text-field
                    :rules="[rules.required, rules.email]"
                    outlined
                    :label="$t(`app.email`)"
                    v-model="form.email"/>
                <v-text-field
                    :rules="[rules.required]"
                    outlined
                    :type="'password'"
                    counter
                    @click:append="show = !show"
                    :label="$t(`app.password`)"
                    v-model="form.password"/>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="green" @click="login">
                    <v-icon>done</v-icon>
                </v-btn>
            </v-card-actions>
        </v-form>
    </v-card>
</template>
